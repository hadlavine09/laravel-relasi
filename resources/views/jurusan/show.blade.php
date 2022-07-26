
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Siswa
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Kode Mata Pelajaran</label>
                            <input type="text" class="form-control " name="kode_mata_pelajaran" value="{{ $data_jurusan->kode_mata_pelajaran }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Mata Pelajaran</label>
                            <textarea class="form-control" name="nama_mata_pelajaran" readonly>{{ $data_jurusan->nama_mata_pelajaran }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Semester</label>
                            <input type="text" class="form-control" name="semester" value="{{ $data_jurusan->semester }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" value="{{ $data_jurusan->jurusan }}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('siswa.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection