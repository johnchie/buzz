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
                        <div class="manage-cat">
                            <div class="cat-box">
                                <h4>Selected Categories</h4>
                                <ul class="formlist">
                                    @foreach($user_categories as $cat)
                                    <li><a onclick="return confirm('Are you sure, you want to delete this category?')" href="{{route('deletecategory',$cat->id)}}" class="button">{{$cat->name}} <em> X </em> </a></li>
                                    @endforeach
                                </ul><!--/.formlist -->
                            </div><!--/.cat-box -->
                            <div class="cat-box">
                                <h4>Add Categories</h4>
                                <form id="signup_form" name="signup_form" method="post" action="{{ route('manage-categories_post')}}">
                                    <ul class="formlist">
                                        @foreach($all_category as $cat)
                                        <li>
                                            <input type="checkbox" class="required" name="cat_select[]" value="{{$cat->id}}" id="default-checkbox">
                                            <label for="default-checkbox">{{$cat->name}}</label>
                                        </li>
                                        @endforeach
                                        <li class="wider"><input type="submit" value="Submit" ></li>
                                    </ul><!--/.formlist -->
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                </form>
                            </div><!--/.cat-box -->
                        </div><!--/.manage-cat -->
                    </div><!--/.white-box -->
                </div><!--/.profile-dataright -->
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
            
        },
        messages: {
        },
        errorPlacement: function (error, element) {
        },
    });
});
</script>

@include('master.footer-website')