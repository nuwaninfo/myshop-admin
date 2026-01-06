@extends('layouts.app')
@section('header')
    <div class="breadcrumb-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house"></i></a></li>
                            <li class="breadcrumb-item active"><a href="#">Categories</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-4 text-end"><a href="{{ route('categories.create') }}" class="btn btn-light">Add new</a>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('content')
   <div class="card">
    <div class="py-5 table-responsiv">
        <table class="table mb-0 datatable table-hover text-md-nowrap">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection
