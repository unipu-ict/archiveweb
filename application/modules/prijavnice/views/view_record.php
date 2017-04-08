<!-- Prijavnice - pregled view - 20.03.2017. -->
<form action="<?php echo base_url()."prijavnice/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="blank">
  <?php if(isset($data->prijavnice_id)){?><input type="hidden" name="id" value="<?php echo isset($data->prijavnice_id) ?$data->prijavnice_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_prijave">Redni broj prijave u godini: </label>
      <input type="text" class="form-control" id="rb_prijave" name="rb_prijave" value="<?php echo isset($data->rb_prijave)?$data->rb_prijave:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="prezime_i_ime">Prezime i ime korisnika: </label>
      <input type="text" class="form-control" id="prezime_i_ime" name="prezime_i_ime" value="<?php echo isset($data->prezime_i_ime)?$data->prezime_i_ime:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="tema_ili_podrucje_istrazivanja">Tema ili područje istraživanja: </label>
      <textarea rows="3" class="form-control" id="tema_ili_podrucje_istrazivanja" name="tema_ili_podrucje_istrazivanja" disabled=""><?php echo isset($data->tema_ili_podrucje_istrazivanja)?$data->tema_ili_podrucje_istrazivanja:"";?></textarea>
    </div>
    <div class="form-group">
<div class="form-group">
    <label>Fondovi/zbirke:</label>
    <?php foreach($datas as $data){?>
    <input type="text" class="form-control" value="<?php echo isset($data->signatura)?$data->signatura.', '.$data->naziv:"";?>" disabled=""></br>
    <?php }?>
      </div>
    <div class="form-group">
      <label for="svrha_koristenja">Svrha korištenja: </label>
      <input type="text" class="form-control" id="svrha_koristenja" name="svrha_koristenja" required value="<?php echo isset($data->svrha_koristenja)?$data->svrha_koristenja:"";?>" disabled="">
      </div>
      <div class="form-group">
        <label for="odgovorna_osoba">Odgovorna osoba: </label>
        <input type="text" class="form-control" id="odgovorna_osoba" name="odgovorna_osoba" value="<?php echo isset($data->odgovorna_osoba)?$data->odgovorna_osoba:"";?>" disabled="">
      </div>
      <div class="form-group">
        <label for="datum_odobrenja">Datum odobrenja: </label>
        <input type="text" class="form-control" id="datum_odobrenja" name="datum_odobrenja" value="<?php echo date("d.m.Y.",strtotime($data->datum_odobrenja));?>" disabled="">
      </div>
      <div class="form-group">
        <label for="napomena">Napomena: </label>
        <textarea rows="3" class="form-control" id="napomena" name="napomena" disabled=""><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
      </div>
      <div class="heedingInformStyle">Kontrola zapisa</div>
      <div class="form-group">
        <label for="zapis_kreiran">Zapis kreiran: </label>
        <input type="text" class="form-control" id="zapis_kreiran" name="zapis_kreiran" value="<?php echo isset($data->zapis_kreiran)?$data->zapis_kreiran:"";?>" disabled="">
      </div>
    </div>
    <div class="box-footer">
      <input type="submit" value="Ispiši" name="print" class="btn btn-primary btn-color" title="Ispiši zapis">
      <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
    </div>
</form>
