<div class="card mb-3">
          <div class="card-header">
            <table style="width : 100%">
      <tr>
        <td style="width : 50%">
          <i class="fas fa-table"></i>
         Content
        <td align="right">
          
          <a style="background-color: #189cff; border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;" href="<?php echo base_url('index.php/admin/c_content/insertContent');?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Insert Data</a>
        </td>
      </tr>
      </table>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
					 <th>Judul Modul</th>
					  <th>Tipe Modul</th>
					   <th>Isi Content</th>
					    
					<th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php 
                  $no = 1;
                  foreach($content->result() as $key) {?>
                  <tr>
                    <td><?php echo $no; ?></td>
                   
					  <td><?php echo $key->modul_judul;?></td>
					    <td><?php echo $key->modul_tipe;?></td>
						  <td><?php echo strip_tags("$key->content_isi");?></td>
						  
                    <td>
                            <a href="<?php echo base_url('index.php/admin/c_content/updateContent/'). $key->content_urutan;?>"data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>

                            <a href="<?php echo base_url('index.php/admin/c_content/deleteContent/'). $key->content_urutan;?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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
