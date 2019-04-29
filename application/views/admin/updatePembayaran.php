<?php foreach($pembayaran->result() as $key){?>

<form action="<?php echo base_url('index.php/admin/c_pembayaran/aksiUpdatePembayaran/'). $key->pmby_id;?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
        </div>
        <div class="modal-body">
		
			<div class="form-group">
                 <label for="user_id">Nama User</label>
                 <select name="user_id" class="form-control">
                      <option value="<?php echo $key->user_id;?>"><?php echo $key->user_name;?></option>
                    <?php foreach($user->result() as $b){?>
                    <option value="<?php echo $b->user_id;?>"><?php echo $b->user_name;?></option>
                    <?php } ?>
                  </select>
             </div>
           
			
			 <div class="form-group">
                 <label for="materi_id">Nama Materi</label>
                 <select name="materi_id" class="form-control">
                      <option value="<?php echo $key->materi_id;?>"><?php echo $key->materi_nama;?></option>
                    <?php foreach($materi->result() as $a){?>
                    <option value="<?php echo $a->materi_id;?>"><?php echo $a->materi_nama;?></option>
                    <?php } ?>
                  </select>
             </div>
			 
			  <div class="form-group">
                  <label for="image">Bukti Pembayaran</label>
                  <input type="file" value="<?php echo $key->pmby_bukti;?>" class="form-control" name="pmby_bukti" placeholder="Bukti Pembayaran">
                  <div class="validation"></div>
              </div>
			  
			   <div class="form-group">
                <label for="pmby_status">Status Pembayaran</label>
                <input type="text" value="<?php echo $key->pmby_status;?>" class="form-control" id="pmby_status" name="pmby_status" placeholder="Status Pembayaran">
            </div>
			  
			  
			<div class="form-group">
                <label for="pmby_tanggal">Tanggal Pembayaran</label>
                <input type="datetime" value="<?php echo $key->pmby_tanggal;?>" class="form-control" id="pmby_tanggal" name="pmby_tanggal" placeholder="Tanggal Pembayaran">
            </div>
			
			<div class="form-group">
                <label for="pmby_batas">Batas Pembayaran</label>
                <input type="datetime" value="<?php echo $key->pmby_batas;?>" class="form-control" id="pmby_batas" name="pmby_batas" placeholder="Batas Pembayaran">
            </div>
			  
			
			
              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/admin/c_pembayaran');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>

      <?php } ?>
	  
	  