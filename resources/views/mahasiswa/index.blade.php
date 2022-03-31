@extends('layouts.style')

@section('content')
    
<div class="page-title">
    <h3>Data Mahasiswa</h3>
</div>
<section class="section">
    
    <div class="row mb-4">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ url('modul/mahasiswa/add') }}"><h4 class="card-title">
                                        
                    <button class="btn btn-primary">Tambah</button>
                    </h4></a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <form action="/modul/mahasiswa/search" method="get">
                            <div class="col-lg-5 mb-1 float-end">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Search</span>
                                    <input type="text" class="form-control" name="search" value="{{ session('search') }}" placeholder="Masukkan Nama Mahasiswa/Tahun Masuk/NIM">
                                    
                                    <button type="submit" class="btn btn-sm btn-primary">Proses</button> 
                                        
                                </div>
                            </div>
                                @if(session()->has('message'))
                                    <p class="alert {{ session()->get('alert-class', 'alert-info') }} ">{{ session()->get('message') }}</p>
                                @endif 
                        </form>
                    </div>

                    <div class="table table-responsive">
                        <table class='table table-striped' id="table1"> 
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nim</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Tahun Masuk</th>
                                    <th>Nomor Telepon</th>
                                    <th>Nama Club</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Lab</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $index => $mahasiswas)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{ $mahasiswas->nim }}</td>
                                        <td>{{ $mahasiswas->nama }}</td>
                                        <td>{{ $mahasiswas->th_masuk }}</td>
                                        <td>{{ $mahasiswas->no_telepon }}</td>
                                        <td>{{ $mahasiswas->club->club_name }}</td>
                                        <td>{{ $mahasiswas->club->hari }}</td>
                                        <td>{{ $mahasiswas->club->jam }}</td>
                                        <td>{{ $mahasiswas->club->lab->lab_name }}</td>
                                        <td>
                                            <div class="btn-group">

                                            <a href="{{ url('/modul/mahasiswa/edit/'.$mahasiswas->id) }}"><button class="btn btn-sm btn-warning"> <i data-feather="edit" width="20"></i></button></a>   
                                                <button class="btn btn-sm btn-danger" id="btn" type="button" data-toggle="modal" data-target="#modaldelete-{{ $mahasiswas->id }}"> <i data-feather="trash" width="20"></i></button> 

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    @foreach ($mahasiswa as $key => $mahasiswas)                        
                    <!-- Modal -->
                    <div class="modal fade" id="modaldelete-{{ $mahasiswas->id }}" tabindex="-1" role="dialog" aria-labelledby="modaldeleteLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="modaldeleteLabel">Hapus Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value="{{ $mahasiswas->id }}">
                            Apakan Anda yakin ingin menghapus data mahasiswa atas nama {{ $mahasiswas->nama }}?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="/modul/mahasiswa/delete/{{ $mahasiswas->id }}"><button type="button" class="btn btn-primary">Yakin</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection