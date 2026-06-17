@extends('layouts.dashboard')

@section('title', 'Facilities Management')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Facilities</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('facilities.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Add Facility
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-striped table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>Facility Name</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Capacity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($facilities as $facility)
                            <tr>
                                <td>
                                    <strong>{{ $facility->name ?? 'N/A' }}</strong>
                                </td>
                                <td>
                                    {{ $facility->type ?? '-' }}
                                </td>
                                <td>
                                    {{ $facility->location ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $facility->capacity ?? 0 }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('facilities.edit', $facility->id ?? '#') }}"><i class="mdi mdi-pencil"></i> Edit</a></li>
                                            <li>
                                                <form action="{{ route('facilities.destroy', $facility->id ?? '#') }}" method="POST" class="m-0" onsubmit="return confirm('Are you sure you want to delete this facility?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="mdi mdi-trash-can"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <p class="text-muted">No facilities found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
