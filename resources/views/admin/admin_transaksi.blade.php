<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
  <h1>Kelola Transaksi</h1>
  <table border="1">
    <thead>
      <tr>
        <th>ID Transaksi</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal</th>
        <th>Total Harga</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transaksi as $t)
      <tr>
        <td>{{ $t->id }}</td>
        <td>{{ $t->nama_pelanggan }}</td>
        <td>{{ $t->tanggal }}</td>
        <td>{{ $t->total_harga }}</td>
        <td>{{ $t->status }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</body>
</html>
