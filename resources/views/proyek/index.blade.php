@section('pagetitle', __('Proyek'))
<x-app-layout>
  <div id="message-alert"></div>
  <div class="col-sm-12 col-md-12 col-lg-12 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">
              <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h4 class="card-title">{{__('Daftar Harga Satuan Alat')}}</h4>
                        <p class="card-description">
                            <code>{{__('Daftar untuk pengaturan harga satuan alat RAB')}}</code>
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="btn-group" role="group" aria-label="Basic example" style="float: right;">
                            <button type="button" class="btn btn-outline-secondary btn-light btn-icon-text"><i class="ti-filter btn-icon-prepend"></i> {{__('Filter')}}</button>&nbsp;
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example" style="float: right;padding-right:4px">
                            <a href="{{route('proyek_create')}}" class="btn btn-primary btn-outline btn-icon-text"><i class="ti-plus btn-icon-prepend"></i> {{__('Tambahkan Proyek')}}</a>
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
                              <input type="text" class="form-control" aria-label="{{__('Cari Kode, Nama')}}" id="search_{{ $data['tables'][0] }}" name="search_{{ $data['tables'][0] }}" placeholder="{{__('Ketik Nama / Kode HSA')}}" onkeyup="loadTable('{{ $data['tables'][0] }}')">
                          </div>
                      </div>
                  </div>
              </div>
              <div id="table-{{ $data['tables'][0] }}">
                  <div class="table-responsive pt-3" id="{{ $data['tables'][0] }}">
                      <table class="table table-bordered" id="{{ $data['tables'][0] }}">
                          <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">{{__('Kode')}}</th>
                                <th class="text-center">{{__('Nama Proyek')}}</th>
                                <th class="text-center">{{__('Pemberi Proyek')}}</th>
                                <th class="text-center">{{__('Lokasi Proyek')}}</th>
                                <th class="text-center">{{__('Jenis Proyek')}}</th>
                                <th class="text-center">{{__('Jenis RAB')}}</th>
                                <th class="text-center">{{__('Aksi')}}</th>
                              </tr>
                          </thead>
                          <tbody>
                            @if(isset($data['main']) && count($data['main']) > 0)
                              @php
                                  $no = 1;
                              @endphp
                              @foreach ($data['main'] as $key => $value )
                                  <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td class="text-center"> <b>{{$value->kode}}</b></td>
                                    <td>{{$value->nama}}</td>
                                    <td>{{$value->pemasok->nama}}</td>
                                    <td>{{$value->lokasi}}</td>
                                    <td>{{$value->jenis_proyek != 0 ? 'BANGUNAN GEDUNG' : 'LANDSCAPE'}}</td>
                                    <td>{{$value->jenis_rab != 0 ? 'UMUM' : 'ANALISA'}}</td>
                                    <td class="text-center">
                                        <div class="btn-group-vertical" role="group">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle btn-icon" data-bs-toggle="dropdown"><i class="ti-pencil"></i></button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">{{__('Lihat detil')}}</a>
                                                    @if($value->jenis_proyek != 0 )

                                                    @else
                                                    <a href="{{route('analisa_create',$value->id)}}" class="dropdown-item">{{__('Buat Analisa')}}</a>
                                                    @endif
                                                </div>                          
                                            </div>
                                        </div>
                                    </td>
                                  </tr>
                              @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="9">{{__('Data Tidak Ditemukan')}}</td>
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