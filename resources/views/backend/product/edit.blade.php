@extends('backend.master')

@section('title', 'Edit Product')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1 mt-4">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4 text-center">Edit Product</h2>
                    <form action="{{route('admin.dashboard.update', $products->id)}}" method="POST" enctype="multipart/form-data">
                        @include('notify')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$products->title}}">

                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" value="{{$products->description}}">

                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value="{{$products->price}}">

                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <img src="{{asset('/')}}{{$products->image}}" alt="">
                            <input type="file" class="form-control" name="image" value="{{$products->image}}">

                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection