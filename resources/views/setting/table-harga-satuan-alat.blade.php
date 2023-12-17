<div id="table-{{ $data['tables'][0] }}">
    <div class="table-responsive pt-3" id="{{ $data['tables'][0] }}">
        <table class="table table-bordered" id="{{ $data['tables'][0] }}">
            <thead>
                <tr>
                    <th class="text-center">{{__('#')}}</th>
                    <th class="text-center">{{__('Kode')}}</th>
                    <th class="text-center">{{__('Nama')}}</th>
                    <th class="text-center">{{__('Satuan')}}</th>
                    <th class="text-center">{{__('Harga')}}</th>
                    <th class="text-center">{{__('Update Terakhir')}}</th>
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
                            <td>{{$value->nama}}</td>
                            <td class="text-center">{{$value->satuan}}</td>
                            <td class="text-end">{{'Rp. '.number_format($value->harga,2)}}</td>
                            <td class="text-center">{{date("d M Y",strtotime($value->updated_at))}}</td>
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
                        </tr>
                    @endforeach
                @else
                    <tr>
                       <td colspan="6" class="text-center">{{__('Data Tidak Ditemukan')}}</td> 
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