@extends ('layouts.template')

@section('main-css')
@endsection

@section('main-content')
<!-- <div class="inline-datepicker"></div> -->
<div class="row">
	<div class="col-md-9 col-md-offset-1">
		<todo></todo>
	</div>
</div>
@endsection

@section('main-js')
<script>
	<?php if (Session::has('welcome')) { ?>
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-right';
		toastr['info']('Bienvenu <?php echo Auth::user()->name ?>');
	<?php } ?>
</script>
@endsection