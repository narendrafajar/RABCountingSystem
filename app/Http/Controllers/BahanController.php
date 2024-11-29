<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use DB;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tables = array('bahan');
    protected Bahan $bahan;
    public function __construct(
        Bahan $bahan,
    )
    {
        $this->perPage = 15;
        $this->bahan = $bahan;
    }
    public function index(Request $request)
    {
        $data['tables'] = $this->tables;
        $data['main'] = $this->bahan->paginate($this->perPage);

        return view('setting.bahan',['data'=>$data]);
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
    public function show(Bahan $bahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bahan $bahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bahan $bahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bahan $bahan)
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

        $data['main'] = $this->bahan
        ->where(function($query)use($keyword){
            $query->where('kode', 'like', '%' . $keyword . '%')
            ->orWhere('nama', 'like', '%' . $keyword . '%');
        })
        ->paginate($this->perPage);

        return view('setting.table-bahan', ['data' => $data])->render();
    }
}
