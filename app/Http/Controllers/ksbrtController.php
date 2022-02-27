<?php

namespace App\Http\Controllers;

use App\Ksbrt;
use App\Ktp;
use App\Rt;
use App\Rw;
use App\Jabatan;
use App\Exports\ksbrtExport;
use App\Ksbrw;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ksbrtController extends Controller
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
            $ksbrt = Ksbrt::orderby('rw_id', 'asc')->orderby('rt_id', 'asc')->get();
        }else {
            $ksbrt = Ksbrt::where('rw_id', '=', auth()->user()->rw_id)->orderby('rt_id', 'asc')->get();
        }

        return view('ksbrt.index', ['ksbrt' => $ksbrt]);
    }

    public function ksbrtexport()
    {
        return Excel::download(new ksbrtexport,'ksbrt-jakasampurna.csv');
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
        return view ('ksbrt.create', compact('ktp','rt','rw','jabatan'));
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
    'ktp_id' => 'required|unique:ksbrt,ktp_id',
    'jabatan_id' => 'required',
    'rt_id' => 'required',
    'rw_id' => 'required',
    'no_sk' => 'required',
    'tmt_mulai' => 'required',
    'no_hp' => 'required',
    // 'no_rek' => 'required',    
    // 'npwp' => 'required',        
],
[
    'ktp_id.required' => 'Harus di Isi Yaa',
    'ktp_id.unique' => 'NIK Sudah Digunakan',
    'jabatan_id.required' => 'Harus di Isi Yaa',
    'rt_id.required' => 'Harus di Isi Yaa',
    'rw_id.required' => 'Harus di Isi Yaa',
    'no_sk.required' => 'Harus di Isi Yaa',
    'tmt_mulai.required' => 'Harus di Isi Yaa',
    'no_hp.required' => 'Harus di Isi Yaa',
]
);
Ksbrt::create([
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
// Ksbrt::create($request->all());
return redirect('/ksbrt')->with('success', 'Data RT Berhasil Ditambahkan!');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ksbrt = Ksbrt::find($id);
        return view('ksbrt.show', ['ksbrt' => $ksbrt]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function edit(Ksbrt $ksbrt)
    {
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        $jabatan = Jabatan::all();
        return view ('ksbrt.edit', compact('ksbrt', 'ktp', 'jabatan','rt','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ksbrt $ksbrt)
    {
        $request->validate([
            // 'ktp_id' => 'required',
            'jabatan_id' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'no_sk' => 'required',
            'tmt_mulai' => 'required',
            'no_hp' => 'required',
            // 'no_rek' => 'required',    
            // 'npwp' => 'required',        
        ]);

        Ksbrt::where('id', $ksbrt->id)
        ->update([
            // 'ktp_id' => $request->ktp_id,
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

        return redirect('/ksbrt')->with('success', 'Data RT Berhasil Di Update!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ksbrt  $ksbrt
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Ksbrt $ksbrt)
    // {
    //     Ksbrt::destroy($ksbrt->id);
    //     return redirect()->back();
    // }
    public function hapusksbrt(Request $request)
    {
        $id = $request->id;
        $ksbrt = Ksbrt::find($id);
        $ksbrt->delete();
        return redirect()->back();
    }

    public function getdataksbrt(Request $request)
    {
        if(auth()->user()->role != 'user'){          
            if($request->input('rw')!=null){
                $ksbrt = Ksbrt::where('rw_id', $request->rw)->orderBy('rt_id', 'asc')->orderBy('jabatan_id', 'asc');
            }else {
                $ksbrt = Ksbrt::orderby('rw_id', 'asc')->orderBy('rt_id', 'asc')->orderBy('jabatan_id', 'asc');
            }
        }else 
            $ksbrt = Ksbrt::where('rw_id', '=', auth()->user()->rw_id)->orderby('rw_id', 'asc')->orderBy('rt_id', 'asc')->orderBy('jabatan_id', 'asc');

        return DataTables::eloquent($ksbrt)
        ->addIndexColumn()
        ->addColumn('nama', function($ksbrt){
            return $ksbrt->ktp->nama;    
            })
        ->addColumn('jabatan', function($ksbrt){
            return $ksbrt->jabatan->jabatan;    
            })
        ->addColumn('rt', function($ksbrt){
            return $ksbrt->rt->rt;    
            })
        ->addColumn('rw', function($ksbrt){
            return $ksbrt->rw->rw;    
            })

        ->addColumn('view', function($ksbrt){
                return '<a href="/ksbrt/'.$ksbrt->id.'" class="btn btn-info" title="View">  
                <i class="glyphicon glyphicon-search"></i></a>';           
        })

        ->addColumn('edit', function($ksbrt){
                return '<a href="/ksbrt/'.$ksbrt->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
        })

        ->addColumn('hapus', function($ksbrt){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$ksbrt->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
        })
        ->rawColumns(['nama','jabatan', 'rt','rw','view','edit', 'hapus'])
        ->toJson();
        }
}
