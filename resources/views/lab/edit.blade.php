@extends('layouts.style')
@section('content')
    <div class="page-title">
        <h3>Edit Data Lab</h3>
    </div>
    <section class="section">
        
        <div class="row mb-4">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        
                    </div>
                    <form action="{{ url('/modul/lab/update') }}" method="post">
                        @csrf
                    <div class="card-body px-20 pb-20">
                        <div class="row">
                            
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="hidden" name="id" id="id" value="{{ $lab->id }}">
                                        <span class="input-group-text" id="basic-addon1">Nama Lab</span>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Lab"
                                            aria-label="lab_name" required name="lab_name" aria-describedby="basic-addon1" value="{{ $lab->lab_name }}">
                                            @error('lab_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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