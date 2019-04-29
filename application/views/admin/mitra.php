<div class="card mb-3">
          <div class="card-header">
            <table style="width : 100%">
      <tr>
        <td style="width : 50%">
          <i class="fas fa-table"></i>
         List Mitra
        <td align="right">
          
          <a style="background-color: #189cff; border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;" href="<?php echo base_url('index.php/admin/c_mitra/insertMitra');?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Insert Data</a>
        </td>
      </tr>
      </table>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Mitra</th>
					 <th>Alamat Mitra</th>
					  <th>Email Mitra</th>
					   <th>No.Hp Mitra</th>
					    <th>Website Mitra</th>
						 <th>Gambar Mitra</th>
					
					<th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php 
                  $no = 1;
                  foreach($mitra->result() as $key) {?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->mitra_nama;?></td>
					  <td><?php echo $key->mitra_alamat;?></td>
					    <td><?php echo $key->mitra_email;?></td>
						  <td><?php echo $key->mitra_nohp;?></td>
						    <td><?php echo $key->mitra_website;?></td>
		 <td>
		  <img style="width:300px; height=300px" src="<?php echo base_url();?>assets/img/mitra/<?php echo $key->mitra_gambar;?>" alt="gambar">
		  </td>
                    <td>
                            <a href="<?php echo base_url('index.php/admin/c_mitra/updateMitra/'). $key->mitra_id;?>"data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>

                            <a href="<?php echo base_url('index.php/admin/c_mitra/deleteMitra/'). $key->mitra_id;?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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
