<body style="font-family: Quicksand,sans-serif !important;font-weight: 400;line-height: 1.5;">
    

<div style="width: 20%; float: left; padding-top: 100px; padding-left: 40px; position: fixed">
    <h4><strong>Daftar Modul</strong></h4>
    <div class="scroll">
        <?php foreach ($ceklis->result() as $key) { ?>
        <div>
        <a style="" href="<?php echo base_url('index.php/c_modul/mdl/'. $key->materi_id . '/' . $key->modul_id);?>"><font style="font-size: 20px"><?php echo $key->modul_judul;?></font></a>
        <?php if($key->status == 1){?>
            <span><i class="fa fa-check" aria-hidden="true"></i></span>

        <?php } ?>
    </div>
        <?php } ?>
 
    </div>
</div>

<div style="width: 80%; height: 100%; float: right; padding-top: 100px; ">
    <div style="padding-left: 30px; padding-right: 50px; ">
       
        <?php foreach ($content ->result() as $key) { ?>
        
        <?php if ($key->modul_tipe == "h"){?>
            
        <h4><strong><?php echo $key->content_isi;?></strong></h4>
        
        <?php } ?>
        
        <?php if ($key->modul_tipe == "p"){?>
            
        <p style="text-align: justify; font-size: 18px"><?php echo $key->content_isi;?></p>
        
        <?php } ?>
        
        <?php if ($key->modul_tipe == "img"){?>
        <div style="padding-bottom: 10px">
        <img style="width:50%; padding-bottom: 30px" height="70%" src="<?php echo base_url();?>assets/img/modul/<?php echo $key->content_isi;?>"/>
        </div>
        <?php } ?>
        
        <?php if ($key->modul_tipe == "a"){?>
        
        <a style="text-align: justify; font-size: 20px;" href="<?php echo $key->content_isi;?>"><?php echo $key->content_isi;?><br><br></a>
        
        <?php } ?>
        
        <?php if ($key->modul_tipe == "table"){?>
            
        <table class="tableModul">
            <?php echo $key->content_isi;?>
        </table>
        <?php } ?>
        
        <?php if ($key->modul_tipe == "video"){?>
        
        <div align="center" style="padding-top: 40px; padding-bottom: 40px">
            <iframe width="60%" height="50%" src="<?php echo $key->content_isi;?>" frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

         </div>
        <?php } ?>
         
            
        <?php if ($key->modul_tipe == "submit"){?>
        
        <p style="text-align: justify; font-size: 18px; padding-bottom: 30px"><?php echo $key->content_isi;?></p>
        
        <?php foreach ($modul->result() as $k) { ?>
        <form action="<?php echo base_url('index.php/c_modul/simpanProject/'. $k->materi_id . '/' . $key->modul_id)?>" method="post" enctype="multipart/form-data">
            <?php } ?>
            
        <h4>Upload Project Anda</h4>
        <input type="file" name="file" value="Upload" />
        <div class="validation"></div>
        <div style="padding-top: 30px"> Atau cantumkan link github project anda pada form dibawah</div>
        <div>
            <input size="40" type="text" name="link">
        </div>
        <div>
            <button type="submit" style="background-color:#ffa61d;"  class="ready-btn" align="center" >Submit Project</button>
        </div>
        
        </form>
        <?php } ?>

        <?php if ($key->modul_tipe == "soal"){?>
            <h4>Pertanyaan</h4>
            <div style="font-size: 18px"><?php echo $key->content_isi;?></div> <br/>
        <?php } ?>
        

        <?php if ($key->modul_tipe == "radio"){?>
            <h4>Jawaban Anda</h4>
            <?php foreach ($modul->result() as $k) { ?>
            <form  action="<?php echo base_url('index.php/c_modul/simpanJawaban/'. $k->materi_id . '/' . $key->modul_id)?>" method="post">
             <?php } ?>   
                <?php foreach ($rb->result() as $r){?>
                     <p style="font-size: 18px"><input type="radio" name="rb" value="<?php echo $r->content_isi;?>" /><?php echo $r->content_isi;?><br></p>
               
               <?php } ?>
                <input type="submit" style="background-color:#ffa61d;"class="ready-btn" align="center" value="Kirim Jawaban"/>
            </form>
        <?php } ?>


        <?php if ($kunci == "benar"){
            if ($key->modul_tipe == "benar"){
            ?>

            <div style="background-color: #ffff78; padding-top: 20px; padding-bottom: 20px;padding-right: 20px; padding-left: 20px" >
                <h5 style="font-style: bold;">Anda Menjawab</h5>
                <h5><?php echo $isi;?></h5>
                <p><font style="font-style: bold;">Jawaban Anda benar.</font> Berikut adalah penjelasannya :</p>
                <p><?php echo $key->content_isi;?></p>
            </div>

        <?php } } else if ($kunci == "salah"){ 
            if ($key->modul_tipe == "salah"){?>
                <div style="background-color:   #ffd4d4; padding-top: 20px; padding-bottom: 20px;padding-right: 20px; padding-left: 20px" >
                     <h5>Anda Menjawab</h5>
                    <h5><?php echo $isi;?></h5>
                    <p style="font-style: bold;"><?php echo $key->content_isi;?></p>
                 </div>
        <?php } } else { ?>
             <?php } ?>


         <?php if ($key->modul_tipe == "ol"){?>
            <ol type="1" style="font-size: 18px">
                    <?php echo $key->content_isi;?>
             </ol>
        
        <?php } ?>

        <?php if ($key->modul_tipe == "subh"){?>
            
        <h6 style="padding-top: 20px"><strong><?php echo $key->content_isi;?></strong></h6>
        
        <?php } ?>

        <?php if ($key->modul_tipe == "ul"){?>
            <ul type="disc" style="font-size: 18px; padding-bottom: 20px">
                    <?php echo $key->content_isi;?>
             </ul>
        
        <?php } ?>

         <?php if ($key->modul_tipe == "cd"){?>
        <div style="padding-bottom: 10px">
        <img style="width:80%; padding-bottom: 30px" height="70%" src="<?php echo base_url();?>assets/img/modul/<?php echo $key->content_isi;?>"/>
        </div>
        <?php } ?>

        <?php if ($key->modul_tipe == "gif"){?>
        <div style="padding-bottom: 10px">
        <img style="width:30%; padding-bottom: 30px" height="70%" src="<?php echo base_url();?>assets/img/modul/<?php echo $key->content_isi;?>"/>
        </div>
        <?php } ?>

        
    


    <?php } ?>
      
     <?php $modul_id = $this->uri->segment(4);
     $materi_id = $this->uri->segment(3);
     $next = $modul_id + 1;
     $prev = $modul_id - 1 ;
    foreach ($row->row(0) as $f){
     $first = $f;   
    }
    $num = $row->num_rows();
    foreach ($row->row($num-1) as $l){
        $last = $l;
    }
     ?>    
        
    <?php if($modul_id == $first){ ?>   
    <div style="float: right; padding-top: 50px; padding-bottom: 50px">
        
        <a style="" href="<?php echo base_url('index.php/c_modul/mdl/'. $materi_id . '/' . $next)?>"><div>Lanjutkan Ke Materi Berikutnya
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </div></a>
        
    </div>
  
   <?php } else if($modul_id == $last){ ?>
         <div style="float: left; padding-top: 50px; padding-bottom: 50px; ">
        <a style="" href="<?php echo base_url('index.php/c_modul/mdl/' . $materi_id . '/' . $prev)?>"><div><i class="fa fa-arrow-left" aria-hidden="true"></i>
                Kembali Ke Materi Sebelumnya</div></a>
    </div> 
        <div style="float: right; padding-top: 50px; padding-bottom: 50px">
            <a href="<?php echo base_url('index.php/c_modul/review/'. $materi_id)?>">SELESAI <i class="fa fa-check" aria-hidden="true"></i></a>
        </div>
    <?php } else{ ?>   
        <div style="float: right; padding-top: 50px; padding-bottom: 50px">
            <a style="" href="<?php echo base_url('index.php/c_modul/mdl/'. $materi_id . '/' . $next)?>"><div>Lanjutkan Ke Materi Berikutnya 
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </div></a>
        </div>
        <div style="float: left; padding-top: 50px; padding-bottom: 50px; ">
            <a style="" href="<?php echo base_url('index.php/c_modul/mdl/' . $materi_id . '/' . $prev)?>"><div><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Kembali Ke Materi Sebelumnya</div></a>
        </div>
       <?php } ?>

    </div>
</div>
</body>