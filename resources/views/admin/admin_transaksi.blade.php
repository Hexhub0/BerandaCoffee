@extends('layouts.app')

@section('content')
<div class="admin-container">
  <h1>Daftar Transaksi</h1>

  <table class="admin-table">
    <thead>
      <tr>
        <th>Nama Pemesan</th>
        <th>Menu</th>
        <th>Total</th>
        <th>Status</th>
        <th>Waktu</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>{{ $order->name }}</td>
        <td>
          <ul>
            @foreach($order->items as $item)
              <li>{{ $item->menu->name }} ({{ $item->qty }}x)</li>
            @endforeach
          </ul>
        </td>
        <td>Rp {{ number_format($order->total) }}</td>
        <td>
          <form method="POST" action="{{ route('admin.transaksi.update', $order->id) }}">
            @csrf
            @method('PUT')
            <select name="status" onchange="this.form.submit()">
              <option value="diterima" {{ $order->status=='diterima'?'selected':'' }}>Diterima</option>
              <option value="dibuat" {{ $order->status=='dibuat'?'selected':'' }}>Dibuat</option>
              <option value="selesai" {{ $order->status=='selesai'?'selected':'' }}>Selesai</option>
              <option value="dibatalkan" {{ $order->status=='dibatalkan'?'selected':'' }}>Dibatalkan</option>
            </select>
          </form>
        </td>
        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
        <td>
          <a href="{{ route('admin.transaksi.show', $order->id) }}">Detail</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
