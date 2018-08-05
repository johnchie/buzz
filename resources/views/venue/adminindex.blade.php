@include('master.header')
@include('master.sidebar')

<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">All Venues</span></h4>
                <ul class="fab-menu  fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="click">
                    <li>
                        <a class="fab-menu-btn btn bg-blue btn-float btn-rounded btn-icon" href="{{ url('/admin/create-venue') }}">
                            <i class="fab-icon-open icon-plus3"></i>
                            <i class="fab-icon-close icon-cross2"></i>
                        </a>
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
                <li class="active">Events</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <div class="content">
        <!-- HTML sourced data -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">All Venues</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                    </ul>
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

            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Venue Logo</th>
                        <th>Venue Name</th>
                        <th>Location</th>
                        <th>Phone Number</th>
                        <th>Fax Number</th>
                        <th>Hours Of Operations</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($data as $venue)
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td>
                            <img src="{{URL::asset("public/uploads/".$venue->logo_image)}}" width="50">
                        </td>
                        <td><?php echo $venue->title ?></td>
                        <td><?php echo $venue->location ?></td>
                        <td><?php echo $venue->phone_number ?></td>
                        <td><?php echo $venue->fax_number ?></td>
                        <td>
                            <?php
                            echo date("h:i A", strtotime(date("Y-m-d ") . $venue->open_hours))." - "
                            . date("h:i A", strtotime(date("Y-m-d ") . $venue->close_hours))
                            ?>
                        </td>
                        <td>
                            @if($venue->status == 1)
                            Active
                            @else
                            InActive
                            @endif
                        </td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ url('/admin/venue-edit/'.$venue->id) }}"><i class="icon-pencil4"></i> Edit</a></li>
                                        <li><a href="{{ url('/admin/venue-delete/'.$venue->id) }}" onclick="return confirm('Are you sure?')"><i class="icon-bin"></i> Delete</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Venue Logo</th>
                        <th>Venue Name</th>
                        <th>Location</th>
                        <th>Phone Number</th>
                        <th>Fax Number</th>
                        <th>Hours Of Operations</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /HTML sourced data -->

    </div>

</div>
<!-- /main content -->
<script type="text/javascript">
    $("#datatable").DataTable();
</script>
<script type="text/javascript"> $('#venues').addClass('active');</script>
@include('master.footer')