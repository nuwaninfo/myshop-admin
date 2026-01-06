@extends('layouts.app')
@section('header')
    <div class="breadcrumb-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house"></i></a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('categories.index') }}">
                                    Categories
                                </a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">create</a></li>
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
    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="mt-5 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter category name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"
                                        placeholder="Enter category description"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Create Category</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
