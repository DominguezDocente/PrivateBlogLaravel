@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sections.index') }}">Secciones</a></li>
            <li class="breadcrumb-item active">Nueva Sección</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">

    <div class="card">

        <div class="card-header">
            <h3>Nueva Sección</h3>
        </div>

        <div class="card-body mt-3">
            <form action="{{ route('sections.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" placeholder="Digite la sección...">
                            <label>Sección</label>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-2">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <a href="{{ route('sections.index') }}" class="btn btn-secondary">Volver</a>
                </div>

            </form>
        </div>

    </div>

</section>

@endsection
