<?php

namespace App\Http\Controllers;

use App\Pamor;
use App\Rt;
use App\Rw;
use App\User;
use Illuminate\Http\Request;
use App\Exports\PamorExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class PamorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'superadmin')
        {
            $pamor = Pamor::orderbyRaw('tanggal', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin')
        {
            $pamor = Pamor::orderbyRaw('tanggal', 'DESC')->get();
        }
        if(auth()->user()->role == 'sekret')
        {
            $pamor = Pamor::orderbyRaw('tanggal', 'DESC')->get();
        }
        if(auth()->user()->role == 'kessos')
        {
            $pamor = Pamor::orderbyRaw('tanggal', 'DESC')->get();
        }
        if(auth()->user()->role == 'permasbang')
        {
            $pamor = Pamor::orderbyRaw('tanggal', 'DESC')->get();
        }
        if(auth()->user()->role == 'pemtibum')
        {
            $pamor = Pamor::orderbyRaw('tanggal', 'DESC')->get();
        }

        if (auth()->user()->role == 'user')
        {
            $pamor = Pamor::where('user_id',Auth()->user()->id)->get();
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
        $user = User::all();
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
            // 'foto' => 'required|max:10240',
            'rt_id' => 'required',
            'rw_id' => 'required',      
        ],
        [
            'tanggal.required' => 'Harus di Isi',
            'kegiatan.required' => 'Harus di Isi',
            'jumlah.required' => 'Harus di Isi',
            'bidang.required' => 'Harus di Isi',
            'keterangan.required' => 'Harus di Isi',
            'tinjut.required' => 'Harus di Isi',
            // 'foto.required' => 'Diupload yaa Foto Kegiatan Kamu',
            'rt_id.required' => 'Harus di Isi',
            'rw_id.required' => 'Harus di Isi',
        ]
    );
        // $imgName = $request->foto->getClientOriginalName() . '-' . time() 
        // . '.' . $request->foto->extension();
        // $request->foto->move('images/LaporanHarian/',$imgName);
        
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
            // 'foto' => $imgName,
            'user_id' => Auth::user()->id,
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
        $user = User::all();
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
            // 'foto' => 'max:10240',         
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
            // 'foto' => $request->foto,
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
    // public function destroy(Pamor $pamor)
    // {
    //     Pamor::destroy($pamor->id);
    //     return redirect()->back();
    // }


    public function hapus(Request $request)
    {
        $id = $request->id;
        $pamor = pamor::find($id);
        $pamor->delete();
        return redirect()->back();
    }


    public function getdatapamor(Request $request)
    {
        
        // if(auth()->user()->role == 'superadmin'){
        //     $pamor = Pamor::select('laporanpamor.*')
        //     ->orderBy('tanggal', 'desc')
        //     ->orderBy('rw_id', 'asc');    
        // }
        // if(auth()->user()->role == 'admin'){
        //     $pamor = Pamor::select('laporanpamor.*')->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc');
        // }
        // if(auth()->user()->role == 'sekret'){
        //     $pamor = Pamor::select('laporanpamor.*')->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc');
        // }
        // if(auth()->user()->role == 'kessos'){
        //     $pamor = Pamor::select('laporanpamor.*')->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc');
        // }
        // if(auth()->user()->role == 'pemtibum'){
        //     $pamor = Pamor::select('laporanpamor.*')->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc');
        // }
        // if(auth()->user()->role == 'permasbang'){
        //     $pamor = Pamor::select('laporanpamor.*')->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc');
        // }
        // if (auth()->user()->role == 'user'){
        //     $pamor = Pamor::where('user_id', Auth()->user()->id)
        //     ->orderBy('tanggal', 'desc')
        //     ->orderBy('rt_id', 'asc');
        // }

        if($request->input('bulan')!=null && ('tahun')!=null){
            if(auth()->user()->role == 'superadmin'){
                $pamor = Pamor::whereMonth('tanggal', $request->bulan)->whereYear('tanggal', $request->tahun)
                ->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc');
                }
            if(auth()->user()->role == 'admin'){
                $pamor = Pamor::whereMonth('tanggal', $request->bulan)->whereYear('tanggal', $request->tahun)
                ->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc');
                }
            if(auth()->user()->role == 'sekret'){
                $pamor = Pamor::whereMonth('tanggal', $request->bulan)->whereYear('tanggal', $request->tahun)
                ->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc')->where('bidang', '=', 'Sekretariat');
                }
            if(auth()->user()->role == 'kessos'){
                $pamor = Pamor::whereMonth('tanggal', $request->bulan)->whereYear('tanggal', $request->tahun)
                ->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc')->where('bidang', '=', 'Kessos');
                }
            if(auth()->user()->role == 'pemtibum'){
                $pamor = Pamor::whereMonth('tanggal', $request->bulan)->whereYear('tanggal', $request->tahun)
                ->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc')->where('bidang', '=', 'Pem & Trantibum');
                }
            if(auth()->user()->role == 'permasbang'){
                $pamor = Pamor::whereMonth('tanggal', $request->bulan)->whereYear('tanggal', $request->tahun)
                ->orderBy('tanggal', 'desc')->orderBy('rw_id', 'asc')->where('bidang', '=', 'Permasbang');
                }

            if (auth()->user()->role == 'user'){
                $pamor = Pamor::where('user_id', Auth()->user()->id)
                ->whereMonth('tanggal', $request->bulan)->whereYear('tanggal', $request->tahun)
                ->orderBy('tanggal', 'desc')->orderBy('rt_id', 'asc');
                }
    }
        return DataTables::eloquent($pamor)
        ->addIndexColumn()
        
        ->addColumn('name', function($pamor){
            return $pamor->user['name'];    
            })
        ->addColumn('rt', function($pamor){
            return $pamor->rt->rt;    
            })
        ->addColumn('rw', function($pamor){
            return $pamor->rw->rw;    
            })
        ->addColumn('view', function($pamor){
            return '<a href="/pamor/'.$pamor->id.'" class="btn btn-info" title="View">  
            <i class="glyphicon glyphicon-search"></i></a>';
        })

        ->addColumn('edit', function($pamor){
            return '<a href="/pamor/'.$pamor->id.'/edit" class="btn btn-warning" title="Edit">
            <i class="glyphicon glyphicon-pencil"></i></a>';
        })

        ->addColumn('hapus', function($pamor){
            $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$pamor->id."' ><i class='fa fa-trash'></i></button>";
            return $button;
        })

        ->rawColumns(['name','rt','rw','view','edit', 'hapus'])
        ->toJson();
    }
}
