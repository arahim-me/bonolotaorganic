@extends('layouts.dashboard')

@section('title', $title ?? 'Policy Types Management')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="page-title mb-0">
                    {{ $title ?? 'Policy Management of ' . ($policyType->name ?? 'Untitled Policy Type') }}</h4>
            </div>
            <div class="col">
                <div class="float-end d-sm-block">
                    <a href="{{ route('dashboard.policies.create', $policyType->id) }}" class="btn btn-primary">
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
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-dark mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($policies as $policy)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ $policy->title ?? 'Untitled policy' }}</strong>
                                    </td>
                                    <td>{{ $policy->description ?? '-' }}</td>
                                    <td width="100px">
                                        <div class="d-flex gap-2">
                                            <a class="dropdown-item"
                                                href="{{ route('policy-types.show', $policy->policy_type_id) }}"><i
                                                    class="fa-solid fa-eye"></i></a>
                                            <a class="dropdown-item"
                                                href="{{ route('policy-types.edit', $policy->policy_type_id) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('policy-types.destroy', $policy->policy_type_id) }}"
                                                method="POST" class="m-0"
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
    </div>
@endsection
