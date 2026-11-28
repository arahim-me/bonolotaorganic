@extends('layouts.dashboard')

@section('title', $title ?? 'Section Image Details')

@section('content')
    <div class="py-3 py-lg-4">

        {{-- Page Header --}}
        <div class="row align-items-center mb-4">
            <div class="col">
                <h4 class="page-title mb-0">
                    {{ $title ?? 'Section Image Details' }}
                </h4>
            </div>

            <div class="col-auto">
                <a href="{{ route('dashboard.section-images.index') }}" class="btn btn-light">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>

                <a href="{{ route('dashboard.section-images.edit', $sectionImage->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
            </div>
        </div>

        <div class="row">

            {{-- Image Preview --}}
            <div class="col-lg-5 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Image Preview</h5>
                    </div>

                    <div class="card-body text-center">
                        @if ($sectionImage->image)
                            <img src="{{ asset('uploads/section-images/' . $sectionImage->image) }}"
                                alt="{{ $sectionImage->title }}" class="img-fluid rounded"
                                style="max-height: 350px; object-fit: contain;">
                        @else
                            <div class="bg-light rounded p-5">
                                <i class="fas fa-image fa-3x text-muted"></i>
                                <p class="mt-2 mb-0">No image available</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Section Image Information --}}
            <div class="col-lg-7 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Section Image Information</h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0">

                            <tr>
                                <th width="35%">ID</th>
                                <td>{{ $sectionImage->id }}</td>
                            </tr>

                            <tr>
                                <th>Section</th>
                                <td>
                                    {{ $sectionImage->section?->title ?? 'N/A' }}
                                </td>
                            </tr>

                            <tr>
                                <th>Title</th>
                                <td>{{ $sectionImage->title ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th>Slug</th>
                                <td>{{ $sectionImage->slug ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th>Sub Title</th>
                                <td>{{ $sectionImage->sub_title ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th>Description</th>
                                <td>
                                    {!! nl2br(e($sectionImage->description ?? 'N/A')) !!}
                                </td>
                            </tr>

                            <tr>
                                <th>Button Text</th>
                                <td>{{ $sectionImage->button ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th>Return URL</th>
                                <td>
                                    @if ($sectionImage->return_url)
                                        <a href="{{ $sectionImage->return_url }}" target="_blank"
                                            rel="noopener noreferrer">
                                            {{ $sectionImage->return_url }}
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Published Status</th>
                                <td>
                                    @if ($sectionImage->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-danger">Unpublished</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Created At</th>
                                <td>
                                    {{ $sectionImage->created_at?->format('d M Y, h:i A') }}
                                </td>
                            </tr>

                            <tr>
                                <th>Updated At</th>
                                <td>
                                    {{ $sectionImage->updated_at?->format('d M Y, h:i A') }}
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
