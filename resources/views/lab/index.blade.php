@extends('layouts.style')

@section('content')
    
<div class="page-title">
    <h3>Data Laboratorium</h3>
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
                    <a href="{{ url('modul/lab/add') }}"><h4 class="card-title">
                                        
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
                                            <option value="nama_lab" <?php echo $_GET['orderBy']=="nama_lab"?"selected":""?>>Nama Lab</option>
                                        <?php else:?>
                                            <option value="nama_lab">Nama Lab</option>
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
                                    <th>Nama Lab</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lab as $index => $lab)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{ $lab->nama_lab }}</td>
                                        <td>
                                            <div class="btn-group">

                                            <a href="{{ url('/modul/lab/edit/'.$lab->id) }}"><button class="btn btn-sm btn-warning"> <i data-feather="edit" width="20"></i></button></a>   
                                                <a href="{{ url('/modul/lab/delete/'.$lab->id) }}"><button class="btn btn-sm btn-danger"> <i data-feather="trash" width="20"></i></button>  </a> 

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
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