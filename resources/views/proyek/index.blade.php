@section('pagetitle', __('Proyek'))
<x-app-layout>
    @if (Session::has('error'))
		<div class="alert alert-important alert-danger alert-dismissible" role="alert">
			<div class="d-flex">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/alert-circle</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
				<div>
					{{ __(Session::get('error')) }}
				</div>
			</div>
			<a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
		</div>
	@endif
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Daftar Project</h4>
            <p class="card-description">
              <code>Daftar Project Perhitungan RAB</code>
            </p>
            <div class="table-responsive pt-3">
              <table class="table table-bordered" id="myDataTable">
                <thead>
                  <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">KODE PROJECT</th>
                    <th class="text-center">NAMA PROJECT</th>
                    <th class="text-center">ALAMAT</th>
                    <th class="text-center">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @if(isset($data['main']) && count($data['main']) > 0)
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data['main'] as $key => $value )
                            <td class="text-center">{{$no++}}</td>
                            <td class="text-center">{{$value->kode}}</td>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->lokasi}}</td>
                            <td class="text-center">
                              <div class="input-group-prepend">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mdi mdi-pencil"></span></button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                      <div role="separator" class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                              </div>
                            </div>
                            </td>
                        @endforeach
                    @else
                    <tr>
                        <td class="text-center" colspan="5">{{__('Data Tidak Ditemukan')}}</td>
                    </tr>
                    @endif
                </tbody>
                <tfoot>
                    @if(isset($data['main']) && count($data['main']) > 0)
					<div class="card-footer d-flex align-items-center">
						{{ $data['main']->links('vendor.pagination.tailwind', ['tablename' => $data['tables'][0]]) }}
					</div>
					@endif
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
              <center>
                <a href="{{route('proyek_create')}}" class="btn btn-success btn-rounded btn-fw">{{__('Tambah Proyek')}}</a>
              </center>
          </div>
        </div>
      </div>
</x-app-layout>