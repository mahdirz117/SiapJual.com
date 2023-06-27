<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')->Paginate(5);
        return view('blog.produk', compact('produk'));
    }

    public function add()
    {
        return view("blog.produk.insertProduk");
    }

    public function insert(Request $request)
    {

        $this->validate($request, [
            'nama_produk' => 'required|max:35',
            'harga' => 'required|min:4',
            'stok' => 'required'
        ]);

        DB::table('produk')->insert([
            'SKU' => $request->SKU,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/produk');
    }

    public function edit($id)
    {
        $produk = DB::table('produk')->where('id', $id)->get();
        return view('blog/produk/updateProduk', ['produk' => $produk]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama_produk' => 'required|max:35',
            'harga' => 'required|min:4',
            'stok' => 'required',
            'kondisi' => 'required'
        ]);

        DB::table('produk')->where('id', $request->id)->update([
            'SKU' => $request->SKU,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'updated_at' => now()
        ]);
        return redirect('/produk');
    }
    
    public function delete(Request $request){
        DB::table('produk')->where('id', $request->id)->delete();
        return redirect()->back();
    }
}
