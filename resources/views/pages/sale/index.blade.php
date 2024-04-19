@extends('layouts.app')

@section('title', 'Sale')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>Penjualan</h1>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createSale">
                    Tambah Penjualan
                </button>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Total Harga</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($sales as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->customer->name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>Rp. {{ number_format($item->totalPrice,2,',','.') }}</td>
                                    <td>
                                        <a href="/sale/detail/{{$item->id}}" class="btn btn-warning">Detail</a>
                                        <a href="/invoice/{{$item->id}}" class="btn btn-success">Print</a>
                                    </td>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('pages.sale.modal.create')
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
