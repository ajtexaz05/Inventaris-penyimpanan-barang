@extends('layouts.main')   

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Ubah Produk/Barang</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/products">Produk</a></li>
              <li class="breadcrumb-item active">Ubah Produk</li>
            </ol>
          </div>
        </div> 
@endsection

@section('content')
    <div class="row">
      <div class="col">

        {{-- Pesan validasi --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>       
        @endif --}}

        <form action="/products/{{ $product->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" class="form-control @error('name') is-invalid  @enderror" id="name" placeholder="Masukan Nama Produk" name="name" value="{{ old('name', $product->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid  @enderror" >{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control @error('sku') is-invalid  @enderror" id="sku" placeholder="Masukan SKU" name="sku" value="{{ old('sku', $product->sku) }}">
                        @error('sku')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" inputmode="numeric" class="form-control @error('price') is-invalid  @enderror" id="price" placeholder="Masukan Harga" name="price" value="{{ old('price', $product->price) }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="number" class="form-control @error('stock') is-invalid  @enderror" id="stock" placeholder="Masukan Stok" name="stock" value="{{ old('stock', $product->stock) }}">
                        @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid  @enderror">
                           @foreach ($categories as $category)
                               <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                           @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <a href="/products" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
@endsection
        


