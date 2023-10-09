@extends('backend.master')

@section('title', 'Manage Products')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-sm-12 col-xl-12 mt-4">
                    <div class="bg-light rounded h-100 p-4">
                        <h2 class="mb-4">Manage Products</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->image}}</td>
                                        <td>{{$product->status== 1 ? 'Active' : 'Inactive'}}</td>
                                        <td>
                                            <a href="{{route('admin.dashboard.edit', ['id' => $product->id])}}" class="btn text-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="{{route('admin.dashboard.delete', ['id' => $product->id])}}" class="btn text-primary">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection