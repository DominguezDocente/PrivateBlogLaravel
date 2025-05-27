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

                <form action="{{ route('profile.update') }}" class="" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text"
                                       class="form-control"
                                       readonly
                                       value="{{ $user->email }}">
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text"
                                       class="form-control"
                                       name="document"
                                       value="{{ $user->document }}">
                                <label>Documento</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nombres..."
                                       name="first_name"
                                       value="{{ $user->first_name }}">
                                <label>Nombres</label>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-floating">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Apellidos..."
                                       name="last_name"
                                       value="{{ $user->last_name }}">
                                <label>Apellidos</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('profile.changePassword') }}" class="btn btn-warning">Cambiar contraseña</a>
                        <a href="{{ route('home.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
