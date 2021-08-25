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

class SaranaKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(auth()->user()->username == 'superadmin')
        {
            $kesehatan = Kesehatan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->role == 'admin')
        {
            $kesehatan = Kesehatan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->username == 'sekel')
        {
            $kesehatan = Kesehatan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->username == 'admin_kessos')
        {
            $kesehatan = Kesehatan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->username == 'admin_permasbang')
        {
            $kesehatan = Kesehatan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->username == 'admin_pemtibum')
        {
            $kesehatan = Kesehatan::orderbyRaw('rw_id', 'DESC')->get();
        }
        if(auth()->user()->username == 'admin_sekret')
        {
            $kesehatan = Kesehatan::orderbyRaw('rw_id', 'DESC')->get();
        }
        
        if (auth()->user()->rw_id == '1')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '1')->get();
        }
        if (auth()->user()->rw_id == '2')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '2')->get();
        }
        if (auth()->user()->rw_id == '3')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '3')->get();
        }
        if (auth()->user()->rw_id == '4')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '4')->get();
        }
        if (auth()->user()->rw_id == '5')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '5')->get();
        }
        if (auth()->user()->rw_id == '6')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '6')->get();
        }
        if (auth()->user()->rw_id == '7')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '7')->get();
        }
        if (auth()->user()->rw_id == '8')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '8')->get();
        }
        if (auth()->user()->rw_id == '9')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '9')->get();
        }
        if (auth()->user()->rw_id == '10')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '10')->get();
        }
        if (auth()->user()->rw_id == '11')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '11')->get();
        }
        if (auth()->user()->rw_id == '12')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '12')->get();
        }
        if (auth()->user()->rw_id == '13')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '13')->get();
        }
        if (auth()->user()->rw_id == '14')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '14')->get();
        }
        if (auth()->user()->rw_id == '15')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '15')->get();
        }
        if (auth()->user()->rw_id == '16')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '16')->get();
        }
        if (auth()->user()->rw_id == '17')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '17')->get();
        }
        if (auth()->user()->rw_id == '18')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '18')->get();
        }
        if (auth()->user()->rw_id == '19')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '19')->get();
        }
        if (auth()->user()->rw_id == '20')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '20')->get();
        }
        if (auth()->user()->rw_id == '21')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '21')->get();
        }
        if (auth()->user()->rw_id == '22')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '22')->get();
        }
        if (auth()->user()->rw_id == '23')
        {
            $kesehatan = Kesehatan::where('rw_id', '=', '23')->get();
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
    public function destroy(Kesehatan $kesehatan)
    {
        Kesehatan::destroy($kesehatan->id);
        //return redirect('/kesehatan')->with('info', 'Data Sarana Kesehatan Berhasil Dihapus!');
        return redirect()->back();
    }
}
