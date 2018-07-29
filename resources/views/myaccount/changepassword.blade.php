@include('master.header-website')

<div id="main">
    <div class="same-padd">
        <div class="profile-box same-padd">
            @if (\Session::has('message'))
            <div class="alert alert-info">
                {!! \Session::get('message') !!}
            </div>
            @endif
            <div class="wrap">
                @include('myaccount.account_menu')
                <div class="profile-dataright">
                    <div class="white-box">
                        <form id="signup_form" name="signup_form" method="post" action="{{ route('change-password_post')}}">
                            <div class="changes-password">
                                <ul class="formlist">
                                    <li>
                                        <label>Old Password</label>
                                        <input type="password" class="required" name="current_password" placeholder="" />
                                    </li>
                                    <li>
                                        <label>New Password</label>
                                        <input type="password" class="required" id="new_password" name="new_password" placeholder="" />
                                    </li>
                                    <li>
                                        <label>Confirm Password</label>
                                        <input type="password" class="required" name="new_c_password" placeholder="" />
                                    </li>
                                    <li><input type="submit" value="Change Password"></li>
                                </ul><!--/.formlist -->
                            </div><!--/.changes-password -->
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        </form>
                    </div><!--/.white-box -->
                </div>
            </div><!--/.wrap -->
        </div><!--/.profile-box -->
    </div><!--/.advertisers -->
</div><!--/#main -->
<style type="text/css">
    .error{
        color: red !important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function (jQuery) {
    jQuery.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than 2 MB');
    jQuery("#signup_form").validate({
        rules: {
            new_c_password: {
                equalTo: "#new_password"
            }
        },
        messages: {
        },
        errorPlacement: function (error, element) {
        },
    });
});
</script>

@include('master.footer-website')