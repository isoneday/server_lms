<link rel="stylesheet" type="text/css" href="style.css">


        <div style="padding-top: 70px; padding-left: 30px; padding-right: 30px" align="center">
     <h4 class="check-title">List Pembelian Kelas</h4>
     <table class="table1">
    <tr>
        <th style=" padding: 8px 20px; text-align: center;">
            Nama Kelas
        </th>
        <th style=" padding: 8px 20px; text-align: center;">
            Tanggal Pembayaran
        </th>
        <th style=" padding: 8px 20px; text-align: center;">
            Keterangan
        </th>
        <th style=" padding: 8px 20px; text-align: center;">
            Aksi
        </th>
    </tr>
  <?php foreach($progress->result() as $key) {?>
    <?php if($key->pmby_status != NULL ){ ?>
    <tr>
        <td style=" padding: 8px 20px; text-align: center;">
            <?php echo $key->materi_nama;?>
        </td>
        <td style=" padding: 8px 20px; text-align: center;">
            <?php echo $key->pmby_tanggal;?>
        </td>
        <td style=" padding: 8px 20px; text-align: center;">
            <?php $status = $key->pmby_status;
            
            if($status == "cek"){
                echo 'Menunggu Konfirmasi Admin';
            }else if($status == "lunas"){
                echo 'Lunas';
            }else if($status == "gratis"){
                echo 'Gratis';
            }
            
            ?>
        </td>
        <td style=" padding: 8px 20px; text-align: center;">
            <form action="<?php echo base_url('index.php/c_academy/detailMateri/' . $key->materi_id)?>">
                <button class="ready-btn" style="background-color:#35A9DB;" type="submit">Lihat Kelas</button> 
            </form>
            
        </td>
    </tr>
     <?php } ?>
    <?php } ?>
</table>

</div>
 
 
