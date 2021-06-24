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
        //$rtrw = Rtrw::all();
        if(auth()->user()->username == 'superadmin')
        {
            $rtrw = Rtrw::all();
        }
        if(auth()->user()->username == 'admin_pemtibum')
        {
            $rtrw = Rtrw::all();
        }
        if(auth()->user()->username == 'lurah')
        {
            $rtrw = Rtrw::all();
        }
        if(auth()->user()->role == 'admin')
        {
            $rtrw = Rtrw::all();
        }
        if (auth()->user()->username == 'pamor1')
        {
            $rtrw = Rtrw::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->username == 'pamor2')
        {
            $rtrw = Rtrw::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->username == 'pamor3')
        {
            $rtrw = Rtrw::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->username == 'pamor4')
        {
            $rtrw = Rtrw::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->username == 'pamor5')
        {
            $rtrw = Rtrw::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->username == 'pamor6')
        {
            $rtrw = Rtrw::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->username == 'pamor23')
        {
            $rtrw = Rtrw::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor7')
        {
            $rtrw = Rtrw::where('rw_id', '=', '8')->get();
        }
        if (auth()->user()->username == 'pamor8')
        {
            $rtrw = Rtrw::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->username == 'pamor9')
        {
            $rtrw = Rtrw::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->username == 'pamor10')
        {
            $rtrw = Rtrw::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->username == 'pamor11')
        {
            $rtrw = Rtrw::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->username == 'pamor12')
        {
            $rtrw = Rtrw::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->username == 'pamor13')
        {
            $rtrw = Rtrw::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->username == 'pamor14')
        {
            $rtrw = Rtrw::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->username == 'pamor15')
        {
            $rtrw = Rtrw::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->username == 'pamor16')
        {
            $rtrw = Rtrw::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->username == 'pamor17')
        {
            $rtrw = Rtrw::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->username == 'pamor18')
        {
            $rtrw = Rtrw::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->username == 'pamor19')
        {
            $rtrw = Rtrw::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->username == 'pamor20')
        {
            $rtrw = Rtrw::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->username == 'pamor21')
        {
            $rtrw = Rtrw::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->username == 'pamor22')
        {
            $rtrw = Rtrw::where('rw_id', '=', '23')->get();
        }
        return view('rtrw.index', ['rtrw' => $rtrw]);
    }
    public function rtrwexport()
    {
        return Excel::download(new rtrwexport,'rtrw-jakasampurna.csv');
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
        return redirect('/rtrw')->with('success', 'Data RT/RW Berhasil Ditambahkan!');
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
        return view ('rtrw.edit', compact('rtrw', 'warga', 'jabatan','rt','rw'));
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
