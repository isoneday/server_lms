<form action="<?php echo base_url('index.php/admin/c_materi/aksiInsertMateri');?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="materi_nama">Nama Materi</label>
                <input type="text" class="form-control" id="materi_nama" name="materi_nama" placeholder="Nama Materi">
            </div>
			<div class="form-group">
                <label for="materi_deskripsi">Deskripsi Materi</label>
                <input type="text" class="form-control" id="materi_deskripsi" name="materi_deskripsi" placeholder="Deskripsi Materi">
            </div>
			 <div class="form-group">
                <label for="materi_platform">Platform Materi</label>
                <input type="text" class="form-control" id="materi_platform" name="materi_platform" placeholder="Platform Materi">
            </div>
			
			 <div class="form-group">
                  <label for="image">Gambar Materi</label>
                  <input type="file" class="form-control" name="materi_gambar" placeholder="Gambar Materi">
                  <div class="validation"></div>
              </div>
			
            <div class="form-group">
                 <label for="jenis_kelas_id">Jenis Kelas</label>
                 
                  <select name="jenis_kelas_id" class="form-control">
                    
                    <?php foreach($jenis_kelas->result() as $b){?>
                    <option value="<?php echo $b->jenis_kelas_id;?>"><?php echo $b->jenis_kelas_nama;?></option>
                    <?php } ?>
                  </select>
				 
             </div>
			 
			 <div class="form-group">
                <label for="materi_harga">Harga Materi</label>
                <input type="text" class="form-control" id="materi_harga" name="materi_harga" placeholder="Harga Materi">
            </div>
			
			 <div class="form-group">
                <label for="materi_diskon">Diskon Materi</label>
                <input type="text" class="form-control" id="materi_diskon" name="materi_diskon" placeholder="Harga Materi">
            </div>
			
			<div class="form-group">
                <label for="materi_xp">XP Materi</label>
                <input type="text" class="form-control" id="materi_xp" name="materi_xp" placeholder="XP Materi">
            </div>
			
			<div class="form-group">
                <label for="materi_rating">Rating Materi</label>
                <input type="text" class="form-control" id="materi_rating" name="materi_rating" placeholder="Rating Materi">
            </div>
			
			<div class="form-group">
                <label for="materi_jml_modul">Jumlah Modul Materi</label>
                <input type="text" class="form-control" id="materi_jml_modul" name="materi_jml_modul" placeholder="Jumlah Modul Materi">
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
                <label for="materi_waktu">Waktu Materi</label>
                <input type="number" class="form-control" id="materi_waktu" name="materi_waktu" placeholder="Waktu Materi">
            </div>
			
			 <div class="form-group">
                <label for="materi_deadline">Deadline Materi</label>
                <input type="number" class="form-control" id="materi_deadline" name="materi_deadline" placeholder="Deadline Materi">
            </div>
			 <div class="form-group">
                <label for="materi_level">Level Materi</label>
                <input type="text" class="form-control" id="materi_level" name="materi_level" placeholder="Level Materi">
            </div>
			
			<div class="form-group">
                <label for="materi_tgl"> Tanggal Materi</label>
                <input type="date" class="form-control" id="materi_tgl" name="materi_tgl" placeholder="Tanggal Materi">
            </div>
			
			<div class="form-group"> 
                <label for="materi_jum_siswa">Jumlah Siswa</label>
                <input type="number" class="form-control" id="materi_jum_siswa" name="materi_jum_siswa" placeholder="Jumlah Siswa">
            </div>
			
			<div class="form-group">
                <label for="materi_video">Video Materi</label>
                <input type="text" class="form-control" id="materi_video" name="materi_video" placeholder="Video Materi">
            </div>
		

              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_materi');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>
	  
	  