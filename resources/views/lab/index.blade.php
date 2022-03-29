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
                {{-- Body of Card --}}
                <div class="card-body">
                    
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
            </div>
        </div>
    </div>
</section>
@endsection