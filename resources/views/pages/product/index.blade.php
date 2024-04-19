@extends('layouts.app')

@section('title', 'Product')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>Product</h1>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createProduct">
                    Tambah Produk
                </button>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="/search" method="GET">
                            <div class="col-5 d-flex mb-3">
                                <input type="text" name="name_product" class="form-control form-control-sm  mx-5">
                                <button class="btn btn-sm btn-primary">Cari</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>Rp. {{ number_format($item->price, 2, ',', '.') }}</td>
                                            <td>{{ $item->stock }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editProduct{{ $item->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#stockProduct{{ $item->id }}">
                                                    Stok
                                                </button>
                                                <a href="/product/delete/{{ $item->id }}"
                                                    class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @foreach ($products as $item)
        @include('pages.product.modal.edit')
        @include('pages.product.modal.stock')
    @endforeach
    @include('pages.product.modal.create')
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
