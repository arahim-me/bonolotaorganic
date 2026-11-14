
@extends('layouts.dashboard')

@section('title', 'Tags')

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Tags</h4>
            <p class="text-muted mb-0">Manage product tags.</p>
        </div>

        <a href="{{ route('dashboard.tags.create') }}"
           class="btn btn-primary">
            <i class="bx bx-plus"></i> Add Tag
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <form method="GET"
                  action="{{ route('dashboard.tags.index') }}"
                  class="row g-2 mb-3">

                <div class="col-md-5">
                    <input type="search"
                           name="search"
                           class="form-control"
                           placeholder="Search tag..."
                           value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="1"
                            @selected(request('status') === '1')>
                            Active
                        </option>
                        <option value="0"
                            @selected(request('status') === '0')>
                            Inactive
                        </option>
                    </select>
                </div>

                <div class="col-md-4">
                    <button class="btn btn-primary">
                        <i class="bx bx-search"></i> Filter
                    </button>

                    <a href="{{ route('dashboard.tags.index') }}"
                       class="btn btn-secondary">
                        Reset
                    </a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($tags as $tag)
                        <tr>
                            <td>{{ $tags->firstItem() + $loop->index }}</td>

                            <td>
                                <strong>{{ $tag->name }}</strong>
                            </td>

                            <td>{{ $tag->slug }}</td>

                            <td>
                                <span class="badge bg-info">
                                    {{ $tag->products_count }}
                                </span>
                            </td>

                            <td>
                                @if($tag->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td>{{ $tag->created_at->format('d M Y') }}</td>

                            <td class="text-end">
                                <a href="{{ route('dashboard.tags.show', $tag) }}"
                                   class="btn btn-sm btn-info">
                                    <i class="bx bx-show"></i>
                                </a>

                                <a href="{{ route('dashboard.tags.edit', $tag) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit"></i>
                                </a>

                                <form action="{{ route('dashboard.tags.destroy', $tag) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this tag?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                No tags found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{ $tags->links() }}

        </div>
    </div>
</div>
@endsection
