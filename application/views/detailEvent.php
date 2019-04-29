
  <?php foreach ($detailevent ->result() as $key) { ?>  

<!--start image area-->
    <div style=" width: 100%;padding-bottom: 0px; position: relative; " >
        <img style="width:100%; height:600px;" height="70%" src="<?php echo base_url();?>assets/img/event/<?php echo $key->event_gambar;?>" alt=""/>

    </div>

<!--end image area-->

<table style="background: #267674; width: 100%; padding-top: 0px;margin-top: 0px">
    <tr style="width: 100%; font-size: 25px">
        <td style="width: 40%; padding-left: 20px; padding-top: 10px" >
            <p style="color: #fff"><?php echo $key->event_nama;?></p>
        </td>
        
        <td style="width: 15%; padding-top: 10px" align="center">
            <p style="color: #fff">Kuota</p>
        </td>
        <td style="width: 15%; padding-top: 10px" align="center">
            <p style="color: #fff">Kota</p>
        </td>
        <td style="width: 15%; padding-top: 10px" align="center">
            <p style="color: #fff">Kategori</p>
        </td>
        <td style="width: 15%; padding-top: 10px" align="center">
            <p style="color: #fff">Bonus</p>
        </td>
        
    </tr>
    <tr style="width: 100%">
        <td style="width: 40%; padding-left: 20px; ">
            <p style="color: #fff">oleh <?php echo $key->mitra_nama;?></p>
        </td>
        <td style="width: 15%" align="center">
            <p style="color: #fff"><?php if($key->event_kuota != 0){
                                    echo $key->event_kuota; echo 'Kuota Tersisa';
                                    
                                    }else{
                                        echo 'Kuota Habis';
                                    }
                                        ?> </p>
        </td>
        <td style="width: 15%" align="center">
            <p style="color: #fff"><?php echo $key->event_kota;?></p>
        </td>
        <td style="width: 15%" align="center">
            <p style="color: #fff"><?php echo $key->event_jenis;?></p>
        </td>
        <td style="width: 15%" align="center">
            <p style="color: #fff"><?php echo $key->event_xp;?>xp</p>
        </td>
    </tr>
</table>

<!--start tab area-->

<!--end tab are-->

 <!-- Start video Area -->
 <div align="center" style="padding-top: 40px">
      
      <iframe width="40%" height="40%" src="<?php echo $key->event_video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         
      </div>

<!--end video area-->
 
<!--start deskripsi area-->
<div  style="margin-top: 30px; background: 	#c5f5d2">
    <h4 align="center" style="padding-top: 20px; font-size: 30px; color:#000">Deskripsi</h4>
    <div class="detail-deskripsi">
        <p >
            <?php echo $key->event_deskripsi;?>
        </p>
        
       
  </div>
    
</div>

<div  style="margin-top: 30px; background: #c5f5d2">
    <h4 align="center" style="padding-top: 20px; font-size: 30px; color:#000">Jadwal Pelaksanaan</h4>
    <div class="detail-deskripsi" align="center">
        <p><?php echo $key->event_tgl_mulai;?> s/d <?php echo $key->event_tgl_selesai;?></p>
   </div>
    
     <h4 align="center" style="padding-top: 20px; font-size: 30px; color:#000">Lokasi</h4>
    <div class="detail-deskripsi" align="center">
        <p>Kota <?php echo $key->event_kota;?></p>
        <p><?php echo $key->event_alamat;?></p>
   </div>
    
</div>

<!--end deskripsi area-->

<div align="center">
    <?php if($key->event_kuota != 0){?>
    <form action="<?php echo base_url('index.php/c_event/email/' . $key->event_id)?>">   
    <button style="background: #267674; width: 20%; height: 10%; margin-top: 40px;margin-bottom: 30px; color: #fff; font-size: 30px"   type="submit" >Dapatkan Tiket</button>
    </form>
    <?php }else {?>
    <button style="background: #267674; width: 20%; height: 10%; margin-top: 40px;margin-bottom: 30px; color: #fff; font-size: 30px"   type="submit" >Tiket Habis</button>
    <?php }?>
    
</div>

<?php }?>

