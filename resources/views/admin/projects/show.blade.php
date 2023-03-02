@extends('layouts.admin')


@section('content')
<div class="view">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 p-5">
                <div class="card p-3 text-center bg-dark">
                    <div class="card-title text-light">
                        <h1>
                            {{ $project->title }}
                        </h1>
                    </div>
                    <div class="card-img text-light">
                        <img src="{{ asset('storage/' . $project->image )}}" class="img-fluid" alt="">
                    </div>
                    <p class="text-light mt-3">
                        {{ $project->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

    
@endsection