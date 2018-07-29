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
                        <div class="priflie-left">
                            <figure>
                                <img class="img-responsive" src="{{ url('public/uploads/'.$user_data->user_image) }}" alt="">
                            </figure>
                        </div><!--/.priflie-left -->
                        <div class="profile-right">
                            <div class="profile">
                                <div class="align-left">
                                    <h1>{{$user_data->first_name." ".$user_data->last_name}}</h1>
                                    <h5><span>Email:</span> {{$user_data->email}}</h5>
                                    <h5><span>Mobile:</span> {{$user_data->contact_number}}</h5>
                                    <h5><span>Location:</span> {{$user_data->location}}</h5>
                                </div><!--/.align-left -->
                                <div class="btn-group edit-box">
                                    <a href="#" class="button btn-outline poptrigger" data-rel="editprofile">edit profile</a>
                                    <!--<a href="#" class="button btn-outline poptrigger" data-rel="changepassword">change password</a> -->
                                </div>
                            </div><!--/.profile -->

                        </div><!--/.profile-right -->
                    </div>
                </div><!--/.profile-dataright -->
            </div><!--/.wrap -->
        </div><!--/.profile-box -->
    </div><!--/.advertisers -->
</div><!--/#main -->

<div class="popouterbox editbox" id="editprofile">
    <div class="popup-block">
        <div class="pop-contentbox"> <a href="#" class="close-dialogbox">X</a>
            <h4> Edit Profile </h4>
            <div class="cols cols2">
                <form id="signup_form" enctype="multipart/form-data" name="signup_form" method="post" action="{{ route('account_post')}}">
                    <div class="col">
                        <figure>
                            <img class="" src="{{ url('public/uploads/'.$user_data->user_image) }}" alt="">
                        </figure>
                        <div class="upload-btn-wrapper">
                            <button class="btn">change photo</button>
                            <input type="file" name="myfile" />
                        </div><!--/.upload-btn-wrapper -->
                    </div><!--/.col -->
                    <div class="col">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="required" name="fname" placeholder="Name" value="{{$user_data->first_name}}" >
                        </div><!--/.form-group -->
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="required" placeholder="Name" value="{{$user_data->last_name}}" >
                        </div><!--/.form-group -->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="required email" placeholder="Email" value="{{$user_data->email}}" >
                        </div><!--/.form-group -->
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="tel" name="number" class="required" placeholder="Mobile" value="{{$user_data->contact_number}}" >
                        </div><!--/.form-group -->
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="required" placeholder="Location" value="{{$user_data->location}}" >
                        </div><!--/.form-group -->
                        <div class="clearfix" style="clear: both"></div>
                        <div class="buttonset">
                            <input type="button" class="btn-lightgray" value="Cancel">
                            <input type="submit" value="Submit">
                        </div><!--/.buttonset -->
                    </div><!--/.col -->
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                </form>
            </div><!--/.cols cols4 -->
        </div><!--/.pop-contentbox --> 
    </div><!--/.popup-block --> 
</div>
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
            myfile: {
                accept: "image/jpg,image/jpeg,image/png,image/gif",
                filesize: 2000000,
            }
        },
        messages: {
            myfile: {
                required: 'Please select image',
                accept: 'Please select only image',
            }
        },
        errorPlacement: function (error, element) {
        },
    });
});
</script>

@include('master.footer-website')