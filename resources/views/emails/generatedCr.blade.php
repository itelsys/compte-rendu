@extends ('layouts.template')

@section('main-css')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-markdown/bootstrap-markdown.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
@endsection

@section('main-content')
<div class="section-heading">
	<h1 class="page-title">Nouveau compte rendu</h1>
</div>
<div class="panel-content">
	<form action="{{ route('send.email') }}" method="post"> 
		{{ csrf_field() }}

		<!-- <div class="form-group">
			<label>Destinataire</label>
			<input type="email" class="form-control" required autofocus style="background: white">
		</div> -->
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
<script>
	$(function() {
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