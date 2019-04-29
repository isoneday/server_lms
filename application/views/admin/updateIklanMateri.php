<?php foreach($iklanmateri->result() as $key){?>

<form action="<?php echo base_url('index.php/admin/c_iklanmateri/aksiUpdateIklanMateri/'). $key->iklan_m_id;?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
        </div>
        <div class="modal-body">
			<div class="form-group">
                  <label for="image">Gambar Iklan Materi</label>
                  <input type="file" value="<?php echo $key->iklan_m_gambar;?>" class="form-control" name="iklan_m_gambar" placeholder="Gambar Iklan Materi">
                  <div class="validation"></div>
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
                 <label for="materi_id">Nama Materi</label>
                 <select name="materi_id" class="form-control">
                      <option value="<?php echo $key->materi_id;?>"><?php echo $key->materi_nama;?></option>
                    <?php foreach($materi->result() as $b){?>
                    <option value="<?php echo $b->materi_id;?>"><?php echo $b->materi_nama;?></option>
                    <?php } ?>
                  </select>
             </div>

			<div class="form-group">
                <label for="iklan_tgl_mulai">Tanggal Mulai Iklan Materi</label>
                <input type="date" value="<?php echo $key->iklan_tgl_mulai;?>" class="form-control" id="iklan_tgl_mulai" name="iklan_tgl_mulai" placeholder="Tanggal Mulai Iklan Materi">
            </div>
			<div class="form-group">
                <label for="iklan_tgl_selesai">Tanggal Selesai Iklan Materi</label>
                <input type="date" value="<?php echo $key->iklan_tgl_selesai;?>" class="form-control" id="iklan_tgl_selesai" name="iklan_tgl_selesai" placeholder="Tanggal Selesai Iklan Materi">
            </div>
			  
			
			
              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_iklanmateri');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>

      <?php } ?>
	  
	  