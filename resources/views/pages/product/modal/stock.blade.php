<div class="modal fade" id="stockProduct{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-block">
                    <h5 class="modal-title" id="exampleModalLabel">Stock</h5>
                    <p class="text-muted">{{ $item->name }}</p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/product/stock" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="{{$item->id}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Nama Produk</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" disabled>
                        </div>
                        <div class="col-6">
                            <label for="price">Harga Produk</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{$item->price}}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 offset-3 my-3">
                            <label for="stock">Stok Produk</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
