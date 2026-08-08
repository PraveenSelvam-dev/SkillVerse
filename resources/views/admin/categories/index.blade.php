@extends('layouts.dashboard')

@section('title', 'Manage Categories')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-white">Categories</h1>
            <p class="text-muted mb-0">Organize courses, blogs, and content.</p>
        </div>
        <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal"><i class="fas fa-plus me-2"></i>Create Category</button>
        </div>
    </div>

    <div class="card bg-darker border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead class="text-muted small">
                        <tr>
                            <th class="ps-4">Category</th>
                            <th>Slug</th>
                            <th>Parent</th>
                            <th>Courses Count</th>
                            <th>Position</th>
                            <th>Active</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $parents = ['None', 'Programming', 'Design', 'Business'];
                        $categories = [
                            ['icon' => 'fa-code', 'name' => 'Programming', 'slug' => 'programming', 'parent' => 'None', 'count' => 145, 'pos' => 1, 'active' => true],
                            ['icon' => 'fa-laptop-code', 'name' => 'Web Development', 'slug' => 'web-development', 'parent' => 'Programming', 'count' => 85, 'pos' => 1, 'active' => true],
                            ['icon' => 'fa-mobile-alt', 'name' => 'Mobile Apps', 'slug' => 'mobile-apps', 'parent' => 'Programming', 'count' => 42, 'pos' => 2, 'active' => true],
                            ['icon' => 'fa-paint-brush', 'name' => 'Design', 'slug' => 'design', 'parent' => 'None', 'count' => 98, 'pos' => 2, 'active' => true],
                            ['icon' => 'fa-pen-nib', 'name' => 'UI/UX Design', 'slug' => 'ui-ux-design', 'parent' => 'Design', 'count' => 56, 'pos' => 1, 'active' => true],
                            ['icon' => 'fa-briefcase', 'name' => 'Business', 'slug' => 'business', 'parent' => 'None', 'count' => 74, 'pos' => 3, 'active' => true],
                            ['icon' => 'fa-chart-line', 'name' => 'Marketing', 'slug' => 'marketing', 'parent' => 'Business', 'count' => 38, 'pos' => 1, 'active' => true],
                            ['icon' => 'fa-robot', 'name' => 'Artificial Intelligence', 'slug' => 'artificial-intelligence', 'parent' => 'Programming', 'count' => 31, 'pos' => 3, 'active' => true],
                            ['icon' => 'fa-cloud', 'name' => 'Cloud Computing', 'slug' => 'cloud-computing', 'parent' => 'Programming', 'count' => 25, 'pos' => 4, 'active' => true],
                            ['icon' => 'fa-camera', 'name' => 'Photography', 'slug' => 'photography', 'parent' => 'None', 'count' => 12, 'pos' => 4, 'active' => false],
                        ];
                        @endphp
                        
                        @foreach($categories as $cat)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="icon-shape bg-primary bg-opacity-10 text-primary rounded me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas {{ $cat['icon'] }}"></i>
                                    </div>
                                    <h6 class="mb-0 text-white fw-bold">{{ $cat['name'] }}</h6>
                                </div>
                            </td>
                            <td><small class="text-muted">{{ $cat['slug'] }}</small></td>
                            <td>
                                @if($cat['parent'] == 'None')
                                    <span class="badge bg-secondary bg-opacity-20 text-secondary">None</span>
                                @else
                                    <small class="text-light">{{ $cat['parent'] }}</small>
                                @endif
                            </td>
                            <td><span class="badge bg-info bg-opacity-20 text-info">{{ $cat['count'] }}</span></td>
                            <td><small class="text-muted">{{ $cat['pos'] }}</small></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" {{ $cat['active'] ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-icon btn-outline-info border-0 me-1" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-icon btn-outline-danger border-0" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Category Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-darker border-secondary">
            <div class="modal-header border-secondary">
                <h5 class="modal-title text-white">Create New Category</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label text-light">Name</label>
                        <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="e.g. Data Science">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light">Slug</label>
                        <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="e.g. data-science">
                        <small class="text-muted">Leave blank to auto-generate from name.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light">Parent Category</label>
                        <select class="form-select bg-dark border-secondary text-white">
                            <option value="">None (Top Level)</option>
                            <option value="1">Programming</option>
                            <option value="2">Design</option>
                            <option value="3">Business</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light">Icon Class (FontAwesome)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark border-secondary text-muted"><i class="fas fa-font"></i></span>
                            <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="e.g. fa-database">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label text-light">Position</label>
                            <input type="number" class="form-control bg-dark border-secondary text-white" value="0">
                        </div>
                        <div class="col-6 mb-3 d-flex align-items-end pb-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="activeToggle" checked>
                                <label class="form-check-label text-white ms-2" for="activeToggle">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light">Description</label>
                        <textarea class="form-control bg-dark border-secondary text-white" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-secondary">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Category</button>
            </div>
        </div>
    </div>
</div>
@endsection
