<div style="background-color: #c3c5c9; padding-bottom: 30px">
<div class="container emp-profile" style="padding-top: 100px;" >
            <?php foreach($user->result() as $u)?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img style="width: 40%; border-radius: 50%;" src="<?php echo base_url();?>assets/img/user/<?php echo $u->user_image;?>" alt=""/>
                           
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top: 30px">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $u->user_name;?>
                                    </h5>
                                    <h6>
                                       Bergabung sejak : <?php $date = $u->user_date;
                                        echo date('d-m-Y', strtotime($date));?>
                                    </h6>
                                    <p class="proile-rating">Jumlah XP : <?php echo $u->user_xp;?>xp</p>
                            
                        </div>
                    </div>

                </div>
        </div>
    </div>

    <table style="background: #267674; width: 100%">
    <tr style="color: #fff; font-size: 25px">
        <td style="padding-left: 20px; padding-top: 10px" >Belajar</td>
        <td style="padding-top: 10px" align="center">Menghadiri </td>
        <td style="padding-top: 10px" align="center">Asal </td>
    </tr>

    <tr style="color: #fff;">
        <td style="padding-bottom: 10px; padding-left: 20px;"><?php echo $join_belajar->num_rows();?> kelas</td>
        <td style="padding-bottom: 10px" align="center"><?php echo $join_event->num_rows();?> event</td>
        <td style="padding-bottom: 10px" align="center"><?php echo $u->user_asal;?></td>   
    </tr>
    <tr></tr>
</table>

  
  <!-- Start Blog Area -->

  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
          <h4>Kelas Yang Dipelajari</h4>

        <!--<div class="row">-->
          <!-- Start Left Blog -->
          <?php foreach($join_belajar->result() as $key) {?>
              <div class="col-md-2 col-sm-4 col-xs-12">
            <div class="single-blog" >
              <div class="single-blog-img">
                <a href="<?php echo base_url('index.php/c_academy/detailMateri/' . $key->materi_id)?>">
                    <img src="<?php echo base_url();?>assets/img/materi/<?php echo $key->materi_gambar;?>" alt="">
		</a>
              </div>
            
                <div style="text-decoration: none; color: #444;" style="margin-top:10px">
                <h5>
                   <a href="<?php echo base_url('index.php/c_academy/detailMateri/' . $key->materi_id);?>"><?php echo $key->materi_nama;?></a>
		</h5>
               
              </div>
              
            </div>
            <!-- Start single blog -->
          </div>
          <?php }?>
         
          <!-- End Left Blog-->

<!--        </div>-->
      </div>
    </div>
  </div>
  <!-- End Blog -->
  
  <!-- Start Blog Area -->


  <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
          <h4>Event Yang Diikuti</h4>

        <!--<div class="row">-->
          <!-- Start Left Blog -->
          <?php foreach($join_event->result() as $key) {?>
              <div class="col-md-2 col-sm-4 col-xs-12">
            <div class="single-blog" >
              <div class="single-blog-img">
                <a href="<?php echo base_url('index.php/c_event/detailEvent/' . $key->event_id)?>">
                    <img src="<?php echo base_url();?>assets/img/event/<?php echo $key->event_gambar;?>" alt="">
		</a>
              </div>
            
                <div style="text-decoration: none; color: #444;" style="margin-top:10px">
                <h5>
                   <a href="<?php echo base_url('index.php/c_event/detailEvent/' . $key->event_id);?>"><?php echo $key->event_nama;?></a>
		</h5>
               
              </div>
                
                
              
            </div>
            <!-- Start single blog -->
          </div>
          <?php }?>
         
          <!-- End Left Blog-->

<!--        </div>-->
      </div>
    </div>
  </div>
  <!-- End Blog -->