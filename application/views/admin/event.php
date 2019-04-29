<div class="card mb-3">
          <div class="card-header">
            <table style="width : 100%">
      <tr>
        <td style="width : 50%">
          <i class="fas fa-table"></i>
         Event
        <td align="right">
          
          <a style="background-color: #189cff; border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;" href="<?php echo base_url('index.php/admin/c_event/insertEvent');?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Insert Data</a>
        </td>
      </tr>
      </table>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Event</th>
					<th>Tanggal Mulai Event</th>
					<th>Tanggal Selesai Event</th>
					 <th>Kuota Event</th>
					  <th>Kota Event</th>
					  <th>Jenis Event</th>
					<th>Deskripsi Event</th>
           
            <th>Gambar Event</th>
            <th>XP Event</th>
            <th>Nama Mitra</th>
            <th>Video Event </th>
			<th>Alamat Event </th>
			<th>Gambar Tiket Event </th>
            <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php 
                  $no = 1;
                  foreach($event->result() as $key) {?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->event_nama;?></td>
					 <td><?php echo $key->event_tgl_mulai;?></td>
					 <td><?php echo $key->event_tgl_selesai;?></td>
					 <td><?php echo $key->event_kuota;?></td>
					 <td><?php echo $key->event_kota;?></td>
					  <td><?php echo $key->event_jenis;?></td>
					 
                    <td><?php $isi = $key->event_deskripsi;
                    echo substr($isi,0,50); echo '....';?></td>
          <td>
		  <img style="width:300px; height=300px" src="<?php echo base_url();?>assets/img/event/<?php echo $key->event_gambar;?>" alt="gambar">
		  </td>
                    <td><?php echo $key->event_xp;?></td>
          <td><?php echo $key->mitra_nama;?></td>
          <td><?php echo $key->event_video;?></td>
		   <td><?php echo $key->event_alamat;?></td>
		     <td>
		  <img style="width:300px; height=300px" src="<?php echo base_url();?>assets/img/event/tiket/<?php echo $key->event_tiket;?>" alt="gambar">
		  </td>
          
                    <td>
                            <a href="<?php echo base_url('index.php/admin/c_event/updateEvent/'). $key->event_id;?>"data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>

                            <a href="<?php echo base_url('index.php/admin/c_event/deleteEvent/'). $key->event_id;?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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
