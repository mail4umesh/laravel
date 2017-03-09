<?php
 
/**
 * This is UserController class. This class will
 * execute all the request for user module.
 * Created By : Maxx Lalit
 * Date : 14 Aug, 2014
 * @package BaseController  
 */

namespace App\Modules\User\Controllers;

use App\Modules\Gallery\Models\Gallery;
use Carbon\Carbon;
use Madcoda\Youtube;
use OAuth;
use App\Modules\User\Models\MetaSettings;
use App\Modules\User\Models\Users;
use App\Modules\User\Repository\UserInterface;
use App\Modules\User\Models\UserModelInfo;
use App\Modules\User\Models\UserCompanyInfo;
use App\Modules\User\Models\UserPhotographerInfo;
use App\Modules\User\Models\UserProfileVisitors;
use App\Modules\User\Models\UserPosts;
use App\Modules\User\Models\UserPostImages;
use App\Modules\User\Models\UserPostVideos;
use App\Modules\User\Models\UserPostLikes;
use App\Modules\User\Models\UserFollowers;
use App\Modules\User\Models\UserFriends;
use App\Modules\User\Models\UserSocailLinks;
use App\Modules\User\Models\ProfileCustomTheme;
use App\Modules\User\Models\ProtfolioCustomTheme;
use App\Modules\User\Models\CompanyTimelineContact;
use App\Modules\User\Models\ContactNotification;
use App\Modules\User\Models\CompanySettings;
use App\Modules\Image\Models\Images;
use App\Modules\Group\Models\Community;
use App\Modules\Group\Models\CommunityMember;
use App\Modules\Group\Models\CommunityPhoto;
use App\Modules\Group\Models\CommunityPhotoLikes;
use App\Modules\Group\Models\CommunityPhotoLoveRating;
use App\Modules\Image\Models\ImageLike;
use App\Modules\Image\Models\ImageLoveRating;
use App\Modules\Image\Models\ImageComments;
use App\Modules\Image\Models\ImageVisitorLog;
use App\Modules\Image\Models\ImageTag;
use App\Modules\Gallery\Models\GalleryImage;
use App\Modules\Critique\Models\ImageCritique;
use App\Modules\Contest\Models\ImageContestCategory;
use App\Modules\Contest\Models\ImageContest;
use App\Modules\Image\Models\ImageCommentLikes;
use App\Modules\Image\Models\ImageCategories;
use App\Modules\Image\Models\ImageNotification;
use App\Modules\Gallery\Models\PortfolioGallery;
use App\Modules\Gallery\Models\PortfolioGalleryImage;
use App\Modules\Admin\Models\Categories;

use App\Http\Controllers\BaseController;
use App\User;


//use Illuminate\Support\Facades\Redis;
use Controller,
    Config,
    View,
    Crypt,
    DateTime,
    Auth,
    Validator,
    Input,
    Response,
    Redirect,
    Helper,
    Hash,
    Request,
    File,
    URL,
    Session,
    Image,
    HTML,
    DB;


class ProfileController extends BaseController {

    protected $user;
    protected $userRepo;

    /**
     * This function is custruct method of class, to set data for class
     * Created By : Maxx Lalit
     * Date : 18 Aug,2014
     * @param null
     * @return null
     */
    public function __construct() {
        //$this->userRepo = $userRepo;
        parent::__construct();
        if (Auth::check()) {
            $this->user = Auth::user();
        }
     //   $this->redis = Redis::connection();

        View::composer('_layouts.timeline-header', function($view) {
            $timeUserName = "";
            if(is_numeric(Request::segment(3))) {
                $result = Users::where('id', '=', Request::segment(3))->select('id','name')->first();
                    if (isset($result->id)) {
                        $timeUserName = $result->name;
                    } 
            } 
                             
            $view->with('timeUserName', $timeUserName);  
        });
    }

