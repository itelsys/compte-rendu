@extends ('layouts.template')

@section('main-css')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-7">
		<!-- DATE FILTER -->
		<div class="input-group date col-md-4" data-date-autoclose="true" data-provide="datepicker">
			<input data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd/mm/yyyy">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		</div>
		<div class="margin-bottom-30"></div>
		<!-- END DATE FILTER -->
		<todo :data="{{ $taches }}"></todo>
	</div>
	<div class="col-md-5">
		<!-- TABS PILL STYLE -->
		<ul class="nav nav-pills" role="tablist">
			<li class="active"><a href="#chart1" role="tab" data-toggle="tab"><i class="fa fa-envelope"></i> Compte rendu générer</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="chart1">
				<h5>Vide</h5>
			</div>
		</div>
		<!-- END TABS PILL STYLE -->
	</div>
</div>
@endsection

@section('main-js')
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endsection