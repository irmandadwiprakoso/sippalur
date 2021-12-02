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
        if(auth()->user()->role == 'superadmin')
        {
            $ksbrw = Ksbrw::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin_pemtibum')
        {
            $ksbrw = Ksbrw::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin')
        {
            $ksbrw = Ksbrw::orderbyRaw('rw_id', 'DESC')->get();
        }

        if (auth()->user()->rw_id == '1')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->rw_id == '2')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->rw_id == '3')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->rw_id == '4')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->rw_id == '5')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->rw_id == '6')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->rw_id == '7')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->rw_id == '8')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '8')->get();
        }
        if (auth()->user()->rw_id == '9')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->rw_id == '10')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->rw_id == '11')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->rw_id == '12')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->rw_id == '13')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->rw_id == '14')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->rw_id == '15')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->rw_id == '16')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->rw_id == '17')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->rw_id == '18')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->rw_id == '19')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->rw_id == '20')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->rw_id == '21')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->rw_id == '22')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->rw_id == '23')
        {
            $ksbrw = Ksbrw::where('rw_id', '=', '23')->get();
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
    'tmt_awal' => 'required',
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
    'tmt_awal.required' => 'Harus di Isi Yaa',
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

    public function getdataksbrw()
    {
        ////////////////////////// AKUN ADMIN /////////////////////////////
        if(auth()->user()->role == 'superadmin'){
            $ksbrw = Ksbrw::select('ksbrw.*')->orderBy('rw_id', 'asc')->orderBy('jabatan_id', 'asc');
        }
        if(auth()->user()->role == 'admin'){
            $ksbrw = Ksbrw::select('ksbrw.*')->orderBy('rw_id', 'asc')->orderBy('jabatan_id', 'asc');
        }
        if(auth()->user()->role == 'sekret'){
            $ksbrw = Ksbrw::select('ksbrw.*')->orderBy('rw_id', 'asc')->orderBy('jabatan_id', 'asc');
        }
        if(auth()->user()->role == 'kessos'){
            $ksbrw = Ksbrw::select('ksbrw.*')->orderBy('rw_id', 'asc')->orderBy('jabatan_id', 'asc');
        }
        if(auth()->user()->role == 'pemtibum'){
            $ksbrw = Ksbrw::select('ksbrw.*')->orderBy('rw_id', 'asc')->orderBy('jabatan_id', 'asc');
        }
        if(auth()->user()->role == 'permasbang'){
            $ksbrw = Ksbrw::select('ksbrw.*')->orderBy('rw_id', 'asc')->orderBy('jabatan_id', 'asc');
        }
        ///////////// AKUN PAMOR //////////////////////////////////
        if (auth()->user()->rw_id == '1'){
        $ksbrw = Ksbrw::where('rw_id', '=', '1')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '2'){
        $ksbrw = Ksbrw::where('rw_id', '=', '2')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '3'){
        $ksbrw = Ksbrw::where('rw_id', '=', '3')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '4'){
        $ksbrw = Ksbrw::where('rw_id', '=', '4')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '5'){
        $ksbrw = Ksbrw::where('rw_id', '=', '5')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '6'){
        $ksbrw = Ksbrw::where('rw_id', '=', '6')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '7'){
        $ksbrw = Ksbrw::where('rw_id', '=', '7')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '8'){
        $ksbrw = Ksbrw::where('rw_id', '=', '9')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '10'){
        $ksbrw = Ksbrw::where('rw_id', '=', '10')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '11'){
        $ksbrw = Ksbrw::where('rw_id', '=', '11')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '12'){
        $ksbrw = Ksbrw::where('rw_id', '=', '12')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '13'){
        $ksbrw = Ksbrw::where('rw_id', '=', '13')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '14'){
        $ksbrw = Ksbrw::where('rw_id', '=', '14')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '15'){
        $ksbrw = Ksbrw::where('rw_id', '=', '15')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '16'){
        $ksbrw = Ksbrw::where('rw_id', '=', '16')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '17'){
        $ksbrw = Ksbrw::where('rw_id', '=', '17')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '18'){
        $ksbrw = Ksbrw::where('rw_id', '=', '18')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '19'){
        $ksbrw = Ksbrw::where('rw_id', '=', '19')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '20'){
        $ksbrw = Ksbrw::where('rw_id', '=', '20')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '21'){
        $ksbrw = Ksbrw::where('rw_id', '=', '21')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '22'){
        $ksbrw = Ksbrw::where('rw_id', '=', '22')->orderBy('jabatan_id', 'asc');
        }
        if (auth()->user()->rw_id == '23'){
        $ksbrw = Ksbrw::where('rw_id', '=', '23')->orderBy('jabatan_id', 'asc');
        }

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