    /**
     * function will generate profile page
     * @param int $user_id
     */
    function getProfile($uid=0, $falge = 0) { 
        if($uid==0){
            if(Request::segments()[0]){
               $userArr = explode('-', Request::segments()[0]);
               if(count($userArr)>2){
                    $userName = $userArr[0].'-'.$userArr[1].' '.$userArr[2];
               }else{
                    $userName = str_replace('-', ' ', trim(Request::segments()[0]));
               }
                            
                $result = Users::where('name', 'like', $userName)->select('id')->first();
                if (isset($result->id)) {
                    $uid=$result->id;
                }else{
                     $result = Users::where('name', 'like', str_replace('-', ' ', trim(Request::segments()[0])))->select('id')->first();
                     $uid=$result->id;
                }
            }
        } 

        $ouser = User::find($uid);
        $user = $ouser->toArray();


        //\Event::fire('user.view', $ouser);
        if (Auth::check()) {
            $user_id = $this->user->getId();
            $isLogin = 1;
        } else {
            $user_id = '';
            $isLogin = 0;
        }

        if ($uid != $user_id) {
            $this->trackUser($uid);
        }
        //\Event::fire('user.like', $ouser);
        //\Event::fire('user.loves', array($ouser,3));

 
        $data['user_login'] = $isLogin;
        $data['user_id'] = $uid;
        $data['userid'] = $uid;
        $data['user'] = $user;
        if (is_object($this->user)) {
            $data['user_login'] = $this->user;
            $data['user_id'] = $this->user->getId();
        }else{
           $data['user_id'] = "";
        }
        $data['views'] = $user['view_counter'];
        $data['likes'] = $user['total_likes']; //$this->getLikesByUserId($uid);
        $data['loves'] = $user['total_loves']; //$this->getLovesByUserId($uid);
        $data['total_followers'] = $user['total_followers']; //$this->getFollowersByUserId($uid);
        $data['photos'] = $this->getImageCountByUserId($uid);
        $data['social'] = $this->getSocialLinks($uid);
    


        $mostliked = Images::where('images.user_id', '=', $uid)->where('image_likes.id', '!=', "")
                    ->where(DB::raw('DATE(image_likes.created_at)'), '=', Date('Y-m-d'))
                    ->select('images.id as image_id', 'images.user_id as ownerId', 'users.name', 'images.title','images.likes','images.loves', 'images.path', DB::raw('count(image_likes.id) as counter'), 'image_likes.id', 'image_likes.created_at')
                    ->Join('image_likes', 'images.id', '=', 'image_likes.image_id')
                    ->LeftJoin('users', 'users.id', '=', 'images.user_id')
                    ->groupBy('image_likes.image_id')
                    ->orderBy('counter', 'DESC') ->take(8)
                    ->get()->toArray();
        $data['results']=$mostliked;
        
        $data['uid'] = $uid;
         
        $data['imgComment'] = $this->getImageCommentsByUserId($uid); //todo need to add all comments 
        
        $customizationData = ProfileCustomTheme::where('user_id','=',$uid)->get()->toArray(); 
        $data['customization'] =$customizationData;

        $data['avg_rating'] = 0;
        $data['tot_rating'] = 0;
        $data['isLogin']    = $isLogin;
        $data['cfg_love_raing'] = Config::get('constant.love_rating_category');
        $data['cfg_rating'] = Config::get('constant.rating_category');
        
        return View::make('User::profile-01.index', $data);
        /*
        if(count($customizationData) &&  $data['customization'][0]['layout'] == 3)
            return View::make('User::profile.profile', $data);
        else if(count($customizationData) &&  $data['customization'][0]['layout'] == 2)
            return View::make('User::profile.profile2', $data);
        else
            return View::make('User::profile.profile', $data);

        */
    }



