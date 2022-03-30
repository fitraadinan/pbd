@extends('layouts.style')

@section('content')
    
<div class="page-title">
    <h3>Data Club</h3>
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
                    <a href="{{ url('modul/club/add') }}"><h4 class="card-title">
                                        
                    <button class="btn btn-primary">Tambah</button>
                    </h4></a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <form action="/modul/club/search" method="get">
                            <div class="col-lg-5 mb-1 float-end">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Search</span>
                                    <input type="text" class="form-control" name="search" value="{{ session('search') }}" placeholder="Masukkan Nama Club/Hari/Nama Lab">
                                    
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
                                    <th>Nama Club</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Lab</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($club as $index => $clubs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $clubs->club_name }}</td>
                                        <td>{{ $clubs->hari }}</td>
                                        <td>{{ $clubs->jam }}</td>
                                        <td>{{ $clubs->lab->lab_name }}</td>
                                        <td>
                                            <div class="btn-group">

                                            <a href="{{ url('/modul/club/edit/'.$clubs->id) }}"><button class="btn btn-sm btn-warning"> <i data-feather="edit" width="20"></i></button></a>   
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
                            <h5 class="modal-title" id="modaldeleteLabel">Hapus Data Club {{ $clubs->club_name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            Apakan Anda yakin ingin menghapus data club {{ $clubs->club_name }}?
                            <input type="hidden" name="club" value="{{ $clubs->id }}">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="/modul/club/delete/{{ $clubs->id }}"><button type="button" class="btn btn-primary">Yakin</button></a>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="card-body px-0 pb-0">
                    <div class="panel mx-4 mb-3">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <a href="{{ url('/modul/lab/add') }}" class="btn btn-sm btn-primary pull-left"><i class="fa fa-plus-circle"></i> Add New</a>
                                    <form class="form-horizontal pull-right">
                                        <div class="form-group">
                                            <label>Show : </label>
                                            <select class="form-control">
                                                <option>5</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col-2">No</th>
                                        <th class="col-10">Lab Name</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                        @foreach ($lab as $index => $lab)
                                        <tr>
                                            <td>{{ $index +1 }}</td>
                                            <td>{{ $lab->nama_lab }}</td>
                                            <td>
                                                <ul class="action-list">
                                                    <li><a href="{{ url('/modul/lab/edit/'.$lab->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a></li>
                                                    <li><a href="{{ url('/modul/lab/delete/'.$lab->id) }}" onclick="return confirm('yakin?');" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">showing <b>5</b> out of <b>25</b> entries</div>
                                <div class="col-sm-6 col-xs-6">
                                    <ul class="pagination hidden-xs pull-right">
                                        <li><a href="#" class="p-2">«</a></li>
                                        <li class="active"><a href="#" class="p-2">1</a></li>
                                        <li><a href="#" class="p-2">2</a></li>
                                        <li><a href="#" class="p-2">3</a></li>
                                        <li><a href="#" class="p-2">»</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
@endsection