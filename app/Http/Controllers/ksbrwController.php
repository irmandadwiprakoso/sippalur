<?php

namespace App\Http\Controllers;

use App\Ksbrw;
use App\Ktp;
use App\Rw;
use App\Jabatan;
use App\Exports\ksbrwExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ksbrwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role != 'user')
        {
            $ksbrw = Ksbrw::orderby('rw_id', 'asc')->get();
        }else {
            $ksbrw = Ksbrw::where('rw_id', '=', auth()->user()->rw_id)->get();
        }

        return view('ksbrw.index', ['ksbrw' => $ksbrw]);
    }

    public function ksbrwexport()
    {
        return Excel::download(new ksbrwexport,'ksbrw-jakasampurna.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ktp = Ktp::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        return view ('ksbrw.create', compact('ktp','rw','jabatan'));
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
    'ktp_id' => 'required|unique:ksbrw,ktp_id',
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
Ksbrw::create([
    'ktp_id' => $request->ktp_id,
    'jabatan_id' => $request->jabatan_id,
    'rw_id' => $request->rw_id,
    'no_sk' => $request->no_sk,
    'tmt_mulai' => $request->tmt_mulai,
    'tmt_akhir' => $request->tmt_akhir,
    'no_hp' => $request->no_hp,
    'no_rek' => $request->no_rek,
    'npwp' => $request->npwp,
    'user_id' => Auth::user()->id,
]);
// Ksbrw::create($request->all());
return redirect('/ksbrw')->with('success', 'Data RW Berhasil Ditambahkan!');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Ksbrw  $ksbrw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ksbrw = Ksbrw::find($id);
        return view('ksbrw.show', ['ksbrw' => $ksbrw]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ksbrw  $ksbrw
     * @return \Illuminate\Http\Response
     */
    public function edit(Ksbrw $ksbrw)
    {
        $ktp = Ktp::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        return view ('ksbrw.edit', compact('ksbrw', 'ktp', 'jabatan','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ksbrw  $ksbrw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ksbrw $ksbrw)
    {
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

        Ksbrw::where('id', $ksbrw->id)
        ->update([
            // 'ktp_id' => $request->ktp_id,
            'jabatan_id' => $request->jabatan_id,
            'rw_id' => $request->rw_id,
            'no_sk' => $request->no_sk,
            'tmt_mulai' => $request->tmt_mulai,
            'tmt_akhir' => $request->tmt_akhir,
            'no_hp' => $request->no_hp,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
        ]);

        return redirect('/ksbrw')->with('success', 'Data  RW Berhasil Di Update!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ksbrw  $ksbrw
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Ksbrw $ksbrw)
    // {
    //     Ksbrw::destroy($ksbrw->id);
    //     return redirect()->back();
    // }

    public function hapusksbrw(Request $request)
    {
        $id = $request->id;
        $ksbrw = Ksbrw::find($id);
        $ksbrw->delete();
        return redirect()->back();
    }

    public function getdataksbrw(Request $request)
    {
        if(auth()->user()->role != 'user'){          
            if($request->input('rw')!=null){
                $ksbrw = Ksbrw::where('rw_id', $request->rw)->orderBy('jabatan_id', 'asc');
            }else {
                $ksbrw = Ksbrw::orderby('rw_id', 'asc')->orderBy('jabatan_id', 'asc');
            }
        }else 
            $ksbrw = Ksbrw::where('rw_id', '=', auth()->user()->rw_id)->orderBy('jabatan_id', 'asc');
        
        // $ksbrw = Ksbrw::select('ksbrw.*');
        return DataTables::eloquent($ksbrw)
        ->addIndexColumn()
        ->addColumn('nama', function($ksbrw){
            return $ksbrw->ktp->nama;    
            })
        ->addColumn('jabatan', function($ksbrw){
            return $ksbrw->jabatan->jabatan;    
            })
        ->addColumn('rw', function($ksbrw){
            return $ksbrw->rw->rw;    
            })

        ->addColumn('view', function($ksbrw){
                return '<a href="/ksbrw/'.$ksbrw->id.'" class="btn btn-info" title="View">  
                <i class="glyphicon glyphicon-search"></i></a>';           
        })

        ->addColumn('edit', function($ksbrw){
                return '<a href="/ksbrw/'.$ksbrw->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
        })

        ->addColumn('hapus', function($ksbrw){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$ksbrw->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
        })

        ->rawColumns(['nama','jabatan','rw','view','edit', 'hapus'])
        ->toJson();
        }
}
