@extends('layouts.admin')

@section('content')
  <div class="container">
    @include('admin.projects.partials.create_edit', [
      'method' => 'PUT',
      'route' => 'admin.projects.update',
    ])
  </div>

@endsection