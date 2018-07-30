@include('master.header')
@include('master.sidebar')

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">All Events</span></h4>
                <ul class="fab-menu  fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="click">
                    <li>
                        <a class="fab-menu-btn btn bg-blue btn-float btn-rounded btn-icon" href="{{ url('/admin/create-event') }}">
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
                <h5 class="panel-title">All Events</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                All Events are listed below
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
                        <th>Title</th>
                        <th>Short Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Venue</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($data as $category)
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $category->title ?></td>
                        <td><?php echo $category->short_description ?></td>
                        <td><?php echo $category->start_date ?></td>
                        <td><?php echo $category->end_date ?></td>
                        <td><?php echo $category->venue ?></td>
                        <td>
                            @if($category->event_status == 1)
                            Approved
                            @else
                            @if(session("admintype") == "admin")
                            <a class="btn btn-success" href="{{route("approve-event",$category->id)}}">Not Approve</a>
                            @else
                            Not Approved
                            @endif
                            @endif
                        </td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ url('/admin/event-edit/'.$category->id) }}"><i class="icon-pencil4"></i> Edit</a></li>
                                        <li><a href="{{ url('/admin/event-delete/'.$category->id) }}" onclick="return confirm('Are you sure?')"><i class="icon-bin"></i> Delete</a></li>
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
                        <th>Title</th>
                        <th>Short Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Venue</th>
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
<script type="text/javascript"> $('#events').addClass('active');</script>
@include('master.footer')