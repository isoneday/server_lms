<form action="<?php echo base_url('index.php/admin/c_iklanevent/aksiInsertIklanEvent');?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
			
			<div class="form-group">
                  <label for="image">Gambar Iklan Event</label>
                  <input type="file" class="form-control" name="iklan_e_gambar" placeholder="Gambar Iklan Event">
                  <div class="validation"></div>
              </div>
		
			<div class="form-group">
                <label for="iklan_e_tgl_mulai">Tanggal Mulai Iklan Event</label>
                <input type="date" class="form-control" id="iklan_e_tgl_mulai" name="iklan_e_tgl_mulai" placeholder="Tanggal Mulai Iklan Event">
            </div>
			
			<div class="form-group">
                <label for="iklan_e_tgl_selesai">Tanggal Selesai Iklan Event</label>
                <input type="date" class="form-control" id="iklan_e_tgl_selesai" name="iklan_e_tgl_selesai" placeholder="Tanggal Selesai Iklan Event">
            </div>
			
			 <div class="form-group">
                 <label for="event_id">Nama Event</label>
                 <select name="event_id" class="form-control">
                    
                    <?php foreach($event->result() as $b){?>
                    <option value="<?php echo $b->event_id;?>"><?php echo $b->event_nama;?></option>
                    <?php } ?>
                  </select>
             </div>
	
			 <div class="form-group">
                 <label for="mitra_id">Nama Mitra</label>
                 <select name="mitra_id" class="form-control">
                    <?php foreach($mitra->result() as $a){?>
                    <option value="<?php echo $a->mitra_id;?>"><?php echo $a->mitra_nama;?></option>
                    <?php } ?>
                  </select>
             </div>
			
			

              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_iklanevent');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>
	  
	  