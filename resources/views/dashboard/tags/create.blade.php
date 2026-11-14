@extends('layouts.dashboard')

@section('title', 'Create Tag')

@section('content')
<div class="container-fluid py-3">

    <div class="d-flex justify-content-between mb-4">
        <h4>Create Tag</h4>

        <a href="{{ route('dashboard.tags.index') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('dashboard.tags.store') }}"
                  method="POST">

                @csrf

                @include('dashboard.tags._form')

                <button type="submit" class="btn btn-primary">
                    Save Tag
                </button>

            </form>

        </div>
    </div>
</div>
@endsection
