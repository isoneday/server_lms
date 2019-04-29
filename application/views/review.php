<div align="center" style="padding-top: 40px">
    <img  src="<?php echo base_url();?>assets/images/Congratulation.png"/>
</div>
<div align="center" style="font-size: 30; padding-top: 30px">Berikan Kami Nilai Tentang Pengalaman Belajarmu</div>

<?php $materi_id = $this->uri->segment(3); ?>
<form action="<?php echo base_url('index.php/c_modul/simpanReview/' . $materi_id)?>" method="post">
<div align="center" style="padding-top: 30px"><input style="width: 40px; height: 40px"  type="text" name="rating" placeholder="1-10"></div>
<div align="center" style=" padding-top: 30px"><textarea style="width: 40%; height: 20%; type="text" name="komentar" placeholder="Masukan Komentar Anda"></textarea></div>
<div  align="center">
    <button type="submit" style="background-color:#ffa61d"  class="ready-btn">Submit</button>
</div>
</form>

<div align ="bottom" style="padding-top: 30px"> <img  src="<?php echo base_url();?>assets/images/footer.png"/></div>


    

