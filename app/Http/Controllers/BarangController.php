<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Barang';
        $barangs = DB::select('select *, barangs.id as barang_id, satuans.nama as satuan_nama
        from barangs
        left join satuans on barangs.satuan_id = satuans.id');

        return view('barang.index', ['pageTitle' => $pageTitle, 'barangs' => $barangs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Barang';
        // RAW SQL Query
        $satuans = DB::select('select * from satuans');
        return view('barang.create', compact('pageTitle', 'satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'harga_barang' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // INSERT QUERY
        DB::table('barangs')->insert([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'harga_barang' => $request->harga_barang,
            'satuan_id' => $request->satuan,
        ]);
        return redirect()->route('barangs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Detail Barang';
        // RAW SQL QUERY
        $barang = collect(DB::select('
            select *, barangs.id as barang_id, satuans.nama as
            satuan_nama
            from barangs
            left join satuans on barangs.satuan_id = satuans.id
            where barangs.id = ?', [$id]))->first();
        return view('barang.show', compact('pageTitle', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Barang';

        $barang = DB::table('barangs')->where('id', $id)->first();
        $satuans = DB::table('satuans')->get();

        //eloduent
        // $positions = Position::all();
        // $employee = Employee::find($id);

        return view('barang.edit', compact('pageTitle', 'barang','satuans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];
    
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'deskripsi_barang' => 'required',
            'harga_barang' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::table('barangs')->where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'harga_barang' => $request->harga_barang,
            'satuan_id' => $request->satuan,
        ]);

        // ELOQUENT
        // $employee = Employee::find($id);
        // $employee->firstname = $request->firstName;
        // $employee->lastname = $request->lastName;
        // $employee->email = $request->email;
        // $employee->age = $request->age;
        // $employee->position_id = $request->position;
        // $employee->save();


        return redirect()->route('barangs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // QUERY BUILDER
        DB::table('barangs')
            ->where('id', $id)
            ->delete();
        return redirect()->route('barangs.index');
    }
}
