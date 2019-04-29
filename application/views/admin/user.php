<div class="card mb-3">
          <div class="card-header">
            <table style="width : 100%">
      <tr>
        <td style="width : 50%">
          <i class="fas fa-table"></i>
          User
        
      </tr>
      </table>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama User</th>
					  <th>Email User</th>
					    <th>Password User</th>
						  <th>Gambar User</th>  
						  <th>Tanggal User</th>
						    <th>Asal User</th>
							  <th>XP User</th>
							  	  <th>Action</th>
        
                  </tr>
                </thead>
                
                <tbody>

                  <?php 
                  $no = 1;
                  foreach($user->result() as $key) {?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->user_name;?></td>
					<td><?php echo $key->user_email;?></td>
					<td><?php echo $key->user_password;?></td>
					
						 <td>
						<img style="width:300px; height=300px" src="<?php echo base_url();?>assets/img/user/<?php echo $key->user_image;?>" alt="gambar">
						</td>
					
					<td><?php echo $key->user_date;?></td>
					<td><?php echo $key->user_asal;?></td>
					<td><?php echo $key->user_xp;?></td>
					
					   <td>
                            <a href="<?php echo base_url('index.php/admin/c_user/updateUser/'). $key->user_id;?>"data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>

                            <a href="<?php echo base_url('index.php/admin/c_user/deleteUser/'). $key->user_id;?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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
