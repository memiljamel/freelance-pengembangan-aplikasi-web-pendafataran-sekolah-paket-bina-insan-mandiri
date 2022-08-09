@extends('admin.layout.app')

@section('title', 'Pendaftaran')

@section('container')

  <div class="container-fluid">
    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ __('Daftar Data Calon Siswa') }}</h1>
    </div>

    @if (session()->has('status'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('status') }}
      </div>
    @endif

    {{--  DataTales Example --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-bold text-primary">
          {{ __('Data Calon Siswa') }}
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive overflow-hidden">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-striped table-bordered" id="dataTable" cellspacing="0" role="grid" aria-describedby="dataTable_info" width="100%">
                  <thead>
                    <tr role="row">
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('No.') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending">{{ __('Nama Lengkap') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('Email') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('Tempat, Tgl. Lahir') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('Agama') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('Bahasa Sehari-hari') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('Tinggi Badan / Berat Badan') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('Alamat Rumah') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('Jarak dari Rumah ke Sekolah') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('Kategori Pendidikan') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('Status') }}</th>
                      <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">{{ __('Tindakan') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->personal->fullname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->personal->place_of_birth }}, {{ $user->personal->date_of_birth }}</td>
                        <td>{{ $user->personal->religion }}</td>
                        <td>{{ $user->personal->everyday_language }}</td>
                        <td>{{ $user->personal->body_height }} Cm / {{ $user->personal->body_weight }} Kg</td>
                        <td>{{ $user->personal->address }}</td>
                        <td>{{ $user->personal->distance }} Km</td>
                        <td>{{ $user->personal->education_category }}</td>
                        <td>
                          @if ($user->personal->status === 'Diproses')
                            <span class="badge badge-warning">{{ $user->personal->status }}</span>
                          @elseif ($user->personal->status === 'Diterima')
                            <span class="badge badge-success">{{ $user->personal->status }}</span>
                          @else
                            <span class="badge badge-danger">{{ $user->personal->status }}</span>
                          @endif
                        </td>
                        <td>
                          <form action="{{ route('admin.student.destroy', $user->personal->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('admin.student.edit', $user->personal->id) }}" class="btn btn-warning btn-circle m-2">
                              <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-circle m-2">
                              <i class="fas fa-trash"></i>
                            </button>
                            <a href="{{ route('admin.export.pdf', $user->personal->id) }}" class="btn btn-primary btn-circle m-2">
                              <i class="fas fa-download"></i>
                            </a>
                          </form>
                        </td>
                      </tr>
                    @endforeach 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
