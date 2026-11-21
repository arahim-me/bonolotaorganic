@csrf

@if (isset($courier))
    @method('PUT')
@endif

<div class="row g-3">

    <div class="col-md-6">
        <label class="form-label">Courier Name *</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $courier->name ?? '') }}" placeholder="Steadfast" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Slug *</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
            value="{{ old('slug', $courier->slug ?? '') }}" placeholder="steadfast" required>
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <hr>
        <h6 class="fw-bold">API Credentials</h6>
    </div>

    @foreach ([
        'api_key' => 'API Key',
        'secret_key' => 'Secret Key',
        'client_id' => 'Client ID',
        'client_secret' => 'Client Secret',
        'username' => 'Username',
        'password' => 'Password',
    ] as $field => $label)
        <div class="col-md-6">
            <label class="form-label">{{ $label }}</label>
            <input type="password" name="{{ $field }}" class="form-control" value="{{ old($field) }}"
                placeholder="{{ isset($courier) ? 'Leave blank to keep existing' : 'Enter ' . $label }}">
        </div>
    @endforeach

    <div class="col-md-6">
        <label class="form-label">Base URL</label>
        <input type="url" name="base_url" class="form-control"
            value="{{ old('base_url', $courier->base_url ?? '') }}" placeholder="https://portal.packzy.com/api/v1">
        @error('base_url')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Store ID</label>
        <input type="text" name="store_id" class="form-control"
            value="{{ old('store_id', $courier->store_id ?? '') }}" placeholder="Store ID">
    </div>

    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control" placeholder="Courier description">{{ old('description', $courier->description ?? '') }}</textarea>
    </div>

    <div class="col-md-6">
        <div class="form-check form-switch">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active"
                @checked(old('is_active', $courier->is_active ?? false))>
            <label class="form-check-label" for="is_active">
                Active Courier
            </label>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-check form-switch">
            <input type="checkbox" name="is_test_mode" value="1" class="form-check-input" id="is_test_mode"
                @checked(old('is_test_mode', $courier->is_test_mode ?? false))>
            <label class="form-check-label" for="is_test_mode">
                Test Mode
            </label>
        </div>
    </div>

    <div class="col-12">
        <hr>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i>
            {{ isset($courier) ? 'Update Courier' : 'Save Courier' }}
        </button>

        <a href="{{ route('dashboard.couriers.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>

</div>
