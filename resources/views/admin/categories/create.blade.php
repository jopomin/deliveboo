@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1 class="sect_main_title">Inserisci Categoria</h1>
            <a class="boo_btn back_btn" href="{{route('admin.categories.index')}}">Tutte le Categorie</a>
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
                    {{-- <label>New category</label> --}}
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci una nuova categoria" value="" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="boo_btn btn_form create_btn">
                        <i class="far fa-save"></i>Salva Categoria
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection