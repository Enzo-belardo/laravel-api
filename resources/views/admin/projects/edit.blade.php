@extends('layouts.admin')

@section('content')
<div class="container">
    <form class="p-5" action="{{route('admin.projects.update', $project->id )}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>
                  {{ $error }}
                </li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="mb-3">
          <label class="form-label">Titolo</label>
          <input  type="text" class="form-control" name="title" value="{{$project->title}}" id="" >
        </div>

        <div class="mb-3">
          <label for="">Tipo</label>
          <select type="text" class="form-control" name="type_id" value="{{ old('thumb') }}"  id="">
            @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->type }}</option>
            @endforeach
          </select>
        </div> 

        <div class="mb-3">
          <label class="form-label">Descrizione</label>
          <textarea type="text" id="" name="description" class="form-control" >{{ $project->description }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Anno del progetto</label>
          <input type="text" class="form-control" name="year_project" value="{{ $project->year_project }}" id="" >  
        </div>

        <div class="mb-3">
          <label class="form-label">Linguaggio</label>
          <input type="text" class="form-control" name="programming_language" value="{{  $project->programming_language }}" id="" >
        </div>

        <!-- <div class="mb-3">
          <label class="form-label">tipo</label>
          <input type="text" class="form-control" name="type" value="{{ $project->type }}" id="" >
        </div> -->

        <div class="mb-3">
          <label class="form-label">Inserisci un immagine</label>
          <input type="file" class="form-control" name="image" value="{{ $project->image }}" id="" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection