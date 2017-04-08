<!-- Opći inventar - pregled - 15.03.2017. -->
<form action="<?php echo base_url()."opci_inventar/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="blank">
  <?php if(isset($data->opci_inventar_id)){?><input type="hidden"  name="id" value="<?php echo isset($data->opci_inventar_id) ?$data->opci_inventar_id : "";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="signatura">Redni broj fonda/zbirke (signatura): </label>
      <input type="text" class="form-control" id="signatura" name="signatura" value="<?php echo isset($data->signatura)?$data->signatura:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="klasifikacijska_oznaka">Klasifikacijska oznaka: </label>
      <input type="text" placeholder="Klasifikacijska oznaka" class="form-control" id="klasifikacijska_oznaka" name="klasifikacijska_oznaka" value="<?php echo isset($data->klasifikacijska_oznaka)?$data->klasifikacijska_oznaka:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="naziv">Naziv fonda/zbirke: </label>
      <input type="text" class="form-control" id="naziv" name="naziv" value="<?php echo isset($data->naziv)?$data->naziv:"";?>" disabled="" >
    </div>
    <div class="form-group">
      <label for="vremenski_raspon">Vremenski raspon cjeline gradiva: </label>
      <input type="text" class="form-control" id="vremenski_raspon" name="vremenski_raspon" value="<?php echo isset($data->vremenski_raspon)?$data->vremenski_raspon:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="kolicina">Količina cjeline gradiva: </label>
      <input type="text" class="form-control" id="kolicina" name="kolicina" value="<?php echo isset($data->kolicina)?$data->kolicina:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="stupanj_sredenosti">Stupanj sređenosti: </label>
      <input type="text" class="form-control" id="stupanj_sredenosti" name="stupanj_sredenosti" value="<?php echo isset($data->stupanj_sredenosti)?$data->stupanj_sredenosti:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="podfondovi_serije">Sadržaj: </label>
      <textarea rows="5" class="form-control" id="podfondovi_serije" name="podfondovi_serije" disabled=""><?php echo isset($data->podfondovi_serije)?$data->podfondovi_serije:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="registraturna_pomagala">Registraturna pomagala (vrsta, vremenski raspon i količina): </label>
      <textarea rows="5" class="form-control" id="registraturna_pomagala" name="registraturna_pomagala" disabled=""><?php echo isset($data->registraturna_pomagala)?$data->registraturna_pomagala:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="stvaratelji">Stvaratelji (naziv, vrijeme djelovanja i sjedište): </label>
      <textarea rows="5" class="form-control" id="stvaratelji" name="stvaratelji" disabled=""><?php echo isset($data->stvaratelji)?$data->stvaratelji:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="arhivska_pomagala">Arhivska pomagala: </label>
      <textarea rows="5" class="form-control" id="arhivska_pomagala" name="arhivska_pomagala" disabled=""><?php echo isset($data->arhivska_pomagala)?$data->arhivska_pomagala:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="akvizicije">Akvizicije (broj, godina i datum): </span></label>
      <textarea rows="5" class="form-control" id="akvizicije" name="akvizicije" disabled=""><?php echo isset($data->akvizicije)?$data->akvizicije:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="napomena">Napomena: </label>
      <textarea rows="5" class="form-control" id="napomena" name="napomena" disabled=""><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
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
