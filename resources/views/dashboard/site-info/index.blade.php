@extends('layouts.dashboard')

@section('title', $title ?? 'Site Information')

@section('content')
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title mb-0">{{ $title ?? 'Site Information' }}</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    @if ($siteInfo)
                        <a href="{{ route('site-info.edit', $siteInfo->id) }}" class="btn btn-primary">
                            <i class="bx bx-edit"></i> Edit Site Info
                        </a>
                    @else
                        <a href="{{ route('site-info.create') }}" class="btn btn-primary">
                            <i class="bx bx-plus"></i> Add Site Info
                        </a>
                    @endif
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
        <div class="card-body">
            @if ($siteInfo)

                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="border rounded p-3 h-100">
                                <div class="mb-3">
                                    <h6 class="text-muted mb-2">Logo</h6>
                                    <img src="{{ asset('uploads/site-info') }}/{{ $siteInfo->logo ?? 'default.png' }}" alt="Site logo"
                                        class="img-fluid rounded" style="max-height: 90px;">
                                </div>
                                <div>
                                    <h6 class="text-muted mb-2">Favicon</h6>
                                    <img src="{{ asset('uploads/site-info') }}/{{ $siteInfo->favicon ?? 'default.png' }}"
                                        alt="Site favicon" class="img-fluid rounded" style="max-height: 48px;">
                                </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted">Store Name</label>
                                <p class="mb-0 fw-semibold">{{ $siteInfo->name ?: '—' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Email</label>
                                <div>
                                    @forelse ($siteInfo->email ?? [] as $email)
                                        <p class="mb-1">{{ $email }}</p>
                                    @empty
                                        <p class="mb-0 text-muted">No email added</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Phone</label>
                                <div>
                                    @forelse ($siteInfo->phone ?? [] as $phone)
                                        <p class="mb-1">{{ $phone }}</p>
                                    @empty
                                        <p class="mb-0 text-muted">No phone number added</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted">Social Links</label>
                                <div>
                                    @forelse ($siteInfo->socials ?? [] as $social)
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            @if (!empty($social['icon']))
                                                <i class="{{ $social['icon'] }}"></i>
                                            @endif
                                            <div>
                                                <div class="fw-semibold">{{ $social['name'] ?? 'Social link' }}</div>
                                                <small class="text-muted">{{ $social['url'] ?? '-' }}</small>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="mb-0 text-muted">No social links added</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted">Address</label>
                                <div>
                                    @forelse ($siteInfo->address ?? [] as $address)
                                        <p class="mb-1">{{ $address }}</p>
                                    @empty
                                        <p class="mb-0 text-muted">No address added</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bx bx-info-circle display-4 text-muted"></i>
                    <h5 class="mt-3">No site information has been created yet.</h5>
                    <p class="text-muted">Add your storefront name, contact details, and branding assets.</p>
                    <a href="{{ route('site-info.create') }}" class="btn btn-primary mt-2">
                        <i class="bx bx-plus"></i> Create Site Information
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
