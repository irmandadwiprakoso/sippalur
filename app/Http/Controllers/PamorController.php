<?php

namespace App\Http\Controllers;

use App\Pamor;
use App\Rt;
use App\Rw;
use Illuminate\Http\Request;
use App\Exports\PamorExport;
use Maatwebsite\Excel\Facades\Excel;

class PamorController extends Controller
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
            $pamor = Pamor::all();
        }
        if(auth()->user()->role == 'admin')
        {
            $pamor = Pamor::all();
        }
        if(auth()->user()->role == 'sekret')
        {
            $pamor = Pamor::all();
        }
        if(auth()->user()->role == 'kessos')
        {
            $pamor = Pamor::where('bidang', '=', 'kessos')->get();
        }
        if(auth()->user()->role == 'permasbang')
        {
            $pamor = Pamor::where('bidang', '=', 'permasbang')->get();
        }
        if(auth()->user()->role == 'pemtibum')
        {
            $pamor = Pamor::where('bidang', '=', 'pemtibum')->get();
        }
        if (auth()->user()->username == 'pamor1')
        {
            $pamor = Pamor::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->username == 'pamor2')
        {
            $pamor = Pamor::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->username == 'pamor3')
        {
            $pamor = Pamor::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->username == 'pamor4')
        {
            $pamor = Pamor::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->username == 'pamor5')
        {
            $pamor = Pamor::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->username == 'pamor6A')
        {
            $pamor = Pamor::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->username == 'pamor6B')
        {
            $pamor = Pamor::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor7')
        {
            $pamor = Pamor::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor8')
        {
            $pamor = Pamor::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->username == 'pamor9')
        {
            $pamor = Pamor::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->username == 'pamor10')
        {
            $pamor = Pamor::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->username == 'pamor11')
        {
            $pamor = Pamor::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->username == 'pamor12')
        {
            $pamor = Pamor::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->username == 'pamor13')
        {
            $pamor = Pamor::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->username == 'pamor14')
        {
            $pamor = Pamor::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->username == 'pamor15')
        {
            $pamor = Pamor::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->username == 'pamor16')
        {
            $pamor = Pamor::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->username == 'pamor17')
        {
            $pamor = Pamor::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->username == 'pamor18')
        {
            $pamor = Pamor::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->username == 'pamor19')
        {
            $pamor = Pamor::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->username == 'pamor20')
        {
            $pamor = Pamor::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->username == 'pamor21')
        {
            $pamor = Pamor::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->username == 'pamor22')
        {
            $pamor = Pamor::where('rw_id', '=', '23')->get();
        }

        return view('pamor.index', ['pamor' => $pamor]);
    }

    public function exportpamor()
    {
        return Excel::download(new PamorExport, 'laporanpamor.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('pamor.create', compact('rt', 'rw'));
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
            'tanggal' => 'required',
            'kegiatan' => 'required',
            'jumlah' => 'required',
            'bidang' => 'required',
            'keterangan' => 'required',
            'tinjut' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'foto' => 'required',       
        ]);
        $imgName = $request->foto->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto->extension();
        $request->foto->move('images/LaporanHarian/',$imgName);
        
        //Pamor::create($request->all());
        Pamor::create([
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'jumlah' => $request->jumlah,
            'bidang' => $request->bidang,
            'keterangan' => $request->keterangan,
            'tinjut' => $request->tinjut,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'foto' => $imgName,
        ]);

        return redirect('/pamor')->with('success', 'Laporan Harian Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pamor  $pamor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pamor = Pamor::find($id);
        return view('pamor.show', ['pamor' => $pamor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pamor  $pamor
     * @return \Illuminate\Http\Response
     */
    public function edit(Pamor $pamor)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('pamor.edit', compact('pamor', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pamor  $pamor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pamor $pamor)
    {
        //dd($request->all());
        $request->validate([
            'tanggal' => 'required',
            'kegiatan' => 'required',
            'jumlah' => 'required',
            'bidang' => 'required',
            'keterangan' => 'required',
            'tinjut' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',         
            'foto' => 'required',         
        ]);

        Pamor::where('id', $pamor->id)
        ->update([
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'jumlah' => $request->jumlah,
            'bidang' => $request->bidang,
            'keterangan' => $request->keterangan,
            'tinjut' => $request->tinjut,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'foto' => $request->foto,
        ]);
        if ($request->hasFile('foto')){
            $request->file('foto')->move('images/LaporanHarian/',$request->file('foto')->getClientOriginalName());
            $pamor->foto = $request->file('foto')->getClientOriginalName();
            $pamor->save();
        }
        return redirect('/pamor')->with('success', 'Laporan Harian Kamu Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pamor  $pamor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pamor $pamor)
    {
        Pamor::destroy($pamor->id);
        return redirect()->back();
    }
}
