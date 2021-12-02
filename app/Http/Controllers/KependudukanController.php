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

        if(auth()->user()->role == 'superadmin')
        {
            $kependudukan = Kependudukan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin_pemtibum')
        {
            $kependudukan = Kependudukan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'lurah')
        {
            $kependudukan = Kependudukan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin')
        {
            $kependudukan = Kependudukan::orderbyRaw('rw_id', 'DESC')->get();
        }

        if (auth()->user()->rw_id == '1')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->rw_id == '2')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->rw_id == '3')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->rw_id == '4')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->rw_id == '5')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->rw_id == '6')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->rw_id == '7')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->rw_id == '8')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '8')->get();
        }
        if (auth()->user()->rw_id == '9')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->rw_id == '10')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->rw_id == '11')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->rw_id == '12')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->rw_id == '13')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->rw_id == '14')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->rw_id == '15')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->rw_id == '16')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->rw_id == '17')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->rw_id == '18')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->rw_id == '19')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->rw_id == '20')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->rw_id == '21')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->rw_id == '22')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->rw_id == '23')
        {
            $kependudukan = Kependudukan::where('rw_id', '=', '23')->get();
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
        if(auth()->user()->role == 'superadmin'){
            $kependudukan = Kependudukan::select('kependudukan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'admin'){
            $kependudukan = Kependudukan::select('kependudukan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'sekret'){
            $kependudukan = Kependudukan::select('kependudukan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'kessos'){
            $kependudukan = Kependudukan::select('kependudukan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'pemtibum'){
            $kependudukan = Kependudukan::select('kependudukan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'permasbang'){
            $kependudukan = Kependudukan::select('kependudukan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        ///////////// AKUN PAMOR //////////////////////////////////
        if (auth()->user()->rw_id == '1'){
        $kependudukan = Kependudukan::where('rw_id', '=', '1')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '2'){
        $kependudukan = Kependudukan::where('rw_id', '=', '2')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '3'){
        $kependudukan = Kependudukan::where('rw_id', '=', '3')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '4'){
        $kependudukan = Kependudukan::where('rw_id', '=', '4')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '5'){
        $kependudukan = Kependudukan::where('rw_id', '=', '5')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '6'){
        $kependudukan = Kependudukan::where('rw_id', '=', '6')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '7'){
        $kependudukan = Kependudukan::where('rw_id', '=', '7')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '8'){
        $kependudukan = Kependudukan::where('rw_id', '=', '8')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '9'){
        $kependudukan = Kependudukan::where('rw_id', '=', '9')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '10'){
        $kependudukan = Kependudukan::where('rw_id', '=', '10')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '11'){
        $kependudukan = Kependudukan::where('rw_id', '=', '11')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '12'){
        $kependudukan = Kependudukan::where('rw_id', '=', '12')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '13'){
        $kependudukan = Kependudukan::where('rw_id', '=', '13')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '14'){
        $kependudukan = Kependudukan::where('rw_id', '=', '14')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '15'){
        $kependudukan = Kependudukan::where('rw_id', '=', '15')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '16'){
        $kependudukan = Kependudukan::where('rw_id', '=', '16')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '17'){
        $kependudukan = Kependudukan::where('rw_id', '=', '17')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '18'){
        $kependudukan = Kependudukan::where('rw_id', '=', '18')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '19'){
        $kependudukan = Kependudukan::where('rw_id', '=', '19')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '20'){
        $kependudukan = Kependudukan::where('rw_id', '=', '20')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '21'){
        $kependudukan = Kependudukan::where('rw_id', '=', '21')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '22'){
        $kependudukan = Kependudukan::where('rw_id', '=', '22')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '23'){
        $kependudukan = Kependudukan::where('rw_id', '=', '23')->orderBy('rt_id', 'asc');
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
