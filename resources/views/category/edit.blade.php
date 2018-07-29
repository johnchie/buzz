@include('master.header')
@include('master.sidebar')

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit Category</span></h4>
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
                <li class="active"><a href="{{ url('/admin/show-all-categories') }}">Category</a></li>
                <li class="active">Edit Category</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->
    <div class="content">
        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Edit Category<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                <div class="heading-elements">
                </div>
            </div>

            <div class="panel-body">
                <p class="content-group-lg"></p>
                <?php  $error_keys = array(); ?>
                @if ($errors->any())
                    <?php $error_keys = $errors->keys(); ?>
                @endif
                <form class="form-horizontal" action="{{ url('/admin/update-category')  }}" method="post">
                    <!-- usable -->
                    <fieldset class="content-group">
                        <legend class="text-bold">Please use below form to edit category</legend>
                        <div class="form-group @if(in_array('name',$error_keys)) {{ "has-error" }}   @endif">
                            <label class="control-label col-lg-2">Edit Category Name</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="name" value="{{ $data->name }}" required>
                                        <div class="form-control-feedback">
                                            @if(in_array('name',$error_keys))
                                                <i class="icon-notification2"></i>
                                            @endif
                                        </div>
                                        <span class="help-block">Please enter new category name here</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- usable -->
                    <div class="text-right">
                        <input type="hidden" value="{{ $data->id }}" name="id">
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
<script type="text/javascript"> $('#categories').addClass('active'); </script>
@include('master.footer')