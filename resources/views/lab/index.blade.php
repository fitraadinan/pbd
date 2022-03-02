@extends('layouts.style')

@section('content')
    
<div class="page-title">
    <h3>Data Lab</h3>
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

                </div>
                <div class="card-body px-0 pb-0">
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection