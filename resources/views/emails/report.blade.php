@component('mail::message')
# Compte rendu du {{ Carbon\Carbon::now()->toFormattedDateString() }}

{{ $taches }}

<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->

Merci,<br>
{{ config('app.name') }}
@endcomponent
