<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PakaianController extends Controller
{
    public function create()
    {
        return view('pakaian.add');
    }
    // public function store the value to a table
    public function store(Request $request)
    {
        $request->validate([
            'ID_Pakaian' => 'required',
            'Brand' => 'required',
            'Harga' => 'required',
            'Kategori' => 'required',
            'Ukuran' => 'required',
            'Warna' => 'required'
        ]);
        DB::insert(
            'INSERT INTO pakaian(ID_Pakaian, Brand, Harga, Kategori, Ukuran, Warna) VALUES (:ID_Pakaian, :Brand, :Harga, :Kategori, :Ukuran, :Warna)',
            [
                'ID_Pakaian' => $request->ID_Pakaian,
                'Brand' => $request->Brand,
                'Harga' => $request->Harga,
                'Kategori' => $request->Kategori,
                'Ukuran' => $request->Ukuran,
                'Warna' => $request->Warna
            ]
        );
        return redirect()->route('pakaian.index')->with('success', 'Data Pakaian berhasil disimpan');
    }
    // public function show all values from a table
    public function index()
    {
        $datas = DB::table('Pakaian')
        ->leftJoin('Transaksi', 'Pakaian.ID_Pakaian', '=', 'Transaksi.ID_P')
        ->select('Pakaian.*', 'Transaksi.*')
        ->get();

        return view('pakaian.index')->with('datas', $datas);
    }
    // public function edit a row from a table
    public function edit($id)
    {
        $data = DB::table('pakaian')->where('Id_Pakaian', $id)->first();
        return view('pakaian.edit', compact('id'))->with('data', $data);
    }

    // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'Brand' => 'required',
            'Harga' => 'required',
            'Kategori' => 'required',
            'Ukuran' => 'required',
            'Warna' => 'required'
        ]);

        DB::update(
            'UPDATE pakaian SET Brand = :Brand, Harga = :Harga, Kategori = :Kategori, Ukuran = :Ukuran, Warna = :Warna WHERE ID_Pakaian = :ID_Pakaian',
            [
                'Brand' => $request->Brand,
                'Harga' => $request->Harga,
                'Kategori' => $request->Kategori,
                'Ukuran' => $request->Ukuran,
                'Warna' => $request->Warna
            ]
        );

        return redirect()->route('pakaian.index')->with('success', 'Data Pakaian berhasil diubah');
    }
    // public function to delete a row from a table
    public function delete($id)
    {
        DB::delete('DELETE FROM transaksi WHERE ID_P = :ID_P', ['ID_P' => $id]);
        DB::delete('DELETE FROM pakaian WHERE ID_Pakaian = :ID_Pakaian', ['ID_Pakaian' => $id]);
        return redirect()->route('pakaian.index')->with('success', 'Data Pakaian berhasil dihapus');
    }
    
    public function search(Request $request)
{
    $query = $request->input('query');

    $datas = DB::table('pakaian')
        ->leftJoin('transaksi', 'pakaian.ID_Pakaian', '=', 'transaksi.ID_P')
        // Add more join statements if needed
        ->where('pakaian.Brand', 'LIKE', '%' . $query . '%')
        ->orWhere('pakaian.Kategori', 'LIKE', '%' . $query . '%')
        ->orWhere('pakaian.Ukuran', 'LIKE', '%' . $query . '%')
        ->orWhere('pakaian.Warna', 'LIKE', '%' . $query . '%')
        ->orWhere('transaksi.Tanggal_Transaksi', 'LIKE', '%' . $query . '%')
        ->orWhere('transaksi.Total_Harga', 'LIKE', '%' . $query . '%')
        ->orWhere('transaksi.Metode_Pembayaran', 'LIKE', '%' . $query . '%')
        // Add additional conditions for other joined tables if needed
        ->get();

    return view('pakaian.index', compact('datas'));
}
}
