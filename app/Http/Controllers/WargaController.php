<?php

namespace App\Http\Controllers;

use App\Warga;
use App\Agama;
use App\Jeniskelamin;
use App\Statuskawin;
use App\RT;
use App\RW;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warga = Warga::all();
        return view('warga.index', ['warga' => $warga]);
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
        $statuskawin = Statuskawin::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('warga.create', compact('agama', 'jeniskelamin', 'statuskawin', 'rt', 'rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nama' => 'required',
            'NIK' => 'required|size:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_KTP' => 'required',
            'alamat_domisili' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'agama_id' => 'required',
            'jeniskelamin_id' => 'required',
            'statuskawin_id' => 'required',
            'pekerjaan' => 'required',
        ]);

        Warga::create($request->all());
        return redirect('/warga')->with('success', 'Data Warga Berhasil Ditambahkan!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function show(Warga $warga)
    {
        return view('warga.show', compact('warga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function edit(Warga $warga)
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $rt = RT::all();
        $rw = RW::all();
        return view ('warga.edit', compact('warga', 'agama', 'jeniskelamin', 'statuskawin', 'rt', 'rw'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warga $warga)
    {
                //dd($request->all());
                $request->validate([
                    'nama' => 'required',
                    'NIK' => 'required|size:16',
                    'tempat_lahir' => 'required',
                    'tanggal_lahir' => 'required',
                    'alamat_KTP' => 'required',
                    'alamat_domisili' => 'required',
                    'rt_id' => 'required',
                    'rw_id' => 'required',
                    'agama_id' => 'required',
                    'jeniskelamin_id' => 'required',
                    'statuskawin_id' => 'required',
                    'pekerjaan' => 'required',
                ]);
        
                Warga::where('id', $warga->id)
                ->update([
                    'NIK' => $request->NIK,
                    'nama' => $request->nama,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat_KTP' => $request->alamat_KTP,
                    'alamat_domisili' => $request->alamat_domisili,
                    'rt_id' => $request->rt_id,
                    'rw_id' => $request->rw_id,
                    'agama_id' => $request->agama_id,
                    'jeniskelamin_id' => $request->jeniskelamin_id,
                    'statuskawin_id' => $request->statuskawin_id,
                    'pekerjaan' => $request->pekerjaan
                ]);
                return redirect('/warga')->with('success', 'Data Warga Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warga $warga)
    {
        Warga::destroy($warga->id);
        //return redirect('/warga')->with('info', 'Data Berhasil Di Hapus!');
        return redirect()->back();
    }
}