    function progressiveProfile($uid=0, $falge = 0) { 
        if($uid==0){
            if(Request::segments()[0]){
               $userArr = explode('-', Request::segments()[0]);
               if(count($userArr)>2){
                    $userName = $userArr[0].'-'.$userArr[1].' '.$userArr[2];
               }else{
                    $userName = str_replace('-', ' ', trim(Request::segments()[0]));
               }
                            
                $result = Users::where('name', 'like', $userName)->select('id')->first();
                if (isset($result->id)) {
                    $uid=$result->id;
                }else{
                     $result = Users::where('name', 'like', str_replace('-', ' ', trim(Request::segments()[0])))->select('id')->first();
                     $uid=$result->id;
                }
            }
        } 

        $ouser = User::find($uid);
        $user = $ouser->toArray();


        //\Event::fire('user.view', $ouser);
        if (Auth::check()) {
            $user_id = $this->user->getId();
            $isLogin = 1;
        } else {
            $user_id = '';
            $isLogin = 0;
        }

        if ($uid != $user_id) {
            $this->trackUser($uid);
        }
        //\Event::fire('user.like', $ouser);
        //\Event::fire('user.loves', array($ouser,3));

 
        $data['user_login'] = $isLogin;
        $data['user_id'] = $uid;
        $data['userid'] = $uid;
        $data['user'] = $user;
        if (is_object($this->user)) {
            $data['user_login'] = $this->user;
            $data['user_id'] = $this->user->getId();
        }else{
           $data['user_id'] = "";
        }
        $data['views'] = $user['view_counter'];
        $data['likes'] = $user['total_likes']; //$this->getLikesByUserId($uid);
        $data['loves'] = $user['total_loves']; //$this->getLovesByUserId($uid);
        $data['total_followers'] = $user['total_followers']; //$this->getFollowersByUserId($uid);
        $data['photos'] = $this->getImageCountByUserId($uid);
        $data['social'] = $this->getSocialLinks($uid);
    


        $mostliked = Images::where('images.user_id', '=', $uid)->where('image_likes.id', '!=', "")
                    ->where(DB::raw('DATE(image_likes.created_at)'), '=', Date('Y-m-d'))
                    ->select('images.id as image_id', 'images.user_id as ownerId', 'users.name', 'images.title','images.likes','images.loves', 'images.path', DB::raw('count(image_likes.id) as counter'), 'image_likes.id', 'image_likes.created_at')
                    ->Join('image_likes', 'images.id', '=', 'image_likes.image_id')
                    ->LeftJoin('users', 'users.id', '=', 'images.user_id')
                    ->groupBy('image_likes.image_id')
                    ->orderBy('counter', 'DESC') ->take(8)
                    ->get()->toArray();
        $data['results']=$mostliked;
        
        $data['uid'] = $uid;
         
        $data['imgComment'] = $this->getImageCommentsByUserId($uid); //todo need to add all comments 
        
        $customizationData = ProfileCustomTheme::where('user_id','=',$uid)->get()->toArray(); 
        $data['customization'] =$customizationData;

        $data['avg_rating'] = 0;
        $data['tot_rating'] = 0;
        $data['isLogin']    = $isLogin;
        $data['cfg_love_raing'] = Config::get('constant.love_rating_category');
        $data['cfg_rating'] = Config::get('constant.rating_category');
        
        return View::make('User::profile-01.progressive', $data);
        /*
        if(count($customizationData) &&  $data['customization'][0]['layout'] == 3)
            return View::make('User::profile.profile', $data);
        else if(count($customizationData) &&  $data['customization'][0]['layout'] == 2)
            return View::make('User::profile.profile2', $data);
        else
            return View::make('User::profile.profile', $data);

        */
    }


