<?php

namespace App\Http\Controllers;

use App\Exports\PendidikanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Pendidikan;
use App\Tipependidikan;
use App\Rt;
use App\Rw;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SaranaPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        if(auth()->user()->role == 'superadmin')
        {
            $pendidikan = Pendidikan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'lurah')
        {
            $pendidikan = Pendidikan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin')
        {
            $pendidikan = Pendidikan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'kessos')
        {
            $pendidikan = Pendidikan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'permasbang')
        {
            $pendidikan = Pendidikan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'sekret')
        {
            $pendidikan = Pendidikan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'pemtibum')
        {
            $pendidikan = Pendidikan::orderbyRaw('rw_id', 'DESC')->get();
        }

        if (auth()->user()->rw_id == '1')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->rw_id == '2')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->rw_id == '3')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->rw_id == '4')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->rw_id == '5')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->rw_id == '6')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->rw_id == '7')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->rw_id == '8')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '8')->get();
        }
        if (auth()->user()->rw_id == '9')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->rw_id == '10')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->rw_id == '11')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->rw_id == '12')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->rw_id == '13')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->rw_id == '14')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->rw_id == '15')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->rw_id == '16')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->rw_id == '17')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->rw_id == '18')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->rw_id == '19')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->rw_id == '20')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->rw_id == '21')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->rw_id == '22')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->rw_id == '23')
        {
            $pendidikan = Pendidikan::where('rw_id', '=', '23')->get();
        }
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
            
        ],
        [
            'nama_sarana_pendidikan.required' => 'Harus Di isi yaa',
            'tipependidikan_id.required' => 'Harus Di isi yaa',
            'alamat.required' => 'Harus Di isi yaa',
            'rt_id.required' => 'Harus Di isi yaa',
            'rw_id.required' => 'Harus Di isi yaa',
            'nama_pimpinan.required' => 'Harus Di isi yaa',
           
        ]
    );
        Pendidikan::create([
            'nama_sarana_pendidikan' => $request->nama_sarana_pendidikan,
            'tipependidikan_id' => $request->tipependidikan_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'status_lahan' => $request->status_lahan,
            'no_hp' => $request->no_hp,
            // 'user_id' => Auth::user()->id,
        ]);
        // Pendidikan::create($request->all());
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
           
        ]);

        Pendidikan::where('id', $pendidikan->id)
        ->update([
            'nama_sarana_pendidikan' => $request->nama_sarana_pendidikan,
            'tipependidikan_id' => $request->tipependidikan_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'status_lahan' => $request->status_lahan,
            'no_hp' => $request->no_hp,
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
    // public function destroy(Pendidikan $pendidikan)
    // {
    //     Pendidikan::destroy($pendidikan->id);
    //     //return redirect('/pendidikan')->with('info', 'Data Sarana Pendidikan Berhasil Dihapus!');
    //     return redirect()->back();
    // }
    public function hapuspendidikan(Request $request)
    {
        $id = $request->id;
        $pendidikan = Pendidikan::find($id);
        $pendidikan->delete();
        return redirect()->back();
    }

    public function getdatapendidikan()
    {
        ////////////////////////// AKUN ADMIN /////////////////////////////
        if(auth()->user()->role == 'superadmin'){
            $pendidikan = Pendidikan::select('sarana_pendidikan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'admin'){
            $pendidikan = Pendidikan::select('sarana_pendidikan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'sekret'){
            $pendidikan = Pendidikan::select('sarana_pendidikan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'kessos'){
            $pendidikan = Pendidikan::select('sarana_pendidikan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'pemtibum'){
            $pendidikan = Pendidikan::select('sarana_pendidikan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'permasbang'){
            $pendidikan = Pendidikan::select('sarana_pendidikan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        ///////////// AKUN PAMOR //////////////////////////////////
        if (auth()->user()->rw_id == '1'){
        $pendidikan = Pendidikan::where('rw_id', '=', '1')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '2'){
        $pendidikan = Pendidikan::where('rw_id', '=', '2')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '3'){
        $pendidikan = Pendidikan::where('rw_id', '=', '3')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '4'){
        $pendidikan = Pendidikan::where('rw_id', '=', '4')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '5'){
        $pendidikan = Pendidikan::where('rw_id', '=', '5')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '6'){
        $pendidikan = Pendidikan::where('rw_id', '=', '6')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '7'){
        $pendidikan = Pendidikan::where('rw_id', '=', '7')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '8'){
        $pendidikan = Pendidikan::where('rw_id', '=', '9')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '10'){
        $pendidikan = Pendidikan::where('rw_id', '=', '10')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '11'){
        $pendidikan = Pendidikan::where('rw_id', '=', '11')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '12'){
        $pendidikan = Pendidikan::where('rw_id', '=', '12')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '13'){
        $pendidikan = Pendidikan::where('rw_id', '=', '13')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '14'){
        $pendidikan = Pendidikan::where('rw_id', '=', '14')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '15'){
        $pendidikan = Pendidikan::where('rw_id', '=', '15')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '16'){
        $pendidikan = Pendidikan::where('rw_id', '=', '16')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '17'){
        $pendidikan = Pendidikan::where('rw_id', '=', '17')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '18'){
        $pendidikan = Pendidikan::where('rw_id', '=', '18')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '19'){
        $pendidikan = Pendidikan::where('rw_id', '=', '19')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '20'){
        $pendidikan = Pendidikan::where('rw_id', '=', '20')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '21'){
        $pendidikan = Pendidikan::where('rw_id', '=', '21')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '22'){
        $pendidikan = Pendidikan::where('rw_id', '=', '22')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '23'){
        $pendidikan = Pendidikan::where('rw_id', '=', '23')->orderBy('rt_id', 'asc');
        }

        // $pendidikan = Pendidikan::select('sarana_pendidikan.*');
        return DataTables::eloquent($pendidikan)
        ->addIndexColumn()
        ->addColumn('tipependidikan', function($pendidikan){
            return $pendidikan->tipependidikan->tipependidikan;    
            })
        ->addColumn('rt', function($pendidikan){
            return $pendidikan->rt->rt;    
            })
        ->addColumn('rw', function($pendidikan){
            return $pendidikan->rw->rw;    
            })
        ->addColumn('edit', function($pendidikan){
                return '<a href="pendidikan/'.$pendidikan->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
        })

        ->addColumn('hapus', function($pendidikan){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$pendidikan->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
        })
        
        ->rawColumns(['tipependidikan','rt','rw','edit', 'hapus'])
        ->toJson();
        
        }
}
