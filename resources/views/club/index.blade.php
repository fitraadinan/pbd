@extends('layouts.style')

@section('content')
    
<div class="page-title">
    <h3>Data Club</h3>
</div>
<section class="section">
    
    <div class="row mb-4">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="/modul/club/tambah.php"><h4 class="card-title">
                        
                    <button class="btn btn-primary">Tambah</button>
                    </h4></a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <form action="">
                            <div class="col-lg-12 mb-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Urutkan Berdasarkan</span>
                                    <select class="form-select" name="orderBy" id="basicSelect">
                                        <?php if(isset( $_GET['orderBy'])):?>
                                            <option value="nama_club" <?php echo $_GET['orderBy']=="nama_club"?"selected":""?>>Nama Club</option>
                                            <option value="hari" <?php echo $_GET['orderBy']=="hari"?"selected":""?>>Hari</option>
                                            <option value="jam" <?php echo $_GET['orderBy']=="jam"?"selected":""?>>Jam</option>
                                            <option value="nama_lab" <?php echo $_GET['orderBy']=="nama_lab"?"selected":""?>>Lab</option>
                                        <?php else:?>
                                            <option value="nama_club">Nama Club</option>
                                            <option value="hari">Hari</option>
                                            <option value="jam">Jam</option>
                                            <option value="nama_lab">Lab</option>
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
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Club"
                                        aria-clubel="keyword" value="<?php echo  $_GET['keyword']?>"  name="keyword" aria-describedby="basic-addon1">
                                    <?php else:?>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Club/Hari/Nama Lab"
                                        aria-clubel="keyword"  name="keyword" aria-describedby="basic-addon1">
                                    <?php endif?>
                                    
                                    <button type="submit" class="btn btn-sm btn-primary">Proses</button>    
                                </div>
                            </div>
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
                                <?php
                                if(isset($_GET['orderBy'])){
                                    if(isset($_GET['keyword']) && $_GET['keyword']!="" ){
                                        $keyword = $_GET['keyword'];
                                        $orderby = $_GET['orderBy'];
                                        $jenis = $_GET['jenis'];
                                        $data = mysqli_query($koneksi,"select * from club join lab on lab_idlab=idlab where (nama_club like '%$keyword%' or hari like '%$keyword%' or nama_lab like '%$keyword%')  order by $orderby $jenis");
                                        
                                    }else{
                                        $orderby = $_GET['orderBy'];
                                        $jenis = $_GET['jenis'];
                                        $data = mysqli_query($koneksi,"select * from club join lab on lab_idlab=idlab order by $orderby $jenis ");
                                
                                    }
                                    
                                }else{
                                    $data = mysqli_query($koneksi,"select * from club join lab on lab_idlab=idlab order by nama_club ASC");
                                
                                }
                                $no = 1;
                                while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td><?php echo $d['nama_club']?></td>
                                        <td><?php echo $d['hari']?></td>
                                        <td><?php echo $d['jam']?></td>
                                        <td><?php echo $d['nama_lab']?></td>
                                        <td>
                                            <div class="btn-group">

                                            <a href="/modul/club/edit.php/">"><button class="btn btn-sm btn-warning"> <i data-feather="edit" width="20"></i></button></a>   
                                                <a href="/modul/club/aksi_hapus.php/""><button class="btn btn-sm btn-danger"> <i data-feather="trash" width="20"></i></button>  </a> 

                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <?php 
                                    $no++;
                                }?>

                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection