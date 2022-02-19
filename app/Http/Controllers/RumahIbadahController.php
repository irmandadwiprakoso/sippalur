<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\IbadahExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Ibadah;
use App\Tipeibadah;
use App\Rt;
use App\Rw;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RumahIbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        if(auth()->user()->role != 'user')
        {
            $ibadah = Ibadah::orderby('rw_id', 'asc')->get();
        }else {
            $ibadah = Ibadah::where('rw_id', '=', auth()->user()->rw_id)->get();
        }
        return view('saranaibadah.index', ['sarana_ibadah' => $ibadah]);
    }

    public function ibadahexport()
    {
        return Excel::download(new IbadahExport,'sarana_ibadah.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipeibadah = Tipeibadah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('saranaibadah.create', compact('tipeibadah','rt', 'rw'));
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
            'nama_sarana_ibadah' => 'required',
            'tipeibadah_id' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'nama_pimpinan' => 'required',
        ],
        [
            'nama_sarana_sarana_ibadah.required' => 'Harus Di isi yaa',
            'tipeibadah_id.required' => 'Harus Di isi yaa',
            'alamat.required' => 'Harus Di isi yaa',
            'rt_id.required' => 'Harus Di isi yaa',
            'rw_id.required' => 'Harus Di isi yaa',
            'nama_pimpinan.required' => 'Harus Di isi yaa', 
        ]
    );
        Ibadah::create([
            'nama_sarana_ibadah' => $request->nama_sarana_ibadah,
            'tipeibadah_id' => $request->tipeibadah_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'status_lahan' => $request->status_lahan,
            'no_hp' => $request->no_hp,
            // 'user_id' => Auth::user()->id,
        ]);
        // Ibadah::create($request->all());
        return redirect('/ibadah')->with('success', 'Data Sarana Ibadah Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Ibadah $ibadah
     * @return \Illuminate\Http\Response
     */
    public function show(Ibadah $ibadah)
    {
        return view ('saranaibadah.show', compact('ibadah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Ibadah $ibadah
     * @return \Illuminate\Http\Response
     */
    public function edit(Ibadah $ibadah)
    {
        $tipeibadah = Tipeibadah::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('saranaibadah.edit', compact('ibadah','tipeibadah', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Ibadah $ibadah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ibadah $ibadah)
    {
        $request->validate([
            'nama_sarana_ibadah' => 'required',
            'tipeibadah_id' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'nama_pimpinan' => 'required',
        ]
        );

        Ibadah::where('id', $ibadah->id)
        ->update([
            'nama_sarana_ibadah' => $request->nama_sarana_ibadah,
            'tipeibadah_id' => $request->tipeibadah_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'status_lahan' => $request->status_lahan,
            'no_hp' => $request->no_hp,
        ]);
        return redirect('/ibadah')->with('success', 'Data Sarana Ibadah Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Ibadah $ibadah
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Ibadah::destroy($id);
    //     //return redirect('/ibadah')->with('info', 'Data Sarana Ibadah Berhasil Dihapus!');
    //     return redirect('/ibadah');
    //     //return "delete";
    // }

    public function hapusibadah(Request $request)
    {
        $id = $request->id;
        $ibadah = Ibadah::find($id);
        $ibadah->delete();
        return redirect()->back();
    }

    public function getdataibadah()
    {
        ////////////////////////// AKUN ADMIN /////////////////////////////
        if(auth()->user()->role != 'user'){
            $ibadah = Ibadah::select('sarana_ibadah.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        }else {
            $ibadah = Ibadah::where('rw_id', '=', auth()->user()->rw_id)->orderBy('rt_id', 'asc');
        }

        // $ibadah = Ibadah::select('sarana_ibadah.*');
        return DataTables::eloquent($ibadah)
        ->addIndexColumn()
        ->addColumn('tipeibadah', function($ibadah){
            return $ibadah->tipeibadah->tipeibadah;    
            })
        ->addColumn('rt', function($ibadah){
            return $ibadah->rt->rt;    
            })
        ->addColumn('rw', function($ibadah){
            return $ibadah->rw->rw;    
            })
        ->addColumn('edit', function($ibadah){
                return '<a href="ibadah/'.$ibadah->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
        })

        ->addColumn('hapus', function($ibadah){
                $button = "<button class='hapus btn btn-danger' title='Hapus'  id='".$ibadah->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
        })
        
        ->rawColumns(['tipeibadah','rt','rw','edit', 'hapus'])
        ->toJson();
        
        }
}
