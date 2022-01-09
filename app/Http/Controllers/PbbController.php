<?php

namespace App\Http\Controllers;

use App\Pbb;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Rt;
use App\Rw;

class PbbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->role == 'superadmin'){
            $pbb = Pbb::orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc')->get();
        }
        if(auth()->user()->role == 'admin'){
            $pbb = Pbb::orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc')->get();
        }
        if(auth()->user()->role == 'sekret'){
            $pbb = Pbb::orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc')->get();
        }
        if(auth()->user()->role == 'kessos'){
            $pbb = Pbb::orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc')->get();
        }
        if(auth()->user()->role == 'pemtibum'){
            $pbb = Pbb::orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc')->get();
        }
        if(auth()->user()->role == 'permasbang'){
            $pbb = Pbb::orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc')->get();
        }

    ///////////// AKUN pbb //////////////////////////////////
        if (auth()->user()->rw_id == '1'){
        $pbb = Pbb::where('rw_id', '=', '1')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '2'){
        $pbb = Pbb::where('rw_id', '=', '2')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '3'){
        $pbb = Pbb::where('rw_id', '=', '3')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '4'){
        $pbb = Pbb::where('rw_id', '=', '4')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '5'){
        $pbb = Pbb::where('rw_id', '=', '5')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '6'){
        $pbb = Pbb::where('rw_id', '=', '6')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '7'){
        $pbb = Pbb::where('rw_id', '=', '7')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '8'){
        $pbb = Pbb::where('rw_id', '=', '8')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '9'){
        $pbb = Pbb::where('rw_id', '=', '9')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '10'){
        $pbb = Pbb::where('rw_id', '=', '10')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '11'){
        $pbb = Pbb::where('rw_id', '=', '11')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '12'){
        $pbb = Pbb::where('rw_id', '=', '12')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '13'){
        $pbb = Pbb::where('rw_id', '=', '13')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '14'){
        $pbb = Pbb::where('rw_id', '=', '14')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '15'){
        $pbb = Pbb::where('rw_id', '=', '15')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '16'){
        $pbb = Pbb::where('rw_id', '=', '16')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '17'){
        $pbb = Pbb::where('rw_id', '=', '17')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '18'){
        $pbb = Pbb::where('rw_id', '=', '18')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '19'){
        $pbb = Pbb::where('rw_id', '=', '19')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '20'){
        $pbb = Pbb::where('rw_id', '=', '20')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '21'){
        $pbb = Pbb::where('rw_id', '=', '21')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '22'){
        $pbb = Pbb::where('rw_id', '=', '22')->orderBy('rt_id', 'asc')->get();
        }
        if (auth()->user()->rw_id == '23'){
        $pbb = Pbb::where('rw_id', '=', '23')->orderBy('rt_id', 'asc')->get();
        }
        return view('pbb.index', ['pbb' => $pbb]);
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
        return view ('pbb.create', compact('rt', 'rw'));
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
            'NOP' => 'required',
            'NM_WP_SPPT' => 'required',
            'TOTAL_LUAS_BUMI' => 'required',
            'NJOP_BUMI_SPPT' => 'required',
            'TOTAL_LUAS_BNG' => 'required',
            'NJOP_BNG_SPPT' => 'required',
            'ALM_OP' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',      
            'ALM_WP' => 'required',      
            'PBB_TERHUTANG_SPPT' => 'required',      
            'TAHUN_SPPT' => 'required',      
            'KETERANGAN' => 'required',      
        ],
        [
            'NOP.required' => 'Harus di Isi',
            'NM_WP_SPPT.required' => 'Harus di Isi',
            'TOTAL_LUAS_BUMI.required' => 'Harus di Isi',
            'NJOP_BUMI_SPPT.required' => 'Harus di Isi',
            'TOTAL_LUAS_BNG.required' => 'Harus di Isi',
            'NJOP_BNG_SPPT.required' => 'Harus di Isi',
            'ALM_OP.required' => 'Harus di Isi',
            'rt_id.required' => 'Harus di Isi',
            'rw_id.required' => 'Harus di Isi',
            'ALM_WP.required' => 'Harus di Isi',
            'PBB_TERHUTANG_SPPT.required' => 'Harus di Isi',
            'TAHUN_SPPT.required' => 'Harus di Isi',
            'KETERANGAN.required' => 'Harus di Isi',
        ]
    );
        pbb::create([
            'NOP' => $request->NOP,
            'NM_WP_SPPT' => $request->NM_WP_SPPT,
            'TOTAL_LUAS_BUMI' => $request->TOTAL_LUAS_BUMI,
            'NJOP_BUMI_SPPT' => $request->NJOP_BUMI_SPPT,
            'TOTAL_LUAS_BNG' => $request->TOTAL_LUAS_BNG,
            'NJOP_BNG_SPPT' => $request->NJOP_BNG_SPPT,
            'ALM_OP' => $request->ALM_OP,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'ALM_WP' => $request->ALM_WP,
            'PBB_TERHUTANG_SPPT' => $request->PBB_TERHUTANG_SPPT,
            'TAHUN_SPPT' => $request->TAHUN_SPPT,
            'KETERANGAN' => $request->KETERANGAN,
        ]);

        return redirect('/pbb')->with('success', 'Data PBB Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pbb = Pbb::find($id);
        return view('pbb.show', ['pbb' => $pbb]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function edit(pbb $pbb)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('pbb.edit', compact('pbb', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pbb $pbb)
    {
        $request->validate([
            'rt_id' => 'required',
            'rw_id' => 'required',          
            'KETERANGAN' => 'required',        
        ]);

        pbb::where('id', $pbb->id)
        ->update([
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'KETERANGAN' => $request->KETERANGAN,
        ]);

        return redirect('/pbb')->with('success', 'Data PBB Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function destroy(pbb $pbb)
    {
        //
    }

    public function hapuspbb(Request $request)
    {
        $id = $request->id;
        $pbb = Pbb::find($id);
        $pbb->delete();
        return redirect()->back();
    }

    public function getdatapbb(Request $request)
    {
        if($request->input('tahun')!=null){
            if(auth()->user()->role == 'superadmin'){
                $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
            if(auth()->user()->role == 'admin'){
                $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
            if(auth()->user()->role == 'sekret'){
                $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
            if(auth()->user()->role == 'kessos'){
                $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
            if(auth()->user()->role == 'pemtibum'){
                $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
            if(auth()->user()->role == 'permasbang'){
                $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
            }
 
        ///////////// AKUN pbb //////////////////////////////////
            if (auth()->user()->rw_id == '1'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '1')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '2'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '2')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '3'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '3')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '4'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '4')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '5'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '5')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '6'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '6')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '7'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '7')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '8'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '8')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '9'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '9')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '10'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '10')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '11'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '11')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '12'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '12')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '13'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '13')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '14'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '14')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '15'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '15')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '16'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '16')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '17'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '17')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '18'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '18')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '19'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '19')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '20'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '20')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '21'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '21')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '22'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '22')->orderBy('rt_id', 'asc');
            }
            if (auth()->user()->rw_id == '23'){
            $pbb = Pbb::where('TAHUN_SPPT', $request->tahun)->where('rw_id', '=', '23')->orderBy('rt_id', 'asc');
            }
        }
        return DataTables::eloquent($pbb)
        ->addIndexColumn()
        ->addColumn('rt', function($pbb){
            return $pbb->rt->rt;    
            })
        ->addColumn('rw', function($pbb){
            return $pbb->rw->rw;    
            })
        ->addColumn('view', function($pbb){
            return '<a href="/pbb/'.$pbb->id.'" class="btn btn-info" title="View">  
             <i class="glyphicon glyphicon-search"></i></a>';
            })
        ->addColumn('edit', function($pbb){
            return '<a href="/pbb/'.$pbb->id.'/edit" class="btn btn-warning" title="Edit">
             <i class="glyphicon glyphicon-pencil"></i></a>';
            })
        ->addColumn('hapus', function($pbb){
            if (auth()->user()->role == 'superadmin'){
            $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$pbb->id."' ><i class='fa fa-trash'></i></button>";
            return $button;
            }
            if (auth()->user()->role == 'permasbang'){
            $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$pbb->id."' ><i class='fa fa-trash'></i></button>";
            return $button;
            }
        })
        ->rawColumns(['rt','rw','view','edit', 'hapus'])
        ->toJson();
    }

}
