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
        <table class="table mb-0 datatable table-hover text-md-nowrap" id="categories-table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        @if ($category->status == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('categories.delete', $category->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this category?')">
                                Delete
                            </button>
                        </form>
                        @if ($category->status ==1) 
                        <a href="{{ route('categories.status', $category->id) }}" class="btn btn-sm btn-warning">Deactivate</a>
                        @else
                        <a href="{{ route('categories.status', $category->id) }}" class="btn btn-sm btn-success">Activate</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection
