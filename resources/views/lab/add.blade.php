@extends('layouts.style')
@section('content')
    <div class="page-title">
        <h3>Tambah Data Lab</h3>
    </div>
    <section class="section">
        
        <div class="row mb-4">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        
                    </div>
                    <form action="{{ url('/modul/lab') }}" method="post">
                        @csrf
                    <div class="card-body px-20 pb-20">
                        <div class="row">
                            
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Nama Lab</span>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Lab"
                                            aria-label="nama_lab" required name="nama_lab" aria-describedby="basic-addon1">
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