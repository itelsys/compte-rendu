@extends('layouts.app')

@section('content')
<div class="vertical-align-wrap">
    <div class="vertical-align-middle">
        <div class="auth-box">
            <div class="content">
                <div class="header">
                    <div class="logo text-center"><img src="assets/img/logo.png" alt="DiffDash"></div>
                    <p class="lead">Connectez-vous à votre compte</p>
                </div>
                <form class="form-auth-small" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="signin-email" class="control-label sr-only">E-mail</label>
                        <input type="email" class="form-control" id="signin-email" value="{{ old('email') }}" name="email" placeholder="E-mail">

                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="signin-password" class="control-label sr-only">Mot de passe</label>
                        <input type="password" class="form-control" id="signin-password" name="password" placeholder="Mot de passe">

                        @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Se souvenir de moi</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">CONNEXION</button>
                    <div class="bottom">
                        <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Mot de passe oublié?</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
