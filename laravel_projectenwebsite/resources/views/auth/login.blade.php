@extends('layouts.app')

@section('content')
    <div class="pt-5 row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Onthoud mij') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-6">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btns btn-secondary">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>
                    </form>
                    <div class="form-group row">
                        <div class="col">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    <button class="btns btn-secondary" style="float: right">
                                        {{ __('Passwoord vergeten?') }}
                                    </button>
                                </a>
                            @endif
                            {{--                                <b-button class="btns">Reset paswoord</b-button>--}}
                        </div>
                        <div class="col">
                            <a href="{{ route('register') }}">
                                <button class="btns btn-secondary">
                                    {{ __('Nieuwe gebruiker') }}
                                </button>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
