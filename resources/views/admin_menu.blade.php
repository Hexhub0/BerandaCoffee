@extends('layouts.app')

@section('content')
<div class="admin-container">
  <h1>Kelola Menu</h1>

  <a href="{{ route('admin.menu.create') }}" class="btn-primary">
    + Tambah Menu
  </a>

  <table class="admin-table">
    <thead>
      <tr>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Terakhir Diubah</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($menus as $menu)
      <tr>
        <td>{{ $menu->name }}</td>
        <td>Rp {{ number_format($menu->price) }}</td>
        <td>{{ $menu->updated_at->format('d M Y H:i') }}</td>
        <td>
          <a href="{{ route('admin.menu.edit', $menu->id) }}">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
