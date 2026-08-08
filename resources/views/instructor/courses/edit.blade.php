@extends('layouts.dashboard')
@section('title', 'Edit Course')
@section('content')
<!-- Reusing the form from create, plus danger zone -->
<div class="container-fluid py-4">
    <h2 class="text-white mb-4">Edit Course: Advanced Laravel Mastery</h2>
    
    <div class="alert alert-warning bg-warning bg-opacity-10 border-warning text-warning rounded-3 p-3 mb-4 d-flex align-items-center">
        <i class="fa-solid fa-triangle-exclamation fs-4 me-3"></i>
        <div>
            <strong>Status: Published</strong> - Any changes made to curriculum will be immediately visible to enrolled students.
        </div>
    </div>
    
    <div class="card bg-dark text-white border-secondary mb-4" style="border-color: rgba(255,255,255,0.1)!important;">
        <div class="card-body text-center py-5">
            <h4 class="text-muted">[Form from Create View Pre-filled]</h4>
            <a href="#" class="btn btn-outline-light mt-3">Back to Courses</a>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="card mt-5" style="background: rgba(255, 101, 132, 0.05); border: 1px solid rgba(255, 101, 132, 0.3); border-radius: 16px;">
        <div class="card-body p-4">
            <h5 class="text-danger mb-3"><i class="fa-solid fa-triangle-exclamation me-2"></i>Danger Zone</h5>
            <p class="text-muted mb-4">Deleting this course will permanently remove all associated data, including curriculum, resources, and student progress. This action cannot be undone.</p>
            <button class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Delete Course</button>
        </div>
    </div>
</div>
@endsection
