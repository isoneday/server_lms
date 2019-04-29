<form action="<?php echo base_url('index.php/admin/c_iklanmateri/aksiInsertIklanMateri');?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
		
			 <div class="form-group">
                  <label for="image">Gambar Iklan Materi</label>
                  <input type="file" class="form-control" name="iklan_m_gambar" placeholder="Gambar Event">
                  <div class="validation"></div>
              </div>
			  
			  
             <div class="form-group">
                 <label for="mitra_id">Nama Mitra</label>
                 <select name="mitra_id" class="form-control">
                    
                    <?php foreach($mitra->result() as $a){?>
                    <option value="<?php echo $a->mitra_id;?>"><?php echo $a->mitra_nama;?></option>
                    <?php } ?>
                  </select>
             </div>
			 
			 <div class="form-group">
                 <label for="materi_id">Nama Materi</label>
                 <select name="materi_id" class="form-control">
                    
                    <?php foreach($materi->result() as $b){?>
                    <option value="<?php echo $b->materi_id;?>"><?php echo $b->materi_nama;?></option>
                    <?php } ?>
                  </select>
             </div>
			 
			
			 <div class="form-group">
                <label for="iklan_tgl_mulai">Tanggal Mulai Iklan Materi</label>
                <input type="date" class="form-control" id="iklan_tgl_mulai" name="iklan_tgl_mulai" placeholder="Tanggal Mulai Iklan Event">
            </div>
			
			 <div class="form-group">
                <label for="iklan_tgl_selesai">Tanggal Selesai Iklan Materi</label>
                <input type="date" class="form-control" id="iklan_tgl_selesai" name="iklan_tgl_selesai" placeholder="Tanggal Selesai Iklan Event">
            </div>
			


              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_iklanmateri');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>
	  
	  