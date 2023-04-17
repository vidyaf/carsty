<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-center mb-5">Laporan Transaksi Carsty Showroom</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Transaksi</th>
                <th scope="col">Merek Mobil</th>
                <th scope="col">Harga Mobil</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->no_transaction }}</td>
                    <td>{{ $transaction->car->name }}</td>
                    <td>Rp. {{ number_format($transaction->car->price, 2, ',', '.') }}</td>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
