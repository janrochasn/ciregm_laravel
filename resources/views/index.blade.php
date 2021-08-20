@extends('layout.basico')

@section('content')

    @guest
        @section('title', 'Login')

        <div style="min-height: 100vh;" class="bg-dark">
            <div class="container-login">
                <div class="box-login">
                    <div class="form-group d-flex justify-content-center">
                        <img src="{{ asset('img/logo.png') }}" width="120px" />
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="id" placeholder='Usuario' class="form-control" value="{{ old('id') ?? "" }}">
                            </div>
                            {{ $errors->has('id') ? $errors->first('id') : '' }}
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name="password" placeholder='Senha' class="form-control" value="{{ old('password') ?? "" }}">
                            </div>
                            {{ $errors->has('password') ? $errors->first('password') : '' }}
                        </div>

                        <div class="form-group">
                            <div class="col text-center">
                                <button type="submit" class="btn botao-login">Login</button>
                            </div>
                        </div>
                    </form>
                    {{ isset($erro) && $erro != '' ? $erro : ''}}
                </div>
            </div>
        </div>
    @endguest

    @auth
        View do usuário autenticado
    @endauth

@endsection
