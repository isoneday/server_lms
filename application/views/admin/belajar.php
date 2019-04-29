<div class="card mb-3">
          <div class="card-header">
            <table style="width : 100%">
      <tr>
        <td style="width : 50%">
          <i class="fas fa-table"></i>
          Belajar
        
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
					<th>Tanggal Mulai Belajar</th>
					<th>Deadline Belajar</th>
					<th>Status Belajar</th>
					<th>Last Seen</th>
					<th>Progress Modul</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php 
                  $no = 1;
                  foreach($belajar->result() as $key) {?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->user_name;?></td>
					  <td><?php echo $key->materi_nama;?></td>
					   <td><?php echo $key->belajar_mulai;?></td>
					    <td><?php echo $key->belajar_deadline;?></td>
						 <td><?php echo $key->belajar_status;?></td>
						 <td><?php echo $key->last_seen;?></td>
						 <td><?php echo $key->progress_modul;?></td>
					
                 
                 <?php $no++; } ?>
                  
                </tbody>
              </table>

             
          </div>
          
        </div>


      </div>
      <!-- /.container-fluid -->

    </div>
