@extends('layouts.dashboard')
@section('title', $title ?? 'Create Shipping Fee ' . $shippingFee->title)

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>{{ $title ?? 'Create Shipping Fee ' . $shippingFee->title }}</h5>

                <a href="{{ route('shipping-fees.index') }}" class="btn btn-secondary btn-sm">
                    Back
                </a>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="25%">Title</th>
                        <td>{{ $shippingFee->title }}</td>
                    </tr>

                    <tr>
                        <th>Slug</th>
                        <td>{{ $shippingFee->slug }}</td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>{{ $shippingFee->description ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Fee</th>
                        <td>৳{{ number_format($shippingFee->fee, 2) }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            {{ $shippingFee->is_published ? 'Published' : 'Unpublished' }}
                        </td>
                    </tr>

                    <tr>
                        <th>Created At</th>
                        <td>{{ $shippingFee->created_at->format('d M, Y h:i A') }}</td>
                    </tr>

                </table>

            </div>
        </div>

    </div>
@endsection
