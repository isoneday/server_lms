<?php foreach($modul->result() as $key){?>

<form action="<?php echo base_url('index.php/admin/c_modul/aksiUpdateModul/'). $key->modul_id;?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
        </div>
        <div class="modal-body">
		
		
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
                <label for="modul_id">Id Materi</label>
                <input type="text" value="<?php echo $key->modul_id;?>" class="form-control" id="modul_id" name="modul_id" placeholder="ID Modul">
            </div>
			
			
			
			
			
			   <div class="form-group">
                <label for="modul_judul">Judul Modul</label>
                <input type="text" value="<?php echo $key->modul_judul;?>"  class="form-control" id="modul_judul" name="modul_judul" placeholder="Judul Modul">
            </div>
			
              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_modul');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>

      <?php } ?>
	  
	  