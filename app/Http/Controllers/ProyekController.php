<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Pemasok;
use DB;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tables = array('proyek');
    protected Proyek $proyek;
    protected Pemasok $pemasok;
    public function __construct(
        Proyek $proyek,
        Pemasok $pemasok
    )
    {
        $this->perPage = 15;
        $this->proyek = $proyek;
        $this->pemasok = $pemasok;
    }
    public function index()
    {
        $data['tables'] = $this->tables;
        $data['main'] = $this->proyek->paginate($this->perPage);
        return view('proyek.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pemasok'] = $this->pemasok->get();
        return view('proyek.form-create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeTransaction = DB::transaction(function() use ($request){
            $kodeProyek = $this->generateKodeProyek();
            $storeProyek  = $this->proyek->create([
                'kode'          => $kodeProyek,
                'nama'          => $request->nmproject,
                'pemasok_id'    => $request->nmpemberi,
                'jenis_proyek'    => $request->jenis_proyek,
                'jenis_rab'    => $request->jenis_rab,
                'tanggal_mulai' => $request->tgl,
                'lokasi'        => $request->alamat,
                'tahun_anggaran'=> $request->tahun
            ]);
            return 'success';
        });
        if($storeTransaction) {
            return redirect()->route('proyek_index')->with('success', 'Berhasil Disimpan');
        }
        else{
            return redirect()->route('proyek_index')->with('error', 'Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyek $proyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyek $proyek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyek $proyek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyek $proyek)
    {
        //
    }

    public function generateKodeProyek()
    {
        $nextCode = '000001';
        $getProyek = $this->proyek
            ->orderBy('kode', 'desc')
            ->first();

        if ($getProyek) {
            $getNomorProyek = substr($getProyek->kode, -6);

            // Check if the year has changed
            if (substr($getProyek->kode, 3, 2) == date('y')) {
                $nextCode = sprintf("%06d", (int)$getNomorProyek + 1);
            } else {
                // Reset the code to '000001' if the year has changed
                $nextCode = '000001';
            }
        }

        $getNomorProyek = 'PRY' . date('y') . date('m') . date('d') . $nextCode;

        return $getNomorProyek;
    }
}
