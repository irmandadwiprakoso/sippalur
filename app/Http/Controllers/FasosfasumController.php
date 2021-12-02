<?php

namespace App\Http\Controllers;

use App\Fasosfasum;
use App\Rt;
use App\Rw;
use Illuminate\Http\Request;
use App\Exports\FasosfasumExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class FasosfasumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $fasosfasum = Fasosfasum::all();
        if(auth()->user()->role == 'superadmin')
        {
            $fasosfasum = Fasosfasum::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin_permasbang')
        {
            $fasosfasum = Fasosfasum::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin')
        {
            $fasosfasum = Fasosfasum::orderbyRaw('rw_id', 'DESC')->get();
        }

        if (auth()->user()->rw_id == '1')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->rw_id == '2')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->rw_id == '3')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->rw_id == '4')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->rw_id == '5')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->rw_id == '6')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->rw_id == '7')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->rw_id == '8')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '8')->get();
        }
        if (auth()->user()->rw_id == '9')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->rw_id == '10')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->rw_id == '11')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->rw_id == '12')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->rw_id == '13')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->rw_id == '14')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->rw_id == '15')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->rw_id == '16')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->rw_id == '17')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->rw_id == '18')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->rw_id == '19')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->rw_id == '20')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->rw_id == '21')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->rw_id == '22')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->rw_id == '23')
        {
            $fasosfasum = Fasosfasum::where('rw_id', '=', '23')->get();
        }

        return view('fasosfasum.index', ['fasosfasum' => $fasosfasum]);
    }

    public function fasosfasumexport()
    {
        return Excel::download(new Fasosfasumexport,'fasosfasum-jakasampurna.xlsx');
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
        return view ('fasosfasum.create', compact('rt','rw'));
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
            'nama' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            // 'koordinat' => 'required',
            'luas' => 'required',
            'pemanfaatan' => 'required',
            // 'nama_pengembang' => 'required',
            // 'nama_perumahan' => 'required',
            'foto' => 'required|max:1024',       
        ],
    [
        'nama.required' => 'Harus di Isi Yaa',
        'alamat.required' => 'Harus di Isi Yaa',
        'rt_id.required' => 'Harus di Isi Yaa',
        'rw_id.required' => 'Harus di Isi Yaa',
        'luas.required' => 'Harus di Isi Yaa',
        'pemanfaatan.required' => 'Harus di Isi Yaa',
        'foto.required' => 'diUpload yaa Foto Lokasinya',
    ]);
        $imgName = $request->foto->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto->extension();
        $request->foto->move('images/FasosFasum/',$imgName);
        
        //Fasosfasum::create($request->all());
        Fasosfasum::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'koordinat' => $request->koordinat,
            'luas' => $request->luas,
            'pemanfaatan' => $request->pemanfaatan,
            'nama_pengembang' => $request->nama_pengembang,
            'nama_perumahan' => $request->nama_perumahan,
            'foto' => $imgName,
        ]);

        return redirect('/fasosfasum')->with('success', 'Data Fasos/Fasum Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fasosfasum  $fasosfasum
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fasosfasum = Fasosfasum::find($id);
        return view('fasosfasum.show', ['fasosfasum' => $fasosfasum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fasosfasum  $fasosfasum
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasosfasum $fasosfasum)
    {
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('fasosfasum.edit', compact('fasosfasum', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fasosfasum  $fasosfasum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasosfasum $fasosfasum)
    {
        //dd($request->all());
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            // 'koordinat' => 'required',
            'luas' => 'required',
            'pemanfaatan' => 'required',
            // 'nama_pengembang' => 'required',
            // 'nama_perumahan' => 'required',
            'foto' => 'max:1024',       
        ]);

        Fasosfasum::where('id', $fasosfasum->id)
        ->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'koordinat' => $request->koordinat,
            'luas' => $request->luas,
            'pemanfaatan' => $request->pemanfaatan,
            'nama_pengembang' => $request->nama_pengembang,
            'nama_perumahan' => $request->nama_perumahan,
            // 'foto' => $request->foto,
        ]);
        if ($request->hasFile('foto')){
            $request->file('foto')->move('images/FasosFasum/',$request->file('foto')->getClientOriginalName());
            $fasosfasum->foto = $request->file('foto')->getClientOriginalName();
            $fasosfasum->save();
        }
        return redirect('/fasosfasum')->with('success', 'Data FASOS FASUM Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fasosfasum  $fasosfasum
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Fasosfasum $fasosfasum)
    // {
    //     Fasosfasum::destroy($fasosfasum->id);
    //     return redirect()->back();
    // }

    public function hapusfasosfasum(Request $request)
    {
        $id = $request->id;
        $fasosfasum = Fasosfasum::find($id);
        $fasosfasum->delete();
        return redirect()->back();
    }

    public function getdatafasosfasum()
    {
        ////////////////////////// AKUN ADMIN /////////////////////////////
        if(auth()->user()->role == 'superadmin'){
            $fasosfasum = Fasosfasum::select('fasosfasum.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'admin'){
            $fasosfasum = Fasosfasum::select('fasosfasum.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'sekret'){
            $fasosfasum = Fasosfasum::select('fasosfasum.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'kessos'){
            $fasosfasum = Fasosfasum::select('fasosfasum.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'pemtibum'){
            $fasosfasum = Fasosfasum::select('fasosfasum.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        if(auth()->user()->role == 'permasbang'){
            $fasosfasum = Fasosfasum::select('fasosfasum.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }
        ///////////// AKUN PAMOR //////////////////////////////////
        if (auth()->user()->rw_id == '1'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '1')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '2'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '2')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '3'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '3')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '4'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '4')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '5'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '5')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '6'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '6')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '7'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '7')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '8'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '9')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '10'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '10')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '11'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '11')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '12'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '12')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '13'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '13')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '14'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '14')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '15'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '15')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '16'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '16')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '17'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '17')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '18'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '18')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '19'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '19')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '20'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '20')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '21'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '21')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '22'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '22')->orderBy('rt_id', 'asc');
        }
        if (auth()->user()->rw_id == '23'){
        $fasosfasum = Fasosfasum::where('rw_id', '=', '23')->orderBy('rt_id', 'asc');
        }

        // $fasosfasum = Fasosfasum::select('fasosfasum.*');
        return DataTables::eloquent($fasosfasum)
        ->addIndexColumn()

        ->addColumn('rt', function($fasosfasum){
            return $fasosfasum->rt->rt;    
            })
        ->addColumn('rw', function($fasosfasum){
            return $fasosfasum->rw->rw;    
            })

        ->addColumn('view', function($fasosfasum){
                return '<a href="/fasosfasum/'.$fasosfasum->id.'" class="btn btn-info" title="View">  
                <i class="glyphicon glyphicon-search"></i></a>';           
        })

        ->addColumn('edit', function($fasosfasum){
                return '<a href="/fasosfasum/'.$fasosfasum->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
        })

        ->addColumn('hapus', function($fasosfasum){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$fasosfasum->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
        })

        ->rawColumns(['rt','rw','view','edit', 'hapus'])
        ->toJson();
        }
    }