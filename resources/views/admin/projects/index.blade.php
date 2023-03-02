@extends('layouts.admin')

@section('scripts')
    @vite('resources/js/delete.js')
@endsection

@section('content')
<div class="container py-5">

    @if (session('message'))
        <div class="alert alert-{{ session('alert-type') }}">
            {{ session('message')  }}
        </div>
    @endif

    <div class="mb-3 d-flex justify-content-end ">
        <a class="btn btn-success me-3" href="{{route('admin.projects.create')}}">Inserisci un nuovo progetto </a>
    </div>


    <table class="table w-75 m-auto">
        <thead>
            <tr class="text-dark ">
                <th scope="col">id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tecnologie</th>
                <th scope="col">Tipo</th>
                <th scope="col">Anno</th>
                <th scope="col"><i class="fa-sharp fa-solid fa-ellipsis"></i></th>
            </tr>
        </thead>

        @foreach ($projects as $project)
        <tbody>
            <tr class="text-dark">
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->programming_language }}</td>
                <td>{{ $project->type_id }}</td>
                <td>{{$project->year_project}}</td>
                <td>
                 <a class = "btn btn-sm btn-primary " href=" {{ route ( 'admin.projects.show' , $project->id ) }}" >Show</a>
                 <a class = "btn btn-sm btn-warning " href=" {{ route ( 'admin.projects.edit' , $project->id ) }}" >Edit</a>
                    <form class="d-inline delete" data-element="{{ $project->title }}" action="{{ route ( 'admin.projects.destroy' , $project->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach 
    </table> 
</div>
@endsection
