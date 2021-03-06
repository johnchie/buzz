<footer id="footer">
    <div class="same-padd play-store">
        <div class="wrap">
            <div class="white-box">
                <ul class="share-option-small">
                    <?php
                    $app_link = \DB::table("cms")->whereIn("page", array("android_app", "ios_app"))->get();
                    $link_array = array();
                    foreach ($app_link as $value) {
                        $link_array[$value->page] = $value->data;
                    }
                    ?>
                    <li><a href="{{$link_array['android_app']}}" title="" target="_blank"><img src="{{ URL::asset('public/website/images/app-store-big.png') }}" alt=""></a></li>
                    <li><a href="{{$link_array['ios_app']}}" title="" target="_blank"><img src="{{ URL::asset('public/website/images/gplay-store-bog.png') }}" alt=""></a></li>
                </ul><!--/.share-option-small --> 
            </div><!--/.white-box -->
            <div class="same-padd">
                <ul class="fmenu">
                    <li><a href="{{route('aboutus')}}" title="About Us">About Us</a></li>
                    <li><a href="{{route('contactus')}}" title="Contact Us">Contact Us</a></li>
                    <li><a href="{{route('privacy')}}" title="Privacy Policy">Privacy Policy</a></li>
                </ul><!--/.fmenu -->
                <div class="social">
                    <?php
                    $data = \DB::table("cms")->whereIn("page", array("fb", "twitter", "linkedin", "pinterest", "skype", "gplus"))->get();
                    $data_array = array();
                    foreach ($data as $value) {
                        $data_array[$value->page] = $value->data;
                    }
                    ?>
                    <li><a target="_blank" href="{{$data_array['fb']}}"><img src="{{ URL::asset('public/website/images/fb.png') }}" alt=""></a></li>
                    <li><a target="_blank" href="{{$data_array['twitter']}}"><img src="{{ URL::asset('public/website/images/tw.png') }}" alt=""></a></li>
                    <li><a target="_blank" href="{{$data_array['linkedin']}}"><img src="{{ URL::asset('public/website/images/link.png') }}" alt=""></a></li>
                    <li><a target="_blank" href="{{$data_array['pinterest']}}"><img src="{{ URL::asset('public/website/images/pin.png') }}" alt=""></a></li>
                    <li><a href="skype:{{$data_array['skype']}}?chat:"><img src="{{ URL::asset('public/website/images/skype.png') }}" alt=""></a></li>
                    <li><a target="_blank" href="{{$data_array['gplus']}}"><img src="{{ URL::asset('public/website/images/google.png') }}" alt=""></a></li>
                </div><!--/.social --> 
            </div><!--/.same-padd --> 
        </div><!--/.wrap --> 
    </div><!--/.same-padd play-store --> 
</footer>
</div><!--/#wrapper--> 

<div class="popouterbox" id="login">
    <div class="popup-block">
        <div class="pop-contentbox"> 
            <a href="javascript:void(0)" class="close-dialogbox">X</a>
            <div class="popup-logo">
                <figure><img src="{{ URL::asset('public/website/images/popup-logo.png') }}" alt=""></figure>
            </div><!--/.popup-logo -->
            <h4>Log In</h4>
            <div class="facebook-login">
                <a href="javascript:void(0)" class="facebook-login" title=""><img src="{{ URL::asset('public/website/images/fb-login.png') }}" alt=""></a>
            </div><!--/.facebook-login -->
            <h5>OR</h5>
            <div class="main-login">
                <form id="login_form" name="login_form" method="post" action="{{ URL::route('user.login')}}">
                    <ul class="formlist">
                        <li><input type="email" required="" name="email" placeholder="Enter your Email" /></li>
                        <li><input type="password"  required="" autocomplete="off" name="password" placeholder="Enter your Password" /></li>
                        <li><input type="checkbox" name="login_agree" autocomplete="off" id="default-checkbox"><label for="default-checkbox">I agree to the  <a href="{{route('terms')}}" title="">Terms & Conditions</a> & <a href="{{route('privacy')}}" title="">Privacy Policy</a></label></li>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <li><input type="submit" value="Log In"></li>
                    </ul>
                </form>
            </div><!--/.main-login -->
            <h5>Don't have an account? <a href="#" id="login_register" class="register poptrigger" data-rel="ragister" title="">Sign Up</a></h5>
        </div><!--/.pop-contentbox --> 
    </div><!--/.popup-block --> 
