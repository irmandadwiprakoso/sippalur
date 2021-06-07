<?php

namespace App\Http\Controllers;

use App\Exports\PendidikanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Pendidikan;
use App\Tipependidikan;
use App\Rt;
use App\Rw;

class SaranaPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        if(auth()->user()->username == 'superadmin')
        {
            $pendidikan = Pendidikan::all();
        }
        if(auth()->user()->username == 'lurah')
        {
            $pendidikan = Pendidikan::all();
        }
        if(auth()->user()->username == 'admin_kessos')
        {
            $pendidikan = Pendidikan::all();
        }
        if (auth()->user()->username == 'pamor1')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->username == 'pamor2')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->username == 'pamor3')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->username == 'pamor4')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->username == 'pamor5')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->username == 'pamor6A')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->username == 'pamor6B')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor7')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor8')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->username == 'pamor9')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->username == 'pamor10')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->username == 'pamor11')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->username == 'pamor12')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->username == 'pamor13')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->username == 'pamor14')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->username == 'pamor15')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->username == 'pamor16')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->username == 'pamor17')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->username == 'pamor18')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->username == 'pamor19')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->username == 'pamor20')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->username == 'pamor21')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->username == 'pamor22')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '23')->get();
        }
             
        // if ($request->has('search')){
        //     $pendidikan = Pendidikan::where('nama_sarana_pendidikan', 'LIKE', '%'.$request->search.'%')->get();
        // }else{
        //     $pendidikan = Pendidikan::all();
        // }
        return view('saranapendidikan.pendidikan', ['sarana_pendidikan' => $pendidikan]);
    }

    public function pendidikanexport(){
        return Excel::download(new PendidikanExport, 'sarana-pendidikan.xlsx');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipependidikan = Tipependidikan::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('saranapendidikan.create', compact('tipependidikan','rt', 'rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sarana_pendidikan' => 'required',
            'tipependidikan_id' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'nama_pimpinan' => 'required',
            'status_lahan' => 'required'
        ]);

        // ],[
        //     'nama_sarana_pendidikan.required' => 'ISI BOS'
        // ]);
        Pendidikan::create($request->all());
        return redirect('/pendidikan')->with('success', 'Data Sarana Pendidikan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param \App\Pendidikan $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        return view ('pendidikan.show', compact('pendidikan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param \App\Pendidikan $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        $tipependidikan = Tipependidikan::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('saranapendidikan.edit', compact('pendidikan', 'tipependidikan', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param \App\Pendidikan $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $request->validate([
            'nama_sarana_pendidikan' => 'required',
            'tipependidikan_id' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'nama_pimpinan' => 'required',
            'status_lahan' => 'required'
        ]);

        Pendidikan::where('id', $pendidikan->id)
        ->update([
            'nama_sarana_pendidikan' => $request->nama_sarana_pendidikan,
            'tipependidikan_id' => $request->tipependidikan_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'status_lahan' => $request->status_lahan 
        ]);

        return redirect('/pendidikan')->with('success', 'Data Sarana Pendidikan Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param \App\Pendidikan $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        Pendidikan::destroy($pendidikan->id);
        //return redirect('/pendidikan')->with('info', 'Data Sarana Pendidikan Berhasil Dihapus!');
        return redirect()->back();
    }
}
