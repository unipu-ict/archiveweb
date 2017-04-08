<!-- Evidencija stvaratelja - pregled view - 17.03.2017. -->
<form action="<?php echo base_url()."evidencija_stvaratelja/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="blank">
  <?php if(isset($data->evidencija_stvaratelja_id)){?><input type="hidden" name="id" value="<?php echo isset($data->evidencija_stvaratelja_id) ?$data->evidencija_stvaratelja_id:"";?>"> <?php }?>
    <div class="box-body"><div class="form-group">
      <label for="rb_upisa">Redni broj upisa: </label>
      <input type="text" class="form-control" id="rb_upisa" name="rb_upisa" value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="datum_unosa">Datum unosa: </label>
        <input type="text" class="form-control" id="datum_unosa" name="datum_unosa" value="<?php echo date("d.m.Y.",strtotime($data->datum_unosa));?>" disabled="">
    </div>
    <div class="form-group">
      <label for="maticni_broj">Matični broj: </label>
      <input type="text" class="form-control" id="maticni_broj" name="maticni_broj" required value="<?php echo isset($data->maticni_broj)?$data->maticni_broj:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="naziv">Naziv(i)/prezime i ime: </label>
      <textarea rows="3" class="form-control" id="naziv" name="naziv" disabled=""><?php echo isset($data->naziv)?$data->naziv:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="sjediste">Sjedište/prebivalište: </label>
      <input type="text" class="form-control" id="sjediste" name="sjediste" value="<?php echo isset($data->mjesto)?$data->mjesto:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="adresa">Adresa: </label>
      <input type="text" class="form-control" id="adresa" name="adresa" value="<?php echo isset($data->adresa)?$data->adresa:"";?>" disabled="" >
    </div>
    <div class="form-group">
      <label for="vrijeme_djelovanja">Vrijeme djelovanja: </label>
      <input type="text" class="form-control" id="vrijeme_djelovanja" name="vrijeme_djelovanja" value="<?php echo isset($data->vrijeme_djelovanja)?$data->vrijeme_djelovanja:"";?>" disabled >
    </div>
    <div class="form-group">
      <label for="klasifikacija_djelatnosti">Klasifikacija djelatnosti: </label>
      <input type="text" class="form-control" id="klasifikacija_djelatnosti" name="klasifikacija_djelatnosti" value="<?php echo isset($data->klasifikacija_djelatnosti)?$data->klasifikacija_djelatnosti:"";?>" disabled >
    </div>
    <div class="form-group">
      <label for="pravni_status">Pravni status: </label>
      <input type="text" class="form-control" id="pravni_status" name="pravni_status" value="<?php echo isset($data->pravni_status)?$data->pravni_status:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="povijest_stvaratelja">Povijest stvaratelja: </label>
      <textarea rows="3" class="form-control" id="povijest_stvaratelja" name="povijest_stvaratelja" disabled=""><?php echo isset($data->povijest_stvaratelja)?$data->povijest_stvaratelja:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="djelatnost">Djelatnost: </label>
      <textarea rows="3" class="form-control" id="djelatnost" name="djelatnost" disabled=""><?php echo isset($data->djelatnost)?$data->djelatnost:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="organizacijski_ustroj">Organizacijski ustroj: </label>
      <textarea rows="3" class="form-control" id="organizacijski_ustroj" name="organizacijski_ustroj" disabled=""><?php echo isset($data->organizacijski_ustroj)?$data->organizacijski_ustroj:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="kategorija">Kategorija: </label>
      <input type="text" class="form-control" id="kategorija" name="kategorija" value="<?php echo isset($data->kategorija)?$data->kategorija:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="veze">Veze: </label>
      <textarea rows="3" class="form-control" id="veze" name="veze" disabled=""><?php echo isset($data->veze)?$data->veze:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="naziv_imatelja">Naziv/prezime i ime imatelja gradiva: </label>
      <textarea rows="3" class="form-control" id="djelatnost" name="naziv_imatelja" disabled=""><?php echo isset($data->naziv_imatelja)?$data->naziv_imatelja:"";?></textarea>
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
