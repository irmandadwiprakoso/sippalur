<?php

namespace App\Http\Controllers;

use App\Kependudukan;
use App\Rt;
use App\Rw;
use Illuminate\Http\Request;
use App\Exports\KependudukanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KependudukanController extends Controller
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
            $kependudukan = Kependudukan::orderby('rw_id', 'asc')->get();
        }else{
            $kependudukan = Kependudukan::where('rw_id', '=', auth()->user()->rw_id)->orderby('rt_id', 'asc')->get();
        }
        return view('kependudukan.index', ['kependudukan' => $kependudukan]);
    }
    public function exportkependudukan() 
    {
        return Excel::download(new KependudukanExport, 'penduduk-jakasampurna.xlsx');
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
        return view ('kependudukan.create', compact('rt', 'rw'));
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
            'rt_id' => 'required',
            'rw_id' => 'required',
            'KK' => 'required',
            'Laki_laki' => 'required',
            'Perempuan' => 'required',
        ]);
        Kependudukan::create([
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'KK' => $request->KK,
            'Laki_laki' => $request->Laki_laki,
            'Perempuan' => $request->Perempuan,
            
        ]);
        // Kependudukan::create($request->all());
        return redirect('/kependudukan')->with('success', 'Data Kependudukan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function show(Kependudukan $kependudukan)
    {
        return view ('kependudukan.show', compact('kependudukan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kependudukan $kependudukan)
    {
        $rt = RT::all();
        $rw = RW::all();
        return view ('kependudukan.edit', compact('kependudukan', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kependudukan $kependudukan)
    {
        //dd($request->all());
        $request->validate([
            'rt_id' => 'required',
            'rw_id' => 'required',
            'KK' => 'required',
            'Laki_laki' => 'required',
            'Perempuan' => 'required',
        ]);

        Kependudukan::where('id', $kependudukan->id)
        ->update([
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'KK' => $request->KK,
            'Laki_laki' => $request->Laki_laki,
            'Perempuan' => $request->Perempuan,
        ]);
        return redirect('/kependudukan')->with('success', 'Data Kependudukan Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kependudukan  $kependudukan
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Kependudukan $kependudukan)
    // {
    //     Kependudukan::destroy($kependudukan->id);
    //     return redirect()->back();
    // }

    public function hapuskependudukan(Request $request)
    {
        $id = $request->id;
        $kependudukan = Kependudukan::find($id);
        $kependudukan->delete();
        return redirect()->back();
    }

    public function getdatakependudukan()
    {
        ////////////////////////// AKUN ADMIN /////////////////////////////
        if(auth()->user()->role != 'user'){
            $kependudukan = Kependudukan::select('kependudukan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }else {
            $kependudukan = Kependudukan::where('rw_id', '=', auth()->user()->rw_id )->orderBy('rt_id', 'asc');
        }

        // $kependudukan = Kependudukan::select('kependudukan.*');
        return DataTables::eloquent($kependudukan)
        ->addIndexColumn()
        ->addColumn('total', function($kependudukan){
            return $kependudukan->Perempuan + $kependudukan->Laki_laki;    
            })

        ->addColumn('rt', function($kependudukan){
            return $kependudukan->rt->rt;    
            })
        ->addColumn('rw', function($kependudukan){
            return $kependudukan->rw->rw;    
            })

        ->addColumn('edit', function($kependudukan){
                return '<a href="kependudukan/'.$kependudukan->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
        })

        ->addColumn('hapus', function($kependudukan){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$kependudukan->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
        })
        
        ->rawColumns(['total','rt','rw','view','edit', 'hapus'])
        ->toJson();
        
        }


}