    public function trackUser($usrId) {

      //  echo  date('Y-m-d H:i:s',time() - 1* 60);die;
        if (Auth::check()) {
            $user_id = $this->user->getId();
        } else {
            $user_id = 0;
        }

        //$routeName = Route::currentRouteName();
        $routeVal = $_SERVER['REQUEST_URI'];
        $imageId = Request::segment(2);
        $ip = $_SERVER['REMOTE_ADDR'];
        //$ip='115.184.98.182';

          if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        if ($user_id != 0){
            $visiterData = UserProfileVisitors::where('visitor_id', '=', $user_id)->where('visit_date' ,'>', date('Y-m-d H:i:s',time() - 7* 60*60))->where('user_id', '=', $usrId)->orderBy('visit_date', 'ASC')->first();
 
        }else{
            $visiterData = UserProfileVisitors::where('visitor_ip', '=', $_SERVER['REMOTE_ADDR'])->where('user_id', '=', $usrId)->first();
        }
       //asd($this->getLastQuery(),2);
        $browser = "";
        $visitorDetails = $this->get_ip_details($ip);
        $referrer_url = "";
        $keywords = "";
        $sourceSite = "";
        $device = $this->getDevice();
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referrer_url = $_SERVER['HTTP_REFERER'];
            $keywords = $this->getSeachKeyword();
            $parts = parse_url($referrer_url);
            $sourceSite = $parts["scheme"] . "://" . $parts["host"];
        }
 
