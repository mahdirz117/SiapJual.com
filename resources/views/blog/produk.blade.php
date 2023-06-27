<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<div style="padding-left: 100px; padding-right: 100px; height:80%">
    <br>
    <div class="header">
        <div class="header-tittle">
            <h3>Data Produk</h3>
            <p>List Produk yang ada</p>
        </div>
        <div class="header-add">
            <button class="btn btn-primary" onclick="window.location.href='/tambahproduk'">Tambah Produk</button>
        </div>
    </div>
    <table>
        <tr>
            <th>SKU</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kondisi</th>
            <th>Action</th>
        </tr>
        <?php $i = 1; ?>
        @foreach($produk as $data_produk)
        <tr>
            <td>{{ $data_produk->SKU }}</td>
            <td>{{ $data_produk->nama_produk }}</td>
            <td>{{ $data_produk->harga }}</td>
            <td>{{ $data_produk->stok }}</td>
            <td>{{ $data_produk->kondisi }}</td>
            <td>
                <button class="btn btn-primary" onclick="window.location.href='/produk/edit/{{ $data_produk->id }}'">Edit</button></a>
                <button class="btn btn-danger" onclick="window.location.href='/produk/delete/{{ $data_produk->id }}'">Delete</button></a>
            </td>
        </tr>
        <?php $i++; ?>
        @endforeach
    </table><br>
    Halaman : {{ $produk->currentPage() }} <br />
    Jumlah Data : {{ $produk->total() }} <br />
    Data Per Halaman : {{ $produk->perPage() }} <br /><br>
    {{ $produk->links() }}

</div>
<style>
    th,
    td {
        border: 1px solid;
        padding: 5px;
    }

    table {
        border-collapse: collapse;
    }

    tr td {
        padding-right: 40px;
    }

    .header {
        content: "";
        display: table;
        clear: both;
        width: 100%;
    }

    .header-tittle {
        float: left;
        width: 50%;
        padding: 10px;
    }

    .header-add {
        padding-top: 35px;
        height: 100%;
    }
</style>



@endsection