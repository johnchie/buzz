@include('master.header')
@include('master.sidebar')

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">My Profile</span></h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ url('/admin/show-all-events') }}" class="btn btn-link btn-float text-size-small has-text"><i class="icon-clapboard-play text-primary"></i><span>Events</span></a>
                    <a href="{{ url('/admin/show-all-users') }}" class="btn btn-link btn-float text-size-small has-text"><i class="icon-user text-primary"></i> <span>Users</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">My Profile</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->
    <div class="content">
        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Edit Profile<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                <div class="heading-elements">
                </div>
            </div>
            @if(Session::has('message'))
                @if(Session::has('type') and Session::get('type')=='true')
                    <div class="alert bg-success">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                        <span class="text-semibold">Well done!</span> {{ Session::get('message') }}
                    </div>
                @endif
                @if(Session::has('type') and Session::get('type')=='false')
                    <div class="alert bg-danger">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                        <span class="text-semibold">Well done!</span> {{ Session::get('message') }}
                    </div>
                @endif
            @endif

            <div class="panel-body">
                <p class="content-group-lg"></p>
                <?php  $error_keys = array(); ?>
                @if ($errors->any())
                    <?php $error_keys = $errors->keys(); ?>
                @endif
                <form class="form-horizontal" action="{{ url('/admin/update-profile')}}" method="post">
                    <!-- usable -->

                    <fieldset class="content-group">
                        <legend class="text-bold">Please use below form to edit profile</legend>
                        <div class="form-group @if(in_array('first_name',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">First Name</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="first_name" value="{{ $data->first_name }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('first_name',$error_keys))
                                                <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter first name here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group @if(in_array('last_name',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Last Name</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="last_name" value="{{ $data->last_name }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('last_name',$error_keys))
                                                <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter last name here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group @if(in_array('contact_number',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Contact Number</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="contact_number" value="{{ $data->contact_number }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('contact_number',$error_keys))
                                                <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter contact number here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group @if(in_array('location',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Location</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="location" value="{{ $data->location }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('location',$error_keys))
                                                <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter Location here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group @if(in_array('latitude',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Latitude</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="latitude" value="{{ $data->latitude }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('latitude',$error_keys))
                                                <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter Latitude here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group @if(in_array('longitude',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Longtitude </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="longitude" value="{{ $data->longitude }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('longitude',$error_keys))
                                                <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter Longtitude here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- usable -->
                    <div class="text-right">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary legitRipple">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form horizontal -->
    </div>

</div>
<!-- /main content -->
<script type="text/javascript"> $('#user-nav').addClass('active'); </script>
@include('master.footer')