        if (isset($visiterData->visitor_ip)) {
          
           // $visiterData = UserProfileVisitors::find($visiterData->id);

            
            $visiterData->user_id = $usrId;
            $visiterData->visitor_id = $user_id;
            $visiterData->number_of_visits = $visiterData->number_of_visits + 1;
            $visiterData->visitor_ip = $ip;
            $visiterData->visit_date = date('Y-m-d H:i:s');
            $visiterData->visitor_browser = $browser;
            $visiterData->country = $visitorDetails['countryName'];
            $visiterData->region = $visitorDetails['region'];
            $visiterData->city = $visitorDetails['city'];

            $visiterData->referrer_url = $referrer_url;
            $visiterData->keywords = $keywords;
            $visiterData->source_site = $sourceSite;
            $visiterData->device = $device;
            $visiterData->created_at = date('Y-m-d H:i:s');
             $visiterData->is_new = 1;
            $visiterData->save();
            $visitorid = $visiterData->id;
        } else {
 
            $visitor = new UserProfileVisitors;
            $visitor->visitor_ip = $ip;
            $visitor->user_id = $usrId;
            $visitor->visitor_id = $user_id;
            $visitor->visit_date = date('Y-m-d H:i:s');
            $visitor->visitor_browser = $browser;
            $visitor->country = $visitorDetails['countryName'];
            $visitor->region = $visitorDetails['region'];
            $visitor->city = $visitorDetails['city'];

            $visitor->referrer_url = $referrer_url;
            $visitor->keywords = $keywords;
            $visitor->source_site = $sourceSite;
            $visitor->device = $device;
            $visitor->number_of_visits = 1;
            $visitor->visit_date = date('Y-m-d H:i:s');
            $visitor->save();
            $visitorid = $visitor->id;
        }
        return $visitorid;
    }


    public function profileUpdate(){
        /*echo "I am profile update";
        $input = Input::all();
        print_r($input);
        
        echo "<br>"+$id; */
        $input = Input::all();
        $id = Auth::id();


        DB::table('users')
            ->where('id', $id)
            ->update( [ str_replace("-","_",$input['section']) => $input['val'] ]);

        echo nl2br($input['val']);
    }

    public function saveCustomize(){

        echo "I am save customization<br>";
        $input = Input::all();
        print_r($input);
        $uId = Auth::id();


        $userObj = ProfileCustomTheme::where('user_id','=',$uId)->first();
 
        if(isset($userObj->user_id)){

            $userObj->user_id               =   $uId;
            $userObj->theme_name            =   $input['theme_name'];
            $userObj->overlay_opacity       =   $input['overlay_opacity'];
            $userObj->title_font            =   $input['title_font'];
            $userObj->title_font_size       =   $input['title_font_size'];
            $userObj->use_timeline          =   $input['use_timeline'];
            $userObj->banner_display_type   =   $input ['banner_display_type'];
            $userObj->photo_back            =   $input ['photo_back'];
            


            $userObj->save();   
        }else{
            
            $userObj = new ProfileCustomTheme;
            $userObj->user_id               =   $uId;
            $userObj->theme_name            =   $input['theme_name'];
            $userObj->overlay_opacity       =   $input['overlay_opacity'];
            $userObj->title_font            =   $input['title_font'];
            $userObj->title_font_size       =   $input['title_font_size'];
            $userObj->use_timeline          =   $input['use_timeline'];
            $userObj->banner_display_type   =   $input ['banner_display_type'];
            $userObj->photo_back            =   $input ['photo_back'];

            $userObj->save();    
        }

    }


    public function ProfileVisits($uid, $offset = 0, $limit = 8, $falge = 0) {

        $data['recentVisitor'] = $this->getRecentVisitors($uid, $offset = 0, $limit = 5, $falg = 1);

        $data['uid'] = $uid;

        $data['tvisitors'] = $this->getTotalVisitors($uid);
        $data['tvisitors'] = $this->arrengeDateArray($data['tvisitors']);
        $data['tvisitors'] = $this->modifyArray($data['tvisitors']);

        $data['uvisitors'] = $this->getUniqueVisitors($uid);
        $data['uvisitors'] = $this->arrengeDateArray($data['uvisitors']);
        $data['uvisitors'] = $this->modifyArray($data['uvisitors']);

        if(isset($data['tvisitors']['dates'])){
            foreach ($data['tvisitors']['dates'] as $key => $val) {

                if (isset($data['uvisitors']['dates']) && !in_array($val, $data['uvisitors']['dates'])) {
                    array_splice($data['uvisitors']['dates'], array_search($val, $data['tvisitors']['dates']), 0, $val);
                    array_splice($data['uvisitors']['visitors'], array_search($val, $data['tvisitors']['dates']), 0, 0);
                }
            }
        }
        
        return \View::make('User::profile-01.analytics', $data);

        
 
    }

    function arrengeDateArray($item1) {
        $arr = array();
        $newa = array();
        foreach ($item1 as $key => $val) {
            $arr[$val['date']][] = $val;
            if (!isset($months) || !in_array($val['date'], $months))
                $months[] = $val['date'];
        }
        if (!isset($months) || !is_array($months))
            $months = array();

        usort($months, array($this, 'compare_months')); //compare_months($a, $b)
        foreach ($months as $key => $value) {
            $newa[] = $arr[$value];
        }
        return $newa;
    }

    function compare_months($a, $b) {
        $monthA = date_parse($a);
        $monthB = date_parse($b);

        return $monthA["month"] - $monthB["month"];
    }

    function modifyArray($item) {
        $arr = array();

        foreach ($item as $key => $val) {
            //$date = new \DateTime($val['date']);
            if (count($val) > 1) {
                foreach ($val as $v) {
                    if (!isset($arr['dates']) || !in_array($v['date'], $arr['dates'])) {
                        $arr['dates'][] = $v['date'];
                        $arr['visitors'][] = $v['visitors'];
                    } else {
                        $arr['visitors'][array_search($v['date'], $arr['dates'])] += $v['visitors'];
                    }
                }
            } else {
                if (!isset($arr['dates']) || !in_array($val[0]['date'], $arr['dates'])) {
                    $arr['dates'][] = $val[0]['date'];
                    $arr['visitors'][] = $val[0]['visitors'];
                } else {
                    $arr['visitors'][array_search($val[0]['date'], $arr['dates'])] += $val[0]['visitors'];
                }
            }
        }

        return $arr;
    }


    public function sendMessage(){

       //echo "I am send Email profile controller";
        $input = Input::all();
        //print_r($input);




        $grecaptcharesponse = $input['grecaptcharesponse'];

            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $datas = array('secret' => '6Ld4WRYUAAAAAO16q9OuKkzvqaqePZ0ibskOHNqG', 'response' => $grecaptcharesponse ,'remoteip'=> Helper::get_client_ip());

            // use key 'http' even if you send the request to https://...
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($datas)
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $res = json_decode($result);
            if (!isset($res->success) || $res->success!=1) {
                return Response::json(['error' => 1, 'errormsg' => "<div class='alert alert-danger alert-dismissable'><strong>You must complete the Anti-spam verification.</strong></div>"]);
            }else{
                // Send email to sender Who Send message
                Helper::sendEmail('profileContactSender', [
                    'to'                => $input['senderEmail'],
                    'name'              => $input['senderName'],
                    'eventMessage'      => $input['message'], 
                    'senderName'        => $input['senderName'],
                    'recieverName'      => $input['profileOwnerName'],
                    'senderEmail'       => $input['senderEmail'],
                    'recieverEmail'     => $input['profileOwnerEmail'],
                    ]);
                // Send Email to profile Owner
                Helper::sendEmail('profileContactReciever', [
                    'to'                => $input['profileOwnerEmail'],
                    'name'              => $input['profileOwnerName'],
                    'eventMessage'      => $input['message'], 
                    'senderName'        => $input['senderName'],
                    'recieverName'      => $input['profileOwnerName'],
                    'senderEmail'       => $input['senderEmail'],
                    'recieverEmail'     => $input['profileOwnerEmail'],
                    ]);
                return Response::json(['success' => 1]);
            }

        
        
    }

    function getProfileNetwork($uid) {

        $data['ouser'] = User::find($uid)->toArray();
        $data['friends'] = $this->getFriendSection($uid); //frinds section  
         $imagePath = base_path() . '/public'.$this->image_thumb_path.'141/';
         $friendsLatestArr =array();
        if(count($data['friends'])){
            foreach ( $data['friends'] as $key => $value) {
                if(count($value['images'])){
                    foreach($value['images'] as $key=>$img){
                        if (File::isFile($imagePath.$img['path'])){                 
                            $friendsLatestArr[] =$img;
                        }
                    } 
                    $this->array_sort_by_column($friendsLatestArr,"updated_at",SORT_DESC); 
                }
            }

        }
        $data['friendsLatestArr'] = $friendsLatestArr;

        $data['followers'] = $this->getFollowerSection($uid);        
        $followerLatestArr =array();
        if(count($data['followers'])){
            foreach ( $data['followers'] as $key => $value) {
                if(count($value['images'])){
                    foreach($value['images'] as $key=>$img){
                        if (File::isFile($imagePath.$img['path'])){                 
                            $followerLatestArr[] =$img;
                        }
                    } 
                   
                }
            }
        }
        $this->array_sort_by_column($followerLatestArr,"updated_at",SORT_DESC); 
        $data['followerLatestArr'] = $followerLatestArr;

        $data['following'] = $this->getFolloweingSection($uid);
        $followingLatestArr =array();
        if(count($data['following'])){
            foreach ( $data['following'] as $key => $value) {
                if(count($value['images'])){
                    foreach($value['images'] as $key=>$img){
                        if (File::isFile($imagePath.$img['path'])){                 
                            $followingLatestArr[] =$img;
                        }
                    } 
                   
                }
            }
        }
               $this->array_sort_by_column($followingLatestArr,"updated_at",SORT_DESC); 

        $data['followingLatestArr'] = $followingLatestArr; 

        return View::make('User::profile-01.network-ajax', $data);
    }

    /**
     * Function will returns user social links 
     * @param integer $uId
     * @return array
     */
    function getSocialLinks($uId) {
       try
            {
       $tt = UserSocailLinks::where('user_id','=',$uId)->get();
           
        return $tt;
        } catch(\Illuminate\Database\QueryException $e)
        {
            return ;
        }
    }

    public function getMoreRecentVisitors($userId, $offset = 0, $limit = 100, $falg = 0) {
        $var = parent::getRecentVisitors($userId, $offset, $limit);
        if (!Request::ajax() && $falg == 0) {
            $data['recentVisitor'] = $var;
            return View::make('User::profile-01.visitorslist', $data)->render();
        }else if(Request::ajax() && $falg == 2) {
            $data['recentVisitor'] = $var;
            return View::make('User::profile-01.uvisitorslist', $data)->render();

        }else {
            return $var;
        }
    }

}