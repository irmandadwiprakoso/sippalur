<?php

namespace App\Http\Controllers;

use App\Rtrw;
use App\Warga;
use App\Rt;
use App\Rw;
use App\Jabatan;
use Illuminate\Http\Request;
use App\Exports\RtrwExport;
use Maatwebsite\Excel\Facades\Excel;

class RtrwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rtrw = Rtrw::all();
        return view('rtrw.index', ['rtrw' => $rtrw]);
    }
    public function rtrwexport()
    {
        return Excel::download(new rtrwexport,'rtrw-jakasampurna.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warga = Warga::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        return view ('rtrw.create', compact('warga','rt','rw','jabatan'));
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
            'warga_id' => 'required',
            'jabatan_id' => 'required',
            // 'rt_id' => 'required',
            'rw_id' => 'required',
            'no_sk' => 'required',
            'tmt' => 'required',
            'no_hp' => 'required',
            // 'no_rek' => 'required',    
            // 'npwp' => 'required',        
        ]);
        Rtrw::create($request->all());
        return redirect('/rtrw')->with('success', 'Data RTRW Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rtrw  $rtrw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rtrw = Rtrw::find($id);
        return view('rtrw.show', ['rtrw' => $rtrw]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rtrw  $rtrw
     * @return \Illuminate\Http\Response
     */
    public function edit(Rtrw $rtrw)
    {
        $warga = Warga::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        return view ('rtrw.edit', compact('rtrw', 'warga','jabatan','rt','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rtrw  $rtrw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rtrw $rtrw)
    {
        //dd($request->all());
        $request->validate([
            'warga_id' => 'required',
            'jabatan_id' => 'required',
            // 'rt_id' => 'required',
            'rw_id' => 'required',
            'no_sk' => 'required',
            'tmt' => 'required',
            'no_hp' => 'required',
            // 'no_rek' => 'required',    
            // 'npwp' => 'required',        
        ]);

        Rtrw::where('id', $rtrw->id)
        ->update([
            'warga_id' => $request->warga_id,
            'jabatan_id' => $request->jabatan_id,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'no_sk' => $request->no_sk,
            'tmt' => $request->tmt,
            'no_hp' => $request->no_hp,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
        ]);

        return redirect('/rtrw')->with('success', 'Data RT RW Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rtrw  $rtrw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rtrw $rtrw)
    {
        Rtrw::destroy($rtrw->id);
        return redirect()->back();
    }
}
