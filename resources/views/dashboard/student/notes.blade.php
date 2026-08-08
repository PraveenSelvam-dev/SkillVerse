@extends('layouts.dashboard')

@section('title', 'My Notes')

@section('content')
@php
    $notes = [
        ['course' => 'Advanced Laravel Mastery', 'lesson' => 'Service Container Deep Dive', 'time' => 'Oct 24, 2023', 'content' => 'Remember that singletons persist for the entire request lifecycle. Use bind for new instances.'],
        ['course' => 'Advanced Laravel Mastery', 'lesson' => 'Custom Middleware', 'time' => 'Oct 20, 2023', 'content' => 'Middleware can be global, group, or route-specific. Always call $next($request) to pass control.'],
        ['course' => 'Advanced Laravel Mastery', 'lesson' => 'Event Dispatching', 'time' => 'Oct 19, 2023', 'content' => 'Events and listeners provide a great way to decouple various aspects of the application.'],
        ['course' => 'Vue 3 Composition API', 'lesson' => 'Setup Function', 'time' => 'Sep 15, 2023', 'content' => 'The setup function runs before beforeCreate. No access to "this" context inside.'],
        ['course' => 'Vue 3 Composition API', 'lesson' => 'Refs vs Reactive', 'time' => 'Sep 14, 2023', 'content' => 'Use ref for primitives (strings, numbers) and reactive for objects. Must use .value with refs.'],
        ['course' => 'Vue 3 Composition API', 'lesson' => 'Watchers', 'time' => 'Sep 12, 2023', 'content' => 'watchEffect automatically tracks dependencies. watch requires explicit source.'],
        ['course' => 'Docker for Web Developers', 'lesson' => 'Dockerfile Basics', 'time' => 'Aug 30, 2023', 'content' => 'Order matters! Put less frequently changed instructions (like apt-get install) higher up to use cache.'],
        ['course' => 'Docker for Web Developers', 'lesson' => 'Volumes', 'time' => 'Aug 28, 2023', 'content' => 'Bind mounts connect to host FS. Named volumes are managed by Docker. Better for databases.'],
        ['course' => 'Tailwind CSS in Depth', 'lesson' => 'Custom Theme', 'time' => 'Jul 10, 2023', 'content' => 'Extend theme in tailwind.config.js to keep default utilities.'],
        ['course' => 'Tailwind CSS in Depth', 'lesson' => 'JIT Mode', 'time' => 'Jul 05, 2023', 'content' => 'JIT compiles CSS on demand. Allows arbitrary values like w-[300px].']
    ];
    
    // Group notes by course
    $groupedNotes = collect($notes)->groupBy('course');
@endphp

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.2);
    }
    .note-card {
        background: rgba(0, 0, 0, 0.2);
        border-radius: 12px;
        border-left: 4px solid #6C63FF;
        transition: all 0.2s ease;
    }
    .note-card:hover {
        background: rgba(0, 0, 0, 0.4);
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white mb-0">My Notes</h2>
        <button class="btn btn-outline-light"><i class="fa-solid fa-print me-2"></i>Export All</button>
    </div>

    <div class="row">
        <div class="col-lg-3 mb-4">
            <!-- Sidebar filter -->
            <div class="glass-card p-3 position-sticky" style="top: 20px;">
                <h6 class="text-white mb-3">Filter by Course</h6>
                <div class="list-group list-group-flush bg-transparent">
                    <button class="list-group-item list-group-item-action bg-transparent text-white border-secondary active" style="background: rgba(108,99,255,0.2) !important;">All Notes</button>
                    @foreach($groupedNotes->keys() as $courseName)
                        <button class="list-group-item list-group-item-action bg-transparent text-muted border-secondary">{{ $courseName }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
            @foreach($groupedNotes as $courseName => $courseNotes)
            <h5 class="text-white mb-3 mt-4 first-mt-0">{{ $courseName }}</h5>
            <div class="glass-card p-4 mb-4">
                <div class="row g-4">
                    @foreach($courseNotes as $note)
                    <div class="col-md-6">
                        <div class="note-card p-3 h-100 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="text-white mb-0">{{ $note['lesson'] }}</h6>
                                <div class="dropdown">
                                    <button class="btn btn-link text-muted p-0" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-pen me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="fa-solid fa-trash me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-muted small mb-2"><i class="fa-regular fa-clock me-1"></i>{{ $note['time'] }}</p>
                            <p class="text-light mb-0 mt-auto" style="font-size: 0.9rem;">"{{ $note['content'] }}"</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
