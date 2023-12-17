<?php

namespace App\Http\Controllers;

use App\Models\HargaSatuanAlat;
use DB;
use Illuminate\Http\Request;

class HargaSatuanAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tables = array('harga_satuan_alat');
    protected HargaSatuanAlat $hsa;
    public function __construct(
        HargaSatuanAlat $hsa,
    )
    {
        $this->perPage = 15;
        $this->hsa = $hsa;
    }
    public function index(Request $request)
    {
        $data['tables'] = $this->tables;
        $data['main'] = $this->hsa->paginate($this->perPage);

        return view('setting.harga-satuan-alat',['data'=>$data]);
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
    public function show(HargaSatuanAlat $hargaSatuanAlat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HargaSatuanAlat $hargaSatuanAlat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HargaSatuanAlat $hargaSatuanAlat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HargaSatuanAlat $hargaSatuanAlat)
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

        $data['main'] = $this->hsa->paginate($this->perPage);

        return view('setting.table-harga-satuan-alat', ['data' => $data])->render();
    }
}
