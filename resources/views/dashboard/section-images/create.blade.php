@extends('layouts.dashboard')

@section('title', $title)

@section('content')
    <div class="py-3 py-lg-4">
        <h4 class="page-title">{{ $title }}</h4>
    </div>

    @if ($errors->any())
        <ul>
            @foreach ($errors as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('dashboard.section-images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('dashboard.section-images.form', [
            'buttonText' => 'Create Image',
        ])
    </form>
@endsection
