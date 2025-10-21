@extends('layouts.app')

@section('content')

    <link href="{{ asset('lib/summernote/summernote-bs5.min.css') }}" rel="stylesheet" />

    <div class="pagetitle">
        <h1>Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('blogs.index') }}">Blogs</a></li>
                <li class="breadcrumb-item active">Editar Blog</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="card">
            <div class="card-header">
                <h3>Editar Blog</h3>
            </div>

            <div class="card-body mt-3">

                <form action="{{ route('blogs.update') }}" class="row g-3 mt-3" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="blog_id" value="{{ $blog->id }}" />

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Titulo" name="title" value="{{ $blog->title }}" />
                                <label>Titulo</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control" name="section_id">
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}" {{ $section->id == $blog->section->id ? 'selected' : '' }}>
                                            {{ $section->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label>Sección</label>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>Contenido</label>
                            <textarea name="content" id="content" class="form-control" rows="30">{{ $blog->content }}</textarea>
                        </div>

                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('sections.index') }}" class="btn btn-secondary">Volver</a>
                    </div>

                </form>

            </div>

    </section>

@endsection

<script type="module" src="{{ asset('lib/summernote/summernote-bs5.min.js') }}"></script>
<script type="module" src="{{ asset('lib/summernote/lang/summernote-es-ES.min.js') }}"></script>

<script type="module">

    $(document).ready(function() {

        $('#content').summernote({
            lang: 'es-ES',
            placeholder: 'Digite el Blog...'
        })

    });

</script>
