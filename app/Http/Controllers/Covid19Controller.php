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
        if(auth()->user()->username == 'admin_permasbang')
        {
            $covid19 = Covid19::all();
        }
        if(auth()->user()->username == 'admin_pemtibum')
        {
            $covid19 = Covid19::all();
        }
        if(auth()->user()->username == 'admin_sekret')
        {
            $covid19 = Covid19::all();
        }
        if(auth()->user()->username == 'lurah')
        {
            $covid19 = Covid19::all();
        }
        if(auth()->user()->role == 'admin')
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
        if (auth()->user()->username == 'pamor6')
        {
            $covid19 = Covid19::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->username == 'pamor23')
        {
            $covid19 = Covid19::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor7')
        {
            $covid19 = Covid19::where('rw_id', '=', '8')->get();
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

        return view('covid.index', ['covid19' => $covid19]);
    }

    public function covid19export()
    {
        return Excel::download(new Covid19Export,'covid19-jakasampurna.csv');
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
            'foto_KTP' => 'required',
            'foto_KK' => 'required',
            'domisili' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'konfirmasi' => 'required',
            'status_pasien' => 'required',
            'lokasi_pasien' => 'required',
            'foto_status_pasien' => 'required',
            'hasil_test' => 'required',
            'status_akhir' => 'required',
            'tanggal_status_akhir' => 'required',    
            // 'foto_status_akhir' => 'required',
            'no_hp' => 'required',        
            'tinjut' => 'required',        
            'keterangan' => 'required',        
            'sumbercovid' => 'required',        
        ]);
        
        $imgName1 = $request->foto_KTP->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto_KTP->extension();
        $request->foto_KTP->move('images/Covid19/KTP/',$imgName1);

        $imgName2 = $request->foto_KK->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto_KK->extension();
        $request->foto_KK->move('images/Covid19/KK/',$imgName2);

        $imgName3 = $request->foto_status_pasien->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto_status_pasien->extension();
        $request->foto_status_pasien->move('images/Covid19/StatusAwalPasien/',$imgName3);

        $imgName4 = $request->foto_status_akhir->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto_status_akhir->extension();
        $request->foto_status_akhir->move('images/Covid19/StatusAkhirPasien/',$imgName4);
        
        // $imgName5 = $request->fotomonitoring1->getClientOriginalName() . '-' . time() 
        // . '.' . $request->fotomonitoring1->extension();
        // $request->fotomonitoring1->move('images/Covid19/Monitoring1/',$imgName5);
        
        // $imgName6 = $request->fotomonitoring2->getClientOriginalName() . '-' . time() 
        // . '.' . $request->fotomonitoring2->extension();
        // $request->fotomonitoring2->move('images/Covid19/Monitoring2/',$imgName6);
        
        // $imgName7 = $request->fotomonitoring3->getClientOriginalName() . '-' . time() 
        // . '.' . $request->fotomonitoring3->extension();
        // $request->fotomonitoring3->move('images/Covid19/Monitoring3/',$imgName7);
        
        // Covid19::create($request->all());
        Covid19::create([
            'warga_id' => $request->warga_id,
            'foto_KTP' => $imgName1,
            'foto_KK' => $imgName2,
            'domisili' => $request->domisili,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'konfirmasi' => $request->konfirmasi,
            'status_pasien' => $request->status_pasien,
            'lokasi_pasien' => $request->lokasi_pasien,
            'foto_status_pasien' => $imgName3,
            'hasil_test' => $request->hasil_test,
            'tglmonitoring1' => $request->tglmonitoring1,
            'monitoring1' => $request->monitoring1,
            // 'fotomonitoring1' => $imgName5,
            'tglmonitoring2' => $request->tglmonitoring2,
            'monitoring2' => $request->monitoring2,
            // 'fotomonitoring2' => $imgName6,
            'tglmonitoring3' => $request->tglmonitoring3,
            'monitoring3' => $request->monitoring3,
            // 'fotomonitoring3' => $imgName7,
            'status_akhir' => $request->status_akhir,
            'tanggal_status_akhir' => $request->tanggal_status_akhir,
            'foto_status_akhir' => $imgName4,
            'no_hp' => $request->no_hp,
            'tinjut' => $request->tinjut,
            'keterangan' => $request->keterangan,
            'sumbercovid' => $request->sumbercovid,
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
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('covid.edit', compact('covid19', 'warga','rt','rw'));
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
            // 'foto_KTP' => 'required',
            // 'foto_KK' => 'required',
            'domisili' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'konfirmasi' => 'required',
            'status_pasien' => 'required',
            'lokasi_pasien' => 'required',
            // 'foto_status_pasien' => 'required',
            'hasil_test' => 'required',
            'status_akhir' => 'required',
            'tanggal_status_akhir' => 'required',    
            // 'foto_status_akhir' => 'required',
            'no_hp' => 'required',        
            'tinjut' => 'required',        
            'keterangan' => 'required',        
            'sumbercovid' => 'required',           
        ]);

        Covid19::where('id', $covid19->id)
        ->update([
            'warga_id' => $request->warga_id,
            // 'foto_KTP' => $request->foto_KTP,
            // 'foto_KK' => $request->foto_KK,
            'domisili' => $request->domisili,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'konfirmasi' => $request->konfirmasi,
            'status_pasien' => $request->status_pasien,
            'lokasi_pasien' => $request->lokasi_pasien,
            // 'foto_status_pasien' => $request->foto_status_pasien,
            'hasil_test' => $request->hasil_test,
            'status_akhir' => $request->status_akhir,
            'tanggal_status_akhir' => $request->tanggal_status_akhir,
            // 'foto_status_akhir' => $request->foto_status_akhir,
            'no_hp' => $request->no_hp,
            'tinjut' => $request->tinjut,
            'keterangan' => $request->keterangan,
            'sumbercovid' => $request->sumbercovid,
        ]);
        if ($request->hasFile('foto_KTP')){
            $request->file('foto_KTP')->move('images/Covid19/KTP/',$request->file('foto_KTP')->getClientOriginalName());
            $covid19->foto_KTP = $request->file('foto_KTP')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('foto_KK')){
            $request->file('foto_KK')->move('images/Covid19/KK/',$request->file('foto_KK')->getClientOriginalName());
            $covid19->foto_KK = $request->file('foto_KK')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('foto_status_pasien')){
            $request->file('foto_status_pasien')->move('images/Covid19/StatusAwalPasien/',$request->file('foto_status_pasien')->getClientOriginalName());
            $covid19->foto_status_pasien = $request->file('foto_status_pasien')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('foto_status_akhir')){
            $request->file('foto_status_akhir')->move('images/Covid19/StatusAkhirPasien/',$request->file('foto_status_akhir')->getClientOriginalName());
            $covid19->foto_status_akhir = $request->file('foto_status_akhir')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('fotomonitoring1')){
            $request->file('fotomonitoring1')->move('images/Covid19/Monitoring1/',$request->file('fotomonitoring1')->getClientOriginalName());
            $covid19->fotomonitoring1 = $request->file('fotomonitoring1')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('fotomonitoring2')){
            $request->file('fotomonitoring2')->move('images/Covid19/Monitoring2/',$request->file('fotomonitoring2')->getClientOriginalName());
            $covid19->fotomonitoring2 = $request->file('fotomonitoring2')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('fotomonitoring3')){
            $request->file('fotomonitoring3')->move('images/Covid19/Monitoring3/',$request->file('fotomonitoring3')->getClientOriginalName());
            $covid19->fotomonitoring3 = $request->file('fotomonitoring3')->getClientOriginalName();
            $covid19->save();
        }
        return redirect('/covid19')->with('success', 'Data Covid-19 Berhasil Di Update!');
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