</div>
<div class="popouterbox ragister-box" id="ragister">
    <div class="popup-block">
        <div class="pop-contentbox"> 
            <a href="javascript:void(0)" class="close-dialogbox">X</a>
            <div class="popup-logo">
                <figure><img src="{{ URL::asset('public/website/images/popup-logo.png') }}" alt=""></figure>
            </div><!--/.popup-logo -->
            <h4>Create My Account</h4>
            <div class="facebook-login need_to_hide">
                <a href="javasciprt:void(0)" class="facebook-login" title=""><img src="{{ URL::asset('public/website/images/fb-login.png') }}" alt=""></a>
            </div><!--/.facebook-login -->
            <h5 class="reg_or need_to_hide">OR</h5>
            <div class="main-login">
                <form id="signup_form" name="signup_form" method="post" action="{{ URL::route('user.registration')}}">
                    <ul class="formlist">
                        <li>
                            <label>First Name</label>
                            <input type="text" name='first_name' required="" placeholder="" />
                        </li>
                        <li>
                            <label>Last Name</label>
                            <input type="text" name="last_name" required="" placeholder="" />
                        </li>
                        <li>
                            <label>Email Address</label>
                            <input type="email" name="email" required="" placeholder="" />
                        </li>
                        <li>
                            <label>Password</label>
                            <input type="password" name='password' required="" placeholder="" />
                        </li>
                        <li>
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" required="" placeholder="" />
                        </li>
                        <li class="wider">
                            <input type="checkbox" id="agree"><label for="agree">I agree to the  <a href="{{route('terms')}}" title="">Terms & Conditions</a> & <a href="{{route('privacy')}}" title="">Privacy Policy</a></label>
                        </li>
                        <li><input type="submit" value="Sign Up"></li>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="reg_type" class="reg_type" value="1">
                    </ul>
                </form>
            </div><!--/.main-login -->
            <h5>Have an account? <a href="#" class="login poptrigger" data-rel="login" title="">Sign in</a></h5>
        </div><!--/.pop-contentbox --> 
    </div><!--/.popup-block --> 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script src="{{ URL::asset('public/website/js/vendor/toastr.min.js') }}"></script>


@if (session('failure'))
<script>toastr.error("{{ session('failure') }}")</script>
@endif
@if (session('success'))
<script>toastr.success("{{ session('success') }}")</script>
@endif
            
<script type="text/javascript">

window.fbAsyncInit = function () {
    FB.init({
        appId: '274455266691255',
        cookie: true,
        xfbml: true,
        oauth: true,
        status: true,
        version: 'v2.8'
    });
};
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
function statusChangeCallback(response) {
    if (response.status === 'connected') {
        login_in();
    } else {
        window.FB.login(function (response) {
            if (response.authResponse) {
                login_in();
            } else {
                toastr.error("User cancelled login or did not fully authorize.");
            }
        }, {scope: 'public_profile,email,user_friends'});
    }
}

jQuery(document).on("click", ".facebook-login", function () {
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });
    return false;
});
function login_in() {
    FB.api('/me', {fields: 'email, first_name, last_name'}, function (fb_response) {
        jQuery.ajax({
            "url": '{{URL("/webuser/ajaxlogin")}}',
            type: "POST",
            dataType: 'json',
            data: {
                social_id: fb_response.id,
                email: fb_response.email,
                first_name: fb_response.first_name,
                last_name: fb_response.last_name,
                "_token": "{{ csrf_token() }}"
            },
            cache: false,
            success: function (response) {
                if (response.success == true) {
                    window.location.href = "{{route('home')}}"
                } else {
                    alert("Problem in performing your action.");
                }
            },
            error: function () {
                alert("Problem in performing your action.");
            }
        });
    });
}

