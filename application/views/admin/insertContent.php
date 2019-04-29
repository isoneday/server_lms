<form action="<?php echo base_url('index.php/admin/c_content/aksiInsertContent');?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
        </div>
		
		 <div class="form-group">
                 <label for="modul_id">Judul Modul</label>
                 <select name="modul_id" class="form-control">
                    
                    <?php foreach($modul->result() as $b){?>
                    <option value="<?php echo $b->modul_id;?>"><?php echo $b->modul_judul;?></option>
                    <?php } ?>
                  </select>
             </div>
			 
			 
        <div class="modal-body">
            <div class="form-group">
                <label for="modul_tipe">Tipe Modul</label>
                <input type="text" class="form-control" id="modul_tipe" name="modul_tipe" placeholder="Tipe Modul">
            </div>
			
				 
        <div class="modal-body">
            <div class="form-group">
                <label for="content_isi">Isi Content</label>
                <input type="text" class="form-control" id="content_isi" name="content_isi" placeholder="Isi Content">
            </div>
			
			

              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_content');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>
	  
	  