@extends('dashboard.layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h5>Add Courier</h5>
    </div>

    <div class="card-body">

        @if (!isset($slug))

            <form action="{{ route('dashboard.couriers.selectForm') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Select Courier *</label>

                    <select name="slug" class="form-select" required>
                        <option value="">Choose Courier</option>
                        <option value="pathao">Pathao</option>
                        <option value="steadfast">Steadfast</option>
                        <option value="redx">RedX</option>
                    </select>
                </div>

                <button class="btn btn-primary">Continue</button>
            </form>

        @else

            <form action="{{ route('dashboard.couriers.store') }}" method="POST">
                @csrf

                <input type="hidden" name="slug" value="{{ $slug }}">

                @include('dashboard.couriers.forms.' . $slug . '_form')

            </form>

        @endif

    </div>
</div>

@endsection
