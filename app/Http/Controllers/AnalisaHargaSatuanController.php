<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\HargaSatuanAlat;
use App\Models\HargaSatuanPekerja;
use App\Models\JenisBahan;
use App\Models\Bahan;
use App\Models\DetilPekerjaan;
use DB;
use Illuminate\Http\Request;

class AnalisaHargaSatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tables = array('pekerjaan_analisa');
    protected Pekerjaan $pekerjaan;
    protected HargaSatuanAlat $hsa;
    protected HargaSatuanPekerja $hsp;
    protected JenisBahan $jenis;
    protected Bahan $bahan;
    protected DetilPekerjaan $detil;
    public function __construct(
        Pekerjaan $pekerjaan,
        HargaSatuanAlat $hsa,
        HargaSatuanPekerja $hsp,
        JenisBahan $jenis,
        Bahan $bahan,
        DetilPekerjaan $detil,
    )
    {
        $this->perPage = 15;
        $this->pekerjaan = $pekerjaan;
        $this->hsa = $hsa;
        $this->hsp = $hsp;
        $this->jenis = $jenis;
        $this->bahan = $bahan;
        $this->detil = $detil;
    }
    public function index(Request $request)
    {
        $data['tables'] = $this->tables;
        $data['main'] = $this->pekerjaan->paginate($this->perPage);
        return view('setting.analisa-pekerjaan',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data['tables'] = $this->tables;
        $data['hsp'] = $this->hsp->get();
        $data['hsa'] = $this->hsa->get();
        $data['bahan'] = $this->bahan->get();
        return view('setting.form-create-analisa',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pekerjaan $pekerjaan,Request $request, $id)
    {
        $data['main'] = $this->pekerjaan->find($id);
        if($data['main']){
            $data['detilPekerja'] = $this->detil
            ->where('pekerjaan_id',$data['main']->id)
            ->where('jenis_pekerjaan','0')
            ->get();
            $data['hsp'] = $this->hsp->get();
            return view('setting.edit-analisa-pekerjaan',['data'=>$data]);
        } else {

            return redirect()->back();
        }
        
    }

    public function getPekerja(Request $request)
    {
        $pekerja = $this->hsp->find($request->pekerja);
        $jsonPekerja['harga'] = $pekerja->harga;
        $jsonPekerja['koefisien'] = $this->detil
        ->where('hsp_id',$pekerja->id)
        ->where('pekerjaan_id',$request->idPekerjaan)
        ->first();

        return json_encode($jsonPekerja);
    }
    public function getBahan(Request $request)
    {
        
        $bahan = $this->bahan->find($request->bahan);
        $jsonBahan['harga_bahan'] = $bahan->harga;
        // $jsonBahan['koefisien'] = $this->detil
        // ->where('bahan_id',$bahan->id)
        // ->first();
        return json_encode($jsonBahan);
    }
    public function getAlat(Request $request)
    {
        
        $alat = $this->hsa->find($request->alat);
        $jsonAlat['harga_alat'] = $alat->harga;
        // $jsonBahan['koefisien'] = $this->detil
        // ->where('bahan_id',$bahan->id)
        // ->first();
        return json_encode($jsonAlat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        //
    }

    public function detil(Request $request,$id)
    {
        $data['tables'] = $this->tables;
        $data['main'] = $this->pekerjaan->find($id);
        $data['pekerja'] = $this->detil
        ->where(function($query)use($id){
            $query->where('pekerjaan_id',$id)
            ->where('jenis_pekerjaan','0');
        })
        ->get();
        $data['bahan'] = $this->detil
        ->where(function($query)use($id){
            $query->where('pekerjaan_id',$id)
            ->where('jenis_pekerjaan','1');
        })
        ->get();
        $data['peralatan'] = $this->detil
        ->where(function($query)use($id){
            $query->where('pekerjaan_id',$id)
            ->where('jenis_pekerjaan','2');
        })
        ->get();
        return view('setting.detil-analisa-pekerjaan',['data'=>$data]);
    }

    public function loadTable(Request $request)
    {
        $data['tables'] = $this->tables;
        $keyword = isset($request->keyword) ? $request->keyword : '';
        $perPage = isset($request->perPage) ? $request->perPage : $this->perPage;
        $page = isset($request->page) ? $request->page : 1;
        $tableFilter = isset($request->tableFilter) ? $request->tableFilter : '';

        $data['main'] = $this->pekerjaan
        ->where(function($query)use($keyword){
            $query->where('kode', 'like', '%' . $keyword . '%')
            ->orWhere('nama_pekerjaan', 'like', '%' . $keyword . '%');
        })
        ->paginate($this->perPage);

        return view('setting.table-analisa-pekerjaan', ['data' => $data])->render();
    }
}
