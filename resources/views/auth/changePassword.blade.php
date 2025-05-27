@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Perfil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Perfil</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="card">

            <div class="card-header py-3">
                <div class="row">
                    <div class="m-0 font-weight-bold text-primary col-md-11">
                        Editar información de cuenta
                    </div>
                </div>
            </div>

            <div class="card-body">

                <form action="{{ route('profile.updatePassword') }}" class="" method="POST">
                    @method('PATCH')
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="password"
                                       class="form-control"
                                       name="current_password">
                                <label>Contraseña actual</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="password"
                                       class="form-control"
                                       name="new_password">
                                <label>Nueva contraseña</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="password"
                                       class="form-control"
                                       name="new_password_confirmation">
                                <label>Confirmar nueva contraseña</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('home.index') }}" class="btn btn-warning">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
