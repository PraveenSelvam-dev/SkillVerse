@extends('layouts.dashboard')

@section('title', 'Manage Users')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-white">Total Users: 2,450</h1>
            <p class="text-muted mb-0">Manage platform users, roles, and statuses.</p>
        </div>
        <div>
            <button class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add User</button>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="card bg-darker border-0 shadow-sm mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary text-muted"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="Search users by name or email...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-dark border-secondary text-white">
                        <option value="">All Roles</option>
                        <option value="student">Student</option>
                        <option value="instructor">Instructor</option>
                        <option value="mentor">Mentor</option>
                        <option value="freelancer">Freelancer</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-dark border-secondary text-white">
                        <option value="">All Statuses</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bulk Actions & Table -->
    <div class="card bg-darker border-0 shadow-sm">
        <div class="card-header bg-transparent border-0 pt-4 pb-2 d-flex justify-content-between align-items-center">
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Bulk Actions
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Activate Selected</a></li>
                    <li><a class="dropdown-item" href="#">Deactivate Selected</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#">Delete Selected</a></li>
                </ul>
            </div>
            <div>
                <!-- Pagination minimal -->
                <span class="text-muted small me-3">Showing 1-20 of 2,450</span>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead class="text-muted small">
                        <tr>
                            <th class="ps-4" style="width: 40px;">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark border-secondary" type="checkbox" id="selectAll">
                                </div>
                            </th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $roles = ['student', 'instructor', 'mentor', 'freelancer', 'admin'];
                        $roleColors = [
                            'student' => 'primary',
                            'instructor' => 'info',
                            'mentor' => 'success',
                            'freelancer' => 'warning',
                            'admin' => 'danger'
                        ];
                        $users = [];
                        for($i=1; $i<=20; $i++) {
                            $role = $roles[array_rand($roles)];
                            $isActive = rand(0, 10) > 1; // 90% active
                            $isVerified = rand(0, 10) > 3;
                            $users[] = [
                                'id' => $i,
                                'name' => 'User Name ' . $i,
                                'email' => 'user'.$i.'@example.com',
                                'role' => $role,
                                'active' => $isActive,
                                'verified' => $isVerified,
                                'date' => rand(1, 30) . ' days ago'
                            ];
                        }
                        @endphp
                        
                        @foreach($users as $user)
                        <tr>
                            <td class="ps-4">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark border-secondary" type="checkbox" value="{{ $user['id'] }}">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3 bg-secondary rounded-circle text-center text-white d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
                                        {{ substr($user['name'], 0, 1) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-white d-flex align-items-center">
                                            {{ $user['name'] }}
                                            @if($user['verified'])
                                                <i class="fas fa-check-circle text-primary ms-2 small" title="Verified"></i>
                                            @endif
                                        </h6>
                                        <small class="text-muted">{{ $user['email'] }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-{{ $roleColors[$user['role']] }} bg-opacity-20 text-{{ $roleColors[$user['role']] }} px-2 py-1 rounded-pill">
                                    {{ ucfirst($user['role']) }}
                                </span>
                            </td>
                            <td>
                                @if($user['active'])
                                    <span class="badge bg-success bg-opacity-20 text-success px-2 py-1 rounded-pill">Active</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-20 text-secondary px-2 py-1 rounded-pill">Inactive</span>
                                @endif
                            </td>
                            <td><small class="text-muted">{{ $user['date'] }}</small></td>
                            <td class="text-end pe-4">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon btn-outline-secondary border-0" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ url('admin/users/'.$user['id']) }}"><i class="fas fa-eye me-2 text-primary"></i>View Details</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2 text-info"></i>Edit</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                @if($user['active'])
                                                    <i class="fas fa-ban me-2 text-warning"></i>Deactivate
                                                @else
                                                    <i class="fas fa-check me-2 text-success"></i>Activate
                                                @endif
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                @if($user['verified'])
                                                    <i class="fas fa-times-circle me-2 text-secondary"></i>Unverify
                                                @else
                                                    <i class="fas fa-check-circle me-2 text-primary"></i>Verify
                                                @endif
                                            </a>
                                        </li>
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
                    <li class="page-item"><a class="page-link bg-darker border-secondary text-white" href="#">3</a></li>
                    <li class="page-item"><a class="page-link bg-darker border-secondary text-white" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
