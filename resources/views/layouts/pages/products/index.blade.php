@extends('layouts.main')   

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Produk/Barang</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div> 
@endsection

@section('content')
     @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            })
        </script>
    @endif
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header d-flex justify-content-end">
            <a href="/products/create" class="btn btn-primary">
              Tambah Barang
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Produk/Barang</th>
                  <th>Description</th>
                  <th>Sku</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                    <tr>
                      <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->index + 1 }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->description ?? '-' }}</td>
                      <td>{{ $product->sku }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->stock }}</td>
                      <td>{{ $product->category->name }}</td>
                      <td>
                        <div class="d-flex">
                          <a href="/products/edit/{{ $product->id }}" class="btn btn-warning mr-2">Ubah</a>
                          <form action="/products/{{ $product->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-target="#modal-delete-{{ $product->id }}" data-toggle="modal">
                              Hapus
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @include('layouts.pages.products.delete-confirmation')
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            {{ $products->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </div>
@endsection
        