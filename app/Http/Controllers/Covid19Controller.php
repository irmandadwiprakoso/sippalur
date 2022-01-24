<?php

namespace App\Http\Controllers;

use App\Covid19;
use App\Rt;
use App\Rw;
use App\Ktp;
use Illuminate\Http\Request;
use App\Exports\Covid19Export;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\DocBlock\Tags\Covers;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class Covid19Controller extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role != 'user') {
            $covid19 = Covid19::whereYear('konfirmasi', '=', date('Y'))->get();

        } else {
            $covid19 = Covid19::where('rw_id', '=', auth()->user()->rw_id)->where('konfirmasi', '=', date('Y'))->get();
        }
        return view('covid.index', ['covid19' => $covid19]);
    }

    public function covid19export()
    {
        return Excel::download(new Covid19Export,'covid19-jakasampurna.csv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('covid.create', compact('ktp','rt','rw'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'ktp_id' => 'required|unique:covid19,ktp_id',
            'foto_KTP' => 'required|max:1024',
            'foto_KK' => 'required|max:1024',
            'domisili' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'konfirmasi' => 'required',
            'status_pasien' => 'required',
            'lokasi_pasien' => 'required',
            'foto_status_pasien' => 'required|max:1024',
            'hasil_test' => 'required',
            'status_akhir' => 'required',
            'tanggal_status_akhir' => 'required',    
            // 'foto_status_akhir' => ''required | size:512',
            'no_hp' => 'required',        
            'tinjut' => 'required',        
            'keterangan' => 'required',        
            'sumbercovid' => 'required',        
        ],
        [
            'ktp_id.required' => 'Pilih Yang Bener ya NIK nya',
            'ktp_id.unique' => 'Sudah Di Pilih NIK ini',
            'foto_KTP.required' => 'Upload Foto KTP nya & Max 1 Mb yaa fotonya',
            'foto_KK.required' => 'Upload Foto KK nya & Max 1 Mb yaa fotonya',
            'domisili.required' => 'Harus Di Isi Yaa',
            'rt_id.required' => 'Harus Di Isi Yaa',
            'rw_id.required' => 'Harus Di Isi Yaa',
            'konfirmasi.required' => 'Harus Di Isi Yaa',
            'status_pasien.required' => 'Harus Di Isi Yaa',
            'lokasi_pasien.required' => 'Harus Di Isi Yaa',
            'foto_status_pasien.required' => 'Upload Foto Hasil Test Pasien & Max 1 Mb yaa fotonya',
            'hasil_test.required' => 'Harus Di Isi Yaa',
            'status_akhir.required' => 'Harus Di Isi Yaa',
            'tanggal_status_akhir.required' => 'Harus Di Isi Yaa',
            'no_hp.required' => 'Harus Di Isi Yaa',
            'tinjut.required' => 'Harus Di Isi Yaa',
            'keterangan.required' => 'Harus Di Isi Yaa',
            'sumbercovid.required' => 'Harus Di Isi Yaa',
        ]
    );
        
        $imgName1 = $request->foto_KTP->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto_KTP->extension();
        $request->foto_KTP->move('images/Covid19/KTP/',$imgName1);

        $imgName2 = $request->foto_KK->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto_KK->extension();
        $request->foto_KK->move('images/Covid19/KK/',$imgName2);

        $imgName3 = $request->foto_status_pasien->getClientOriginalName() . '-' . time() 
        . '.' . $request->foto_status_pasien->extension();
        $request->foto_status_pasien->move('images/Covid19/StatusAwalPasien/',$imgName3);

        // $imgName4 = $request->foto_status_akhir->getClientOriginalName() . '-' . time() 
        // . '.' . $request->foto_status_akhir->extension();
        // $request->foto_status_akhir->move('images/Covid19/StatusAkhirPasien/',$imgName4);
        
        // $imgName5 = $request->fotomonitoring1->getClientOriginalName() . '-' . time() 
        // . '.' . $request->fotomonitoring1->extension();
        // $request->fotomonitoring1->move('images/Covid19/Monitoring1/',$imgName5);
        
        // $imgName6 = $request->fotomonitoring2->getClientOriginalName() . '-' . time() 
        // . '.' . $request->fotomonitoring2->extension();
        // $request->fotomonitoring2->move('images/Covid19/Monitoring2/',$imgName6);
        
        // $imgName7 = $request->fotomonitoring3->getClientOriginalName() . '-' . time() 
        // . '.' . $request->fotomonitoring3->extension();
        // $request->fotomonitoring3->move('images/Covid19/Monitoring3/',$imgName7);
        
        // Covid19::create($request->all());
        Covid19::create([
            'ktp_id' => $request->ktp_id,
            'foto_KTP' => $imgName1,
            'foto_KK' => $imgName2,
            'domisili' => $request->domisili,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'konfirmasi' => $request->konfirmasi,
            'status_pasien' => $request->status_pasien,
            'lokasi_pasien' => $request->lokasi_pasien,
            'foto_status_pasien' => $imgName3,
            'hasil_test' => $request->hasil_test,
            'tglmonitoring1' => $request->tglmonitoring1,
            'monitoring1' => $request->monitoring1,
            // 'fotomonitoring1' => $imgName5,
            'tglmonitoring2' => $request->tglmonitoring2,
            'monitoring2' => $request->monitoring2,
            // 'fotomonitoring2' => $imgName6,
            'tglmonitoring3' => $request->tglmonitoring3,
            'monitoring3' => $request->monitoring3,
            // 'fotomonitoring3' => $imgName7,
            'status_akhir' => $request->status_akhir,
            'tanggal_status_akhir' => $request->tanggal_status_akhir,
            // 'foto_status_akhir' => $imgName4,
            'no_hp' => $request->no_hp,
            'tinjut' => $request->tinjut,
            'keterangan' => $request->keterangan,
            'sumbercovid' => $request->sumbercovid,
        ]);
        return redirect('/covid19')->with('success', 'Data Covid-19 Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Covid19  $covid19
     * @return \Illuminate\Http\Response
     */
    public function show(Covid19 $covid19)
    {
        return view('covid.show', ['covid19' => $covid19]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Covid19  $covid19
     * @return \Illuminate\Http\Response
     */
    public function edit(Covid19 $covid19)
    {
        $ktp = Ktp::all();
        $rt = Rt::all();
        $rw = Rw::all();
        return view ('covid.edit', compact('covid19','ktp','rt','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Covid19  $covid19
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Covid19 $covid19)
    {
        // dd($request->all());
        $request->validate([
            // 'ktp_id' => 'required|unique:covid19,ktp_id',
            // 'foto_KTP' => 'required',
            // 'foto_KK' => 'required',
            'domisili' => 'required',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'konfirmasi' => 'required',
            'status_pasien' => 'required',
            'lokasi_pasien' => 'required',
            'foto_status_pasien' => 'max:1024',
            'hasil_test' => 'required',
            'status_akhir' => 'required',
            'tanggal_status_akhir' => 'required',    
            'foto_status_akhir' => 'max:1024',
            'no_hp' => 'required',        
            'tinjut' => 'required',        
            'keterangan' => 'required',        
            'sumbercovid' => 'required',           
        ],
        [
            // 'ktp_id.required' => 'Pilih Yang Bener ya NIK nya',
            // 'ktp_id.unique' => 'Jangan Double ya NIK nya',
            'domisili.required' => 'Harus Di Isi Yaa',
            'rt_id.required' => 'Harus Di Isi Yaa',
            'rw_id.required' => 'Harus Di Isi Yaa',
            'konfirmasi.required' => 'Harus Di Isi Yaa',
            'status_pasien.required' => 'Harus Di Isi Yaa',
            'lokasi_pasien.required' => 'Harus Di Isi Yaa',
            'hasil_test.required' => 'Harus Di Isi Yaa',
            'status_akhir.required' => 'Harus Di Isi Yaa',
            'tanggal_status_akhir.required' => 'Harus Di Isi Yaa',
            'no_hp.required' => 'Harus Di Isi Yaa',
            'tinjut.required' => 'Harus Di Isi Yaa',
            'keterangan.required' => 'Harus Di Isi Yaa',
            'sumbercovid.required' => 'Harus Di Isi Yaa',
        ]
    );

        Covid19::where('id', $covid19->id)
        ->update([
            // 'ktp_id' => $request->ktp_id,
            // 'foto_KTP' => $request->foto_KTP,
            // 'foto_KK' => $request->foto_KK,
            'domisili' => $request->domisili,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'konfirmasi' => $request->konfirmasi,
            'status_pasien' => $request->status_pasien,
            'lokasi_pasien' => $request->lokasi_pasien,
            // 'foto_status_pasien' => $request->foto_status_pasien,
            'hasil_test' => $request->hasil_test,

            'tglmonitoring1' => $request->tglmonitoring1,
            'monitoring1' => $request->monitoring1,
            'tglmonitoring2' => $request->tglmonitoring2,
            'monitoring2' => $request->monitoring2,
            'tglmonitoring3' => $request->tglmonitoring3,
            'monitoring3' => $request->monitoring3,
            
            'status_akhir' => $request->status_akhir,
            'tanggal_status_akhir' => $request->tanggal_status_akhir,
            // 'foto_status_akhir' => $request->foto_status_akhir,
            'no_hp' => $request->no_hp,
            'tinjut' => $request->tinjut,
            'keterangan' => $request->keterangan,
            'sumbercovid' => $request->sumbercovid,
        ]);
        if ($request->hasFile('foto_KTP')){
            $request->file('foto_KTP')->move('images/Covid19/KTP/',$request->file('foto_KTP')->getClientOriginalName());
            $covid19->foto_KTP = $request->file('foto_KTP')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('foto_KK')){
            $request->file('foto_KK')->move('images/Covid19/KK/',$request->file('foto_KK')->getClientOriginalName());
            $covid19->foto_KK = $request->file('foto_KK')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('foto_status_pasien')){
            $request->file('foto_status_pasien')->move('images/Covid19/StatusAwalPasien/',$request->file('foto_status_pasien')->getClientOriginalName());
            $covid19->foto_status_pasien = $request->file('foto_status_pasien')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('foto_status_akhir')){
            $request->file('foto_status_akhir')->move('images/Covid19/StatusAkhirPasien/',$request->file('foto_status_akhir')->getClientOriginalName());
            $covid19->foto_status_akhir = $request->file('foto_status_akhir')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('fotomonitoring1')){
            $request->file('fotomonitoring1')->move('images/Covid19/Monitoring1/',$request->file('fotomonitoring1')->getClientOriginalName());
            $covid19->fotomonitoring1 = $request->file('fotomonitoring1')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('fotomonitoring2')){
            $request->file('fotomonitoring2')->move('images/Covid19/Monitoring2/',$request->file('fotomonitoring2')->getClientOriginalName());
            $covid19->fotomonitoring2 = $request->file('fotomonitoring2')->getClientOriginalName();
            $covid19->save();
        }
        if ($request->hasFile('fotomonitoring3')){
            $request->file('fotomonitoring3')->move('images/Covid19/Monitoring3/',$request->file('fotomonitoring3')->getClientOriginalName());
            $covid19->fotomonitoring3 = $request->file('fotomonitoring3')->getClientOriginalName();
            $covid19->save();
        }
        return redirect('/covid19')->with('success', 'Data Covid-19 Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Covid19  $covid19
     * @return \Illuminate\Http\Response
     */
    
    // public function destroy(Covid19 $covid19)
    // {
    //     Covid19::destroy($covid19->id);
    //     return redirect()->back();
    // }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $covid19 = covid19::find($id);
        $covid19->delete();
        return redirect()->back();
    }

    public function getdatacovid19(Request $request)
    {
        if(auth()->user()->role != 'user'){          
            if($request->input('tahun')!=null){
                $covid19 = Covid19::whereYear('konfirmasi', $request->tahun)->orderby('rt_id', 'asc');
            }
            if($request->input('bulan')!=null && ('tahun')!=null){
                $covid19 = Covid19::whereMonth('konfirmasi', $request->bulan)->whereYear('konfirmasi', $request->tahun)->orderby('rt_id', 'asc');
            }else if($request->input('rw')!=null){
                $covid19 = Covid19::whereYear('konfirmasi', $request->tahun)->where('rw_id', $request->rw)->orderby('rt_id', 'asc');
            }
            if($request->input('rw')!=null && ('bulan')!=null && ('tahun')!=null){
                $covid19 = Covid19::whereMonth('konfirmasi', $request->bulan)->whereYear('konfirmasi', $request->tahun)->
                where('rw_id', $request->rw)->orderby('rt_id', 'asc');
            }else if($request->input('rw')!=null){
                $covid19 = Covid19::whereYear('konfirmasi', $request->tahun)->where('rw_id', $request->rw)->orderby('rt_id', 'asc');
            }
        }else 
            if($request->input('tahun')!=null){
                $covid19 = Covid19::where('rw_id', '=', auth()->user()->rw_id)->whereYear('konfirmasi', $request->tahun)->orderby('rt_id', 'asc');
            }
            if($request->input('bulan')!=null && ('tahun')!=null){
                $covid19 = Covid19::where('rw_id', '=', auth()->user()->rw_id)->whereMonth('konfirmasi', $request->bulan)->whereYear('konfirmasi', $request->tahun)->orderby('rt_id', 'asc');
    }

        return DataTables::eloquent($covid19)
        ->addIndexColumn()
        ->addColumn('nama', function($covid19){
            return $covid19->ktp->nama;    
            })
        ->addColumn('rt', function($covid19){
            return $covid19->rt->rt;    
            })
        ->addColumn('rw', function($covid19){
            return $covid19->rw->rw;    
            })

        ->addColumn('view', function($covid19){
                return '<a href="covid19/'.$covid19->id.'" class="btn btn-info" title="View">  
                <i class="glyphicon glyphicon-search"></i></a>';           
        })

        ->addColumn('edit', function($covid19){
            if (auth()->user()->role == "superadmin"){
                return '<a href="covid19/'.$covid19->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
            }
            if (auth()->user()->role == "kessos"){
                return '<a href="covid19/'.$covid19->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
            }
            if (auth()->user()->role == "user"){
                return '<a href="covid19/'.$covid19->id.'/edit" class="btn btn-warning" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i></a>';
            }
        })

        ->addColumn('hapus', function($covid19){
            if (auth()->user()->role == "superadmin"){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$covid19->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
            }
            if (auth()->user()->role == "kessos"){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$covid19->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
            } 
            if (auth()->user()->role == "user"){
                $button = "<button class='hapus btn btn-danger' title='Hapus' id='".$covid19->id."' ><i class='fa fa-trash'></i></button>";
                return $button;  
            } 
        })
        
        ->rawColumns(['nama','rt','rw','view','edit', 'hapus'])
        ->toJson();
        
        }
    }
