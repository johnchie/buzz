  <footer id="footer">
    <div class="same-padd play-store">
      <div class="wrap">
        <div class="white-box">
          <ul class="share-option-small">
            <li><a href="#" title=""><img src="{{ URL::asset('public/website/images/app-store-big.png') }}" alt=""></a></li>
            <li><a href="#" title=""><img src="{{ URL::asset('public/website/images/gplay-store-bog.png') }}" alt=""></a></li>
          </ul><!--/.share-option-small --> 
        </div><!--/.white-box -->
        <div class="same-padd">
          <ul class="fmenu">
            <li><a href="#" title="About Us">About Us</a></li>
            <li><a href="#" title="Contact Us">Contact Us</a></li>
            <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
          </ul><!--/.fmenu -->
          <div class="social">
            <li><a href="#"><img src="{{ URL::asset('public/website/images/fb.png') }}" alt=""></a></li>
            <li><a href="#"><img src="{{ URL::asset('public/website/images/tw.png') }}" alt=""></a></li>
            <li><a href="#"><img src="{{ URL::asset('public/website/images/link.png') }}" alt=""></a></li>
            <li><a href="#"><img src="{{ URL::asset('public/website/images/pin.png') }}" alt=""></a></li>
            <li><a href="#"><img src="{{ URL::asset('public/website/images/skype.png') }}" alt=""></a></li>
            <li><a href="#"><img src="{{ URL::asset('public/website/images/google.png') }}" alt=""></a></li>
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
      	<a href="#" title=""><img src="{{ URL::asset('public/website/images/fb-login.png') }}" alt=""></a>
      </div><!--/.facebook-login -->
      <h5>OR</h5>
      <div class="main-login">
          <ul class="formlist">
            <li><input type="email" placeholder="Enter your Email" /></li>
            <li><input type="password" placeholder="Enter your Password" /></li>
            <li><input type="checkbox" id="default-checkbox"><label for="default-checkbox">I agree to the  <a href="#" title="">Terms & Conditions</a> & <a href="#" title="">Privacy Policy</a></label></li>
            <li><input type="submit" value="Log In"></li>
          </ul>
      </div><!--/.main-login -->
      <h5>Don't have an account? <a href="#" class="register poptrigger" data-rel="ragister" title="">Sign Up</a></h5>
    </div><!--/.pop-contentbox --> 
  </div><!--/.popup-block --> 
</div>
<div class="popouterbox ragister-box" id="ragister">
    <form action=''>
        <div class="popup-block">
            <div class="pop-contentbox"> 
              <a href="javascript:void(0)" class="close-dialogbox">X</a>
              <div class="popup-logo">
                <figure><img src="{{ URL::asset('public/website/images/popup-logo.png') }}" alt=""></figure>
              </div><!--/.popup-logo -->
              <h4>Create My Account</h4>
              <div class="facebook-login">
                <a href="#" title=""><img src="{{ URL::asset('public/website/images/fb-login.png') }}" alt=""></a>
              </div><!--/.facebook-login -->
              <h5>OR</h5>
              <div class="main-login">
                  <ul class="formlist">
                    <li>
                        <label>First Name</label>
                        <input type="text" placeholder="" />
                    </li>
                    <li>
                        <label>Last Name</label>
                        <input type="text" placeholder="" />
                    </li>
                    <li>
                        <label>Email Address</label>
                        <input type="email" placeholder="" />
                    </li>
                    <li>
                        <label>Password</label>
                        <input type="password" placeholder="" />
                    </li>
                    <li>
                        <label>Confirm Password</label>
                        <input type="password" placeholder="" />
                    </li>
                    <li class="wider">
                        <input type="checkbox" id="agree"><label for="agree">I agree to the  <a href="#" title="">Terms & Conditions</a> & <a href="#" title="">Privacy Policy</a></label>
                    </li>
                    <li><input type="submit" value="Sign Up"></li>
                  </ul>
              </div><!--/.main-login -->
              <h5>Don�t have an account? <a href="#" class="login poptrigger" data-rel="login" title="">Sign in</a></h5>
            </div><!--/.pop-contentbox --> 
          </div><!--/.popup-block --> 
    </form>
</div>
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