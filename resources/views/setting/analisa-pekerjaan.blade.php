@section('pagetitle', __('Analisa Harga Satuan Pekerjaan'))
<x-app-layout>
    <div id="message-alert"></div>
    <div class="col-sm-12 col-md-12 col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h4 class="card-title">{{__('Daftar Analisa Harga Satuan Pekerjaan')}}</h4>
                        <p class="card-description">
                            <code>{{__('Daftar untuk pengaturan analisa harga satuan pekerjaan')}}</code>
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="btn-group" role="group" aria-label="Basic example" style="float: right;">
                            <button type="button" class="btn btn-outline-secondary btn-light btn-icon-text"><i class="ti-filter btn-icon-prepend"></i> {{__('Filter')}}</button>&nbsp;
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example" style="float: right;padding-right:4px">
                            <a href="{{route('analisa_pekerjaan_create')}}" class="btn btn-primary btn-outline btn-icon-text"><i class="ti-plus btn-icon-prepend"></i> {{__('Tambahkan Pekerjaan')}}</a>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('Cari')}}</span>
                                </div>
                                <input type="text" class="form-control" aria-label="{{__('Cari Kode, Nama')}}" id="search_{{ $data['tables'][0] }}" name="search_{{ $data['tables'][0] }}" placeholder="{{__('Ketik Nama / Kode Pekerjaan')}}" onkeyup="loadTable('{{ $data['tables'][0] }}')">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table-{{ $data['tables'][0] }}">
                    <div class="table-responsive pt-3" id="{{ $data['tables'][0] }}">
                        <table class="table" id="{{ $data['tables'][0] }}">
                            <thead>
                                <tr>
                                    <th class="text-center">{{__('#')}}</th>
                                    <th class="text-center">{{__('Kode')}}</th>
                                    <th class="text-center">{{__('Nama')}}</th>
                                    <th class="text-center">{{__('Satuan')}}</th>
                                    <th class="text-center">{{__('Aksi')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($data['main']) && count($data['main']) > 0)
                                    @php
                                        $nomor = 1;
                                    @endphp
                                    @foreach ($data['main'] as $key => $value )
                                        <tr>
                                            <td class="text-center">{{$nomor++}}</td>
                                            <td class="text-center">{{$value->kode}}</td>
                                            <td>{{$value->nama_pekerjaan}}</td>
                                            <td class="text-center">{{$value->satuan}}</td>
                                            <td class="text-center">
                                                <div class="input-group-prepend">
                                                  <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mdi mdi-pencil"></span></button>
                                                      <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('analisa_pekerjaan_detil',$value->id)}}">{{__('Lihat Detil')}}</a>
                                                        <a class="dropdown-item" href="{{route('analisa_pekerjaan_edit',$value->id)}}">{{__('Ubah Analisa')}}</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href="#">{{__('Hapus Analisa')}}</a>
                                                      </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                       <td colspan="5" class="text-center">{{__('Data Tidak Ditemukan')}}</td> 
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if(isset($data['main']) && count($data['main']) > 0)
                    <div class="card-footer d-flex align-items-center">
                        {{ $data['main']->links('vendor.pagination.rcs-paginator', ['tablename' => $data['tables'][0]]) }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>