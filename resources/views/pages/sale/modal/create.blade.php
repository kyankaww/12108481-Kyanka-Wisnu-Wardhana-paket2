<div class="modal fade" id="createSale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/sale/store" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Nomor Handphone</label>
                                <input type="number" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Alamat <code>optional</code></label>
                                <input type="number" class="form-control" id="address" name="address">
                            </div>
                        </div>
                    </div>
                    <center>
                        <h3 class="my-3">Pilih Produk</h3>
                    </center>
                    <div class="row">
                        @foreach ($products as $item)
                            <div class="col-4">
                                <div class="card shadow">
                                    <img src="{{ asset('product/' . $item->image) }}" alt="" class="img-fluid"
                                        style="height: 200px">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <p>Rp. {{ number_format($item->price) }}</p>
                                        <div>
                                            <div class="d-flex justify-content-between mx-4 mb-2">
                                                <span class="btn btn-primary decrease"
                                                    data-id="{{ $item->id }}">-</span>
                                                <span class="mt-1" id="qty-{{ $item->id }}">0</span>
                                                <input name="qty[{{ $item->id }}]" class="d-none"
                                                    id="qtyx-{{ $item->id }}" />
                                                <span class="btn btn-primary increase"
                                                    data-id="{{ $item->id }}">+</span>
                                            </div>
                                        </div>
                                        <div>
                                            <input class="d-none" id="pricex-{{ $item->id }}"
                                                value="{{ $item->price }}">
                                            Rp. <span id="totalPrice-{{ $item->id }}" class="totalPriceMe">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div class="left">
                        <h3>Total Harga: Rp. <span id="priceTotalll">0</span></h3>
                    </div>
                    <div class="right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
