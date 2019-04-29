<div class="card mb-3">
          <div class="card-header">
            <table style="width : 100%">
      <tr>
        <td style="width : 50%">
          <i class="fas fa-table"></i>
         Sertifikat
        
      </tr>
      </table>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama User</th>
					 <th>Nama Materi</th>
					<th>Request Tanggal</th>
					<th>Gambar Sertifikat</th>
					<th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php 
                  $no = 1;
                  foreach($sertifikat->result() as $key) {?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->user_name;?></td>
					  <td><?php echo $key->materi_nama;?></td>
					 <td><?php echo $key->req_tgl;?></td>
					 <td>
					<img style="width:300px; height=300px" src="<?php echo base_url();?>assets/img/sertifikat/<?php echo $key->sertifikat_gambar;?>" alt="gambar">
					</td>
						
					 
                    <td>
                            <a href="<?php echo base_url('index.php/admin/c_sertifikat/updateSertifikat/'). $key->req_id;?>"data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>

                            <a href="<?php echo base_url('index.php/admin/c_sertifikat/deleteSertifikat/'). $key->req_id;?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
							
							 <a href="<?php echo base_url('index.php/admin/c_sertifikat/email/'). $key->req_id . '/' . $key->materi_id . '/' . $key->user_id;?>"data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Kirim Sertifikat</a>

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
