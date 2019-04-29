<div class="card mb-3">
          <div class="card-header">
            <table style="width : 100%">
      <tr>
        <td style="width : 50%">
          <i class="fas fa-table"></i>
          Data Table Berita
        <td align="right">
          
          <a style="background-color: #189cff; border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;" href="<?php echo base_url('index.php/admin/c_materi/insertMateri');?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Insert Data</a>
        </td>
      </tr>
      </table>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Materi</th>
            <th>Deskripsi Materi</th>
            <th>Platform Materi</th>
            <th>Gambar Materi</th>
            <th>Jenis Kelas</th>
            <th>Harga Materi</th>
            <th>Diskon Materi</th>
            <th>XP Materi</th>
            <th>Rating Materi</th>
            <th>Jumlah Modul Materi</th>
            <th>Nama Mitra</th>
            <th>Waktu Materi</th>
            <th>Deadline Materi</th>
            <th>Level Materi</th>
            <th>Tanggal Materi</th>
            <th>Jumlah Siswa </th>
            <th>Video Materi </th>
            <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php 
                  $no = 1;
                  foreach($materi->result() as $key) {?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->materi_nama;?></td>
                    <td><?php $isi = $key->materi_deskripsi;
                    echo substr($isi,0,50); echo '....';?></td>
          <td><?php echo $key->materi_platform;?></td>
          <td>
		  <img style="width:300px; height=300px" src="<?php echo base_url();?>assets/img/materi/<?php echo $key->materi_gambar;?>" alt="gambar">
		  </td>
          <td><?php echo $key->jenis_kelas_nama;?></td>
          <td><?php echo $key->materi_harga;?></td>
                    <td><?php echo $key->materi_diskon;?></td>
                    <td><?php echo $key->materi_xp;?></td>
          <td><?php echo $key->materi_rating;?></td>
          <td><?php echo $key->materi_jml_modul;?></td>
          <td><?php echo $key->mitra_nama;?></td>
          <td><?php echo $key->materi_waktu;?></td>
          <td><?php echo $key->materi_deadline;?></td>
          <td><?php echo $key->materi_level;?></td>
          <td><?php echo $key->materi_tgl;?></td>
          <td><?php echo $key->materi_jum_siswa;?></td>
		  <td> <a href ="<?php echo $key->materi_video;?>"> <?php echo $key->materi_video;?> </a> </td>
          
          
          
                    <td>
                            <a href="<?php echo base_url('index.php/admin/c_materi/updateMateri/'). $key->materi_id;?>"data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>

                            <a href="<?php echo base_url('index.php/admin/c_materi/deleteMateri/'). $key->materi_id;?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                          </td>
                  </tr>
                 
                 <?php $no++; } ?>
                  
                </tbody>
              </table>

             
          </div>
          
        </div>


      </div>
      <!-- /.container-fluid -->

    </div>
