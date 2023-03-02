@extends('layouts.admin')

@section('content')
<div class="container">
    <form class="p-5" action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
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
          <input  type="text" class="form-control" name="title" value="{{ old('title') }}" id="" >
        </div>

        <div class="mb-3">
          <label for="form-label">Tipo</label>
          <select class="form-control" name="type_id"  id="type_id">
            @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->type }}</option>
            @endforeach
          </select>
        </div> 

        <div class="mb-3">
          <label class="form-label">Descrizione</label>
          <textarea type="text" id="" name="description" value="{{ old('description') }}" class="form-control" ></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Anno del progetto</label>
          <input type="text" class="form-control" name="year_project" value="{{ old('date_project') }}" id="" >  
        </div>

        <div class="mb-3">
          <label class="form-label">Linguaggio</label>
          <input type="text" class="form-control" name="programming_language" value="{{ old('programming_language') }}" id="" >
        </div>

        <!-- <div class="mb-3">
          <label class="form-label">tipo</label>
          <input type="text" class="form-control" name="type" value="{{ old('type') }}" id="" >
        </div> -->

        <div class="mb-3">
          <label class="form-label">Inserisci un immagine</label>
          <input type="file" class="form-control" name="image" value="{{ old('image') }}" id="" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection