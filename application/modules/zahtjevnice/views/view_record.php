<!-- Zahtjevnice - pregled view - 29.03.2017. -->
<form action="<?php echo base_url()."zahtjevnice/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="blank">
  <?php if(isset($data->zahtjevnice_id)){?><input type="hidden" name="id" value="<?php echo isset($data->zahtjevnice_id) ?$data->zahtjevnice_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_zahtjeva">Broj zahtjeva: </label>
      <input type="text" class="form-control" id="rb_zahtjeva" name="rb_zahtjeva" value="<?php echo isset($data->rb_zahtjeva)?$data->rb_zahtjeva:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="prezime_i_ime">Prezime i ime korisnika: </label>
      <input type="text" class="form-control" id="prezime_i_ime" name="prezime_i_ime" value="<?php echo isset($data->prezime_i_ime)?$data->prezime_i_ime:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="datum_zahtjeva">Datum zahtjeva: </label>
      <input type="text" class="form-control" id="datum_zahtjeva" name="datum_zahtjeva" value="<?php echo date("d.m.Y.",strtotime($data->datum_zahtjeva));?>" disabled="">
    </div>
    <label>Predmet korištenja:</label>
    <div class="form-group">
      <?php foreach($datas as $data){?>
        <input type="text" class="form-control" value="<?php echo isset($data->signatura)?$data->signatura.', '.$data->naziv.': '.$data->oznaka.' '.$data->naziv_jedinice:"";?>" disabled=""></br>
      <?php }?>
    </div>
    <div class="form-group">
      <label for="oblik_koristenja">Oblik korištenja: </label>
      <input type="text" class="form-control" id="oblik_koristenja" name="oblik_koristenja" value="<?php echo isset($data->oblik_koristenja)?$data->oblik_koristenja:"";?>" disabled="">
      </div>
      <div class="form-group">
        <label for="napomena">Napomena: </label>
        <textarea rows="3" class="form-control" id="napomena" name="napomena" disabled=""><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
      </div>
      <div class="heedingInformStyle">Kontrola zapisa</div>
      <div class="form-group">
        <label for="zapis_kreiran">Zapis kreiran: </label>
        <input type="text" placeholder="Korisnik i datum" class="form-control" id="zapis_kreiran" name="zapis_kreiran" value="<?php echo isset($data->zapis_kreiran)?$data->zapis_kreiran:"";?>" disabled="">
      </div>
      </div>
      <div class="box-footer">
        <input type="submit" value="Ispiši" name="print" class="btn btn-primary btn-color" title="Ispiši zapis">
        <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
      </div>
</form>
