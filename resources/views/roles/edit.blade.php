@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Roles</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Editar Rol</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        {{-- Role --}}
        <div class="card mt-3">
            <div class="card-header">
                <h3>Editar Rol</h3>
            </div>

            <div class="card-body mt-3">
                <form action="{{ route('roles.update') }}" class="row g-3 mt-3" method="POST" id="frmCreate">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="role_id" value="{{ $role->id }}" />
                    <input type="hidden" name="permissions" id="permissions" />
                    <input type="hidden" name="sections" id="sections" />

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ $role->name }}" />
                                <label>Nombre</label>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>

        {{-- Sections --}}
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Secciones</h3>

                <div class="row">

                    @foreach ($sectionGroups as  $group)

                        <div class="col-md-3 mt-3">

                            @foreach ($group as $item)

                                <div class="form-check form-switch">
                                    <input type="checkbox"
                                           class="form-check-input section"
                                           id="section_{{ $item->id }}"
                                           data-section-id="{{ $item->id }}"
                                           {{ $item->selected ? 'checked' : '' }} />
                                    <label for="section_{{ $item->id }}" class="form-check-label">{{ $item->name }}</label>
                                </div>

                            @endforeach

                        </div>

                    @endforeach

                </div>
            </div>
        </div>

        {{-- Permissions --}}
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Permisos</h3>

                <div class="row">

                    @foreach ($modules as $key => $module)

                        <div class="col-md-3 mt-3">

                            <h5>{{ $key }}</h5>

                            @foreach ($module as $item)

                                <div class="form-check form-switch">
                                    <input type="checkbox"
                                           class="form-check-input permission"
                                           id="permission_{{ $item->id }}"
                                           data-permission-id="{{ $item->id }}"
                                           {{ $item->selected ? 'checked' : '' }} />
                                    <label for="permission_{{ $item->id }}" class="form-check-label">{{ $item->description }}</label>
                                </div>

                            @endforeach

                        </div>

                    @endforeach

                </div>
            </div>
        </div>

        <div class="text-centered">
            <button type="submit" class="btn btn-primary" form="frmCreate" id="btnSave">Guardar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
        </div>

    </section>
@endsection

<script type="module">

    $(document).ready(function() {

        $('#btnSave').click(function(event) {

            // Sections
            const sections = $('.section:checked');

            let sectionIds = [];

            sections.each(function() {

                const sectionId = $(this).data('section-id');
                sectionIds.push(sectionId);
            });

            // Permissions
            const permissions = $('.permission:checked');

            let permissionIds = [];

            permissions.each(function() {

                const permissionId = $(this).data('permission-id');
                permissionIds.push(permissionId);
            });

            $('#sections').val(JSON.stringify(sectionIds));
            $('#permissions').val(JSON.stringify(permissionIds));
        });
    });

</script>
