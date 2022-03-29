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
                                @foreach ($mahasiswa as $index => $mahasiswa)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{ $mahasiswa->nim }}</td>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        <td>{{ $mahasiswa->th_masuk }}</td>
                                        <td>{{ $mahasiswa->no_telepon }}</td>
                                        <td>{{ $mahasiswa->club->club_name }}</td>
                                        <td>{{ $mahasiswa->club->hari }}</td>
                                        <td>{{ $mahasiswa->club->jam }}</td>
                                        <td>{{ $mahasiswa->club->lab->lab_name }}</td>
                                        <td>
                                            <div class="btn-group">

                                            <a href="{{ url('/modul/mahasiswa/edit/'.$mahasiswa->id) }}"><button class="btn btn-sm btn-warning"> <i data-feather="edit" width="20"></i></button></a>   
                                                <button class="btn btn-sm btn-danger" id="btn" type="button" data-toggle="modal" data-target="#modaldelete-{{ $mahasiswa->id }}"> <i data-feather="trash" width="20"></i></button> 

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modaldelete-{{ $mahasiswa->id }}" tabindex="-1" role="dialog" aria-labelledby="modaldeleteLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="modaldeleteLabel">Hapus Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            Apakan Anda yakin ingin menghapus data mahasiswa atas nama {{ $mahasiswa->nama }}?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="/modul/mahasiswa/delete/{{ $mahasiswa->id }}"><button type="button" class="btn btn-primary">Yakin</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection