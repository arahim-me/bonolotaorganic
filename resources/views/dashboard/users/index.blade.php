@extends('layouts.dashboard')

@section('title', 'Users Management')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">Users Management</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus me-1"></i> Add User
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-striped table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>Name & Avatar</th>
                            <th>Role</th>
                            <th>Username</th>
                            <th>Email & Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Joined Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="table-user">
                                    <a href="{{ route('users.show', $user->id) }}" class="text-body font-weight-semibold">
                                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                            alt="{{ $user->name }}" class="rounded-circle" width="32" height="32">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $user->role->name ?? '-' }}
                                </td>
                                <td>
                                    {{ $user->username ?? '-' }}
                                </td>
                                <td>
                                    @if ($user->email)
                                        <a href="mailto:{{ $user->email }}" class="text-muted"><i
                                                class="fa-solid fa-envelope me-1 text-primary"></i>{{ $user->email ?? '-' }}</a>
                                        <br>
                                    @endif
                                    @if ($user->phone)
                                        <a href="tel:{{ $user->phone }}" class="text-muted"><i
                                                class="fa-solid fa-phone me-1 text-primary"></i>{{ $user->phone ?? '-' }}</a>
                                    @endif
                                </td>
                                <td>
                                    {{ $user->address ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge bg-success"><i
                                            class="{{ $user->status->icon }} me-1"></i>{{ $user->status->name ?? '-' }}</span>
                                </td>
                                <td>
                                    {{ $user->created_at->format('M d, Y') }}
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="dropdown-item" href="{{ route('users.show', $user->id) }}"><i
                                                class="fa-solid fa-eye"></i></a><a class="dropdown-item"
                                            href="{{ route('users.edit', $user->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this user?');">
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
                                    <p class="text-muted">No users found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
