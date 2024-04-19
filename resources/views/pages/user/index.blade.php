@extends('layouts.app')

@section('title', 'User')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>User</h1>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUser">
                    Tambah User
                </button>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editUser{{$item->id}}">
                                            Edit
                                        </button>
                                        <a href="/user/delete/{{$item->id}}" class="btn btn-danger">Hapus</a>
                                    </td>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @foreach ($users as $item)
    @include('pages.user.modal.edit')
    @endforeach
    @include('pages.user.modal.create')
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
