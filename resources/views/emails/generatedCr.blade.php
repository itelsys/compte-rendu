@extends ('layouts.template')

@section('main-css')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-markdown/bootstrap-markdown.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="assets/vendor/parsleyjs/css/parsley.css">
@endsection

@section('main-content')
<div class="panel-content">
	<form action="{{ route('send.email') }}" method="post" id="basic-form"> 
		{{ csrf_field() }}

		<div class="form-group">
			<label for="users">Envoyer à :</label>
			<br/>
			<select id="users" name="users[]" class="multiselect multiselect-custom" multiple="multiple" data-parsley-required data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-email">
				@foreach ($users as $user)
					<option value="{{ $user->email }}">{{ $user->name }}</option>
				@endforeach
			</select>
			<p id="error-email"></p>
		</div>
		<hr>
		<div class="form-group">
			<label for="cc">Cc :</label>
			<br/>
			<select id="cc" name="cc[]" class="multiselect multiselect-custom" multiple="multiple" data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-cc">
				@foreach ($users as $user)
					<option value="{{ $user->email }}">{{ $user->name }}</option>
				@endforeach
			</select>
			<p id="error-cc"></p>
		</div>
		<hr>
		<div class="form-group">
			<label>Objet</label>
			<input type="text" name="subject" class="form-control" required>
		</div>
		<div class="form-group">
			<textarea id="markdown-editor" name="content" data-provide="markdown" rows="10"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-info"><i class="fa fa-send"></i> <span>Envoyer</span></button>
		</div>
	</form>
</div>
@endsection

@section('main-js')
<script src="{{ asset('assets/vendor/markdown/markdown.js') }}"></script>
<script src="{{ asset('assets/vendor/to-markdown/to-markdown.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>
<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="assets/vendor/parsleyjs/js/parsley.min.js"></script>
<script>
	$(function() {
		// FORM Send email
		$(function() {
			// validation needs name of the element
			$('#users').multiselect();
			$('#cc').multiselect();

			// initialize after multiselect
			$('#basic-form').parsley();
		});

		// markdown editor
		var initContent = '<p>Bonjour Madame/Monsieur.</p><p>Liste des taches éffectuées :</p> ' +
			`<p>
				<?php foreach ($taches as $tache) {
					echo '<p>- '.$tache->title.'</p>';
				} ?>
			</p>`;

		$('#markdown-editor').text(toMarkdown(initContent));
	});

	// NOTIFICATION
	$(function() {
		

		<?php if (Session::has('email-sended')) { ?>

		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-top-center';
		toastr['success']('<?php echo Session::get('email-sended') ?>');
		<?php } ?>

	});


</script>
@endsection