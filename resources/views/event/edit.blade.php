@include('master.header')

@include('master.sidebar')



<!-- Main content -->

<div class="content-wrapper">



    <!-- Page header -->

    <div class="page-header">

        <div class="page-header-content">

            <div class="page-title">

                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit Event</span></h4>

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

                <li class="active"><a href="{{ url('/admin/show-all-events') }}">Events</a></li>

                <li class="active">Edit Event</li>

            </ul>

        </div>

    </div>

    <!-- /page header -->

    <div class="content">

        <!-- Form horizontal -->

        <div class="panel panel-flat">

            <div class="panel-heading">

                <h5 class="panel-title">Edit event<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>

                <div class="heading-elements">

                </div>

            </div>



            <div class="panel-body">

                <p class="content-group-lg"></p>

                <?php $error_keys = array(); ?>

                @if ($errors->any())

                <?php $error_keys = $errors->keys(); ?>

                @endif

                <form class="form-horizontal" action="{{ url('/admin/update-event')  }}" method="post" enctype="multipart/form-data">

                    <!-- usable -->



                    <fieldset class="content-group">

                        <legend class="text-bold">Please use below form to edit event</legend>

                        <div class="form-group @if(in_array('title',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Title</label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input class="form-control" type="text" name="title" value="{{ $data->title }}">

                                        <div class="form-control-feedback">

                                            @if(in_array('title',$error_keys))

                                            <i class="icon-notification2"></i>

                                            @endif

                                        </div>

                                        <span class="help-block">Please enter event title here</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group @if(in_array('short_description',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Short Description</label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input class="form-control" type="text" name="short_description" value="{{ $data->short_description }}">

                                        <div class="form-control-feedback">

                                            @if(in_array('short_description',$error_keys))

                                            <i class="icon-notification2"></i>

                                            @endif

                                        </div>

                                        <span class="help-block">Please enter event Short Description here</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group @if(in_array('description',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Description</label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input class="form-control" type="text" name="description" value="{{ $data->description }}">

                                        <div class="form-control-feedback">

                                            @if(in_array('description',$error_keys))

                                            <i class="icon-notification2"></i>

                                            @endif

                                        </div>

                                        <span class="help-block">Please enter event Description here</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group @if(in_array('image',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Image</label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" value="{{ $data->image }}">

                                        <div class="form-control-feedback">

                                            @if(in_array('image',$error_keys))

                                            <i class="icon-notification2"></i>

                                            @endif

                                        </div>

                                        <span class="help-block">Please upload event Image here</span>

                                        <img src="{{ url('public/uploads/'.$data->image) }} " width="150">

                                        <input type="hidden" value="{{ $data->image }}" name="old_image">

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group @if(in_array('category_id',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Category</label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <select name="category_id" class="form-control">

                                            {{ $category = \App\Category::orderBy('id','DESC')->get() }}

                                            @foreach($category as $cat)

                                            <option value="{{ $cat->id }}" @if($data->category_id == $cat->id) {{ 'selected' }}  @endif >{{ $cat->name }}</option>

                                            @endforeach

                                        </select>

                                        <div class="form-control-feedback">

                                            @if(in_array('category_id',$error_keys))

                                            <i class="icon-notification2"></i>

                                            @endif

                                        </div>

                                        <span class="help-block">Please select event category here</span>

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

                                        <span class="help-block">Please enter event Latitude here</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group @if(in_array('longtitude',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Longtitude </label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input class="form-control" type="text" name="longtitude" value="{{ $data->longtitude }}">

                                        <div class="form-control-feedback">

                                            @if(in_array('longtitude',$error_keys))

                                            <i class="icon-notification2"></i>

                                            @endif

                                        </div>

                                        <span class="help-block">Please enter event Longtitude here</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group @if(in_array('start_date',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Start Date </label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input class="form-control date-picker" readonly  type="text" name="start_date" value="{{date('m/d/Y', $data->start_date)}}">

                                        <div class="form-control-feedback">

                                            @if(in_array('start_date ',$error_keys))

                                            <i class="icon-notification2"></i>

                                            @endif

                                        </div>

                                        <span class="help-block">Please enter event Start Date  here</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group @if(in_array('end_date',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">End Date  </label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input class="form-control date-picker" readonly type="text" name="end_date" value="{{date('m/d/Y', $data->end_date)}}">

                                        <div class="form-control-feedback">

                                            @if(in_array('end_date',$error_keys))

                                            <i class="icon-notification2"></i>

                                            @endif

                                        </div>

                                        <span class="help-block">Please enter event End Date here</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group @if(in_array('venue',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Venue  </label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input class="form-control" type="text" name="venue" value="{{ $data->venue }}">

                                        <div class="form-control-feedback">

                                            @if(in_array('venue',$error_keys))

                                            <i class="icon-notification2"></i>

                                            @endif

                                        </div>

                                        <span class="help-block">Please enter event Venue here</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group @if(in_array('popular',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Mark this event as Popular</label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input type="checkbox" value="1" name="popular"  @if($data->popular == 1) {{ 'checked' }}  @endif>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group @if(in_array('top_events',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Mark this event as Top Event</label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input type="checkbox" value="1" name="top_events"  @if($data->top_events == 1) {{ 'checked' }}  @endif>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Organized Name  </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="organized_name" value="{{ $data->organized_name }}" />
                                        <span class="help-block">Please enter new event organized name here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Address  </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="address" value="{{ $data->address }}" />
                                        <span class="help-block">Please enter new event address here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">City  </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="city" value="{{ $data->city }}" />
                                        <span class="help-block">Please enter new event city here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">State  </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="state" value="{{ $data->state }}" />
                                        <span class="help-block">Please enter new event state here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Contact Number  </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="contact_number" value="{{ $data->contact_number }}" />
                                        <span class="help-block">Please enter new event Contact Number here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Email  </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="email" value="{{ $data->email }}" />
                                        <span class="help-block">Please enter new event email here</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Website Url  </label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="website_url" value="{{ $data->website_url }}" />
                                        <span class="help-block">Please enter new event website url here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group @if(in_array('occasions',$error_keys)) {{ "has-error" }}   @endif">

                            <label class="control-label col-lg-2">Mark this event as Occasions</label>

                            <div class="col-lg-10">

                                <div class="row">

                                    <div class="col-md-4">

                                        <input type="checkbox" value="1" name="occasions" @if($data->event_type == 2) {{ 'checked' }}  @endif>

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

<script type="text/javascript"> $('#events').addClass('active');</script>

@include('master.footer')