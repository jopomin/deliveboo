@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1>Create a new category</h1>
            <a href="{{route('admin.categories.index')}}">All categories</a>
        </div>
        <div class="bottom_content">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>New category</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Insert new category" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="far fa-save"></i> Save category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('sweetalert::alert')

@endsection