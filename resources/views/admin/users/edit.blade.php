@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1 class="sect_main_title">Modifica Utente</h1>
            <a class="boo_btn back_btn" href="{{route('admin.users.index')}}">Torna indietro</a>
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
            <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nome ristorante</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="" value="{{ $user->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nome referente</label>
                    <input type="text" name="reference_name" class="form-control @error('name') is-invalid @enderror" placeholder="" value="{{ $user->reference_name }}" required>
                    @error('reference_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Indirizzo</label>
                    <input type="text" name="address" class="form-control @error('name') is-invalid @enderror" placeholder="" value="{{ $user->address }}" required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control @error('name') is-invalid @enderror" placeholder="" value="{{ $user->email }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>P. IVA</label>
                    <input type="text" name="vat_number" class="form-control @error('name') is-invalid @enderror" placeholder="" value="{{ $user->vat_number }}" required>
                    @error('vat_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    @if($user->image)
                        <img class="img-thumbnail" style="height:200px" src="" alt="">
                    @else
                        <p>Immagine non presente</p>
                        <label for="image">Immagine copertina</label>
                    @endif
                    <input type="file" name="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <button type="submit" class="boo_btn btn_form create_btn">
                        <i class="far fa-save"></i> Aggiorna Utente
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection