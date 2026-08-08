@extends('layouts.dashboard')

@section('title', 'Support Tickets')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-white">Support Tickets</h1>
            <p class="text-muted mb-0">Manage user inquiries and issues.</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="card bg-darker border-0 shadow-sm mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary text-muted"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="Search subject or user...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-dark border-secondary text-white">
                        <option value="">All Statuses</option>
                        <option value="open">Open</option>
                        <option value="in-progress">In Progress</option>
                        <option value="resolved">Resolved</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select bg-dark border-secondary text-white">
                        <option value="">All Priorities</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tickets Table -->
    <div class="card bg-darker border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead class="text-muted small">
                        <tr>
                            <th class="ps-4">Ticket</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Created</th>
                            <th>Last Reply</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $statuses = ['open', 'in progress', 'resolved', 'closed'];
                        $statusColors = ['open' => 'danger', 'in progress' => 'warning', 'resolved' => 'success', 'closed' => 'secondary'];
                        
                        $priorities = ['low', 'medium', 'high'];
                        $priorityColors = ['low' => 'info', 'medium' => 'warning', 'high' => 'danger'];
                        
                        $tickets = [];
                        for($i=1; $i<=10; $i++) {
                            $status = $statuses[array_rand($statuses)];
                            $priority = $priorities[array_rand($priorities)];
                            
                            $tickets[] = [
                                'id' => 'TK-' . rand(1000, 9999),
                                'subject' => 'Issue with ' . ['login', 'course payment', 'video playback', 'certificate'][array_rand(['login', 'course', 'video', 'cert'])],
                                'user' => 'User ' . $i,
                                'status' => $status,
                                'priority' => $priority,
                                'created' => rand(1, 5) . ' days ago',
                                'reply' => rand(1, 24) . ' hours ago'
                            ];
                        }
                        @endphp
                        
                        @foreach($tickets as $ticket)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-0 text-white"><a href="{{ url('admin/support/'.$ticket['id']) }}" class="text-white text-decoration-none hover-primary">{{ $ticket['subject'] }}</a></h6>
                                    <small class="text-muted">{{ $ticket['id'] }}</small>
                                </div>
                            </td>
                            <td><small class="text-light">{{ $ticket['user'] }}</small></td>
                            <td>
                                <span class="badge bg-{{ $statusColors[$ticket['status']] }} bg-opacity-20 text-{{ $statusColors[$ticket['status']] }} px-2 py-1 rounded-pill" style="font-size: 0.7rem;">
                                    {{ ucfirst($ticket['status']) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $priorityColors[$ticket['priority']] }} px-2 py-1 rounded" style="font-size: 0.7rem;">
                                    {{ ucfirst($ticket['priority']) }}
                                </span>
                            </td>
                            <td><small class="text-muted">{{ $ticket['created'] }}</small></td>
                            <td><small class="text-muted">{{ $ticket['reply'] }}</small></td>
                            <td class="text-end pe-4">
                                <a href="{{ url('admin/support/'.$ticket['id']) }}" class="btn btn-sm btn-outline-info me-1"><i class="fas fa-eye"></i></a>
                                @if($ticket['status'] != 'closed')
                                <button class="btn btn-sm btn-outline-secondary" title="Close Ticket"><i class="fas fa-times"></i></button>
                                @endif
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
