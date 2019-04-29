<?php foreach($user->result() as $key){?>

<form action="<?php echo base_url('index.php/admin/c_user/aksiUpdateUser/'). $key->user_id;?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="user_name">Nama User</label>
                <input type="text" value="<?php echo $key->user_name;?>" class="form-control" id="user_name" name="user_name" placeholder="Nama User">
            </div>
			 <div class="form-group">
                <label for="user_email">Email User</label>
                <input type="text" value="<?php echo $key->user_email;?>" class="form-control" id="user_email" name="user_email" placeholder="Email User">
            </div>
			<div class="form-group">
                <label for="user_password">Password User</label>
                <input type="text" value="<?php echo $key->user_password;?>" class="form-control" id="user_password" name="user_password" placeholder="Password User">
            </div>
			
			<div class="form-group">
                  <label for="image">Gambar User</label>
                  <input type="file" value="<?php echo $key->user_image;?>" class="form-control" name="user_image" placeholder="Gambar User">
                  <div class="validation"></div>
              </div>
			
			<div class="form-group">
                <label for="user_date">Tanggal User</label>
                <input type="datetime" value="<?php echo $key->user_date;?>" class="form-control" id="user_date" name="user_date" placeholder="Tanggal User">
            </div>
			
			<div class="form-group">
                <label for="user_asal">Asal User</label>
                <input type="text" value="<?php echo $key->user_asal;?>" class="form-control" id="user_asal" name="user_asal" placeholder="Asal User">
            </div>
			
			<div class="form-group">
                <label for="user_xp">XP User</label>
                <input type="text" value="<?php echo $key->user_xp;?>" class="form-control" id="user_xp" name="user_xp" placeholder="XP User">
            </div>
			

              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/c_user');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>

      <?php } ?>
	  
	  