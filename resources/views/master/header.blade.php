<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administration - BuzzPNG</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('public/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('public/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('public/css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ URL::asset('public/css/components.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('public/css/colors.css') }}" />

	<!-- /global stylesheets -->

	<!-- Core JS files -->
    <script type="text/javascript" src="{{ URL::asset('public/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script>
        $( function() {
            $( ".date-picker" ).datepicker();
            $("#start_date").datepicker({
                onClose: function() {
                    $("#end_date").datepicker(
                            "change",
                            { minDate: new Date($('#start_date').val()) }
                    );
                }
            });
            $("#end_date").datepicker({
                onClose: function() {
                    $("#start_date").datepicker(
                            "change",
                            { maxDate: new Date($('#end_date').val()) }
                    );
                }
            });
        } );
	</script>

	<script type="text/javascript" src="{{ URL::asset('public/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/plugins/loaders/blockui.min.js') }}"></script>

	<!-- /core JS files -->



	<!-- Datatables -->
	<script type="text/javascript" src="{{ URL::asset('public/js/plugins/tables/datatables/datatables.min.js') }}"></script>

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ URL::asset('public/js/plugins/forms/selects/select2.min.js') }}"></script>


	<script type="text/javascript" src="{{ URL::asset('public/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('public/js/plugins/forms/styling/uniform.min.js') }}"></script>


	<script type="text/javascript" src="{{ URL::asset('public/js/core/app.js') }}"></script>



	<script type="text/javascript" src="{{ URL::asset('public/js/pages/datatables_data_sources.js') }}"></script>

	<script type="text/javascript" src="{{ URL::asset('public/js/pages/form_layouts.js') }}"></script>

	<script type="text/javascript" src="{{ URL::asset('public/js/plugins/ui/ripple.min.js') }}"></script>
	<!-- /theme JS files -->
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-default header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="{{ URL::asset('public/website/images/logo.png') }}" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<div class="navbar-right">
				<p class="navbar-text">Hello, !</p>
			</div>
		</div>
	</div>
	<!-- /main navbar -->