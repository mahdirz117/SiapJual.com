<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<div style="padding-left: 100px; padding-right:100px; height:80%">
    <br>
    <div class="header">
        <div class="header-tittle">
            <h3>Edit Produk</h3>
            <p>Masukkan data produk yang akan diedit</p>
        </div>
        <div class="header-back">
            <button class="btn btn-dark" onclick="history.back()">Kembali</button>
        </div>
    </div>
    <form method="POST" action="/editproduk">
        @csrf
        @foreach ($produk as $data_produk)
        <input type="hidden" name="id" value="{{ $data_produk->id }}">
        <label for="SKU">SKU</label><br>
        <input type="text" name="SKU" id="SKU" value="{{ $data_produk->SKU }}"><br>
        <label for="nama_produk">Nama Produk</label><br>
        <input type="text" name="nama_produk" id="namaproduk" value="{{ $data_produk->nama_produk }}"><br>
        <label for="harga">Harga</label><br>
        <input type="number" name="harga" id="harga" value="{{ $data_produk->harga }}"><br>
        <label for="stok">Stok</label><br>
        <input type="number" name="stok" id="stok" value="{{ $data_produk->stok }}"><br>
        <p id="kondisi">Kondisi</p>
        <input type="radio" name="kondisi" id="kondisiBaru" value="baru" <?php if ($data_produk->kondisi == "baru") echo "Checked" ?>>
        <label for="kondisiBaru">Baru</label>
        <input type="radio" name="kondisi" id="kondisiBekas" value="bekas" <?php if ($data_produk->kondisi == "bekas") echo "Checked" ?>>
        <label for="kondisiBekas">Bekas</label><br>
        @endforeach
        @if ($errors->any())
        <br>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <input class="btn btn-primary margin-top-25" type="submit" name="submit" id="submit" value="Simpan Data">
    </form>


</div>
<style>
    .padding-left-30 {
        padding-left: 30px;
    }

    .margin-top-25 {
        margin-top: 25px;
    }

    label {
        padding-top: 10px;
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

    .header-back {
        padding-top: 35px;
        height: 100%;
    }

    #SKU,
    #namaproduk,
    #harga,
    #stok {
        width: 250px;
    }

    #kondisi {
        margin-top: 10px;
        margin-bottom: 0px;
    }
</style>



@endsection