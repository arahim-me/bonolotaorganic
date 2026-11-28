@extends('layouts.dashboard')

@section('title', $title ?? 'Section Images')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col">
                <h4 class="page-title mb-0">{{ $title }}</h4>
            </div>
            <div class="col-auto">
                <a href="{{ route('dashboard.section-images.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add New Image
                </a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Section</th>
                            <th>Status</th>
                            <th width="130">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sectionImages as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset('uploads/section-images/' . $item->image ?? 'default.png') }}"
                                            width="100" height="55" class="rounded border" style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item->title ?? 'N/A' }}</strong>
                                    <div class="small text-muted">
                                        {{ $item->sub_title }}
                                    </div>
                                </td>
                                <td>{{ $item->section?->name ?? 'N/A' }}</td>
                                <td>
                                    <form
                                        action="{{ route('dashboard.section-images.toggle-published', $item->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                            class="btn btn-sm {{ $item->is_published ? 'btn-success' : 'btn-secondary' }}">
                                            {{ $item->is_published ? 'Published' : 'Unpublished' }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('dashboard.section-images.edit', $item->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>

                                        <form action="{{ route('dashboard.section-images.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this image?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    No section images found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $sectionImages->links() }}
            </div>
        </div>
    </div>
@endsection
