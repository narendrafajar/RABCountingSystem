@section('pagetitle', __('Tambah Proyek'))
<x-app-layout>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{__('Tambah Proyek')}}</h4>
            <p class="card-description">
              {{__('Formulir penambahan project baru')}}
            </p>
            <form class="forms-sample" method="post" action="{{route('proyek_store')}}">
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">Nama Project</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Project" name="nmproject">
              </div>
              <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-6">
                      <div class="form-group">
                          <label for="jenis_proyek">{{__('Jenis Proyek')}}</label>
                          <select name="jenis_proyek" id="jenis_proyek" class="form-control">
                            <option value="" disabled>{{__('Pilih Jenis Proyek')}}</option>
                            <option value="0">{{__('Bangunan Gedung')}}</option>
                            <option value="1">{{__('Landscape')}}</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="jenis_rab">{{__('Jenis RAB')}}</label>
                        <select name="jenis_rab" id="jenis_rab" class="form-control">
                          <option value="" disabled>{{__('Pilih Jenis Perhitungan RAB')}}</option>
                          <option value="0">{{__('UMUM')}}</option>
                          <option value="1">{{__('ANALISA')}}</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="nmpemberi">{{__('Nama Pemberi Project')}}</label>
                <select name="nmpemberi" id="nmpemberi" class="form-control js-example-basic-single">
                    @if (isset($data['pemasok']) && count($data['pemasok']) > 0)
                        <option value="">{{__('Pilih Pemberi Project')}}</option>
                        @foreach ($data['pemasok'] as $key => $value )
                            <option value="{{$value->id}}">{{$value->kode.' - '.$value->nama}}</option>
                        @endforeach
                    @else
                    <option value="" disabled>{{__('Pemberi Project Tidak tersedia')}}</option>
                    @endif
                </select>
              </div>
              <div class="form-group">
                <label for="alamat">{{__('Lokasi Proyek')}}</label>
                <textarea class="form-control" placeholder="Masukkan Alamat Project" name="alamat"></textarea>
              </div>
              <div class="form-group">
                <label for="tgl">{{__('Tanggal Mulai Proyek')}}</label>
                <input type="date" class="form-control" name="tgl">
              </div>
              <div class="form-group">
                <label for="tahun">{{__('Tahun Anggaran')}}</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Tahun Anggaran" name="tahun">
              </div>
              <button type="submit" class="btn btn-primary me-2">{{__('Simpan Proyek')}}</button>
              <a href="{{route('proyek_index')}}" class="btn btn-light">{{__('Kembali')}}</a>
            </form>
          </div>
        </div>
      </div>
</x-app-layout>