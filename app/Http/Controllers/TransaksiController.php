<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function create()
    {
        return view('transaksi.add');
    }
    // public function store the value to a table
    public function store(Request $request)
    {
        $request->validate([
            'ID_Transaksi' => 'required',
            'ID_Pakaian' => 'required',
            'Metode_Pembayaran' => 'required',
            'Tanggal_Transaksi' => 'required',
            'Total_Harga' => 'required',
        ]);
        DB::insert(
            'INSERT INTO transaksi(ID_Transaksi, ID_Pakaian, Metode_Pembayaran, Tanggal_Transaksi, Total_Harga) VALUES (:ID_Transaksi, :ID_Pakaian, :Metode_Pembayaran, :Tanggal_Transaksi, :Total_Harga)',
            [
                'ID_Transaksi' => $request->ID_Transaksi,
                'ID_Pakaian' => $request->ID_Pakaian,
                'Metode_Pembayaran' => $request->Metode_Pembayaran,
                'Tanggal_Transaksi' => $request->Tanggal_Transaksi,
                'Total_Harga' => $request->Total_Harga,
            ]
        );
        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil disimpan');
    }
    
    // public function edit a row from a table
    public function edit($id)
    {
        $data = DB::table('transaksi')->where('ID_Transaksi', $id)->first();
        return view('transaksi.edit')->with('data', $data);
    }

    // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'ID_Transaksi' => 'required',
            'ID_Pakaian' => 'required',
            'Metode_Pembayaran' => 'required',
            'Tanggal_Transaksi' => 'required',
            'Total_Harga' => 'required',
        ]);

        DB::update(
            'UPDATE pakaian SET ID_Transaksi = :ID_Transaksi, ID_Pakaian = :ID_Pakaian, Metode_Pembayaran = :Metode_Pembayaran, Tanggal_Transaksi = :Tanggal_Transaksi, Total_Harga = :Total_Harga WHERE ID_Transaksi = :ID_Transaksi',
            [
                'ID_Transaksi' => $request->ID_Transaksi,
                'ID_Pakaian' => $request->ID_Pakaian,
                'Metode_Pembayaran' => $request->Metode_Pembayaran,
                'Tanggal_Transaksi' => $request->Tanggal_Transaksi,
                'Total_Harga' => $request->Total_Harga,
            ]
        );

        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil diubah');
    }
    // public function to delete a row from a table
    public function delete($id)
    {
        DB::delete('DELETE FROM transaksi WHERE ID_Transaksi = :ID_Transaksi', ['ID_Transaksi' => $id]);
        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil dihapus');
    }
}
