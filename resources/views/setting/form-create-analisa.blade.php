@section('pagetitle', __('Analisa Harga Satuan Pekerjaan'))
<x-app-layout>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{__('Tambah Pekerjaan')}}</h4>
            <p class="card-description">
              {{__('Formulir penambahan pekerjaan baru')}}
            </p>
            <form class="forms-sample" method="post" action="{{route('proyek_store')}}">
                @csrf
              <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-6">
                    <div class="form-group">
                        <label for="namapekerjaan">{{__('Nama Pekerjaan')}}</label>
                        <input type="text" class="form-control-lg form-control" id="namapekerjaan" placeholder="Nama Pekerjaan" name="namapekerjaan">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-xl-6">
                    <div class="form-group">
                        <label for="namapekerjaan">{{__('Jenis RAB')}}</label>
                        <select name="jenis_pekerjaan" id="jenis_pekerjaan" onchange="jenisPekerjaan()" class="form-control-lg form-control">
                            <option value="">{{__('Pilih Jenis RAB')}}</option>
                            <option value="0">{{__('Landscape')}}</option>
                            <option value="1">{{__('Bangunan Gedung')}}</option>
                        </select>
                    </div>
                </div>
              </div>
              <hr>
              <h4 class="card-title">{{__('A. Pekerja')}}</h4>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <label for="" class="form-label">{{__('Pekerja')}}</label>
                    <select name="pekerja" id="pekerja" class="form-control js-example-basic-single" onchange="getPekerja()">
                        <option value="">{{__('Pilih Pekerja')}}</option>
                        @if(isset($data['hsp']) && count($data['hsp']) > 0)
                            @foreach ($data['hsp'] as $keyHsp => $valueHsp )
                                <option value="{{$valueHsp->id}}" data-kode="{{$valueHsp->kode}}" data-deskripsi="{{$valueHsp->nama}}"
                                    data-satuan = "{{$valueHsp->satuan}}"
                                    >{{$valueHsp->kode.' - '.$valueHsp->nama}}</option>
                            @endforeach
                        @else
                        <option value="" disabled>{{__('Tidak Ada Data Pekerja')}}</option>
                        @endif
                    </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <label for="" class="form-label">{{__('Harga')}}</label>
                    <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp. </span>
                          </div>
                          <input type="text" class="form-control" placeholder="Masukkan harga" aria-label="Masukkan Harga" name="harga_pekerja" id="harga_pekerja" readonly>
                          <input type="hidden" name="n_harga_pekerja" id="n_harga_pekerja">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <label for="" class="form-label">{{__('Koefisien')}}</label>
                    <input type="text" name="koefisien_pekerja" id="koefisien_pekerja" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-icon-text btn-primary btn-block" onclick="addToPekerjaList()"><i class="ti-plus btn-icon-prepend"></i>{{__('Tambah Pekerja')}}</button>
                </div>
              </div>
              <div class="row pt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table" id="{{ $data['tables'][0] }}">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{__('Nama Pekerjaan')}}</th>
                                        <th class="text-center">{{__('Kode')}}</th>
                                        <th class="text-center">{{__('Satuan')}}</th>
                                        <th class="text-center">{{__('Koefisien')}}</th>
                                        <th class="text-center">{{__('Harga Satuan (Rp.)')}}</th>
                                        <th class="text-center">{{__('Jumlah Harga (Rp.)')}}</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody id="pekerjaanTbody">
                                    <tr>
                                        <td class="text-center" colspan="7">{{__('Data Tidak Ditemukan, Mohon Tambahkan Pekerjaan')}}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-end" colspan="5">{{__('Jumlah Harga Tenaga Kerja ')}}</th>
                                        <td class="text-end" colspan="2"><strong id="totalHargaPekerja"></strong></td>
                                        <input type="hidden" id="totalPekerjaan">
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
              </div>
              <hr>
              <h4 class="card-title">{{__('B. Bahan')}}</h4>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <label for="" class="form-label">{{__('Bahan')}}</label>
                    <select name="bahan" id="bahan" class="form-control js-example-basic-single" onchange="getBahan()">
                        <option value="">{{__('Pilih Bahan')}}</option>
                        @if(isset($data['bahan']) && count($data['bahan']) > 0)
                            @foreach ($data['bahan'] as $keyBahan => $valueBahan )
                                <option value="{{$valueBahan->id}}" data-kode="{{$valueBahan->kode}}"
                                        data-satuan = "{{$valueBahan->jenis->satuan}}"
                                        data-nama = "{{$valueBahan->nama}}"
                                    >{{$valueBahan->kode.' - '.$valueBahan->nama.' - '.'Rp. '.number_format($valueBahan->harga)}}</option>
                            @endforeach
                        @else
                        <option value="" disabled>{{__('Tidak Ada Data Bahan')}}</option>
                        @endif
                    </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <label for="" class="form-label">{{__('Harga')}}</label>
                    <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp. </span>
                          </div>
                          <input type="text" class="form-control" placeholder="Username" name="harga_bahan" id="harga_bahan" readonly>
                          <input type="hidden" id="n_harga_bahan" name="n_harga_bahan">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <label for="" class="form-label">{{__('Koefisien')}}</label>
                    <input type="text" name="koefisien_bahan" id="koefisien_bahan" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-icon-text btn-primary btn-block" name="bahanAdd" id="bahanAdd" onclick="addToBahanList()"><i class="ti-plus btn-icon-prepend"></i>{{__('Tambah Bahan')}}</button>
                </div>
              </div>
              <div class="row pt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{__('Nama Bahan')}}</th>
                                        <th class="text-center">{{__('Kode')}}</th>
                                        <th class="text-center">{{__('Satuan')}}</th>
                                        <th class="text-center">{{__('Koefisien')}}</th>
                                        <th class="text-center">{{__('Harga Satuan (Rp.)')}}</th>
                                        <th class="text-center">{{__('Jumlah Harga (Rp.)')}}</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody id="bahanTbody">
                                    <tr>
                                        <td class="text-center" colspan="7">{{__('Data Tidak Ditemukan, Mohon Tambahkan Bahan')}}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr style="display:none" id="perlengkapanLandscape">
                                        <th class="text-end" colspan="5">{{__('Perlengkapan')}}</th>
                                        <td class="text-end" colspan="2">
                                            <input type="text" class="text-end form-control" name="perlengkapan_bahan" id="perlengkapan_bahan">
                                            <input type="hidden" id="n_perlengkapan_bahan">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-end" colspan="5">{{__('Jumlah Harga Bahan ')}}</th>
                                        <td class="text-end" colspan="2"><strong id="totalHargaBahan"></strong></td>
                                        <input type="hidden" id="totalBahan">
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
              </div>
              <hr>
              <div class="row" id="peralatan_row" style="display: none">
                <div class="col-12">
                    <div class="row">
                        <h4 class="card-title">{{__('C. Peralatan')}}</h4>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label for="alat" class="form-label">{{__('Peralatan')}}</label>
                            <select name="alat" id="alat" class="form-control js-example-basic-single" onchange="getPeralatan()" style="width: 100%">
                                <option value="">{{__('Pilih Peralatan')}}</option>
                                @if(isset($data['hsa']) && count($data['hsa']) > 0)
                                    @foreach ($data['hsa'] as $keyAlat => $valueAlat )
                                        <option value="{{$valueAlat->id}}" data-kode="{{$valueAlat->kode}}"
                                                data-satuan = "{{$valueAlat->satuan}}"
                                                data-nama = "{{$valueAlat->nama}}"
                                            >{{$valueAlat->kode.' - '.$valueAlat->nama.' - '.'Rp. '.number_format($valueAlat->harga)}}</option>
                                    @endforeach
                                @else
                                <option value="" disabled>{{__('Tidak Ada Data Bahan')}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label for="" class="form-label">{{__('Harga')}}</label>
                            <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                  </div>
                                  <input type="text" class="form-control" placeholder="Username" name="harga_peralatan" id="harga_peralatan" readonly>
                                  <input type="hidden" name="n_harga_peralatan" id="n_harga_peralatan">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <label for="" class="form-label">{{__('Koefisien')}}</label>
                            <input type="text" name="koefisien_peralatan" id="koefisien_peralatan" class="form-control">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <button type="button" class="btn btn-icon-text btn-primary btn-block" name="peralatanAdd" id="peralatanAdd"><i class="ti-plus btn-icon-prepend"></i>{{__('Tambah Peralatan')}}</button>
                        </div>
                      </div>
                      <div class="row pt-3">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">{{__('Nama Peralatan')}}</th>
                                                <th class="text-center">{{__('Kode')}}</th>
                                                <th class="text-center">{{__('Satuan')}}</th>
                                                <th class="text-center">{{__('Koefisien')}}</th>
                                                <th class="text-center">{{__('Harga Satuan (Rp.)')}}</th>
                                                <th class="text-center">{{__('Jumlah Harga (Rp.)')}}</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="AlatTbody">
                                            <tr>
                                                <td class="text-center" colspan="7">{{__('Data Tidak Ditemukan, Mohon Tambahkan Peralatan')}}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-end" colspan="5">{{__('Jumlah Harga Peralatan ')}}</th>
                                                <td class="text-end" colspan="2"><strong id="totalHargaPeralatan"></strong></td>
                                                <input type="hidden" id="totalAlat">
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                      </div>
                </div>
              </div>
              <div class="row" id="perawatan_row" style="display: none">
                <div class="col-sm-12 col-md-12 col-lg-6" style="align-content: end;">
                    <h4>{{__('C. Perawatan 1 Tahun')}}</h4>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <input type="text" class="form-control text-end" name="perawatan" id="perawatan">
                    <input type="hidden" id="n_perawatan">
                </div>
              </div>
              <hr>
              <div class="row" id="transportasi_row" style="display: none">
                <div class="col-sm-12 col-md-12 col-lg-6" style="align-content: end;">
                    <h4>{{__('D. Transportasi')}}</h4>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <input type="text" class="form-control text-end" name="transportasi" id="transportasi">
                    <input type="hidden" id="n_transportasi">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end" id="bangunan">{{__('Jumlah Harga Tenaga, Bahan dan Peralatan (A+B+C)')}}</h6>
                    <h6 class="text-end" id="landscape" style="display: none">{{__('Jumlah Harga Tenaga, Bahan, Perawatan, dan Transportasi (A+B+C+D)')}}</h6>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end"><strong id="totalKotor"></strong></h6>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end">{{__('Overhead + Profit (10%)')}}</h6>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end"><strong id="profit"></strong></h6>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end"><b>{{__('Harga Satuan Pekerjaan')}}</b></h6>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end"><strong id="totalAll"></strong></h6>
                </div>
              </div>
              <hr>
              <a href="{{route('proyek_index')}}" class="btn btn-light">{{__('Kembali')}}</a>
              <button type="submit" class="btn btn-primary me-2" style="float:right;">{{__('Simpan Proyek')}}</button>
            </form>
          </div>
        </div>
      </div>
    @section('additional_js')
        <script src="{{ asset('js/create-analisa.js') }}"></script>
    @endsection  
</x-app-layout>