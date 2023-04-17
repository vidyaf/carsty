@extends('home.layouts.layout')

@section('content')
    <section id="transaction">
        <div class="container py-5">
            <div class="row my-5">
                <h3>Transaksi Anda :</h3>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No Transaksi</th>
                            <th scope="col">Waktu Transaksi</th>
                            <th scope="col">Mobil</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $transaction->no_transaction }}</td>
                                <td>{{ $transaction->created_at }}</td>
                                <td>{{ $transaction->car->name }}</td>
                                <td>
                                    <a href="{{ route('detailTransaction', $transaction->no_transaction) }}"
                                        class="text-decoration-none">
                                        <span class="badge text-bg-info text-white">
                                            Detail
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
