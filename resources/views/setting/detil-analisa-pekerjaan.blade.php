@section('pagetitle', __('Analisa Harga Satuan Pekerjaan'))
<x-app-layout>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{__('Detil Pekerjaan')}}</h4>
            <p class="card-description">
              {{__('Detil analisa harga satuan pekerjaan')}}
            </p>
            <div class="form-group">
                <label for="namapekerjaan">{{__('Nama Pekerjaan')}}</label>
                <input type="text" class="form-control" id="namapekerjaan" placeholder="Nama Project" name="namapekerjaan" value="{{$data['main']->nama_pekerjaan}}" disabled>
              </div>
              <hr>
              <h4 class="card-title">{{__('A. Pekerja')}}</h4>
              <div class="row pt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="{{ $data['tables'][0] }}">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{__('Nama Pekerjaan')}}</th>
                                        <th class="text-center">{{__('Kode')}}</th>
                                        <th class="text-center">{{__('Satuan')}}</th>
                                        <th class="text-center">{{__('Koefisien')}}</th>
                                        <th class="text-center">{{__('Harga Satuan (Rp.)')}}</th>
                                        <th class="text-center">{{__('Jumlah Harga (Rp.)')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalHargaPekerja = 0;
                                    @endphp
                                    @if (isset($data['pekerja']) && count($data['pekerja']) > 0)
                                        @foreach ($data['pekerja'] as $keyPekerja => $valuePekerja )
                                            @php
                                                $jumlahHargaPekerja = $valuePekerja->koefisien * $valuePekerja->hsp->harga;
                                                $totalHargaPekerja += $jumlahHargaPekerja;
                                            @endphp
                                            <tr>
                                                <td>{{$valuePekerja->hsp->nama}}</td>
                                                <td class="text-center">{{$valuePekerja->hsp->kode}}</td>
                                                <td class="text-center">{{$valuePekerja->hsp->satuan}}</td>
                                                <td class="text-center">{{$valuePekerja->koefisien}}</td>
                                                <td class="text-end">{{'Rp. '.number_format($valuePekerja->hsp->harga)}}</td>
                                                <td class="text-end">{{'Rp. '.number_format($jumlahHargaPekerja)}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr id="pekerjaanTbody">
                                        <td class="text-center" colspan="7">{{__('Data Tidak Ditemukan, Mohon Tambahkan Pekerjaan')}}</td>
                                    </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-end" colspan="5">{{__('Jumlah Harga Tenaga Kerja ')}}</th>
                                        <td class="text-end" colspan="2"><strong id="totalHargaPekerja">{{'Rp. '.number_format($totalHargaPekerja)}}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
              </div>
              <hr>
              <h4 class="card-title">{{__('B. Bahan')}}</h4>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalHargaBahan = 0;
                                    @endphp
                                    @if (isset($data['bahan']) && count($data['bahan']) > 0)
                                        @foreach ($data['bahan'] as $keyBahan => $valueBahan )
                                            @php
                                                $jumlahHargaBahan = $valueBahan->koefisien * $valueBahan->bahan->harga;
                                                $totalHargaBahan += $jumlahHargaBahan;
                                            @endphp
                                            <tr>
                                                <td>{{$valueBahan->bahan->nama}}</td>
                                                <td class="text-center">{{$valueBahan->bahan->kode}}</td>
                                                <td class="text-center">{{$valueBahan->bahan->jenis->satuan}}</td>
                                                <td class="text-center">{{$valueBahan->koefisien}}</td>
                                                <td class="text-end">{{'Rp. '.number_format($valueBahan->bahan->harga,2)}}</td>
                                                <td class="text-end">{{'Rp. '.number_format($jumlahHargaBahan,2)}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr id="pekerjaanTbody">
                                        <td class="text-center" colspan="7">{{__('Data Tidak Ditemukan, Mohon Tambahkan Pekerjaan')}}</td>
                                    </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-end" colspan="5">{{__('Jumlah Harga Bahan ')}}</th>
                                        <td class="text-end" colspan="2"><strong id="totalHargaBahan">{{'Rp. '.number_format($totalHargaBahan,2)}}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
              </div>
              <hr>
              <h4 class="card-title">{{__('C. Peralatan')}}</h4>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalHargaPeralatan = 0;
                                    @endphp
                                    @if (isset($data['peralatan']) && count($data['peralatan']) > 0)
                                        @foreach ($data['peralatan'] as $keyPeralatan => $valuePeralatan )
                                            @php
                                                $jumlahHargaPeralatan = $valuePeralatan->koefisien * $valuePeralatan->hsa->harga;
                                                $totalHargaPeralatan += $jumlahHargaPeralatan;
                                            @endphp
                                            <tr>
                                                <td>{{$valuePeralatan->hsa->nama}}</td>
                                                <td class="text-center">{{$valuePeralatan->hsa->kode}}</td>
                                                <td class="text-center">{{$valuePeralatan->hsa->satuan}}</td>
                                                <td class="text-center">{{$valuePeralatan->koefisien}}</td>
                                                <td class="text-end">{{'Rp. '.number_format($valuePeralatan->hsa->harga,2)}}</td>
                                                <td class="text-end">{{'Rp. '.number_format($jumlahHargaPeralatan,2)}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr id="pekerjaanTbody">
                                        <td class="text-center" colspan="7">{{__('Data Tidak Ditemukan, Mohon Tambahkan Pekerjaan')}}</td>
                                    </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-end" colspan="5">{{__('Jumlah Harga Peralatan ')}}</th>
                                        <td class="text-end" colspan="2"><strong id="totalHargaPeralatan">{{'Rp. '.number_format($totalHargaPeralatan,2)}}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
              </div>
              <hr>
              @php
                  $jumlahKeseluruhan = $totalHargaPekerja + $totalHargaBahan + $totalHargaPeralatan;
                  $overhead = $jumlahKeseluruhan * 0.10;
                  $total = $jumlahKeseluruhan + $overhead;
              @endphp
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end">{{__('Jumlah Harga Tenaga, Bahan dan Peralatan (A+B+C)')}}</h6>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end">{{'Rp. '.number_format($jumlahKeseluruhan,2)}}</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end">{{__('Overhead + Profit (10%)')}}</h6>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end">{{'Rp. '.number_format($overhead,2)}}</h6>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end"><b>{{__('Harga Satuan Pekerjaan')}}</b></h6>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h6 class="text-end"><b>{{'Rp. '.number_format($total,2)}}</b></h6>
                </div>
              </div>
              <hr>
              <a href="{{route('analisa_pekerjaan_index')}}" class="btn btn-light">{{__('Kembali')}}</a>
          </div>
        </div>
      </div>  
</x-app-layout>