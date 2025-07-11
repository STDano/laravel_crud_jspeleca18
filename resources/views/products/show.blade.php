@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Product Information</span>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <label for="code" class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Code:</strong>
                    </label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $product->code }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Name:</strong>
                    </label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $product->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Quantity:</strong>
                    </label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $product->quantity }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Price:</strong>
                    </label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $product->price }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Description:</strong>
                    </label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $product->description }}
                    </div>
                </div>

                @if ($product->image)
                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end text-start">Image</label>
                    <div class="col-md-6">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-height: 250px">
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
