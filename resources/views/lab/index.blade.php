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
                                        <td>{{ $lab->lab_name }}</td>
                                        <td>
                                            <div class="btn-group">

                                            <a href="{{ url('/modul/lab/edit/'.$lab->id) }}"><button class="btn btn-sm btn-warning"> <i data-feather="edit" width="20"></i></button></a>   
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
                            <h5 class="modal-title" id="modaldeleteLabel">Hapus Data Laboratorium</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            Apakan Anda yakin ingin menghapus data laboratorium?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="/modul/lab/delete/{{ $lab->id }}"><button type="button" class="btn btn-primary">Yakin</button></a>
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