<div class="card mb-3">
          <div class="card-header">
            <table style="width : 100%">
      <tr>
        <td style="width : 50%">
          <i class="fas fa-table"></i>
          Project
        
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
            <th>Judul Modul</th>
			<th>Nama Project</th>
            <th>Link Git</th>
           
                  </tr>
                </thead>
                
                <tbody>

                  <?php 
                  $no = 1;
                  foreach($project->result() as $key) {?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->user_name;?></td>
					  <td><?php echo $key->materi_nama;?></td>
					  <td><?php echo $key->modul_judul;?></td>
					   <td><?php echo $key->project_nama;?></td>
					  <td> <a href ="<?php echo $key->link_git;?>"> <?php echo $key->link_git;?> </a> </td>
                   
                 
                 
                 <?php $no++; } ?>
                  
                </tbody>
              </table>

             
          </div>
          
        </div>


      </div>
      <!-- /.container-fluid -->

    </div>
