@php
    use App\Functions\Helper as Help;

@endphp


@extends('layouts.admin')

@section('content')
    <div class="container m-0">
        <h2>Index projects</h2>


        <div class="container p-1">

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif


            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @elseif(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- create --}}
            <form action="{{ route('admin.projects.store') }}" method="POST" class="d-flex w-50">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Aggiungi progetto" aria-label="Search"
                    name="title">
                <button class="btn btn-outline-success" type="submit">Aggiungi</button>
            </form>
        </div>


        <table class="table crud-table">
            <thead>
                <tr>
                    <th scope="col">Progetto</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Data</th>
                    <th scope="col">Linguaggi</th>
                    <th scope="col">Github</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($projects as $project)
                    <tr>
                        <td>
                            {{-- update --}}
                            <form action="{{ route('admin.projects.update', $project) }}" method="POST"
                                id="form-edit-{{ $project->id }}">
                                @csrf
                                @method('PUT')
                                <input type="text" value="{{ $project->title }}" name="title">
                            </form>
                        </td>
                        <td>{{ $project->type ? $project->type->title : 'N/A' }}</td>
                        <td>{{ Help::formatDate($project->update_at) }}</td>
                        <td>{{ $project->languages ? $project->languages : 'N/A' }}</td>
                        <td><a target="_blank"
                                href="{{ $project->github_url }}">{{ $project->github_url ? $project->github_url : 'N/A' }}</a>
                        </td>
                        <td class="d-flex">
                            <button type="button" onclick="submitForm({{ $project->id }})"
                                class="btn btn-warning me-2"><i class="fa-solid fa-pencil"></i></button>

                            {{-- delete --}}
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $projects->links('pagination::bootstrap-5') }}

    </div>

    <script>
        function submitForm(id) {
            const form = document.getElementById(`form-edit-${id}`);
            form.submit();
        }
    </script>
@endsection
