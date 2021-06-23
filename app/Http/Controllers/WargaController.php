<?php

namespace App\Http\Controllers;

use App\Warga;
use App\Agama;
use App\Jeniskelamin;
use App\Statuskawin;
use App\Rt;
use App\Rw;
use App\Imports\WargaImport;
use Maatwebsite\Excel\Facades\Excel;
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
        
        // if(auth()->user()->username == 'superadmin')
        // {
        //     $warga = Warga::all();
        // }
        // if(auth()->user()->username == 'admin_pemtibum')
        // {
        //     $warga = Warga::all();
        // }
        // if(auth()->user()->username == 'lurah')
        // {
        //     $warga = Warga::all();
        // }
        // if (auth()->user()->username == 'pamor1')
        // {
        //     $warga = Warga::where('rw_id', '=', '1')->get();
        // }
        // if (auth()->user()->username == 'pamor2')
        // {
        //     $warga = Warga::where('rw_id', '=', '2')->get();
        // }
        // if (auth()->user()->username == 'pamor3')
        // {
        //     $warga = Warga::where('rw_id', '=', '3')->get();
        // }
        // if (auth()->user()->username == 'pamor4')
        // {
        //     $warga = Warga::where('rw_id', '=', '4')->get();
        // }
        // if (auth()->user()->username == 'pamor5')
        // {
        //     $warga = Warga::where('rw_id', '=', '5')->get();
        // }
        // if (auth()->user()->username == 'pamor6A')
        // {
        //     $warga = Warga::where('rw_id', '=', '6')->get();
        // }
        // if (auth()->user()->username == 'pamor6B')
        // {
        //     $warga = Warga::where('rw_id', '=', '7')->get();
        // }
        // if (auth()->user()->username == 'pamor7')
        // {
        //     $warga = Warga::where('rw_id', '=', '7')->get();
        // }
        // if (auth()->user()->username == 'pamor8')
        // {
        //     $warga = Warga::where('rw_id', '=', '9')->get();
        // }
        // if (auth()->user()->username == 'pamor9')
        // {
        //     $warga = Warga::where('rw_id', '=', '10')->get();
        // }
        // if (auth()->user()->username == 'pamor10')
        // {
        //     $warga = Warga::where('rw_id', '=', '11')->get();
        // }
        // if (auth()->user()->username == 'pamor11')
        // {
        //     $warga = Warga::where('rw_id', '=', '12')->get();
        // }
        // if (auth()->user()->username == 'pamor12')
        // {
        //     $warga = Warga::where('rw_id', '=', '13')->get();
        // }
        // if (auth()->user()->username == 'pamor13')
        // {
        //     $warga = Warga::where('rw_id', '=', '14')->get();
        // }
        // if (auth()->user()->username == 'pamor14')
        // {
        //     $warga = Warga::where('rw_id', '=', '15')->get();
        // }
        // if (auth()->user()->username == 'pamor15')
        // {
        //     $warga = Warga::where('rw_id', '=', '16')->get();
        // }
        // if (auth()->user()->username == 'pamor16')
        // {
        //     $warga = Warga::where('rw_id', '=', '17')->get();
        // }
        // if (auth()->user()->username == 'pamor17')
        // {
        //     $warga = Warga::where('rw_id', '=', '18')->get();
        // }
        // if (auth()->user()->username == 'pamor18')
        // {
        //     $warga = Warga::where('rw_id', '=', '19')->get();
        // }
        // if (auth()->user()->username == 'pamor19')
        // {
        //     $warga = Warga::where('rw_id', '=', '20')->get();
        // }
        // if (auth()->user()->username == 'pamor20')
        // {
        //     $warga = Warga::where('rw_id', '=', '21')->get();
        // }
        // if (auth()->user()->username == 'pamor21')
        // {
        //     $warga = Warga::where('rw_id', '=', '22')->get();
        // }
        // if (auth()->user()->username == 'pamor22')
        // {
        //     $warga = Warga::where('rw_id', '=', '23')->get();
        // }
        return view('warga.index', ['warga' => $warga]);
    }

    public function importwargai(Request $request) 
    {
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('Warga',$namafile);

        Excel::import(new WargaImport, public_path('/Warga'.$namafile));
        
        return redirect('/warga')->with('success', 'All good!');
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
            'KK' => 'required|size:16',
            'hub_keluarga' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_KTP' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota_kab' => 'required',
            'propinsi' => 'required',
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
                    'KK' => 'required|size:16',
                    'hub_keluarga' => 'required',
                    'tempat_lahir' => 'required',
                    'tanggal_lahir' => 'required',
                    'alamat_KTP' => 'required',
                    'rt_id' => 'required',
                    'rw_id' => 'required',
                    'kelurahan' => 'required',
                    'kecamatan' => 'required',
                    'kota_kab' => 'required',
                    'propinsi' => 'required',
                    'agama_id' => 'required',
                    'jeniskelamin_id' => 'required',
                    'statuskawin_id' => 'required',
                    'pekerjaan' => 'required',
                ]);
        
                Warga::where('id', $warga->id)
                ->update([
                    'NIK' => $request->NIK,
                    'KK' => $request->KK,
                    'nama' => $request->nama,
                    'hub_keluarga' => $request->hub_keluarga,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat_KTP' => $request->alamat_KTP,
                    'rt_id' => $request->rt_id,
                    'rw_id' => $request->rw_id,
                    'kelurahan' => $request->kelurahan,
                    'kecamatan' => $request->kecamatan,
                    'kota_kab' => $request->kota_kab,
                    'propinsi' => $request->propinsi,
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
