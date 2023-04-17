@extends('admin.layouts.layout')

@section('content')
    <section id="beranda">
        <div class="container">
            <div class="row row-cols-2 g-3">
                <div class="col d-flex justify-content-center">
                    <a href="{{ route('adminMobil') }}" class="text-decoration-none text-dark" style="width:80%">
                        <div class="card rounded-4 shadow">
                            <div class="card-body text-center">
                                <h3 class="card-title">Jumlah Mobil</h3>
                                <h1 class="card-subtitle mb-2">{{ $cars->count() }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col d-flex justify-content-center">
                    <a href="{{ route('adminTransaction') }}" class="text-decoration-none text-dark" style="width:80%">
                        <div class="card rounded-4 shadow">
                            <div class="card-body text-center">
                                <h3 class="card-title">Jumlah Transaksi</h3>
                                <h1 class="card-subtitle mb-2">{{ $transactions->count() }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
