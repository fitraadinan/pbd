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
                    {{-- <div class="row">
                        <form action="">
                            <div class="col-lg-12 mb-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Urutkan Berdasarkan</span>
                                    <select class="form-select" name="orderBy" id="basicSelect">
                                        <?php if(isset( $_GET['orderBy'])):?>
                                            <option value="nama" <?php echo $_GET['orderBy']=="nama"?"selected":""?>>Nama Mahasiswa</option>
                                        <?php else:?>
                                            <option value="nama">Nama Lab</option>
                                        <?php endif?>
                                    </select>
                                    <select class="form-select" name="jenis" id="basicSelect">
                                        <?php if(isset( $_GET['jenis'])):?>
                                            <option value="ASC" <?php echo $_GET['jenis']=="ASC"?"selected":""?>>Ascending</option>
                                            <option value="DESC" <?php echo $_GET['jenis']=="DESC"?"selected":""?>>Descending</option>
                                        <?php else:?>
                                            <option value="ASC">Ascending</option>
                                            <option value="DESC">Descending</option>
                                        <?php endif?>
                                    </select>
                                    <span class="input-group-text" id="basic-addon1">Cari Berdasarkan Keyword</span>
                                    <?php if(isset( $_GET['keyword'])):?>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Lab"
                                        aria-label="keyword" value="<?php echo  $_GET['keyword']?>"  name="keyword" aria-describedby="basic-addon1">
                                    <?php else:?>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Lab"
                                        aria-label="keyword"  name="keyword" aria-describedby="basic-addon1">
                                    <?php endif?>
                                    
                                    <button type="submit" class="btn btn-sm btn-primary">Proses</button>    
                                </div>
                            </div>
                        </form>
                   
                    </div> --}}
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
                                                <button class="btn btn-sm btn-danger" id="btn" type="button" data-toggle="modal" data-target="#modaldelete"> <i data-feather="trash" width="20"></i></button> 

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="modaldeleteLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="modaldeleteLabel">Hapus Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            Apakan Anda yakin ingin menghapus data mahasiswa?
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