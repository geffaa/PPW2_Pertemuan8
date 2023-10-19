<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        $batas = 5;
        //jumlah data buku
        $jumlahData = Buku::count();
        $data_buku = Buku::orderBy('id', 'desc')->simplePaginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        //jumlah harga seluruh buku
        $totalHarga = Buku::sum('harga');
        return view('buku.index', compact('data_buku','no', 'jumlahData', 'totalHarga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate($request,[
        'judul' => 'required|string',
        'penulis' => 'required| string|max:30',
        'harga' => 'required|numeric',
        'tgl_terbit' => 'required|date' 
    ]);
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = date('Y-m-d', strtotime($request->tgl_terbit));
        $buku->save();
        return redirect('/buku')->with('pesan','Data Buku Berhasil di Simpan');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = Buku::find($id);
        $buku->update([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'harga' => $request->input('harga'),
            'tgl_terbit' => date('Y-m-d', strtotime($request->input('tgl_terbit')))
        ]);
        return redirect('/buku')->with('pesan','Data Buku Berhasil di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan','Data Buku Berhasil di Hapus');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")->orwhere('penulis','like',"%".$cari."%")
        ->simplePaginate($batas);
        $jumlahData = $data_buku->count();
        $no = $batas * ($data_buku->currentPage() -1);
        $total = Buku::sum('harga');
        return view('Buku.search', compact('data_buku', 'no','jumlahData','total','cari'));
    }
}
