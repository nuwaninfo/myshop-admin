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
    <h1>Categories</h1>
@endsection
