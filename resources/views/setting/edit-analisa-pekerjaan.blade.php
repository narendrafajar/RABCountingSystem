@section('pagetitle', __('Ubah Analisa Harga Satuan Pekerjaan'))
<x-app-layout>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="namapekerjaan">{{__('Nama Pekerjaan')}}</label>
                    <input type="text" class="form-control" id="namapekerjaan" placeholder="Nama Project" name="namapekerjaan" value="{{$data['main']->nama_pekerjaan}}">
                    <input type="hidden" name="idpekerjaan" id="idpekerjaan" value="{{$data['main']->id}}">
                </div>
                <hr>
              <h4 class="card-title">{{__('A. Pekerja')}}</h4>
                @if(isset($data['detilPekerja']) && count($data['detilPekerja']) > 0)
                <div class="row pt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
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
                                    @if (isset($data['detilPekerja']) && count($data['detilPekerja']) > 0)
                                        @foreach ($data['detilPekerja'] as $keyPekerja => $valuePekerja )
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
                @else 
                <div class="row dataPekerja">
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <label for="" class="form-label">{{__('Pekerja')}}</label>
                        <select name="pekerja" id="pekerja" class="form-control js-example-basic-single" style="width: 100%" onchange="getPekerja()">
                            <option value="">{{__('Pilih Pekerja')}}</option>
                            @if(isset($data['hsp']) && count($data['hsp']) > 0)
                                @foreach ($data['hsp'] as $keyHsp => $valueHsp )
                                    <option value="{{$valueHsp->id}}">{{$valueHsp->kode.' - '.$valueHsp->nama}}</option>
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
                            <input type="text" id="harga" name="harga" class="form-control" placeholder="harga" aria-label="Harga">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <label for="" class="form-label">{{__('Koefisien')}}</label>
                        <input type="text" name="koefisien" id="koefisien" class="form-control">
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
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
                                <tbody>
                                    <tr id="pekerjaanTbody">
                                        <td class="text-center" colspan="7">{{__('Data Tidak Ditemukan, Mohon Tambahkan Pekerjaan')}}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-end" colspan="5">{{__('Jumlah Harga Tenaga Kerja ')}}</th>
                                        <td class="text-end" colspan="2"><strong id="totalHargaPekerja"></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @section('additional_js')
        <script src="{{ asset('js/edit-analisa.js') }}"></script>
    @endsection  
</x-app-layout>