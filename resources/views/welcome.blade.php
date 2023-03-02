@extends('layouts.app')
@section('content')

<div class="bg">
    <div class="container d-flex p-5">
        <div class="row">
            <div class="col-6 text-light">
                <h1>
                    < Hello world, <br>
                    my name is Vincenzo Belardo and i am a web developer junior />
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="bg-app">
    <div class="container">
        <div class="text-center mb-3 text-light p-3">
            <h1>My projects</h1>
        </div>
        <div class="d-flex justify-content-between flex-wrap">
            @foreach($projects as $project)
            <div class="card mb-3" style="width: 18rem;">
                <img src="{{ asset('storage/' . $project->image )}}" class="img-fluid" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$project->title}}</h5>
                  <p class="card-text">{{$project->programming_language}}</p>
                  <a href=" {{ route ( 'admin.projects.show' , $project->id ) }}" class="btn btn-primary">visualizza il progetto</a>
               </div>
           </div>
           @endforeach
        </div>
    </div>
</div>
@endsection