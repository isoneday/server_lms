  <!-- Start Slider Area -->
  <div >
    <div class="bend niceties2 preview-2">
      <div id="ensign-nivoslider" class="slides">
          
          <?php foreach($iklan->result() as $key) {?>
        
             <img src="<?php echo base_url();?>assets/img/iklan/event/<?php echo $key->iklan_e_gambar;?>" alt="" title="#slider-direction-1" />
           
          <?php }?>
      </div>

<!--end slider area-->

 <!--start filter area-->
  
 <!--end filter area-->
 
 <!--start search area-->

    
     
 <table style="width: 100%" class="second-row">
     <tr style="width: 100%">
         
         <td style="width: 50%">
             <table >
                 <tr >
                     
                     <td>
                        <div class="container">
                            <div class="btn-group">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filter Berdasarkan<span class="caret">
                              </button>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="<?php echo base_url('index.php/c_event');?>">Terbaru</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('index.php/c_event/eventKota');?>">Kota A-Z</a></li>
                              </ul>
                            </div>
                        </div>
                     </td>
                 </tr>
             </table>
                  
         </td>
         <form action="<?php echo base_url('index.php/c_event/search_keyword');?>" method="post">
         <td style="width: 50%" align='right'>
             <input type="text" name="keyword" placeholder="Cari">
             <button type="submit" id="btn-search" >cari</button> 
            
         </td>
         </form>
         
                    
     </tr>
 </table>

       
<!-- Start Blog Area -->
  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        
        <!--<div class="row">-->
          <!-- Start Left Blog -->
          <?php foreach($event->result() as $key) {?>
        
              <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog" >
              <div class="single-blog-img">
                <a href="<?php echo base_url('index.php/c_event/detailEvent/' . $key->event_id)?>">
                    <img src="<?php echo base_url();?>assets/img/event/<?php echo $key->event_gambar;?>" alt="">
		</a>
              </div>
            
                <div class="<?php echo base_url('index.php/c_event/detailEvent/' . $key->event_id)?>" style="margin-top:10px">
                <h4>
                   <a href="blog.html"><?php echo $key->event_nama;?></a>
		</h4>
               
              </div>
                
                <table width="100%">
                    <tr width="100%" > 
                        <td align="left" width="50%">
                            <div>
                                <img src="<?php echo base_url();?>assets/img/icon/people.png" alt="" height="25px" width="25px">
                                <span>
                                    <?php if($key->event_kuota != 0){
                                    echo $key->event_kuota;
                                    
                                    }else{
                                        echo 'Kuota Habis';
                                    }
                                        ?>
                                   </span>
                                
                            </div>
                        </td >
                        <td align="right" width="50%">
                            <div style="background: #cfcdc9" align="center"><?php echo $key->event_jenis;?></font></div>
                        </td>
                      
                    </tr>
                    </table>
                  
                <div style="padding-top: 15px">
                        <img src="<?php echo base_url();?>assets/img/icon/time.png" alt="" height="25px" width="25px">
                         <span><?php echo $key->event_tgl_mulai;?> - <?php echo $key->event_tgl_selesai;?></span>
                                
                      </div>
                        
                      <div style="padding-top: 10px; padding-bottom: 50px">
                           <img src="<?php echo base_url();?>assets/img/icon/marker.png" alt="" height="25px" width="25px">
                           <span><?php echo $key->event_kota;?></span>
                                
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
  
          
  
  
 <!--end search area-->
