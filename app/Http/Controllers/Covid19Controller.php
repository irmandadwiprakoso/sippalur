<?php

namespace App\Http\Controllers;

use App\Covid19;
use App\Rt;
use App\Rw;
use App\Warga;
use Illuminate\Http\Request;
use App\Exports\Covid19Export;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\DocBlock\Tags\Covers;

class Covid19Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $covid19 = Covid19::all();
        // return view('covid.index', ['covid19' => $covid19]);
        if(auth()->user()->username == 'superadmin')
        {
            $covid19 = Covid19::all();
        }
        if(auth()->user()->username == 'admin_kessos')
        {
            $covid19 = Covid19::all();
        }
        if(auth()->user()->username == 'lurah')
        {
            $covid19 = Covid19::all();
        }
        if (auth()->user()->username == 'pamor1')
        {
            $covid19 = Covid19::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->username == 'pamor2')
        {
            $covid19 = Covid19::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->username == 'pamor3')
        {
            $covid19 = Covid19::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->username == 'pamor4')
        {
            $covid19 = Covid19::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->username == 'pamor5')
        {
            $covid19 = Covid19::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->username == 'pamor6A')
        {
            $covid19 = Covid19::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->username == 'pamor6B')
        {
            $covid19 = Covid19::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor7')
        {
            $covid19 = Covid19::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor8')
        {
            $covid19 = Covid19::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->username == 'pamor9')
        {
            $covid19 = Covid19::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->username == 'pamor10')
        {
            $covid19 = Covid19::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->username == 'pamor11')
        {
            $covid19 = Covid19::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->username == 'pamor12')
        {
            $covid19 = Covid19::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->username == 'pamor13')
        {
            $covid19 = Covid19::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->username == 'pamor14')
        {
            $covid19 = Covid19::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->username == 'pamor15')
        {
            $covid19 = Covid19::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->username == 'pamor16')
        {
            $covid19 = Covid19::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->username == 'pamor17')
        {
            $covid19 = Covid19::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->username == 'pamor18')
        {
            $covid19 = Covid19::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->username == 'pamor19')
        {
            $covid19 = Covid19::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->username == 'pamor20')
        {
            $covid19 = Covid19::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->username == 'pamor21')
        {
            $covid19 = Covid19::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->username == 'pamor22')
        {
            $covid19 = Covid19::where('rw_id', '=', '23')->get();
        }

        //return view('covid.index', ['covid19' => $covid19]);
    }

    public function covid19export()
    {
        return Excel::download(new Covid19Export,'covid19-jakasampurna.xlsx');
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
        return view ('covid.create', compact('warga','rt','rw'));
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
            'domisili' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'konfirmasi' => 'required',
            'status_pasien' => 'required',
            'lokasi_pasien' => 'required',
            'tanggal_status' => 'required',
            'foto_status_pasien' => 'required',
            'status_akhir' => 'required',
            'tanggal_status_akhir' => 'required',    
            'no_hp' => 'required',        
        ]);
        
        $imgName = $request->foto_status_pasien->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto_status_pasien->extension();
        $request->foto_status_pasien->move('images/',$imgName);
        
        // Covid19::create($request->all());
        Covid19::create([
            'warga_id' => $request->warga_id,
            'domisili' => $request->domisili,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'konfirmasi' => $request->konfirmasi,
            'status_pasien' => $request->status_pasien,
            'lokasi_pasien' => $request->lokasi_pasien,
            'tanggal_status' => $request->tanggal_status,
            'foto_status_pasien' => $imgName,
            'status_akhir' => $request->status_akhir,
            'tanggal_status_akhir' => $request->tanggal_status_akhir,
            'no_hp' => $request->no_hp,
        ]);
        return redirect('/covid19')->with('success', 'Data Covid-19 Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Covid19  $covid19
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $covid19 = Covid19::find($id);
        return view('covid.show', ['covid19' => $covid19]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Covid19  $covid19
     * @return \Illuminate\Http\Response
     */
    public function edit(Covid19 $covid19)
    {
        $warga = Warga::all();
        return view ('covid.edit', compact('covid19', 'warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Covid19  $covid19
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Covid19 $covid19)
    {
        $request->validate([
            'warga_id' => 'required',
            'domisili' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'konfirmasi' => 'required',
            'status_pasien' => 'required',
            'lokasi_pasien' => 'required',
            'tanggal_status' => 'required',
            'foto_status_pasien' => 'required',
            'status_akhir' => 'required',
            'tanggal_status_akhir' => 'required',    
            'no_hp' => 'required',         
        ]);

        Covid19::where('id', $covid19->id)
        ->update([
            'warga_id' => $request->warga_id,
            'domisili' => $request->domisili,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'konfirmasi' => $request->konfirmasi,
            'status_pasien' => $request->status_pasien,
            'lokasi_pasien' => $request->lokasi_pasien,
            'tanggal_status' => $request->tanggal_status,
            'foto_status_pasien' => $request->foto_status_pasien,
            'status_akhir' => $request->status_akhir,
            'tanggal_status_akhir' => $request->tanggal_status_akhir,
            'no_hp' => $request->no_hp,
        ]);
        if ($request->hasFile('foto_status_pasien')){
            $request->file('foto_status_pasien')->move('images/',$request->file('foto_status_pasien')->getClientOriginalName());
            $covid19->foto_status_pasien = $request->file('foto_status_pasien')->getClientOriginalName();
            $covid19->save();
        }
        return redirect('/covid19')->with('success', 'Data TKK Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Covid19  $covid19
     * @return \Illuminate\Http\Response
     */
    public function destroy(Covid19 $covid19)
    {
        Covid19::destroy($covid19->id);
        return redirect()->back();
    }
}
