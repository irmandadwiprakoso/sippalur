<?php

namespace App\Http\Controllers;

use App\Exports\KesehatanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Kesehatan;
use App\Tipekesehatan;
use App\Rt;
use App\Rw;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SaranaKesehatanController extends Controller
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
            $kesehatan = Kesehatan::orderby('rw_id', 'DESC')->get();
        } else {
            $kesehatan = Kesehatan::where('rw_id', '=', auth()->user()->rw_id)->get();
        }

        return view('saranakesehatan.kesehatan', ['sarana_kesehatan' => $kesehatan]);
    }

    public function kesehatanexport(){
        return Excel::download(new KesehatanExport, 'sarana-kesehatan.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipekesehatan = Tipekesehatan::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('saranakesehatan.create', compact('tipekesehatan','rt', 'rw'));
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
            'nama_sarana_kesehatan' => 'required',
            'tipekesehatan_id' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'nama_pimpinan' => 'required',
          
        ],
        [
            'nama_sarana_kesehatan.required' => 'Harus Di isi yaa',
            'tipekesehatan_id.required' => 'Harus Di isi yaa',
            'alamat.required' => 'Harus Di isi yaa',
            'rt_id.required' => 'Harus Di isi yaa',
            'rw_id.required' => 'Harus Di isi yaa',
            'nama_pimpinan.required' => 'Harus Di isi yaa',
           
        ]
    );
        Kesehatan::create([
            'nama_sarana_kesehatan' => $request->nama_sarana_kesehatan,
            'tipekesehatan_id' => $request->tipekesehatan_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'status_lahan' => $request->status_lahan,
            'no_hp' => $request->no_hp,
            // 'user_id' => Auth::user()->id,
        ]);

        // Kesehatan::create($request->all());
        return redirect('/kesehatan')->with('success', 'Data Sarana Kesehatan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Kesehatan $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kesehatan $kesehatan)
    {
        return view ('Kesehatan.show', compact('kesehatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Kesehatan $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kesehatan $kesehatan)
    {
        $tipekesehatan = Tipekesehatan::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('saranakesehatan.edit', compact('kesehatan', 'tipekesehatan', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Kesehatan $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kesehatan $kesehatan)
    {
        $request->validate([
            'nama_sarana_kesehatan' => 'required',
            'tipekesehatan_id' => 'required',
            'alamat' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'nama_pimpinan' => 'required',
           
        ]);

        Kesehatan::where('id', $kesehatan->id)
        ->update([
            'nama_sarana_kesehatan' => $request->nama_sarana_kesehatan,
            'tipekesehatan_id' => $request->tipekesehatan_id,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'nama_pimpinan' => $request->nama_pimpinan,
            'status_lahan' => $request->status_lahan,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('/kesehatan')->with('success', 'Data Sarana Kesehatan Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param \App\Kesehatan $kesehatan
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Kesehatan $kesehatan)
    // {
    //     Kesehatan::destroy($kesehatan->id);
    //     //return redirect('/kesehatan')->with('info', 'Data Sarana Kesehatan Berhasil Dihapus!');
    //     return redirect()->back();
    // }
    public function hapuskesehatan(Request $request)
    {
        $id = $request->id;
        $kesehatan = Kesehatan::find($id);
        $kesehatan->delete();
        return redirect()->back();
    }

    public function getdatakesehatan()
    {
        ////////////////////////// AKUN ADMIN /////////////////////////////
        if(auth()->user()->role != 'user'){
            $kesehatan = Kesehatan::select('sarana_kesehatan.*')->orderBy('rw_id', 'asc')->orderBy('rt_id', 'asc');
        } else {
            $kesehatan = Kesehatan::where('rw_id', '=', auth()->user()->rw_id)->orderBy('rt_id', 'asc');
        }

        // $kesehatan = Kesehatan::select('sarana_kesehatan.*');
        return DataTables::eloquent($kesehatan)
        ->addIndexColumn()
        ->addColumn('tipekesehatan', function($kesehatan){
            return $kesehatan->tipekesehatan->tipekesehatan;    
            })
        ->addColumn('rt', function($kesehatan){
            return $kesehatan->rt->rt;    
            })
        ->addColumn('rw', function($kesehatan){
            return $kesehatan->rw->rw;    
            })
        ->addColumn('edit', function($kesehatan){
                return '<a href="kesehatan/'.$kesehatan->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
        })

        ->addColumn('hapus', function($kesehatan){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$kesehatan->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
        })
        
        ->rawColumns(['tipekesehatan','rt','rw','edit', 'hapus'])
        ->toJson();
        
        }
}
