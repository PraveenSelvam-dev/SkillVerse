@extends('layouts.dashboard')

@section('title', 'Manage Courses')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-white">Course Management</h1>
            <p class="text-muted mb-0">Approve, feature, or manage platform courses.</p>
        </div>
        <div>
            <a href="#" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Course (Admin)</a>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="card bg-darker border-0 shadow-sm mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary text-muted"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="Search courses...">
                    </div>
                </div>
                <div class="col-md-2">
                    <select class="form-select bg-dark border-secondary text-white">
                        <option value="">All Categories</option>
                        <option value="programming">Programming</option>
                        <option value="design">Design</option>
                        <option value="business">Business</option>
                        <option value="marketing">Marketing</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-dark border-secondary text-white">
                        <option value="">All Statuses</option>
                        <option value="published">Published</option>
                        <option value="pending">Pending Approval</option>
                        <option value="draft">Draft</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-center">
                    <div class="form-check form-switch">
                        <input class="form-check-input bg-dark border-secondary" type="checkbox" id="featuredFilter">
                        <label class="form-check-label text-white ms-2" for="featuredFilter">Featured Only</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Course Table -->
    <div class="card bg-darker border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead class="text-muted small">
                        <tr>
                            <th class="ps-4">Course</th>
                            <th>Instructor</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Stats</th>
                            <th>Price</th>
                            <th>Featured</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $statuses = ['published', 'pending', 'draft', 'archived'];
                        $statusColors = [
                            'published' => 'success',
                            'pending' => 'warning',
                            'draft' => 'secondary',
                            'archived' => 'danger'
                        ];
                        $categories = ['Programming', 'Design', 'Business', 'Marketing'];
                        $courses = [];
                        for($i=1; $i<=15; $i++) {
                            $status = $statuses[array_rand($statuses)];
                            $courses[] = [
                                'id' => $i,
                                'title' => 'Mastering Subject ' . $i,
                                'instructor' => 'Instructor ' . $i,
                                'category' => $categories[array_rand($categories)],
                                'status' => $status,
                                'students' => rand(10, 5000),
                                'rating' => number_format(rand(35, 50) / 10, 1),
                                'price' => '$' . rand(19, 199) . '.99',
                                'featured' => rand(0, 10) > 8
                            ];
                        }
                        @endphp
                        
                        @foreach($courses as $course)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="me-3 rounded" style="width: 80px; height: 50px; background: linear-gradient(135deg, #6C63FF, #FF6584); display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-play text-white opacity-50"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-white">{{ $course['title'] }}</h6>
                                        <small class="text-muted">ID: #{{ str_pad($course['id'], 4, '0', STR_PAD_LEFT) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-light text-decoration-none hover-primary">{{ $course['instructor'] }}</a>
                            </td>
                            <td><small class="text-muted">{{ $course['category'] }}</small></td>
                            <td>
                                <span class="badge bg-{{ $statusColors[$course['status']] }} bg-opacity-20 text-{{ $statusColors[$course['status']] }} px-2 py-1 rounded-pill">
                                    {{ ucfirst($course['status']) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <small class="text-light"><i class="fas fa-users text-muted me-1"></i> {{ number_format($course['students']) }}</small>
                                    <small class="text-warning"><i class="fas fa-star me-1"></i> {{ $course['rating'] }}</small>
                                </div>
                            </td>
                            <td><span class="text-white fw-bold">{{ $course['price'] }}</span></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" {{ $course['featured'] ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon btn-outline-secondary border-0" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ url('admin/courses/'.$course['id']) }}"><i class="fas fa-eye me-2 text-primary"></i>View Details</a></li>
                                        @if($course['status'] == 'pending')
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-check me-2 text-success"></i>Approve</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-times me-2 text-warning"></i>Reject</a></li>
                                        @endif
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-transparent border-0 py-3">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm justify-content-center mb-0" data-bs-theme="dark">
                    <li class="page-item disabled"><a class="page-link bg-darker border-secondary text-muted" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link bg-primary border-primary text-white" href="#">1</a></li>
                    <li class="page-item"><a class="page-link bg-darker border-secondary text-white" href="#">2</a></li>
                    <li class="page-item"><a class="page-link bg-darker border-secondary text-white" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
