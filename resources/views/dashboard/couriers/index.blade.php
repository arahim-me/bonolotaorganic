@extends('layouts.dashboard')
@section('title', $title ?? 'Courier Services Management')
@section('content')
    <div class="container-fluid py-3">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">{{ $title ?? 'Courier Services Management' }}</h4>
                <p class="text-muted mb-0">Manage courier services and API credentials.</p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="mb-0">Courier List</h6>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Courier</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($couriers as $courier)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <strong>{{ $courier->name }}</strong>
                                    </td>

                                    <td>
                                        <span class="badge bg-light text-dark">
                                            {{ $courier->slug }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($courier->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex gap-1">

                                            <a href="{{ route('dashboard.couriers.show', $courier) }}"
                                                class="btn btn-sm btn-info text-white" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="{{ route('dashboard.couriers.edit', $courier) }}"
                                                class="btn btn-sm btn-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        No courier found.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
