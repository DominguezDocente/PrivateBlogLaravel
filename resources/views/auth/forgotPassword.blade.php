@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Recuperar contraseña</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Recuperar contraseña</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="card">

            <div class="card-header py-3">
                <div class="row">
                    <div class="m-0 font-weight-bold text-primary col-md-11">
                        Recuperar contraseña
                    </div>
                </div>
            </div>

            <div class="card-body">

                <form action="{{ route('recoveryPassword') }}" class="" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="form-floating">
                                <input type="text"
                                       class="form-control"
                                       name="email">
                                <label>Email</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Recuperar contraseña</button>
                        <a href="{{ route('login') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
