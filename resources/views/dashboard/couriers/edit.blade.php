@extends('layouts.dashboard')
@section('title', $title ?? 'Edit ' . $courier->name)
@section('content')
    <div class="card my-3">

        <div class="card-header">
            <h5 class="mb-0">Edit {{ $courier->name }} Configuration</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('dashboard.couriers.update', $courier->id) }}" method="POST">

                @csrf
                @method('PUT')

                @include($form)

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

            </form>

        </div>

    </div>
@endsection
