<?php

namespace App\Http\Controllers;

use App\Models\HargaSatuanPekerja;
use DB;
use Illuminate\Http\Request;

class HargaSatuanPekerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tables = array('harga_satuan_alat');
    protected HargaSatuanPekerja $hsp;
    public function __construct(
        HargaSatuanPekerja $hsp,
    )
    {
        $this->perPage = 15;
        $this->hsp = $hsp;
    }
    public function index()
    {
        $data['tables'] = $this->tables;
        $data['main'] = $this->hsp->paginate($this->perPage);

        return view('setting.harga-satuan-pekerja',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HargaSatuanPekerja $hargaSatuanPekerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HargaSatuanPekerja $hargaSatuanPekerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HargaSatuanPekerja $hargaSatuanPekerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HargaSatuanPekerja $hargaSatuanPekerja)
    {
        //
    }

    public function loadTable(Request $request)
    {
        $data['tables'] = $this->tables;
        $keyword = isset($request->keyword) ? $request->keyword : '';
        $perPage = isset($request->perPage) ? $request->perPage : $this->perPage;
        $page = isset($request->page) ? $request->page : 1;
        $tableFilter = isset($request->tableFilter) ? $request->tableFilter : '';

        $data['main'] = $this->hsp
        ->where(function($query)use($keyword){
            $query->where('kode', 'like', '%' . $keyword . '%')
            ->orWhere('nama', 'like', '%' . $keyword . '%')
            ->orWhere('satuan', 'like', '%' . $keyword . '%');
        })
        ->paginate($this->perPage);

        return view('setting.table-harga-satuan-pekerja', ['data' => $data])->render();
    }
}
