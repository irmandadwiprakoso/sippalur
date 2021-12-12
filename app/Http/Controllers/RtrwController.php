<?php

namespace App\Http\Controllers;

use App\Rtrw;
use App\Ktp;
use App\Rt;
use App\Rw;
use App\Jabatan;
use Illuminate\Http\Request;
use App\Exports\RtrwExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

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
            $rtrw = Rtrw::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->username == 'admin_pemtibum')
        {
            $rtrw = Rtrw::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin')
        {
            $rtrw = Rtrw::orderbyRaw('rw_id', 'DESC')->get();
        }

        if (auth()->user()->rw_id == '1')
        {
            $rtrw = Rtrw::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->rw_id == '2')
        {
            $rtrw = Rtrw::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->rw_id == '3')
        {
            $rtrw = Rtrw::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->rw_id == '4')
        {
            $rtrw = Rtrw::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->rw_id == '5')
        {
            $rtrw = Rtrw::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->rw_id == '6')
        {
            $rtrw = Rtrw::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->rw_id == '7')
        {
            $rtrw = Rtrw::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->rw_id == '8')
        {
            $rtrw = Rtrw::where('rw_id', '=', '8')->get();
        }
        if (auth()->user()->rw_id == '9')
        {
            $rtrw = Rtrw::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->rw_id == '10')
        {
            $rtrw = Rtrw::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->rw_id == '11')
        {
            $rtrw = Rtrw::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->rw_id == '12')
        {
            $rtrw = Rtrw::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->rw_id == '13')
        {
            $rtrw = Rtrw::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->rw_id == '14')
        {
            $rtrw = Rtrw::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->rw_id == '15')
        {
            $rtrw = Rtrw::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->rw_id == '16')
        {
            $rtrw = Rtrw::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->rw_id == '17')
        {
            $rtrw = Rtrw::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->rw_id == '18')
        {
            $rtrw = Rtrw::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->rw_id == '19')
        {
            $rtrw = Rtrw::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->rw_id == '20')
        {
            $rtrw = Rtrw::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->rw_id == '21')
        {
            $rtrw = Rtrw::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->rw_id == '22')
        {
            $rtrw = Rtrw::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->rw_id == '23')
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
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        return view ('rtrw.create', compact('ktp','rt','rw','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'ktp_id' => 'required|unique:rtrw,ktp_id',
            'jabatan_id' => 'required',
            'rw_id' => 'required',
            'no_sk' => 'required',
            'tmt_mulai' => 'required',
            'tmt_akhir' => 'required',
            'no_hp' => 'required',
            // 'no_rek' => 'required',    
            // 'npwp' => 'required',        
        ],
        [
            'ktp_id.required' => 'Harus di Isi Yaa',
            'ktp_id.unique' => 'NIK Sudah Digunakan',
            'jabatan_id.required' => 'Harus di Isi Yaa',
            'rw_id.required' => 'Harus di Isi Yaa',
            'no_sk.required' => 'Harus di Isi Yaa',
            'tmt_mulai.required' => 'Harus di Isi Yaa',
            'tmt_akhir.required' => 'Harus di Isi Yaa',
            'no_hp.required' => 'Harus di Isi Yaa',
        ]
    );
        Rtrw::create([
            'ktp_id' => $request->ktp_id,
            'jabatan_id' => $request->jabatan_id,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'no_sk' => $request->no_sk,
            'tmt_mulai' => $request->tmt_mulai,
            'tmt_akhir' => $request->tmt_akhir,
            'no_hp' => $request->no_hp,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
            'user_id' => Auth::user()->id,
        ]);
        // Rtrw::create($request->all());
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
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        return view ('rtrw.edit', compact('rtrw', 'ktp', 'jabatan','rt','rw'));
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
        // dd($request->all());
        $request->validate([
            // 'ktp_id' => 'required',
            'jabatan_id' => 'required',
            'rw_id' => 'required',
            'no_sk' => 'required',
            'tmt_mulai' => 'required',
            'tmt_akhir' => 'required',
            'no_hp' => 'required',
            // 'no_rek' => 'required',    
            // 'npwp' => 'required',        
        ]);

        Rtrw::where('id', $rtrw->id)
        ->update([
            'ktp_id' => $request->ktp_id,
            'jabatan_id' => $request->jabatan_id,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'no_sk' => $request->no_sk,
            'tmt_mulai' => $request->tmt_mulai,
            'tmt_akhir' => $request->tmt_akhir,
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
