@extends ('layouts.template')

@section('mail-css')
@endsection

@section('main-content')
<div class="section-heading clearfix">
	<h2 class="section-title"><i class="fa fa-send"></i> Envoyés</h2>
</div>
<email-list :data="{{ $emails }}"></email-list>
@endsection