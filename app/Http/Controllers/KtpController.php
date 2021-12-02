<?php

namespace App\Http\Controllers;

use App\Ktp;
use App\Agama;
use App\Jeniskelamin;
use App\Statuskawin;
use App\Rt;
use App\Rw;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ktp = Ktp::all();
        return view('ktp.index', ['ktp' => $ktp]);
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
        $statuskawin = Statuskawin::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('ktp.create', compact('agama', 'jeniskelamin', 'statuskawin', 'rt', 'rw'));
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
            'id' => 'required|unique:ktp,id|size:16',
            'KK' => 'required|size:16',
            'nama' => 'required',
            'hub_keluarga' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_KTP' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota_kab' => 'required',
            'propinsi' => 'required',
            'agama_id' => 'required',
            'jeniskelamin_id' => 'required',
            'statuskawin_id' => 'required',
            'pekerjaan' => 'required',
        ],
        [
            'id.required' => 'Di Isi 16 Digit NIK e-KTP',
            'id.unique' => 'NIK e-KTP sudah Terdaftar',
            'KK.required' => 'Di Isi 16 Digit Nomor KK',
            'nama.required' => 'Harus Di Isi Yaa',
            'hub_keluarga.required' => 'Harus Di Isi Yaa',
            'tempat_lahir.required' => 'Harus Di Isi Yaa',
            'tanggal_lahir.required' => 'Harus Di Isi Yaa',
            'alamat_KTP.required' => 'Harus Di Isi Yaa',
            'rt_id.required' => 'Harus Di Isi Yaa',
            'rw_id.required' => 'Harus Di Isi Yaa',
            'kelurahan.required' => 'Harus Di Isi Yaa',
            'kecamatan.required' => 'Harus Di Isi Yaa',
            'kota_kab.required' => 'Harus Di Isi Yaa',
            'propinsi.required' => 'Harus Di Isi Yaa',
            'agama_id.required' => 'Harus Di Isi Yaa',
            'jeniskelamin_id.required' => 'Harus Di Isi Yaa',
            'statuskawin_id.required' => 'Harus Di Isi Yaa',
            'pekerjaan.required' => 'Harus Di Isi Yaa',
        ]
    );

        Ktp::create($request->all());
        return redirect('/ktp')->with('success', 'Data KTP Berhasil Ditambahkan!');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function show(Ktp $ktp)
    {
        // $ktp = Ktp::all();
        // $ktp = Ktp::where('id')->get();
        return view('ktp.show', compact('ktp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function edit(Ktp $ktp)
    {
        $agama = Agama::all();
        $jeniskelamin = Jeniskelamin::all();
        $statuskawin = Statuskawin::all();
        $rt = RT::all();
        $rw = RW::all();
        return view ('ktp.edit', compact('ktp', 'agama', 'jeniskelamin', 'statuskawin', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ktp $ktp)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'id' => 'required|size:16',
            'KK' => 'required|size:16',
            'hub_keluarga' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_KTP' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota_kab' => 'required',
            'propinsi' => 'required',
            'agama_id' => 'required',
            'jeniskelamin_id' => 'required',
            'statuskawin_id' => 'required',
            'pekerjaan' => 'required',
        ],
        [
            'id.required' => 'Di Isi 16 Digit NIK e-KTP',
            'KK.required' => 'Di Isi 16 Digit Nomor KK',
            'nama.required' => 'Harus Di Isi Yaa',
            'hub_keluarga.required' => 'Harus Di Isi Yaa',
            'tempat_lahir.required' => 'Harus Di Isi Yaa',
            'tanggal_lahir.required' => 'Harus Di Isi Yaa',
            'alamat_KTP.required' => 'Harus Di Isi Yaa',
            'rt_id.required' => 'Harus Di Isi Yaa',
            'rw_id.required' => 'Harus Di Isi Yaa',
            'kelurahan.required' => 'Harus Di Isi Yaa',
            'kecamatan.required' => 'Harus Di Isi Yaa',
            'kota_kab.required' => 'Harus Di Isi Yaa',
            'propinsi.required' => 'Harus Di Isi Yaa',
            'agama_id.required' => 'Harus Di Isi Yaa',
            'jeniskelamin_id.required' => 'Harus Di Isi Yaa',
            'statuskawin_id.required' => 'Harus Di Isi Yaa',
            'pekerjaan.required' => 'Harus Di Isi Yaa',
        ]
        );

        Ktp::where('id', $ktp->id)
        ->update([
            'id' => $request->id,
            'KK' => $request->KK,
            'nama' => $request->nama,
            'hub_keluarga' => $request->hub_keluarga,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_KTP' => $request->alamat_KTP,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota_kab' => $request->kota_kab,
            'propinsi' => $request->propinsi,
            'agama_id' => $request->agama_id,
            'jeniskelamin_id' => $request->jeniskelamin_id,
            'statuskawin_id' => $request->statuskawin_id,
            'pekerjaan' => $request->pekerjaan
        ]);
        return redirect('/ktp')->with('success', 'Data KTP Berhasil Di Update!');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Ktp $ktp)
    // {
    //     Ktp::destroy($ktp->id);
    //     return redirect()->back();
    // }
    public function hapusktp(Request $request)
    {
        $id = $request->id;
        $ktp = Ktp::find($id);
        $ktp->delete();
        return redirect()->back();
    }

    public function getdataktp()
    {     
        $ktp = Ktp::select('ktp.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        return DataTables::eloquent($ktp)
        ->addIndexColumn()
        ->addColumn('rt', function($ktp){
            return $ktp->rt->rt;    
            })
        ->addColumn('rw', function($ktp){
            return $ktp->rw->rw;    
            })

        ->addColumn('view', function($ktp){
                return '<a href="ktp/'.$ktp->id.'" class="btn btn-info" title="View">  
                <i class="glyphicon glyphicon-search"></i></a>';           
        })

        ->addColumn('edit', function($ktp){
            if (auth()->user()->role == "superadmin"){
                return '<a href="ktp/'.$ktp->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
            }
            if (auth()->user()->role == "admin"){
                return '<a href="ktp/'.$ktp->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
            }
            if (auth()->user()->role == "pemtibum"){
                return '<a href="ktp/'.$ktp->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
            }
        })

        ->addColumn('hapus', function($ktp){
            if (auth()->user()->role == "superadmin"){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$ktp->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
            }
            if (auth()->user()->role == "pemtibum"){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$ktp->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
            } 
            if (auth()->user()->role == "admin"){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$ktp->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
            } 
        })
        
        ->rawColumns(['rt','rw','view','edit', 'hapus'])
        ->toJson();
        
        }

}
