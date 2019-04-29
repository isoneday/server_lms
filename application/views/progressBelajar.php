<link rel="stylesheet" type="text/css" href="style.css">


<div style="padding-top: 70px; padding-left: 30px; padding-right: 30px" align="center">
     <h4 class="check-title">Kelas Yang Diikuti</h4>
     <table class="table1">
    <tr>
        <th style=" padding: 8px 20px; text-align: center;">
            Nama Kelas
        </th>
        <th style=" padding: 8px 20px; text-align: center;">
            Modul Yang Telah Dibuka
        </th>
        <th style=" padding: 8px 20px; text-align: center;">
            Modul Selesai
        </th>
        <th style=" padding: 8px 20px; text-align: center;">
            Deadline
        </th>
        <th style=" padding: 8px 20px; text-align: center;">
            Aksi
        </th>
    </tr>
     <?php foreach($progress->result() as $key) {?>
    <tr>
        <td style=" padding: 8px 20px; text-align: center;">
            <?php echo $key->materi_nama;?>
        </td>
        <td style=" padding: 8px 20px; text-align: center;">
            <?php echo $key->progress_modul ."/". $key->materi_jml_modul;?>
        </td>
        <td style=" padding: 8px 20px; text-align: center;">
            <?php 
            $progress = $key->progress_modul;
            $jml = $key->materi_jml_modul;
            $persen = ($progress / $jml) * 100;
            echo round($persen) .'%';       
            ?>
        </td>
        <td style=" padding: 8px 20px; text-align: center;">
            
            <?php
                date_default_timezone_set('Asia/Jakarta');
                $cur_date = date('m/d/Y h:i:s a', time());
                
                    if($persen == 100 and $cur_date <= $key->belajar_deadline){
                        echo 'selesai';
                    }else if($cur_date <= $key->belajar_deadline){
                        echo $key->belajar_deadline;
                    }else{
                        echo 'Kedaluwarsa';
                    }
            ?>
      
        </td>
        <td style=" padding: 8px 20px; text-align: center;">
              <?php  if($key->belajar_status == "selesai"){ ?>

                <a href="<?php echo base_url('index.php/c_modul/reqSertifikat/'. $key->materi_id)?>" class="ready-btn" style="background-color:#35A9DB;">Cetak Sertifikat</a>

               <!--  <div id="popup">
                    <div class="window">
                        <a href="<?php echo base_url('index.php/c_modul/reqSertifikat/'. $key->materi_id)?>" class="close-button" title="Close">X</a>
                        <h6>Sertifikat akan dikirim ke email anda <?php echo $key->materi_id;?></h6>
                    </div>
                </div> -->
               
              <?php  } else { 
                     echo '-';
                     }?>    
        </td>
    </tr>
     
     <?php } ?>
</table>

</div>

                
