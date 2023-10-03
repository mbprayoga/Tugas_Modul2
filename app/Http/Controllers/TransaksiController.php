<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function create($id)
    {
        return view('transaksi.add', compact('id'));
    }
    // public function store the value to a table
    public function store($id, Request $request)
    {
        $request->validate([
            'Metode_Pembayaran' => 'required',
            'Tanggal_Transaksi' => 'required',
            'Total_Harga' => 'required',
        ]);
        DB::insert(
            'INSERT INTO transaksi(ID_Transaksi, ID_P, Metode_Pembayaran, Tanggal_Transaksi, Total_Harga) VALUES (:ID_Transaksi, :ID_P, :Metode_Pembayaran, :Tanggal_Transaksi, :Total_Harga)',
            [
                'ID_Transaksi' => $id,
                'ID_P' => $id,
                'Metode_Pembayaran' => $request->Metode_Pembayaran,
                'Tanggal_Transaksi' => $request->Tanggal_Transaksi,
                'Total_Harga' => $request->Total_Harga,
            ]
        );
        return redirect()->route('pakaian.index')->with('success', 'Data Transaksi berhasil disimpan');
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
            'Metode_Pembayaran' => 'required',
            'Tanggal_Transaksi' => 'required',
            'Total_Harga' => 'required',
        ]);

        DB::update(
            'UPDATE transaksi SET ID_Transaksi = :ID_Transaksi, ID_P = :ID_P, Metode_Pembayaran = :Metode_Pembayaran, Tanggal_Transaksi = :Tanggal_Transaksi, Total_Harga = :Total_Harga WHERE ID_Transaksi = :id',
            [
                ':id' => $id,
                'ID_P' => $id,
                'Metode_Pembayaran' => $request->Metode_Pembayaran,
                'Tanggal_Transaksi' => $request->Tanggal_Transaksi,
                'Total_Harga' => $request->Total_Harga,
                'ID_Transaksi' => $id, // Make sure to include this as well
            ]
        );
        

        return redirect()->route('pakaian.index')->with('success', 'Data Transaksi berhasil diubah');
    }
    // public function to delete a row from a table
    public function delete($id)
    {
        DB::delete('DELETE FROM transaksi WHERE ID_Transaksi = :ID_Transaksi', ['ID_Transaksi' => $id]);
        return redirect()->route('pakaian.index')->with('success', 'Data Transaksi berhasil dihapus');
    }
}
