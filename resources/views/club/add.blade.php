@extends('layouts.style')
@section('content')
    <div class="page-title">
        <h3>Tambah Data Club</h3>
    </div>
    <section class="section">
        
        <div class="row mb-4">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        
                    </div>
                    <form action="{{ url('/modul/club') }}" method="post">
                        @csrf
                    <div class="card-body px-20 pb-20">
                        <div class="row">
                            <div class="col-lg-3 mb-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nama Club</span>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Club"
                                        aria-clubel="nama_club" required name="nama_club" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-3 mb-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Hari</span>
                                    <select class="form-select" name="hari" id="basicSelect">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jum'at">Jum'at</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Jam</span>
                                    <input type="time" class="form-control" placeholder="Masukkan Nama Club"
                                        aria-clubel="nama_club" required name="jam" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-lg-3 mb-1">
                                {{-- <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Lab</span>
                                    <select class="form-select" name="lab" id="basicSelect" required>
                                        <?php
                                            $data = mysqli_query($koneksi,"select * from lab left join club on lab_idlab=idlab");
                                            $no = 1;
                                            while($d = mysqli_fetch_array($data)){
                                        ?>
                                            <?php if($d['idclub']==NULL):?>
                                                <option value="<?php echo $d['idlab']?>"><?php echo $d['nama_lab']?></option>
                                            <?php endif?>
                                        <?php } ?>
                                    </select>
                                </div> --}}
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