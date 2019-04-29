<?php foreach($kelas->result() as $key){?>

<form action="<?php echo base_url('index.php/admin/c_kelas/aksiUpdateKelas/'). $key->jenis_kelas_id;?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="jenis_kelas_nama">Nama Kelas</label>
                <input type="text" value="<?php echo $key->jenis_kelas_nama;?>" class="form-control" id="jenis_kelas_nama" name="jenis_kelas_nama" placeholder="Nama Kelas">
            </div>
			<div class="form-group">
                <label for="jenis_kelas_deskripsi">Deskripsi Kelas</label>
                <input type="text" value="<?php echo $key->jenis_kelas_deskripsi;?>" class="form-control" id="jenis_kelas_deskripsi" name="jenis_kelas_deskripsi" placeholder="Deskripsi Kelas">
            </div>
			
              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_kelas');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>

      <?php } ?>
	  
	  