@extends('layouts.main')   

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Kategori</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/products">Kategori</a></li>
              <li class="breadcrumb-item active">Edit Kategori</li>
            </ol>
          </div>
        </div> 
@endsection

@section('content')
    @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: '@foreach($errors->all() as $error) {{ $error }} @endforeach',
                });
            </script> 
        @endif
    <div class="row">
      <div class="col">

        <form action="/categories/{{ $category->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" class="form-control @error('name') is-invalid  @enderror" id="name" placeholder="Masukan Nama Produk" name="name" value="{{ old('name', $category->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <a href="/products" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning ml-auto">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
@endsection
        


