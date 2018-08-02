@include('master.header')
@include('master.sidebar')

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">All Advertisers</span></h4>
                <ul class="fab-menu  fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="click">
                    <li>
<!--                        <a class="fab-menu-btn btn bg-blue btn-float btn-rounded btn-icon" href="{{ url('/admin/create-user') }}">
                            <i class="fab-icon-open icon-plus3"></i>
                            <i class="fab-icon-close icon-cross2"></i>
                        </a>-->
                        <!--
                        <a class="fab-menu-btn btn bg-blue btn-float btn-rounded btn-icon" href="{{ url('/create-user') }}">
                            <i class="fab-icon-open icon-plus3"></i>
                            <i class="fab-icon-close icon-cross2"></i>
                        </a>
                        -->
                        <ul class="fab-menu-inner">
                            <li>
                                <div data-fab-label="Compose email">
                                    <a href="#" class="btn btn-default btn-rounded btn-icon btn-float">
                                        <i class="icon-pencil"></i>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div data-fab-label="Conversations">
                                    <a href="#" class="btn btn-default btn-rounded btn-icon btn-float">
                                        <i class="icon-bubbles7"></i>
                                    </a>
                                    <span class="badge bg-primary-400">5</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
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
                <li class="active">Users</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <div class="content">
        <!-- HTML sourced data -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">All Advertisers</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                All Advertisers are listed below
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

            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($data as $adv_user)
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $adv_user->first_name ?></td>
                        <td><?php echo $adv_user->last_name ?></td>
                        <td><?php echo $adv_user->email ?></td>
                        <td><?php echo $adv_user->contact_number ?></td>
                        <td><?php echo $adv_user->location ?></td>
                        <td><?php if($adv_user->is_adv_approved == 0){ echo 'Not Active'; }else{ echo 'Approved'; } ?></td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                    <!--<li><a href="{{ url('edit-user/'.$adv_user->user_id) }}"><i class="icon-pencil4"></i> Edit</a></li>-->
                                        <li><a href="#"><i class="icon-pencil4"></i> Edit</a></li>
                                        <li><a href="{{ url('/admin/delete-user/'.$adv_user->user_id) }}" onclick="return confirm('Are you sure?')"><i class="icon-bin"></i> Delete</a></li>
                                        @if($adv_user->is_adv_approved == 0)
                                            <li><a href="{{ url('/admin/action-advertiser/'.$adv_user->user_id) }}/1" onclick="return confirm('Are you sure, you want to activate this user?')"><i class="icon-bin"></i> Activate this user</a></li>
                                        @else
                                            <li><a href="{{ url('/admin/action-advertiser/'.$adv_user->user_id) }}/0" onclick="return confirm('Are you sure, you want to deactivate this user?')"><i class="icon-bin"></i> Deactivate this user</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /HTML sourced data -->

    </div>

</div>
<!-- /main content -->
<script type="text/javascript">
    $("#datatable").DataTable();
</script>
<script type="text/javascript"> $('#users').addClass('active'); </script>
@include('master.footer')