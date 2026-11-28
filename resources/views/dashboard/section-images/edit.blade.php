@extends('layouts.dashboard')

@section('title', $title)

@section('content')
    <div class="py-3 py-lg-4">
        <h4 class="page-title">{{ $title }}</h4>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            Please correct the errors below.
        </div>
    @endif

    <form action="{{ route('dashboard.section-images.update', $sectionImage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('dashboard.section-images.form', [
            'buttonText' => 'Update Image',
        ])
    </form>
@endsection
