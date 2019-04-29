  <!-- Start Slider Area -->
  <div >
    <div class="bend niceties2 preview-2">
      <div id="ensign-nivoslider" class="slides">
          
          <?php foreach($iklan->result() as $key) {?>
        
             <img src="<?php echo base_url();?>assets/img/iklan/materi/<?php echo $key->iklan_m_gambar;?>" alt="" title="#slider-direction-1" />
           
          <?php }?>
      </div>
    </div>
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
                                  <li><a class="dropdown-item" href="<?php echo base_url('index.php/c_academy');?>">Terbaru</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('index.php/c_academy/materiTerlaris');?>">Terlaris</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('index.php/c_academy/materiGratis');?>">Gratis</a></li>
                              </ul>
                            </div>
                        </div>
               
                     </td>
                 </tr>
             </table>
                  
         </td>
     <form class="login100-form validate-form" action="<?php echo base_url('index.php/c_academy/search_keyword');?>" method="post">
         <td style="width: 50%; " align="right">
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
          <?php foreach($materi->result() as $key) {?>
              <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog" >
              <div class="single-blog-img">
                <a href="<?php echo base_url('index.php/c_academy/detailMateri/' . $key->materi_id)?>">
                    <img src="<?php echo base_url();?>assets/img/materi/<?php echo $key->materi_gambar;?>" alt="">
		</a>
              </div>
            
                <div class="blog-text" style="margin-top:10px">
                <h4>
                   <a href="<?php echo base_url('index.php/c_academy/detailMateri/' . $key->materi_id);?>"><?php echo $key->materi_nama;?></a>
		</h4>
               
              </div>
                
                <table width="100%" style="margin-bottom: 40px">
                 <!--  <tr width="100%" >
                    <td align="left">
                            <div>
                                <span>Rating : <font style="color: #008a85;"><?php echo $key->materi_rating;?></font>/10</span>
                                
                            </div>
                        </td >
                  </tr> -->
                    <tr width="100%" > 
                      
                        <td align="left" width="50%">
                            <div>
                                <img src="<?php echo base_url();?>assets/img/icon/people.png" alt="" height="25px" width="25px">
                                <span><?php echo $key->materi_jum_siswa;?></span>
                                
                            </div>
                        </td >
                        <td align="right" width="50%">
                            <div style="background: #cfcdc9" align="center"><?php echo $key->jenis_kelas_nama;?></font></div>
                        </td>
                      
                        
                    </tr>
                  
                    
                    <tr width="100%">
                        <td width="50%">
                            <?php 
                            if($key->materi_harga == 0){ ?>
                                <div style="margin-top: 20px" ><font size="5" color="#008a85">GRATIS</font><span>(<?php echo $key->materi_xp;?>xp)</span></div>
                            <?php } 
                            else { 
                                $key->materi_harga = $key->materi_harga - $key->materi_diskon ?>
                            <div style="margin-top: 20px" ><font size="5" color="#008a85"><?php echo $key->materi_harga;?></font><span>(<?php echo $key->materi_xp;?>xp)</span></div>
                            <?php }?>
                        </td> 
                        <td width="50%" align="right">
                            <?php $id = $key->materi_id;?>
                            <a href="<?php echo base_url('index.php/c_academy/simpanFavorite');?>"><i class="fa fa-star-o fa-2x" aria-hidden="true"></i><span><?php echo $key->materi_rating;?>/10</span></a>
                        </td>
                        
                    </tr>
                  
                
                    </table>
              
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
  
          
 