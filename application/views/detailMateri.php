
  <?php foreach ($detailmateri ->result() as $key) { ?>  

<!--start image area-->
    <div style=" width: 100%;padding-bottom: 0px; position: relative; " >
        <img style="width:100%; height:600px;" height="70%" src="<?php echo base_url();?>assets/img/materi/<?php echo $key->materi_gambar;?>" alt=""/>

    </div>

<!--end image area-->

<table style="background: #267674; width: 100%; padding-top: 0px;margin-top: 0px">
    <tr style="width: 100%; font-size: 25px">
        <td style="width: 40%; padding-left: 20px; padding-top: 10px" >
            <p style="color: #fff"><?php echo $key->materi_nama;?></p>
        </td>
        
        <td style="width: 20%; padding-top: 10px" align="center">
            <p style="color: #fff">Platform</p>
        </td>
        <td style="width: 20%; padding-top: 10px" align="center">
            <p style="color: #fff">Level</p>
        </td>
        <td style="width: 20%; padding-top: 10px" align="center">
            <p style="color: #fff">Bonus</p>
        </td>
    </tr>
    <tr style="width: 100%">
        <td style="width: 40%; padding-left: 20px; ">
            <p style="color: #fff">oleh <?php echo $key->mitra_nama;?></p>
        </td>
        <td style="width: 20%" align="center">
            <p style="color: #fff"><?php echo $key->materi_platform;?></p>
        </td>
        <td style="width: 20%" align="center">
            <p style="color: #fff"><?php echo $key->materi_level;?></p>
        </td>
        <td style="width: 20%" align="center">
            <p style="color: #fff"><?php echo $key->materi_xp;?>xp</p>
        </td>
    </tr>
</table>

<!--start tab area-->

<!--end tab are-->

 <!-- Start video Area -->
 <div align="center" style="padding-top: 40px">
      
      <iframe width="40%" height="40%" src="<?php echo $key->materi_video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         
      </div>

<!--end video area-->
 
<!--start deskripsi area-->
<div  style="margin-top: 30px; background: 	#c5f5d2">
    <h4 align="center" style="padding-top: 20px; font-size: 30px; color:#000">Deskripsi</h4>
    <div class="detail-deskripsi">
        <p >
            <?php echo $key->materi_deskripsi;?>
        </p>
        
       
  </div>
    
</div>

<div  style="margin-top: 30px; background: 	#c5f5d2">
    <h4 align="center" style="padding-top: 20px; font-size: 30px; color:#000">Tipe Kelas</h4>
    <div class="detail-deskripsi">
        <p >
            <?php echo $key->jenis_kelas_nama;?>
        </p>
        
        <p>
            <?php echo $key->jenis_kelas_deskripsi;?>
        </p>
  </div>
    
</div>

<div  style="margin-top: 30px; background: 	#c5f5d2">
    <h4 align="center" style="padding-top: 20px; font-size: 30px; color:#000">Deadline</h4>
    <div class="detail-deskripsi">
    <table >
        <tr >
            <td>
                <i class="fa fa-clock-o fa-5x" aria-hidden="true"></i>

            </td>
            <td style="padding-left: 30px">
                <div>
                    <h5><?php echo $key->materi_waktu;?> Jam* Dibutuhkan waktu untuk menyelesaikan kelas ini.</h5>
                   
                </div>
                <div>
                    <h5><?php echo $key->materi_deadline;?> Hari* Deadline bagi pendaftar penuh.</h5>
                     
                </div>
                <div>
                    Bila melebihi deadline, siswa akan ter-dropout. Namun siswa dapat melanjutkan kembali belajarnya 
                    dengan mendaftar ulang. Ketika mendaftar ulang, baik dari status dropout 
                    ataupun dari status trial menjadi pendaftar penuh, masa deadline akan diperpanjang.
                </div>
                
                
            </td>
        </tr>
    </table>
   </div>
    
</div>

<!--end deskripsi area-->

<div align="center">
   
  <?php $arga = $key->materi_harga;?>
    
  <?php foreach ($statusPembayaran->result() as $status) { ?> 
      
    <?php if($status->pmby_status == "gratis" or $status->pmby_status == "lunas" ){ ?>
         <?php if (isset($modul)) { 
            foreach ($modul->row(0) as $f){
             $first = $f;   
            }
            ?>
        <form action="<?php echo base_url('index.php/c_modul/index/' . $key->materi_id  . '/' . $first)?>">
        <button style="background: #267674; width: 15%; height: 10%; margin-top: 40px;margin-bottom: 30px; color: #fff; font-size: 30px"   type="submit" >Mulai Kelas</button>
        </form>
        <?php }  ?>
 
 <?php } else if ($status->pmby_status == NULL or $status->pmby_status == "cek"){ ?>
    
    <form action="<?php echo base_url('index.php/c_academy/pembayaran/' . $key->materi_id)?>">
    <button style="background: #267674; width: 15%; height: 10%; margin-top: 40px;margin-bottom: 30px; color: #fff; font-size: 30px"   type="submit" >Beli Kelas</button>
    </form>
    
 <?php } ?>
    
     <?php } ?> 
    
</div>


<?php } ?> 

