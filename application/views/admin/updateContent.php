<?php foreach($content->result() as $key){?>

<form action="<?php echo base_url('index.php/admin/c_content/aksiUpdateContent/'). $key->content_urutan;?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
        </div>
        <div class="modal-body">
		
		 <div class="form-group">
                 <label for="modul_id">Judul Modul</label>
                 <select name="modul_id" class="form-control">
                      <option value="<?php echo $key->modul_id;?>"><?php echo $key->modul_judul;?></option>
                    <?php foreach($content->result() as $a){?>
                    <option value="<?php echo $a->modul_id;?>"><?php echo $a->modul_judul;?></option>
                    <?php } ?>
                  </select>
             </div>
	
		
            <div class="form-group">
                <label for="modul_tipe">Tipe Modul</label>
                <input type="text" value="<?php echo $key->modul_tipe;?>" class="form-control" id="modul_tipe" name="modul_tipe" placeholder="Tipe Modul">
            </div>
			
			<div class="form-group">
                <label for="content_isi">Isi Content</label>
                <input type="text" value="<?php echo $key->content_isi;?>" class="form-control" id="content_isi" name="content_isi" placeholder="Isi Content">
            </div>
			
			
			
              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_content');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>

      <?php } ?>
	  
	  