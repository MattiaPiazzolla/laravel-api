@extends('layouts.dashboard')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5">{{ $project->name }}</h2>
                @if (Str::startsWith($project->project_image, 'https'))
                    <img class="project_image" src="{{ $project->project_image }}" alt="{{ $project->project_image }}">
                @else
                    <img class="project_image" src="{{ asset('./storage/' . $project->project_image) }}"
                        alt="{{ $project->name }}">
                @endif
                <p class="mt-5">{{ $project->slug }}</p>
                <p>{{ $project->summary }}</p>
                <p>{{ $project->category ? $project->category->name : 'Nessuna Categoria' }}</p>
                <p>
                    @forelse ($project->technologies as $technology)
                        {{ $technology->name }}
                    @empty
                        Il progetto non ha tecnologie assegnate
                    @endforelse
                </p>

            </div>
        </div>
    </div>
@endsection
