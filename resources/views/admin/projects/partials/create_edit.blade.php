<form class="p-5" action="{{ route($route , $project) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

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
        <input  type="text" class="form-control" name="title" value="{{ old('title', $project->title) }}" id="" >
    </div>

    <div class="mb-3">
        <label for="form-label">Tipo</label>
        <select class="form-control" name="type_id"  id="type_id">
            @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->type }}</option>
            @endforeach
        </select>
    </div> 

    <div class="row form-group mb-3">
      <div class="col-12">
        <p>Tecnologie</p>
        @foreach ($tecnologies as $tecnology)
          <input type="checkbox" class="form-check-input" name="tecnologies[]" value="{{ $tecnology->id }}">
          @if ($errors->any())
            @checked(in_array($tecnology->id, old('tecnologies', [])))
          @else
            @checked($project->tecnologies->contains($tecnology->id))
           @endif
          <label class="form-check-label">{{ $tecnology->tecnology }}</label>
        @endforeach
      </div>
    </div>

     <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <textarea type="text" id="" name="description"  class="form-control" >{{ old('description', $project->description) }}</textarea>
     </div>

    <div class="mb-3">
        <label class="form-label">Anno del progetto</label>
        <input type="text" class="form-control" name="year_project" value="{{ old('year_project', $project->year_project) }}" id="" >  
    </div>

    <div class="mb-3">
        <label class="form-label">Inserisci un immagine</label>
        <input type="file" class="form-control" name="image" value="{{ old('image', $project->image) }}" id="" >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>