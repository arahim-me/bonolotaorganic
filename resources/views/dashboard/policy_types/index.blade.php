@extends('layouts.dashboard')

@section('title', $title ?? 'Policy Types Management')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="page-title mb-0">{{ $title ?? 'Policy Types Management' }}</h4>
            </div>
            <div class="col">
                <div class="float-end d-sm-block">
                    <a href="{{ route('policy-types.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Add Policy
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        {{-- <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-striped table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Policy Type</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Publish</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($policy_types as $policy_type)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $policy_type->name ?? 'Untitled policy type' }}</strong>
                                </td>
                                <td>{{ $policy_type->slug ?? '-' }}</td>
                                <td>{{ $policy_type->description ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('policy-types.toggle-status', $policy_type->id) }}"
                                        class="text-decoration-none">
                                        <button type="button" class="btn btn-sm"
                                            style="background-color: {{ $policy_type->is_published ? '#00d084' : '#e74c3c' }}; color: white; border: none;">
                                            <i class="{{ $policy_type->status->icon ?? 'bx bx-circle' }} me-1"></i>
                                            <span>{{ $policy_type->is_published ? 'Published' : 'Draft' }}</span>
                                        </button>
                                    </a>
                                </td>
                                <td width="100px">
                                    <div class="d-flex gap-2">
                                        <a class="dropdown-item"
                                            href="{{ route('policy-types.show', $policy_type->id) }}"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a class="dropdown-item"
                                            href="{{ route('policy-types.edit', $policy_type->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('policy-types.destroy', $policy_type->id) }}" method="POST"
                                            class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this policy type?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <p class="text-muted">No Policy Type found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> --}}
        <div class="card-body">
            {{-- <h4 class="header-title">{{$title}}</h4>
            <p class="sub-header">
                You can also invert the colors—with light text on dark backgrounds—with <code
                    class="highlighter-rouge">.table-dark</code>.
            </p> --}}

            <div class="table-responsive">
                <table class="table table-dark mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Policy Type</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Policy count</th>
                            <th>Publish</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($policyTypes as $policyType)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $policyType->name ?? 'Untitled policy type' }}</strong>
                                </td>
                                <td>{{ $policyType->slug ?? '-' }}</td>
                                <td>{{ $policyType->description ?? '-' }}</td>
                                <td>{{ $policyType->policies()->count() ?? 0 }}</td>
                                <td>
                                    <a href="{{ route('policy-types.toggle-status', $policyType->id) }}"
                                        class="text-decoration-none">
                                        <button type="button" class="btn btn-sm"
                                            style="background-color: {{ $policyType->is_published ? '#00d084' : '#e74c3c' }}; color: white; border: none;">
                                            <i class="{{ $policyType->is_published ? 'bx bx-check' : 'bx bx-x' }} me-1"></i>
                                            {{-- <span>{{ $policyType->is_published ? 'Published' : 'Draft' }}</span> --}}
                                        </button>
                                    </a>
                                </td>
                                <td width="100px">
                                    <div class="d-flex gap-2">
                                        <a class="dropdown-item"
                                            href="{{ route('policy-types.show', $policyType->id) }}"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a class="dropdown-item"
                                            href="{{ route('policy-types.edit', $policyType->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('policy-types.destroy', $policyType->id) }}" method="POST"
                                            class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this policy type?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
