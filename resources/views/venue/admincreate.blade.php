@include('master.header')

@include('master.sidebar')

<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Create Venue</span></h4>
            </div>
            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="{{ url('/admin/show-all-venues') }}" class="btn btn-link btn-float text-size-small has-text"><i class="icon-clapboard-play text-primary"></i><span>Events</span></a>

                    <a href="{{ url('/admin/show-all-users') }}" class="btn btn-link btn-float text-size-small has-text"><i class="icon-user text-primary"></i> <span>Users</span></a>
                </div>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active"><a href="{{ url('/admin/venues') }}">Venues</a></li>
                <li class="active">Create Venue</li>
            </ul>
        </div>
    </div>

    <!-- /page header -->

    <div class="content">

        <!-- Form horizontal -->

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Create New Venue<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                <div class="heading-elements">
                </div>
            </div>
            <div class="panel-body">
                <p class="content-group-lg"></p>
                <?php $error_keys = array(); ?>
                @if ($errors->any())
                <?php $error_keys = $errors->keys(); ?>
                @endif
                <form class="form-horizontal" action="{{ url('/admin/store-venue')  }}" method="post" enctype="multipart/form-data">
                    <fieldset class="content-group">
                        <legend class="text-bold">Please use below form to create new venue</legend>
                        <div class="form-group @if(in_array('title',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Name</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="name" required="" value="{{ old('name') }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('name',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter new venue name here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group @if(in_array('location',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Location</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control required" type="text" required="" name="location" value="{{ old('location') }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('location',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter new venue location here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group @if(in_array('latitude',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Latitude</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" required="" name="latitude" value="{{ old('latitude') }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('latitude',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter new venue Latitude here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group @if(in_array('longitude',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Longitude </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" required="" name="longitude" value="{{ old('longitude') }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('longtitude',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter new venue longitude here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group @if(in_array('phone_number',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Phone Number </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" required="" name="phone_number" value="{{ old('phone_number') }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('longtitude',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter new venue phone_number here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group @if(in_array('fax_number',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Fax Number </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" required="" name="fax_number" value="{{ old('fax_number') }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('longtitude',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter new venue fax_number here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group @if(in_array('open_hours',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Opening Time </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" required="" name="open_hours" value="{{ old('open_hours') }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('longtitude',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter new venue open_hours in 24hours formate (i.e. 23:00)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group @if(in_array('close_hours',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Closing Time </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" required="" name="close_hours" value="{{ old('close_hours') }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('longtitude',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter new venue close_hours in 24hours formate (i.e. 23:00)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group @if(in_array('about_us',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">About Us</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea cols="6" rows="10" required="" class="form-control" name="about_us"></textarea>
                                        <div class="form-control-feedback">
                                            @if(in_array('longtitude',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter new venue about_us here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group @if(in_array('banner_image',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Banner Image</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" required="" type="file" name="banner_image" accept="image/x-png,image/gif,image/jpeg" value="{{ old('banner_image') }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('banner_image',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please upload new venue Image here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group @if(in_array('logo',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Logo</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" required="" type="file" name="logo_image" accept="image/x-png,image/gif,image/jpeg" value="{{ old('logo') }}">
                                        <div class="form-control-feedback">
                                            @if(in_array('logo_image',$error_keys))
                                            <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please upload new venue Image here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="text-right">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary legitRipple">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /main content -->

<script type="text/javascript"> $('#venues').addClass('active');</script>

@include('master.footer')