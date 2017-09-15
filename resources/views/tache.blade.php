@extends ('layouts.template')

@section('main-css')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endsection

@section('main-content')
<div class="row">
	<!-- DATE FILTER -->
	<h5>Filtre par date :</h5>
	<div class="input-group date col-md-2" data-date-autoclose="true" data-provide="datepicker">
		<input data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd/mm/yyyy">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	</div>
	<!-- END DATE FILTER -->
	<div class="col-md-8 col-md-offset-2">
		<todo :data="{{ $taches }}"></todo>
	</div>
</div>
@endsection

@section('main-js')
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endsection