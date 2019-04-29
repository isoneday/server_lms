<div style="width: 40%; height: 100%; float: left; margin-top: 100px" >

            <div class="section-headline text-center">
              <h2>Partner Pembayaran </h2>
          </div>
        <img src="<?php echo base_url();?>assets/img/bank.jpg"/>
        

</div>

<?php foreach ($pembayaran ->result() as $key) { ?>  
<div style="width: 60%; height: 100%; float: right; margin-top: 100px">
    
    <div class="section-headline text-center">
              <h2>Ringkasan Pemesanan</h2>
          </div>
    <div style="padding-left:40px;" align="center">  
         
        <table>
        <tr style="padding-bottom: 30px">      
        <h4 class="check-title"><?php echo $key->materi_nama;?></h4>
        </tr>
        <tr>
            <td style="padding-right: 300px">
                <h4 class="check-title">Harga Kelas</h4>
            </td>
            <td style="">
                <h4 class="check-title">Rp. <?php echo $key->materi_harga;?></h4>
            </td>
        </tr>
        <tr>
            <td>
                 <h4 class="check-title">Diskon</h4>
            </td>
            <td>
                <h4 class="check-title">Rp. <?php echo $key->materi_diskon;?></h4>
            </td>
        </tr>
        <tr>
            <td>
                <h4 class="check-title">Total Pembayaran</h4>
            </td>
            <td>
                <?php
                
                $total = $key->materi_harga; - $key->materi_diskon;
                ?>
                <h4 class="check-title">Rp. <?php echo $total ?> </h4>
            </td>
        </tr>
        
        
    </table>

     </div>
   
    <div style="margin-top: 70px;" align="center">
        <form action="<?php echo base_url('index.php/c_academy/detailPembayaran/' . $key->materi_id)?>">
         <button style="background-color:#ffa61d;" class="ready-btn" align="center">Bayar Sekarang</button>
        </form>
    </div>
   </div>
<?php } ?>