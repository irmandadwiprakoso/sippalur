<?php

namespace App\Http\Controllers;

use App\Fasosfasum;
use App\Rt;
use App\Rw;
use Illuminate\Http\Request;
use App\Exports\FasosfasumExport;
use Maatwebsite\Excel\Facades\Excel;

class FasosfasumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasosfasum = Fasosfasum::all();
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
            'luas' => 'required',
            'pemanfaatan' => 'required',
            'nama_pengembang' => 'required',
            'nama_perumahan' => 'required',
            'foto' => 'required',       
        ]);
        $imgName = $request->foto->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto->extension();
        $request->foto->move('images/',$imgName);
        
        //Fasosfasum::create($request->all());
        Fasosfasum::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
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
            'luas' => 'required',
            'pemanfaatan' => 'required',
            'nama_pengembang' => 'required',
            'nama_perumahan' => 'required',
            'foto' => 'required',       
        ]);

        Fasosfasum::where('id', $fasosfasum->id)
        ->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'luas' => $request->luas,
            'pemanfaatan' => $request->pemanfaatan,
            'nama_pengembang' => $request->nama_pengembang,
            'nama_perumahan' => $request->nama_perumahan,
            'foto' => $request->foto,
        ]);
        if ($request->hasFile('foto')){
            $request->file('foto')->move('images/',$request->file('foto')->getClientOriginalName());
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
    public function destroy(Fasosfasum $fasosfasum)
    {
        Fasosfasum::destroy($fasosfasum->id);
        return redirect()->back();
    }
}