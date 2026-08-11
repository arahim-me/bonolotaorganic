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
                    <a href="{{ route('site-info.index') }}" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Store Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ $siteInfo->exists ? route('site-info.update', $siteInfo->id) : route('site-info.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($siteInfo->exists)
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">Store Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $siteInfo->name) }}">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                                @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                @if ($siteInfo->logo)
                                    <small class="text-muted d-block mt-2">Current file: {{ $siteInfo->logo }}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="favicon" class="form-label">Favicon</label>
                                <input type="file" class="form-control @error('favicon') is-invalid @enderror" id="favicon" name="favicon">
                                @error('favicon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                @if ($siteInfo->favicon)
                                    <small class="text-muted d-block mt-2">Current file: {{ $siteInfo->favicon }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email</label>
                            <textarea class="form-control @error('email') is-invalid @enderror" id="email" name="email" rows="3">{{ old('email', is_array($siteInfo->email) ? implode(PHP_EOL, $siteInfo->email) : $siteInfo->email) }}</textarea>
                            <small class="text-muted">Enter one email per line.</small>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Numbers</label>
                            <textarea class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" rows="3">{{ old('phone', is_array($siteInfo->phone) ? implode(PHP_EOL, $siteInfo->phone) : $siteInfo->phone) }}</textarea>
                            <small class="text-muted">Enter one phone number per line.</small>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Social Links</label>
                            <div id="social-links-list" class="d-flex flex-column gap-2">
                                @php
                                    $socials = old('socials', $siteInfo->socials ?? []);
                                    if (! is_array($socials)) {
                                        $socials = [];
                                    }
                                @endphp

                                @foreach ($socials as $index => $social)
                                    <div class="row g-2 align-items-end social-link-row">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="socials[{{ $index }}][name]" placeholder="Name" value="{{ $social['name'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="socials[{{ $index }}][url]" placeholder="https://example.com" value="{{ $social['url'] ?? '' }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="socials[{{ $index }}][icon]" placeholder="bx bx-facebook" value="{{ $social['icon'] ?? '' }}">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-outline-danger btn-sm remove-social-link">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-social-link">Add Social Link</button>
                            @error('socials')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="4">{{ old('address', is_array($siteInfo->address) ? implode(PHP_EOL, $siteInfo->address) : $siteInfo->address) }}</textarea>
                            <small class="text-muted">Enter one address line per line.</small>
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-check"></i> {{ $siteInfo->exists ? 'Update Information' : 'Save Information' }}
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="bx bx-refresh"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const list = document.getElementById('social-links-list');
                const addButton = document.getElementById('add-social-link');

                if (!list || !addButton) {
                    return;
                }

                addButton.addEventListener('click', function () {
                    const rows = list.querySelectorAll('.social-link-row');
                    const nextIndex = rows.length;
                    const row = document.createElement('div');
                    row.className = 'row g-2 align-items-end social-link-row';
                    row.innerHTML = `
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="socials[${nextIndex}][name]" placeholder="Name">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="socials[${nextIndex}][url]" placeholder="https://example.com">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="socials[${nextIndex}][icon]" placeholder="bx bx-facebook">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-social-link">Remove</button>
                        </div>
                    `;
                    list.appendChild(row);
                });

                list.addEventListener('click', function (event) {
                    if (event.target.classList.contains('remove-social-link')) {
                        event.target.closest('.social-link-row').remove();
                    }
                });
            });
        </script>
    @endpush
@endsection
