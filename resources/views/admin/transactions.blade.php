@extends('admin.layouts.layout')

@section('content')
    <section id="transactions">
        <div class="container py-3 mt-5">
            <div class="row">
                <div class="col">
                    <h3>List Transaksi:</h3>
                </div>
            </div>
            <div class="row">
                @livewire('transaction')
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <h3>Cetak Transaksi:</h3>
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('transactionPrint') }}" method="post">
                                @csrf
                                <input type="date" class="form-control mb-3" name="date">
                                <button type="submit" class="btn btn-primary fw-bold">Cetak</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