//jq = jQuery.noConflict;
//jq(document).ready(function (jq) {
//    jq("#signup_form").validate({
//        rules: {
//            first_name: {
//                required: true
//            }
//        },
//        submitHandler: function (form) {
//            console.log('test');
//            return false;
//            //form.submit();
//        }
//    });
//});

jQuery('.event_like').click(function () {
    var $this = jQuery(this);
    jQuery.ajax({
        url: "{{route('web_event.favorite')}}",
        type: "get",
        data: {'id': $this.attr('attr_id'), 'flag': $this.attr('attr_flag')},
        dataType: 'json',
        cache: false,
        beforeSend: function () {
            //$('#loading').show();
        },
        complete: function ()
        {
            //$('#loading').hide();
        },
        success: function (response)
        {
            if (!response.mark) {
                jQuery('#login_click').find('.poptrigger').click();
            } else {
                if (response.success) {
                    if ($this.attr('attr_flag') == 1) {
                        $this.attr('attr_flag', 2);
                        if ($this.attr('attr_large_icon') == 1) {
                            $this.find('img').attr('src', '{!! asset("/public/website/images/fill-heart.png") !!}');
                        } else {
                            $this.find('img').attr('src', '{!! asset("/public/website/images/fill-heart-icon.png") !!}');
                        }
                        toastr.success('Event favorite successfully.');
                    } else {
                        $this.attr('attr_flag', 1);
                        if ($this.attr('attr_large_icon') == 1) {
                            $this.find('img').attr('src', '{!! asset("/public/website/images/heart.png") !!}');
                        } else {
                            $this.find('img').attr('src', '{!! asset("/public/website/images/heart-icon.png") !!}');
                        }
                        toastr.success('Event removed from favourite successfully.');
                    }
                } else {
                    if ($this.attr('attr_flag') == 1) {
                        toastr.error('Problem while favourite event.');
                    } else {
                        toastr.error('Problem while unfavourite event.');
                    }
                }
            }
        },
        error: function () {
            toastr.error('Error while processing request!');
        }
    });
});

jQuery(".share_btn").click(function () {
    jQuery(this).parents(".share_container").find(".small_popup").css("display", "block");
});

jQuery(".close_share").click(function () {
    jQuery(this).parent().css("display", "none");
});
function postToFeed(event) {
    var obj = {
        method: 'feed',
        link: event.data("link"),
        redirect_uri: event.data("link"),
        picture: event.data("image"),
        name: event.data("name"),
        caption: event.data("location"),
        description: 'Share blogs on facebook.'
    };

    function callback(response) {
        
    }
    FB.ui(obj, callback);
}
</script>
<script>
    jQuery(document).ready(function(){
        jQuery(".subscribe_btn").click(function(){
            $('.need_to_hide').hide();
            $('.reg_type').val(2);  
            $('.register').click();
        });
        
        //show login popup if user is not logged in
        if("{{Session::get('U_ID')}}" == ""){
            setTimeout(function(){
                jQuery(".login").click();
            },1000);
            console.log(jQuery('#login_click').find('.poptrigger'));
        }
    });
</script>
<script src="{{ URL::asset('public/website/js/vendor/jquery.js') }}"></script> 
<script src="{{ URL::asset('public/website/js/vendor/jquery.ezmark.min.js') }}"></script> 
<script src="{{ URL::asset('public/website/js/vendor/jquery.matchHeight-min.js') }}"></script> 
<script src="{{ URL::asset('public/website/js/vendor/owl.carousel.min.js') }}"></script> 
<script src="{{ URL::asset('public/website/js/vendor/jquery-ui.js') }}"></script>
<script src="{{ URL::asset('public/website/js/jquery.mixitup.min.js') }}"></script> 
<script src="{{ URL::asset('public/website/js/swiper.min.js') }}"></script> 
<script src="{{ URL::asset('public/website/js/general.js') }}"></script>
</body>
</html>
