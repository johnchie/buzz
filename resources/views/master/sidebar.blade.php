<!-- Page container -->
<div class="page-container">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-main">
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="category-content">
						<div class="sidebar-user-material-content">
							<a href="#"><img src="assets/images/demo/users/face11.jpg" class="img-circle img-responsive" alt=""></a>
							
						</div>
													
						<div class="sidebar-user-material-menu">
							<a href="#user-nav" data-toggle="collapse"><span>My Account</span> <i class="caret"></i></a>
						</div>
					</div>
					
					<div class="navigation-wrapper collapse" id="user-nav">
						<ul class="navigation">
							<li><a href="{{ url('/admin/my-profile') }}"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
							<li><a href="{{ url('/admin/logout') }}"><i class="icon-switch2"></i> <span>Logout</span></a></li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="sidebar-category sidebar-category-visible">
					<div class="category-content no-padding">
						<ul class="navigation navigation-main navigation-accordion">
							<!-- Main -->
							<li id="home"><a href="{{ url('/admin') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                            <li id="categories"><a href="{{ url('/admin/show-all-categories') }}"><i class="icon-paint-format"></i> <span>Event Categories</span></a></li>
							<li id="events"><a href="{{ url('/admin/show-all-events') }}"><i class="icon-clapboard-play"></i> <span>Events</span></a></li>
							<li id="users"><a href="{{ url('/admin/show-all-users') }}"><i class="icon-user"></i> <span>Users</span></a></li>
                        </ul>
					</div>
				</div>
				<!-- /main navigation -->

			</div>
		</div>
		<!-- /main sidebar -->