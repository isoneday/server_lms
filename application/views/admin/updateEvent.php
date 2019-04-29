<?php foreach($event->result() as $key){?>

<form action="<?php echo base_url('index.php/admin/c_event/aksiUpdateEvent/'). $key->event_id;?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="event_nama">Nama Event</label>
                <input type="text" value="<?php echo $key->event_nama;?>" class="form-control" id="event_nama" name="event_nama" placeholder="Nama Event">
            </div>
			<div class="form-group">
                <label for="event_tgl_mulai">Tanggal Mulai Event</label>
                <input type="text" value="<?php echo $key->event_tgl_mulai;?>" class="form-control" id="event_tgl_mulai" name="event_tgl_mulai" placeholder="Tanggal Mulai Event">
            </div>
			  </div>
			<div class="form-group">
                <label for="event_tgl_selesai">Tanggal Selesai Event</label>
                <input type="text" value="<?php echo $key->event_tgl_selesai;?>" class="form-control" id="event_tgl_selesai" name="event_tgl_selesai" placeholder="Tanggal Mulai Event">
            </div>
			 <div class="form-group">
                <label for="event_kuota">Kuota Event</label>
                <input type="text" value="<?php echo $key->event_kuota;?>" class="form-control" id="event_kuota" name="event_kuota" placeholder="Kuota Event">
            </div>
			
			<div class="form-group">
                <label for="event_kota">Kota Event</label>
                <input type="text" value="<?php echo $key->event_kota;?>" class="form-control" id="event_kota" name="event_kota" placeholder="Kota Event">
            </div>
			
			<div class="form-group">
                <label for="event_jenis">Jenis Event</label>
                <input type="text" value="<?php echo $key->event_jenis;?>" class="form-control" id="event_jenis" name="event_jenis" placeholder="Jenis Event">
            </div>
			<div class="form-group">
                <label for="event_deskripsi">Deskripsi Event</label>
                <input type="text" value="<?php echo $key->event_deskripsi;?>" class="form-control" id="event_deskripsi" name="event_deskripsi" placeholder="Deskripsi Event">
            </div>
			
		
			 <div class="form-group">
                  <label for="image">Gambar Event</label>
                  <input type="file" value="<?php echo $key->event_gambar;?>" class="form-control" name="event_gambar" placeholder="Gambar Event">
                  <div class="validation"></div>
              </div>
			
			<div class="form-group">
                <label for="event_xp">XP Event</label>
                <input type="text" value="<?php echo $key->event_xp;?>" class="form-control" id="event_xp" name="event_xp" placeholder="XP Event">
            </div>

             <div class="form-group">
                 <label for="mitra_id">Nama Mitra</label>
                 <select name="mitra_id" class="form-control">
                      <option value="<?php echo $key->mitra_id;?>"><?php echo $key->mitra_nama;?></option>
                    <?php foreach($mitra->result() as $a){?>
                    <option value="<?php echo $a->mitra_id;?>"><?php echo $a->mitra_nama;?></option>
                    <?php } ?>
                  </select>
             </div>
			 
			 <div class="form-group">
                <label for="event_video">Video Event</label>
                <input type="text" value="<?php echo $key->event_video;?>" class="form-control" id="event_video" name="event_video" placeholder="Video Event">
            </div>
			 
			 <div class="form-group">
                <label for="event_alamat">Alamat Event</label>
                <input type="text" value="<?php echo $key->event_alamat;?>" class="form-control" id="event_alamat" name="event_alamat" placeholder="Alamat Event">
            </div>
			
			 <div class="form-group">
                  <label for="image">Tiket Event</label>
                  <input type="file" value="<?php echo $key->event_tiket;?>" class="form-control" name="event_tiket" placeholder="Tiket Event">
                  <div class="validation"></div>
              </div>
			
              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_event');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>

      <?php } ?>
	  
	  