<?php foreach($sertifikat->result() as $key){?>

<form action="<?php echo base_url('index.php/admin/c_sertifikat/aksiUpdateSertifikat/'). $key->req_id;?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
        </div>
        <div class="modal-body">

			 <div class="form-group">
                  <label for="image">Gambar Sertifikat</label>
                  <input type="file" value="<?php echo $key->sertifikat_gambar;?>" class="form-control" name="sertifikat_gambar" placeholder="Gambar Sertifikat">
                  <div class="validation"></div>
              </div>
			
			
              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_sertifikat');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>

      <?php } ?>
	  
	  