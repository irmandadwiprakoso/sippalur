<?php

namespace App\Http\Controllers;

use App\Kependudukan;
use App\Rt;
use App\Rw;
use Illuminate\Http\Request;

class KependudukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kependudukan = Kependudukan::all();
        if(auth()->user()->username == 'superadmin')
        {
            $kependudukan = Kependudukan::all();
        }
        if(auth()->user()->username == 'admin_pemtibum')
        {
            $kependudukan = Kependudukan::all();
        }
        if(auth()->user()->username == 'lurah')
        {
            $kependudukan = Kependudukan::all();
        }
        if (auth()->user()->username == 'pamor1')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->username == 'pamor2')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->username == 'pamor3')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->username == 'pamor4')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->username == 'pamor5')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->username == 'pamor6A')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->username == 'pamor6B')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor7')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor8')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->username == 'pamor9')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->username == 'pamor10')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->username == 'pamor11')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->username == 'pamor12')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->username == 'pamor13')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->username == 'pamor14')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->username == 'pamor15')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->username == 'pamor16')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->username == 'pamor17')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->username == 'pamor18')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->username == 'pamor19')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->username == 'pamor20')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->username == 'pamor21')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->username == 'pamor22')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '23')->get();
        }

        return view('kependudukan.index', ['kependudukan' => $kependudukan]);
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
        return view ('kependudukan.create', compact('rt', 'rw'));
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
            'rt_id' => 'required',
            'rw_id' => 'required',
            'KK' => 'required',
            'Laki_laki' => 'required',
            'Perempuan' => 'required',
        ]);
        Kependudukan::create($request->all());
        return redirect('/kependudukan')->with('success', 'Data Kependudukan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function show(Kependudukan $kependudukan)
    {
        return view ('kependudukan.show', compact('kependudukan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kependudukan $kependudukan)
    {
        $rt = RT::all();
        $rw = RW::all();
        return view ('kependudukan.edit', compact('kependudukan', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kependudukan $kependudukan)
    {
        //dd($request->all());
        $request->validate([
            'rt_id' => 'required',
            'rw_id' => 'required',
            'KK' => 'required',
            'Laki_laki' => 'required',
            'Perempuan' => 'required',
        ]);

        Kependudukan::where('id', $kependudukan->id)
        ->update([
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'KK' => $request->KK,
            'Laki_laki' => $request->Laki_laki,
            'Perempuan' => $request->Perempuan,
        ]);
        return redirect('/kependudukan')->with('success', 'Data Kependudukan Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kependudukan $kependudukan)
    {
        Kependudukan::destroy($kependudukan->id);
        return redirect()->back();
    }
}
