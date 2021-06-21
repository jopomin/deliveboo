@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1 class="sect_main_title">Modifica Categoria</h1>
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
            <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>{{$category->name}}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="" value="{{ $category->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    @if($category->image)
                    <?php $array_string = explode('.', $category->image); $first_word = $array_string[0];?>
                        <img class="img-thumbnail" style="height:200px" src="{{ $first_word == $category->slug ? asset('img/categories/' . $category->image) : asset('storage/' . $category->image) }}" alt="">
                    @else
                        <p>Immagine non presente</p>
                        <label for="image">Immagine copertina</label>
                    @endif
                    <input type="file" name="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <button type="submit" class="boo_btn btn_form create_btn">
                        <i class="far fa-save"></i> Aggiorna Categoria
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection