<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  @extends('layouts.app')

@section('content')
<div class="admin-container">
  <h1>Admin Dashboard</h1>

  <div class="admin-stats">
    <div class="stat-card">
      <h3>Total Menu</h3>
      <p>{{ $totalMenu }}</p>
    </div>

    <div class="stat-card">
      <h3>Transaksi Hari Ini</h3>
      <p>{{ $todayOrders }}</p>
    </div>

    <div class="stat-card">
      <h3>Pesanan Selesai</h3>
      <p>{{ $completedOrders }}</p>
    </div>

    <div class="stat-card">
      <h3>Pesanan Pending</h3>
      <p>{{ $pendingOrders }}</p>
    </div>
  </div>

  <hr>

  <div class="admin-links">
    <a href="{{ route('admin_menu') }}">Kelola Menu</a>
    <a href="{{ route('admin_transaksi') }}">Kelola Transaksi</a>
  </div>
</div>
@endsection

</body>
</html>

