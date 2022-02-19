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
use Yajra\DataTables\Facades\DataTables;

class TkkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tkk = Tkk::all();
        $tkk = Tkk::orderbyRaw('rw_id', 'asc')->get();
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

        $request->validate([
            'id' => 'required|size:16|unique:tkk,id',
            'nama' => 'required',
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
            // 'username' => 'required',
            'rw_id' => 'required', 
            'foto' => 'required|max:1024', 
        ],
        [
            'id.required' => 'Harus di Isi Yaa',
            'id.unique' => 'NIK Sudah Digunakan',
            'KK.required' => 'Harus di Isi Yaa',
            'nama.required' => 'Harus di Isi Yaa',
            'tempat_lahir.required' => 'Harus di Isi Yaa',
            'tanggal_lahir.required' => 'Harus di Isi Yaa',
            'jeniskelamin_id.required' => 'Harus di Isi Yaa',
            'alamat.required' => 'Harus di Isi Yaa',
            'agama_id.required' => 'Harus di Isi Yaa',
            'pendidikanpeg_id.required' => 'Harus di Isi Yaa',
            'statuskawin_id.required' => 'Harus di Isi Yaa',
            'seksi_id.required' => 'Harus di Isi Yaa',
            'jabatan_id.required' => 'Harus di Isi Yaa',
            'SK_Tkk.required' => 'Harus di Isi Yaa',
            'no_rek.required' => 'Harus di Isi Yaa',
            'no_HP.required' => 'Harus di Isi Yaa',
            'npwp.required' => 'Harus di Isi Yaa',
            'email.required' => 'Harus di Isi Yaa',
            // 'username.required' => 'Harus di Isi Yaa',
            'rw_id.required' => 'Harus di Isi Yaa',
        ]
    );
            //INSERT TO TABLE USERS
            $user = new \App\User;
            $user-> name = $request->nama;
            $user-> email = $request->email;
            $user-> username = $request->id;
            $user-> rw_id = $request->rw_id;
            $user-> role = 'user';
            $user-> password = bcrypt('jakasampurna');
            $user-> remember_token = Str::random(60);
            $user-> save();

            $request->request->add ( ['user_id'=> $user->id] );

        // Tkk::create($request->all());

        $imgName = $request->foto->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto->extension();
        $request->foto->move('images/TKK/',$imgName);

        Tkk::create([
            'nama' => $request->nama,
            'id' => $request->id,
            'user_id' => $request->user_id,
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
            // 'username' => $request->username,
            'username' => $request->id,
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
        $rw = Rw::all();
        $user = User::all();
        return view ('tkk.edit', compact('tkk', 'user', 'rw', 'agama', 'jeniskelamin', 'pendidikanpeg', 'statuskawin', 'seksi', 'jabatan'));
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
            // 'id' => 'required|size:16|unique:tkk,id',
            'nama' => 'required',
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
            'rw_id' => 'required'
        ],
        [
            // 'id.required' => 'Wajib 16 Digit NIK e-KTP',
            'id.unique' => 'NIK Sudah Digunakan yaa',
            'KK.required' => 'Harus di Isi Yaa',
            'nama.required' => 'Harus di Isi Yaa',
            'tempat_lahir.required' => 'Harus di Isi Yaa',
            'tanggal_lahir.required' => 'Harus di Isi Yaa',
            'jeniskelamin_id.required' => 'Harus di Isi Yaa',
            'alamat.required' => 'Harus di Isi Yaa',
            'agama_id.required' => 'Harus di Isi Yaa',
            'pendidikanpeg_id.required' => 'Harus di Isi Yaa',
            'statuskawin_id.required' => 'Harus di Isi Yaa',
            'seksi_id.required' => 'Harus di Isi Yaa',
            'jabatan_id.required' => 'Harus di Isi Yaa',
            'SK_Tkk.required' => 'Harus di Isi Yaa',
            'no_rek.required' => 'Harus di Isi Yaa',
            'no_HP.required' => 'Harus di Isi Yaa',
            'npwp.required' => 'Harus di Isi Yaa',
            'email.required' => 'Harus di Isi Yaa',
            'email.required' => 'Harus di Isi Yaa', 
            'rw_id.required' => 'Harus di Isi Yaa', 
        ]
    );     
        Tkk::where('id', $tkk->id)
        ->update([
            // 'id' => $request->id,
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
            'rw_id' => $request->rw_id,
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

    public function hapustkk(Request $request)
    {
        $id = $request->id;
        $tkk = Tkk::find($id);
        $tkk->delete();
        return redirect()->back();
    }

    public function getdatatkk()
    {
        $tkk = Tkk::select('tkk.*')->orderBy('rw_id', 'asc');
        return DataTables::eloquent($tkk)
        ->addIndexColumn()
        ->addColumn('rw', function($tkk){
            return $tkk->rw->rw;    
            })
        ->addColumn('jabatan', function($tkk){
            return $tkk->jabatan->jabatan;    
            })
        ->addColumn('seksi', function($tkk){
            return $tkk->seksi->seksi;    
            })
 
        ->addColumn('view', function($tkk){
                return '<a href="tkk/'.$tkk->id.'" class="btn btn-info" title="View">  
                <i class="glyphicon glyphicon-search"></i></a>';           
        })

        ->addColumn('edit', function($tkk){
                return '<a href="tkk/'.$tkk->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
        })

        ->addColumn('hapus', function($tkk){
                $button = "<button class='hapus btn btn-danger' id='".$tkk->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
        })
        
        ->rawColumns(['rw','jabatan','seksi','view','edit', 'hapus'])
        ->toJson();
        
        }


}
