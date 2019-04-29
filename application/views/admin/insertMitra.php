<form action="<?php echo base_url('index.php/admin/c_mitra/aksiInsertMitra');?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="mitra_nama">Nama Mitra</label>
                <input type="text" class="form-control" id="mitra_nama" name="mitra_nama" placeholder="Nama Mitra">
            </div>
			 <div class="form-group">
                <label for="mitra_alamat">Alamat Mitra</label>
                <input type="text" class="form-control" id="mitra_alamat" name="mitra_alamat" placeholder="Alamat Mitra">
            </div>
			 <div class="form-group">
                <label for="mitra_email">Email Mitra</label>
                <input type="text" class="form-control" id="mitra_email" name="mitra_email" placeholder="Email Mitra">
            </div>
			<div class="form-group">
                <label for="mitra_nohp">No.HP Mitra</label>
                <input type="text" class="form-control" id="mitra_nohp" name="mitra_nohp" placeholder="No.HP Mitra">
            </div>
			
			 <div class="form-group">
                <label for="mitra_website">Website Mitra</label>
                <input type="text" class="form-control" id="mitra_website" name="mitra_website" placeholder="Website Mitra">
            </div>
			
			 <div class="form-group">
                  <label for="image">Gambar Mitra</label>
                  <input type="file" class="form-control" name="mitra_gambar" placeholder="Gambar Mitra">
                  <div class="validation"></div>
              </div>
			

              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_mitra');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>
	  
	  