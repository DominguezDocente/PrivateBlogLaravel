@extends('layouts.app')

@section('content')

    <link href="{{ asset('lib/summernote/summernote-bs5.min.css') }}" rel="stylesheet">

    <div class="pagetitle">
        <h1>Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('blogs.index') }}">Blogs</a>/li>
                <li class="breadcrumb-item active">Nuevo Blog</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Nuevo Blog</h5>

                <form action="{{ route('blogs.store') }}" class="row g-3" method="POST">
                    @csrf

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Titulo" name="title">
                            <label>Titulo</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-control" name="section_id">
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            <label>Sección</label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label>Descripción</label>
                        <textarea name="description" id="description" class="form-control" rows="10"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection

<script type="module" src="{{ asset('lib/summernote/summernote-bs5.min.js') }}"></script>
<script type="module" src="{{ asset('lib/summernote/lang/summernote-es-ES.min.js') }}"></script>
<script type="module">

    $(document).ready(function () {

        $(document).ready(function(){

            $('#description').summernote({

                placeholder: 'Crea el blog...',
                lang: 'es-ES',
            });

        });
    });
</script>
