<?php

namespace App\Http\Controllers;

use App\Covid19;
use App\Warga;
use Illuminate\Http\Request;
use App\Exports\Covid19Export;
use Maatwebsite\Excel\Facades\Excel;

class Covid19Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $covid19 = Covid19::all();
        return view('covid.index', ['covid19' => $covid19]);
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
        return view ('covid.create', compact('warga'));
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
