<div class="row g-3">

    <div class="col-md-6">
        <label class="form-label">Client ID *</label>
        <input type="text" name="client_id" class="form-control" placeholder="Client ID"
            value="{{ old('client_id', $courier->client_id ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Client Secret *</label>
        <input type="password" name="client_secret" class="form-control" placeholder="Client Secret"
            autocomplete="new-password">
    </div>

    <div class="col-md-6">
        <label class="form-label">Username *</label>
        <input type="text" name="username" class="form-control" placeholder="Email/username"
            value="{{ old('username', $courier->username ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Password *</label>
        <input type="password" name="password" class="form-control" placeholder="password" autocomplete="new-password">
    </div>

    <div class="col-md-6">
        <label class="form-label">Store ID *</label>
        <input type="text" name="store_id" class="form-control" placeholder="Store ID"
            value="{{ old('store_id', $courier->store_id ?? '') }}" required>
    </div>

</div>
