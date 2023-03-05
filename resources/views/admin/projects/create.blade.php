@extends('layouts.admin')

@section('content')
<div class="container">
    @include('admin.projects.partials.create_edit', [
        'method' => 'POST',
        'route' => 'admin.project.store',
        'project' => $project,
    ])
</div>

@endsection