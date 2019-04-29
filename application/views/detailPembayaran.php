

<div style="width: 50%; height: 100%; " align="center">
<div style="margin-top: 70px; ">
 
<h4>1. Selesaikan pembayaran sebelum</h4>

<?php foreach ($detail ->result() as $key) { ?>
</div>
<div style="margin-top: 3px;  border: 1px solid grey;">
 <?php 
$time = strtotime($key->pmby_batas);
$time += 6 * 3600;
$date = date('Y-m-d H:i:s', $time);

?>
<h4 class="check-title"> <?php echo 'Bayar Sebelum ' . $date; ?></h4>



</div>


<div style="margin-top: 70px; ">
   
<h4>2. Mohon Transfer ke :</h4>

</div>
<div style="margin-top: 3px;  border: 1px solid grey;">
    <table>
        <tr>
            <td style="padding-right: 30px">
                <h4 class="check-title">  Kode Bank : </h4>
            </td>
            <td>
                
            </td>
        </tr>
        <tr>
            <td style="padding-right: 30px">
                <h4 class="check-title">Nomor Rekening : </h4>
            </td>
            <td>
                 <h4 class="check-title">8426 0002 9495 6583</h4>
            </td>
        </tr>
        <tr>
            <td>
                <h4 class="check-title"> Nama Penerima : </h4>
            </td>
            <td>
                <h4 class="check-title"> Class_Koding</h4>
            </td>
        </tr>
        <tr>
            <td>
               <h4 class="check-title"> Jumlah Transfer : </h4>
            </td>
            <td>
                <h4 class="check-title"> Rp. <?php echo $key->materi_harga; ?> </h4>
            </td>
        </tr>
    </table>
</div>

<div style="margin-top: 70px; ">
 
    <form action="<?php echo base_url('index.php/c_academy/simpanPembayaran/'.$key->materi_id);?>" method="post" enctype="multipart/form-data">
<h4>3. Anda Sudah Membayar? :</h4>
 <?php  }  ?>
</div>
<div style="margin-top: 3px;  border: 1px solid grey;">
    <h4>Upload Bukti Pembayaran</h4>
    <input type="file" name="bukti">
    <div class="validation"></div>
    
    <p>Setelah pembayaran anda dikonfirmasi, kami akan mengirim konfirmasi ke alamat email anda</p>
</div>

    <button type="submit" style="background-color:#ffa61d;" class="ready-btn" align="center">Saya Sudah Bayar</button>
     </form>

