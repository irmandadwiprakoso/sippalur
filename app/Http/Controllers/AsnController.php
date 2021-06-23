<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Asn;
use App\Agama;
use App\Exports\AsnExport;
use App\Jeniskelamin;
use App\Pendidikanpeg;
use App\Statuskawin;
use App\Jabatan;
use App\Pangkat;
use App\Golongan;
use Maatwebsite\Excel\Facades\Excel;

class AsnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // if ($request->has('search')){
        //     $asn = Asn::where('nama', 'LIKE', '%'.$request->search.'%')->get();
        // }else{
            // menampilkan semua data
            $asn = Asn::all();
            // menampilkan semua data termasuk deleted at ter isi di table
            // $asn = Asn::withTrashed()->get();
            // menampilkan data yang deleted at ter isi saja
            // $asn = Asn::onlyTrashed()->get();
        // }
        //$asn = Asn::all();
        return view('asn.index', ['asn' => $asn]);
    }

    public function exportasn() 
    {
        return Excel::download(new AsnExport, 'asn-jakasampurna.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $pendidikanpeg = Pendidikanpeg::all();
        $statuskawin = Statuskawin::all();
        $jabatan = Jabatan::all();
        $pangkat = Pangkat::all();
        $golongan = Golongan::all();
        return view ('asn.create', compact('agama', 'jeniskelamin', 'pendidikanpeg', 'statuskawin', 'jabatan' ,'pangkat', 'golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|size:18',
            'NIK' => 'required|size:16',
            'nama' => 'required',
            'pangkat_id' => 'required',
            'golongan_id' => 'required',
            'jabatan_id' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jeniskelamin_id' => 'required',
            'alamat' => 'required',
            'agama_id' => 'required',
            'pendidikanpeg_id' => 'required',
            'statuskawin_id' => 'required',
            'SK_Jabatan' => 'required',
            'no_rek' => 'required',
            'npwp' => 'required',
            'email' => 'required',
            'no_HP' => 'required',
        ]);
        $imgName = $request->foto->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto->extension();
        $request->foto->move('images/ASN/',$imgName);

        Asn::create([
            'NIP' => $request->NIP,
            'NIK' => $request->NIK,
            'nama' => $request->nama,
            'pangkat_id' => $request->pangkat_id,
            'golongan_id' => $request->golongan_id,
            'jabatan_id' => $request->jabatan_id,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jeniskelamin_id' => $request->jeniskelamin_id,
            'alamat' => $request->alamat,
            'agama_id' => $request->agama_id,
            'pendidikanpeg_id' => $request->pendidikanpeg_id,
            'statuskawin_id' => $request->statuskawin_id,
            'SK_Jabatan' => $request->SK_Jabatan,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
            'email' => $request->email,
            'no_HP' => $request->no_HP,
            'foto' => $imgName,
        ]);

        //Asn::create($request->all());
        return redirect('/asn')->with('success', 'Data PNS Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Asn $asn
     * @return \Illuminate\Http\Response
     */
    public function show(Asn $asn)
    {
        return view ('asn.show', compact('asn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Asn $asn
     * @return \Illuminate\Http\Response
     */
    public function edit(Asn $asn)
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $pendidikanpeg = Pendidikanpeg::all();
        $statuskawin = Statuskawin::all();
        $jabatan = Jabatan::all();
        $pangkat = Pangkat::all();
        $golongan = Golongan::all();
        return view ('asn.edit', compact('asn', 'agama', 'jeniskelamin', 'pendidikanpeg', 'statuskawin', 'jabatan' ,'pangkat', 'golongan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Asn $asn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asn $asn)
    {
        //dd($request->all());
        $request->validate([
            'NIP' => 'required|size:18',
            'NIK' => 'required|size:16',
            'nama' => 'required',
            'pangkat_id' => 'required',
            'golongan_id' => 'required',
            'jabatan_id' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jeniskelamin_id' => 'required',
            'alamat' => 'required',
            'agama_id' => 'required',
            'pendidikanpeg_id' => 'required',
            'statuskawin_id' => 'required',
            'SK_Jabatan' => 'required',
            'no_rek' => 'required',
            'npwp' => 'required',
            'email' => 'required',
            'no_HP' => 'required',
        ]);

       Asn::where('id', $asn->id)
        ->update([
            'NIP' => $request->NIP,
            'NIK' => $request->NIK,
            'nama' => $request->nama,
            'pangkat_id' => $request->pangkat_id,
            'golongan_id' => $request->golongan_id,
            'jabatan_id' => $request->jabatan_id,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jeniskelamin_id' => $request->jeniskelamin_id,
            'alamat' => $request->alamat,
            'agama_id' => $request->agama_id,
            'pendidikanpeg_id' => $request->pendidikanpeg_id,
            'statuskawin_id' => $request->statuskawin_id,
            'SK_Jabatan' => $request->SK_Jabatan,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
            'email' => $request->email,
            'no_HP' => $request->no_HP,
            // 'foto' => $request->foto
        ]);     
        if ($request->hasFile('foto')){
            $request->file('foto')->move('images/ASN/',$request->file('foto')->getClientOriginalName());
            $asn->foto = $request->file('foto')->getClientOriginalName();
            $asn->save();
        }
        
        return redirect('/asn')->with('success', 'Data PNS Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Asn $asn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asn $asn)
    {
        Asn::destroy($asn->id);
        //return redirect('/asn')->with('info', 'Data ASN Berhasil Dihapus!');
        //return redirect('/asn');
        return redirect()->back();
    }
}
