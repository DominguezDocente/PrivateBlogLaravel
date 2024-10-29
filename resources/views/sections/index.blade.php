@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Secciones</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Secciones</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="card">

            <div class="card-header py-3">
                <div class="row">
                    <div class="m-0 font-weight-bold text-primary col-md-11">
                        Secciones
                    </div>
                    <div class="col-md-1">
                        <a href="{{ route('sections.create') }}" class="btn btn-primary"><i
                                class="bi bi-plus-circle"></i></a>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <form action="{{ route('sections.index') }}" class="navbar-search" method="GET">

                    <div class="row mt-3">
                        <div class="col-md-auto">

                            <select name="records_per_page" class="form-select bg-light border-0 small"
                                value="{{ $data->records_per_page }}">

                                <option value="2" {{ $data->records_per_page == 2 ? 'selected' : '' }}>2</option>
                                <option value="10" {{ $data->records_per_page == 10 ? 'selected' : '' }}>10</option>
                                <option value="15" {{ $data->records_per_page == 15 ? 'selected' : '' }}>15</option>
                                <option value="30" {{ $data->records_per_page == 30 ? 'selected' : '' }}>30</option>
                                <option value="50" {{ $data->records_per_page == 50 ? 'selected' : '' }}>50</option>

                            </select>

                        </div>

                        <div class="col-md-10">
                            <div class="input-group-mb-3">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                                    aria-label="search" name="filter" value="{{ $data->filter }}">
                            </div>
                        </div>

                        <div class="col-md-auto">
                            <div class="input-group-append">
                                <button class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                </form>

                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th></th>
                    </thead>

                    <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <td>{{ $section->id }}</td>
                                <td>{{ $section->name }}</td>

                                <td>
                                    <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>

                                    <form action="{{ route('sections.delete', $section->id) }}" style="display:contents"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btnDelete"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $sections->appends(request()->except('page'))->links('components.customPagination') }}
                    </ul>
                </nav>

            </div>
        </div>

    </section>
@endsection
<script type="module">

    $(document).ready(function () {

        $('.btnDelete').click(function (event) {

            event.preventDefault();

            Swal.fire({
                title: "¿Desea eliminar la sección?",
                text: "No prodrá revertirlo",
                icon: "question",
                showCancelButton: true,
            }).then((result) => {

                if (result.isConfirmed) {

                    const form = $(this).closest('form');

                    form.submit();
                }

            });

        });

    });
</script>
