<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\IbadahExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Ibadah;
use App\Tipeibadah;
use App\Rt;
use App\Rw;


class RumahIbadahController extends Controller
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
            $ibadah = Ibadah::all();
        }
        if(auth()->user()->username == 'admin_kessos')
        {
            $ibadah = Ibadah::all();
        }
        if(auth()->user()->username == 'lurah')
        {
            $ibadah = Ibadah::all();
        }
        if (auth()->user()->username == 'pamor1')
        {
            $ibadah = Ibadah::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->username == 'pamor2')
        {
            $ibadah = Ibadah::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->username == 'pamor3')
        {
            $ibadah = Ibadah::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->username == 'pamor4')
        {
            $ibadah = Ibadah::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->username == 'pamor5')
        {
            $ibadah = Ibadah::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->username == 'pamor6A')
        {
            $ibadah = Ibadah::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->username == 'pamor6B')
        {
            $ibadah = Ibadah::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor7')
        {
            $ibadah = Ibadah::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->username == 'pamor8')
        {
            $ibadah = Ibadah::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->username == 'pamor9')
        {
            $ibadah = Ibadah::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->username == 'pamor10')
        {
            $ibadah = Ibadah::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->username == 'pamor11')
        {
            $ibadah = Ibadah::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->username == 'pamor12')
        {
            $ibadah = Ibadah::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->username == 'pamor13')
        {
            $ibadah = Ibadah::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->username == 'pamor14')
        {
            $ibadah = Ibadah::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->username == 'pamor15')
        {
            $ibadah = Ibadah::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->username == 'pamor16')
        {
            $ibadah = Ibadah::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->username == 'pamor17')
        {
            $ibadah = Ibadah::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->username == 'pamor18')
        {
            $ibadah = Ibadah::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->username == 'pamor19')
        {
            $ibadah = Ibadah::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->username == 'pamor20')
        {
            $ibadah = Ibadah::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->username == 'pamor21')
        {
            $ibadah = Ibadah::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->username == 'pamor22')
        {
            $ibadah = Ibadah::where('rw_id', '=', '23')->get();
        }

        // if ($request->has('search')){
        //     $ibadah = Ibadah::where('nama_sarana_ibadah', 'LIKE', '%'.$request->search.'%')->get();
        // }else{
        //     $ibadah = Ibadah::all();
        // }
        return view('saranaibadah.index', ['sarana_ibadah' => $ibadah]);
    }

    public function ibadahexport()
    {
        return Excel::download(new IbadahExport,'saranaibadah.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipeibadah = Tipeibadah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('saranaibadah.create', compact('tipeibadah','rt', 'rw'));
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
            'nama_sarana_ibadah' => 'required',
            'tipeibadah_id' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'nama_pimpinan' => 'required',
            'status_lahan' => 'required'
        ]);

        Ibadah::create($request->all());
        return redirect('/ibadah')->with('success', 'Data Sarana Ibadah Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Ibadah $ibadah
     * @return \Illuminate\Http\Response
     */
    public function show(Ibadah $ibadah)
    {
        return view ('ibadah.show', compact('ibadah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Ibadah $ibadah
     * @return \Illuminate\Http\Response
     */
    public function edit(Ibadah $ibadah)
    {
        $tipeibadah = Tipeibadah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('saranaibadah.edit', compact('ibadah','tipeibadah', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Ibadah $ibadah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ibadah $ibadah)
    {
        $request->validate([
            'nama_sarana_ibadah' => 'required',
            'tipeibadah_id' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'nama_pimpinan' => 'required',
            'status_lahan' => 'required'
        ]);

        Ibadah::where('id', $ibadah->id)
        ->update([
            'nama_sarana_ibadah' => $request->nama_sarana_ibadah,
            'tipeibadah_id' => $request->tipeibadah_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'status_lahan' => $request->status_lahan
        ]);

        return redirect('/ibadah')->with('success', 'Data Sarana Ibadah Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Ibadah $ibadah
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Ibadah::destroy($id);
    //     //return redirect('/ibadah')->with('info', 'Data Sarana Ibadah Berhasil Dihapus!');
    //     return redirect('/ibadah');
    //     //return "delete";
    // }
    public function destroy(Ibadah $ibadah)
    {
        Ibadah::destroy($ibadah->id);
        //return redirect('/ibadah')->with('info', 'Data Sarana Ibadah Berhasil Dihapus!');
        return redirect()->back();
    }
}
