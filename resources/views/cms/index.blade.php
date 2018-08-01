@include('master.header')
@include('master.sidebar')
<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Create Event</span></h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">CMS</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->
    <div class="content">
        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-body">
                <p class="content-group-lg"></p>
                <?php $error_keys = array(); ?>
                @if ($errors->any())
                <?php $error_keys = $errors->keys(); ?>
                @endif
                <form class="form-horizontal" action="{{ url('/admin/cms-pages')  }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-lg-2">About Us</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <textarea name="page[about]">{{$all_cms_data['about']}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">About Us</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <textarea name="page[terms]">{{$all_cms_data['terms']}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">About Us</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <textarea name="page[policy]">{{$all_cms_data['policy']}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Facebook Url  </label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="page[fb]" value="{{ $all_cms_data['fb'] }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Twitter Url  </label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="page[twitter]" value="{{ $all_cms_data['twitter'] }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Linkedin Url  </label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="page[linkedin]" value="{{ $all_cms_data['linkedin'] }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Pinterest Url  </label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="page[pinterest]" value="{{ $all_cms_data['pinterest'] }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Skype Name  </label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="page[skype]" value="{{ $all_cms_data['skype'] }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Google Plus URL</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="page[gplus]" value="{{ $all_cms_data['gplus'] }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Android Application URL</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="page[android_app]" value="{{ $all_cms_data['android_app'] }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Ios Application URL</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="page[ios_app]" value="{{ $all_cms_data['ios_app'] }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
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
<script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
<script type="text/javascript">
$('#cms').addClass('active');

CKEDITOR.replace("page[about]");
CKEDITOR.replace("page[terms]");
CKEDITOR.replace("page[policy]");

</script>
@include('master.footer')