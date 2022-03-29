@extends('layouts.style')
@section('content')
    <div class="page-title">
        <h3>Tambah Data Mahasiswa</h3>
    </div>
    <section class="section">
        
        <div class="row mb-4">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        
                    </div>
                    <form action="{{ url('/modul/mahasiswa/update/'.$mahasiswa->id) }}" method="post">
                        @csrf
                    <div class="card-body px-20 pb-20">
                        <div class="row">
                            <div class="col-lg-4 mb-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nim</span>
                                    <input type="text" class="form-control" placeholder="Masukkan NIM"
                                        aria-mahasiswael="nim" required name="nim" value="{{ $mahasiswa->nim }}" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nama Mahasiswa</span>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Mahasiswa"
                                        aria-mahasiswael="nama" required name="nama" value="{{ $mahasiswa->nama }}" aria-describedby="basic-addon1">
                                </div>
                            </div>
                           
                            <div class="col-lg-4 mb-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Tahun Masuk</span>
                                    <input type="text" class="form-control" placeholder="Tahun Masuk"
                                        aria-mahasiswael="th_masuk" required name="th_masuk" value="{{ $mahasiswa->th_masuk }}" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            
                           
                            <div class="col-lg-4 mb-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nomor Telepon</span>
                                    <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon"
                                        aria-mahasiswael="no_telepon" required name="no_telepon" value="{{ $mahasiswa->no_telepon }}" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-1">
                                <div class="input-group mb-3">
      
                                    <span class="input-group-text" id="basic-addon1">Club</span>
                                    <select class="form-select" name="club" id="basicSelect" required>
                                       <option value="">Pilih club</option>
                                       @foreach ($club as $clubs)
                                           <option {{ $mahasiswa->club_id == $clubs->id ? 'selected' : '' }} value="{{ $clubs->id }}">{{ $clubs->club_name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer px-20 pb-20">
                        <button onclick="window.history.back()" class="btn-sm btn-warning" type="button">Kembali</button>

                            <button class="btn-sm btn-success" type="submit">Simpan</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection