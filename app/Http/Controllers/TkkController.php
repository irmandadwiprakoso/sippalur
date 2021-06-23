<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tkk;
use App\Agama;
use App\Jeniskelamin;
use App\Pendidikanpeg;
use App\Statuskawin;
use App\Seksi;
use App\Jabatan;
use App\Rw;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Exports\TkkExport;
use Maatwebsite\Excel\Facades\Excel;

class TkkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if ($request->has('search')){
        //     $tkk = Tkk::where('nama', 'LIKE', '%'.$request->search.'%')->get();
        // }else{
        //     $tkk = Tkk::all();
        // }
        $tkk = Tkk::all();
        return view('tkk.index', ['tkk' => $tkk]);
    }
    public function exporttkk() 
    {
        return Excel::download(new TkkExport, 'tkk-jakasampurna.csv');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $pendidikanpeg = Pendidikanpeg::all();
        $statuskawin = Statuskawin::all();
        $seksi = Seksi::all();
        $jabatan = Jabatan::all();
        $rw = Rw::all();
        return view ('tkk.create', compact('agama', 'jeniskelamin', 'pendidikanpeg', 'statuskawin', 'seksi' ,'jabatan', 'rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //INSERT TO TABLE USERS
        $user = new \App\User;
        $user-> name = $request->nama;
        $user-> email = $request->email;
        $user-> username = $request->username;
        $user-> role = 'user';
        $user-> password = bcrypt('jakasampurna');
        $user-> remember_token = Str::random(60);
        $user-> save();

        $request->validate([
            'nama' => 'required',
            'NIK' => 'required|size:16',
            'KK' => 'required|size:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jeniskelamin_id' => 'required',
            'alamat' => 'required',
            'agama_id' => 'required',
            'pendidikanpeg_id' => 'required',
            'statuskawin_id' => 'required',
            'seksi_id' => 'required',
            'jabatan_id' => 'required',
            'SK_Tkk' => 'required',
            'no_rek' => 'required',
            'npwp' => 'required',
            'email' => 'required',
            'no_HP' => 'required',
            'username' => 'required',
            'rw_id' => 'required', 
        ]);

        $request->request->add ( ['user_id'=> $user->id] );
        // Tkk::create($request->all());

        $imgName = $request->foto->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto->extension();
        $request->foto->move('images/TKK/',$imgName);

        Tkk::create([
            'nama' => $request->nama,
            'NIK' => $request->NIK,
            'KK' => $request->KK,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jeniskelamin_id' => $request->jeniskelamin_id,
            'alamat' => $request->alamat,
            'agama_id' => $request->agama_id,
            'pendidikanpeg_id' => $request->pendidikanpeg_id,
            'statuskawin_id' => $request->statuskawin_id,
            'seksi_id' => $request->seksi_id,
            'jabatan_id' => $request->jabatan_id,
            'SK_Tkk' => $request->SK_Tkk,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
            'email' => $request->email,
            'no_HP' => $request->no_HP,
            'username' => $request->username,
            'rw_id' => $request->rw_id,
            'foto' => $imgName,
        ]);

        return redirect('/tkk')->with('success', 'Data TKK Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tkk  $tkk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tkk = Tkk::find($id);
        //return view('tkk.show', compact('tkk'));
        return view('tkk.show', ['tkk' => $tkk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tkk  $tkk
     * @return \Illuminate\Http\Response
     */
    public function edit(Tkk $tkk)
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $pendidikanpeg = Pendidikanpeg::all();
        $statuskawin = Statuskawin::all();
        $seksi = Seksi::all();
        $jabatan = Jabatan::all();
        return view ('tkk.edit', compact('tkk', 'agama', 'jeniskelamin', 'pendidikanpeg', 'statuskawin', 'seksi', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tkk  $tkk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tkk $tkk)
    {
        //dd($request->all());
        $request->validate([
            'nama' => 'required',
            'NIK' => 'required|size:16',
            'KK' => 'required|size:16',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jeniskelamin_id' => 'required',
            'alamat' => 'required',
            'agama_id' => 'required',
            'pendidikanpeg_id' => 'required',
            'statuskawin_id' => 'required',
            'seksi_id' => 'required',
            'jabatan_id' => 'required',
            'SK_Tkk' => 'required',
            'no_rek' => 'required',
            'npwp' => 'required',
            'email' => 'required',
            'no_HP' => 'required'
        ]);

        Tkk::where('id', $tkk->id)
        ->update([
            'NIK' => $request->NIK,
            'KK' => $request->KK,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jeniskelamin_id' => $request->jeniskelamin_id,
            'alamat' => $request->alamat,
            'agama_id' => $request->agama_id,
            'pendidikanpeg_id' => $request->pendidikanpeg_id,
            'statuskawin_id' => $request->statuskawin_id,
            'seksi_id' => $request->seksi_id,
            'jabatan_id' => $request->jabatan_id,
            'SK_Tkk' => $request->SK_Tkk,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
            'email' => $request->email,
            'no_HP' => $request->no_HP,
            // 'foto' => $request->foto
        ]);
        if ($request->hasFile('foto')){
            $request->file('foto')->move('images/TKK/',$request->file('foto')->getClientOriginalName());
            $tkk->foto = $request->file('foto')->getClientOriginalName();
            $tkk->save();
        }
        return redirect('/tkk')->with('success', 'Data TKK Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tkk  $tkk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tkk $tkk)
    {
        Tkk::destroy($tkk->id);
        return redirect()->back();
    }

    public function profile()
    {
        return view('tkk.profile');
    }
}
