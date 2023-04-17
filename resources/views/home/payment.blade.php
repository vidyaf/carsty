@extends('home.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h3>Pembelian</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row align-items-center">
                    <div class="col">
                        <h6>No Transaksi : {{ $transaction->no_transaction }}</h6>
                    </div>
                    <div class="col ">
                        <div class="row justify-content-end">
                            <div class="col-4">
                                <button
                                    class="btn rounded-4 @if ($transaction->status == 'PAID') btn-success @else btn-danger @endif">
                                    Status : {{ $transaction->status }}
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Lihat Pengiriman
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <h6>Detail Mobil :</h6>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <img src="{{ asset('storage/' . $transaction->car->image) }}" class="img-fluid rounded-4"
                    alt="{{ $transaction->car->image }}" width="100%">
            </div>
        </div>
        <hr>
        <div class="row row-cols-2 g-3 align-items-center mb-4">
            <div class="col">
                <h3 class="mb-3">{{ $transaction->car->name }}</h3>
                <h6 class="text-secondary">Kondisi : {{ $transaction->car->condition->name }}</h6>
                <h6 class="mb-3 text-secondary">
                    Kategori :
                    @if ($transaction->car->category_id != 0)
                        {{ $transaction->car->category->name }}
                    @endif
                </h6>
                <h6 class="text-secondary">Deskripsi</h6>
                {!! $transaction->car->description !!}
            </div>
            <div class="col">
                <h3 class="fw-bold text-center">Rp. {{ number_format($transaction->car->price, 2, ',', '.') }}</h3>
            </div>
        </div>
        @if ($transaction->status == 'NOT PAID')
            <hr>
            <div class="row align-items-center">
                <div class="col-6">
                    <h6 class="fw-bold">Transaksi:</h6>
                    <h6>No Rekening : 123456789</h6>
                    <p>*note : silahkan transfer sesuai jumlah dan kirim bukti trasfernya</p>
                </div>
                <div class="col-6">
                    <form action="{{ route('payment', $transaction->no_transaction) }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Bukti Transfer</label>
                            <input class="form-control" type="file" name="image" id="formFile">
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary fw-bold mb-3 rounded-4">Kirim</button>
                            <a href="{{ route('transactionDelete', $transaction->no_transaction) }}"
                                class="btn btn-danger fw-bold rounded-4">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Pengiriman</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Nama : {{ $transaction->user->name }}</h6>
                        <h6>No Handphone : {{ $transaction->user->noHp }}</h6>
                        <h6>Alamat : </h6>
                        <p>{{ $transaction->user->alamat }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
