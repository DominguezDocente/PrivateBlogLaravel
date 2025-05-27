@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Restablecer contraseña</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Restablecer contraseña</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="card">

            <div class="card-header py-3">
                <div class="row">
                    <div class="m-0 font-weight-bold text-primary col-md-11">
                        Restablecer contraseña
                    </div>
                </div>
            </div>

            <div class="card-body">

                <form action="{{ route('password.update') }}" class="" method="POST">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="row">

                        <div class="col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="password"
                                       class="form-control"
                                       name="password">
                                <label>Nueva contraseña</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="password"
                                       class="form-control"
                                       name="password_confirmation">
                                <label>Confirmar nueva contraseña</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Restablecer contraseña</button>
                        <a href="{{ route('login') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
