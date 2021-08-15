<?php

namespace App\Http\Controllers;

use App\Ksbrt;
use App\Ktp;
use App\Rt;
use App\Rw;
use App\Jabatan;
use App\Exports\ksbrtExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ksbrtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->username == 'superadmin')
        {
            $ksbrt = Ksbrt::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->username == 'admin_pemtibum')
        {
            $ksbrt = Ksbrt::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin')
        {
            $ksbrt = Ksbrt::orderbyRaw('rw_id', 'DESC')->get();
        }

        if (auth()->user()->rw_id == '1')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->rw_id == '2')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->rw_id == '3')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->rw_id == '4')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->rw_id == '5')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->rw_id == '6')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->rw_id == '7')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->rw_id == '8')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '8')->get();
        }
        if (auth()->user()->rw_id == '9')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->rw_id == '10')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->rw_id == '11')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->rw_id == '12')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->rw_id == '13')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->rw_id == '14')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->rw_id == '15')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->rw_id == '16')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->rw_id == '17')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->rw_id == '18')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->rw_id == '19')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->rw_id == '20')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->rw_id == '21')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->rw_id == '22')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->rw_id == '23')
        {
            $ksbrt = Ksbrt::where('rw_id', '=', '23')->get();
        }

        return view('ksbrt.index', ['ksbrt' => $ksbrt]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        return view ('ksbrt.create', compact('ktp','rt','rw','jabatan'));
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
    'ktp_id' => 'required|unique:ksbrt,ktp_id',
    'jabatan_id' => 'required',
    'rt_id' => 'required',
    'rw_id' => 'required',
    'no_sk' => 'required',
    'tmt' => 'required',
    'no_hp' => 'required',
    // 'no_rek' => 'required',    
    // 'npwp' => 'required',        
],
[
    'ktp_id.required' => 'Harus di Isi Yaa',
    'ktp_id.unique' => 'NIK Sudah Digunakan',
    'jabatan_id.required' => 'Harus di Isi Yaa',
    'rt_id.required' => 'Harus di Isi Yaa',
    'rw_id.required' => 'Harus di Isi Yaa',
    'no_sk.required' => 'Harus di Isi Yaa',
    'tmt.required' => 'Harus di Isi Yaa',
    'no_hp.required' => 'Harus di Isi Yaa',
]
);
Ksbrt::create([
    'ktp_id' => $request->ktp_id,
    'jabatan_id' => $request->jabatan_id,
    'rt_id' => $request->rt_id,
    'rw_id' => $request->rw_id,
    'no_sk' => $request->no_sk,
    'tmt' => $request->tmt,
    'no_hp' => $request->no_hp,
    'no_rek' => $request->no_rek,
    'npwp' => $request->npwp,
    'user_id' => Auth::user()->id,
]);
// Ksbrt::create($request->all());
return redirect('/ksbrt')->with('success', 'Data RT Berhasil Ditambahkan!');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ksbrt = Ksbrt::find($id);
        return view('ksbrt.show', ['ksbrt' => $ksbrt]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function edit(Ksbrt $ksbrt)
    {
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        return view ('ksbrt.edit', compact('ksbrt', 'ktp', 'jabatan','rt','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ksbrt $ksbrt)
    {
        $request->validate([
            // 'ktp_id' => 'required',
            'jabatan_id' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'no_sk' => 'required',
            'tmt' => 'required',
            'no_hp' => 'required',
            // 'no_rek' => 'required',    
            // 'npwp' => 'required',        
        ]);

        Ksbrt::where('id', $ksbrt->id)
        ->update([
            // 'ktp_id' => $request->ktp_id,
            'jabatan_id' => $request->jabatan_id,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'no_sk' => $request->no_sk,
            'tmt' => $request->tmt,
            'no_hp' => $request->no_hp,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
        ]);

        return redirect('/ksbrt')->with('success', 'Data RT Berhasil Di Update!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ksbrt $ksbrt)
    {
        Ksbrt::destroy($ksbrt->id);
        return redirect()->back();
    }
}