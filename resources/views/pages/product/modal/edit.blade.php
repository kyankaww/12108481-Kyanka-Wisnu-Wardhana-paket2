<div class="modal fade" id="editProduct{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-block">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <p class="text-muted">{{ $item->name }}</p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/product/update" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Foto Produk</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <small><a href="{{ asset('product/' . $item->image) }}" target="_blank">Foto
                                        Lama</a></small>
                                <input type="hidden" name="image_old"
                                    value="{{ asset('public/product' . $item->image) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $item->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ $item->price }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stock">Stok</label>
                                <input type="text" class="form-control" id="stock" value="{{ $item->stock }}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
