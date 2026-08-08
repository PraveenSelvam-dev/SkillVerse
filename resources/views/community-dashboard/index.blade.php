@extends('layouts.dashboard')

@section('title', 'Community Dashboard Overview')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-white">Community Dashboard</h1>
            <p class="text-muted mb-0">Manage your active communities, members, posts, and events.</p>
        </div>
        <div>
            <a href="{{ url('/communities') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Explore Communities</a>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Owned Communities</h6>
                        <div class="icon-shape bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                            <i class="fas fa-users fs-5"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-2">4</h3>
                    <p class="text-success mb-0 small"><i class="fas fa-arrow-up me-1"></i> Active leadership</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Total Members</h6>
                        <div class="icon-shape bg-info bg-opacity-10 text-info rounded-circle p-3">
                            <i class="fas fa-user-friends fs-5"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-2">12,450</h3>
                    <p class="text-success mb-0 small"><i class="fas fa-arrow-up me-1"></i> 14% growth</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Active Posts</h6>
                        <div class="icon-shape bg-warning bg-opacity-10 text-warning rounded-circle p-3">
                            <i class="fas fa-comments fs-5"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-2">380</h3>
                    <p class="text-success mb-0 small"><i class="fas fa-arrow-up me-1"></i> 25 today</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-darker border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Upcoming Events</h6>
                        <div class="icon-shape bg-success bg-opacity-10 text-success rounded-circle p-3">
                            <i class="fas fa-calendar-alt fs-5"></i>
                        </div>
                    </div>
                    <h3 class="text-white mb-2">8</h3>
                    <p class="text-success mb-0 small"><i class="fas fa-check me-1"></i> Scheduled</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Managed Communities Table -->
    <div class="card bg-darker border-0 shadow-sm">
        <div class="card-header bg-transparent border-0 pt-4 pb-2 d-flex justify-content-between align-items-center">
            <h5 class="text-white mb-0">My Communities</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead class="text-muted small">
                        <tr>
                            <th class="ps-4">Community</th>
                            <th>Privacy</th>
                            <th>Members</th>
                            <th>Posts</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $myCommunities = [
                            ['name' => 'Laravel Developers', 'slug' => 'laravel-developers', 'privacy' => 'Public', 'members' => '12,500', 'posts' => '1,420'],
                            ['name' => 'Python Engineers', 'slug' => 'python-engineers', 'privacy' => 'Public', 'members' => '18,000', 'posts' => '2,100'],
                            ['name' => 'AI Innovators', 'slug' => 'ai-innovators', 'privacy' => 'Private', 'members' => '8,000', 'posts' => '950'],
                            ['name' => 'Design Masters', 'slug' => 'design-masters', 'privacy' => 'Public', 'members' => '6,000', 'posts' => '720'],
                        ];
                        @endphp
                        @foreach($myCommunities as $comm)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3 bg-primary rounded-circle text-center text-white d-flex align-items-center justify-content-center" style="width:36px; height:36px;">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-white">{{ $comm['name'] }}</h6>
                                        <small class="text-muted">slug: {{ $comm['slug'] }}</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-info text-white px-2 py-1 rounded-pill">{{ $comm['privacy'] }}</span></td>
                            <td><span class="text-white fw-bold">{{ $comm['members'] }}</span></td>
                            <td><span class="text-muted">{{ $comm['posts'] }}</span></td>
                            <td class="text-end pe-4">
                                <a href="{{ url('communities/' . $comm['slug']) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye me-1"></i>View</a>
                                <a href="#" class="btn btn-sm btn-outline-warning"><i class="fas fa-cog me-1"></i>Manage</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
