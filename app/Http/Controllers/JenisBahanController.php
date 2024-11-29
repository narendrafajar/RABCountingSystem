<?php

namespace App\Http\Controllers;

use App\Models\JenisBahan;
use DB;
use Illuminate\Http\Request;

class JenisBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tables = array('jenis_bahan');
    protected JenisBahan $jenisBahan;
    public function __construct(
        JenisBahan $jenisBahan,
    )
    {
        $this->perPage = 15;
        $this->jenisBahan = $jenisBahan;
    }
    public function index()
    {
        $data['tables'] = $this->tables;
        $data['main'] = $this->jenisBahan->paginate($this->perPage);

        return view('setting.jenis-bahan',['data'=>$data]);
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
    public function show(JenisBahan $jenisBahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisBahan $jenisBahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisBahan $jenisBahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisBahan $jenisBahan)
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

        $data['main'] = $this->jenisBahan
        ->where(function($query)use($keyword){
            $query->where('nama', 'like', '%' . $keyword . '%')
            ->orWhere('satuan', 'like', '%' . $keyword . '%');
        })
        ->paginate($this->perPage);

        return view('setting.table-jenis-bahan', ['data' => $data])->render();
    }
}
