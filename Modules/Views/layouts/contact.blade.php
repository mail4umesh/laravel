<script src='https://www.google.com/recaptcha/api.js'></script>
<style type="text/css">
    .contact-name-error, .contact-email-error, .contact-message-error{
        color: #F00;
    }
    .message-send-status {
        color: #0F0;
    }
</style>
<section class="getinTouch gtV2">
    <div class="overlay-two"></div>
    <div class="envelope">  
        <div class="bshadow"></div>
        <div class="container animated2">
            <form class="gtform">
                <div class="tshadow"></div>
                <h2 style="font-family:{{$titleFont}}" class="title-font-h2">Get in touch </h2>
                <div class="gtformfields">
                    <div class="row">

                        <?php if (Auth::check()) { ?>

                            @if(!empty($loggedInProfileImage))
                            <img src="{{ URL::to($profile_image.$loggedInProfileImage)}}" width="50" height="50">
                            @else
                            <img src="{{ URL::to($profile_image.'/user_profile.jpg')}}" alt="user"    width="50" height="50">
                            @endif
                            {{Helper::getFistName($userName)}}
                        <?php } else { ?>


                            <h2 style="font-family:{{$titleFont}}" class="title-font-h2">Get in touch</h2>
                            <div class="col-md-12">
                                <div class="form-group tyin">
                                    <label>Name: </label>
                                    <input type="text" class="form-control" id="contact-name">
                                    <div class="contact-name-error"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group tyin">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" id="contact-email">
                                    <div class="contact-email-error"></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group fgtextarea">
                        <textarea class="form-textarea" id="contact-message" placeholder="Your Message Here..." ></textarea>
                        <div class="contact-message-error"></div>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6Ld4WRYUAAAAAFe2FN1ud_83QIXt9Ky0_hLO9KWt"></div>

                    <div class="btnSet">
                        <div class="message-send-status"></div>
                        <button type="submit" class="btn swep-ef1" id="contact-send">
                            <div> <span class="txt" id="send-button-text">Send</span> <span class="ef1-before"></span> <span class="ef1-after"></span> </div>
                        </button>

                    </div>
                </div> 
            </form>
        </div></div>  
</section>
<script type="text/javascript">
$(document).on("click", "#contact-send", function (event) {
    event.preventDefault();


<?php if (Auth::check()) { ?>
        var senderName = '{{Auth::user()->display_name}}';
        var senderEmail = '{{Auth::user()->email}}';
<?php } else { ?>
        var senderName = $("#contact-name").val();
        var senderEmail = $("#contact-email").val();
<?php } ?>

    var str = "";
    str += " \n Name : " + senderName;
    str += " \n Name : " + senderEmail;
    str += " \n Name : " + $("#contact-message").val();
    //alert(str);

    var error = 0;

    if (senderName == "") {
        $(".contact-name-error").html("Please Enter Name... ");
        error = 1;
    } else {
        $(".contact-name-error").html("");
        error = 0;
    }

    if (senderEmail == "") {
        $(".contact-email-error").html("Please Enter Email... ");
        error = 1;
    } else {
        $(".contact-email-error").html("");
        error = 0;
    }

    if ($("#contact-message").val() == "") {
        $(".contact-message-error").html("Please Enter Message... ");
        error = 1;
    } else {
        $(".contact-message-error").html("");
        error = 0;
    }


    if (error == 0) {
        $.ajax({
            url: "{{URL::to('profile/send-message')}}",
            type: "post",
            data: {
                senderName: senderName,
                senderEmail: senderEmail,
                message: $("#contact-message").val(),
                profileOwnerName: "{{$user['display_name']}}",
                profileOwnerEmail: "{{$user['email']}}",
                grecaptcharesponse: $('#g-recaptcha-response').val(),
            },
            beforeSend: function (xhr) {
                $("#send-button-text").html("Sending...");
            },
            success: function (result) {
                if (result.error == 1) {
                    $(".message-send-status").html(result.errormsg);
                    window.setTimeout(function () {
                        $(".message-send-status .alert").hide();
                    }, 4000);
                    $("#send-button-text").html("Send");
                } else {
                    $("#contact-name").val("");
                    $("#contact-email").val("");
                    $("#contact-message").val("");
                    $("#send-button-text").html("Send");
                    $(".message-send-status").html("Your Message Sent.");
                }

            }
        }, "json");
    }

});
</script>

