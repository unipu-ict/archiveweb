<!-- Opći inventar - unos i izmjene - 15.03.2017. -->
<form action="<?php echo base_url()."opci_inventar/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->opci_inventar_id)){?><input type="hidden" name="id" value="<?php echo isset($data->opci_inventar_id) ?$data->opci_inventar_id:"";?>"> <?php }?>
    <div class="box-body"><div class="form-group">
      <label for="signatura">Redni broj fonda/zbirke (signatura): <span class="text-red">*</span></label>
      <input type="text" placeholder="Redni broj fonda/zbirke (signatura)" class="form-control" id="signatura" name="signatura" required value="<?php echo isset($data->signatura)?$data->signatura:"";?>">
    </div>
    <div class="form-group">
      <label for="klasifikacijska_oznaka">Klasifikacijska oznaka: <span class="text-red">*</span></label>
      <input type="text" placeholder="Klasifikacijska oznaka" class="form-control" id="klasifikacijska_oznaka" name="klasifikacijska_oznaka" required value="<?php echo isset($data->klasifikacijska_oznaka)?$data->klasifikacijska_oznaka:"";?>">
    </div>
    <div class="form-group">
      <label for="naziv">Naziv fonda/zbirke: <span class="text-red">*</span></label>
      <input type="text" placeholder="Naziv fonda/zbirke" class="form-control" id="naziv" name="naziv" required value="<?php echo isset($data->naziv)?$data->naziv:"";?>">
    </div>
    <div class="form-group">
      <label for="vremenski_raspon">Vremenski raspon cjeline gradiva: <span class="text-red">*</span></label>
      <input type="text" placeholder="Vremenski raspon cjeline gradiva" class="form-control" id="vremenski_raspon" name="vremenski_raspon" required value="<?php echo isset($data->vremenski_raspon)?$data->vremenski_raspon:"";?>">
    </div>
    <div class="form-group">
      <label for="kolicina">Količina cjeline gradiva: <span class="text-red">*</span></label>
      <input type="text" placeholder="Količina cjeline gradiva" class="form-control" id="kolicina" name="kolicina" required value="<?php echo isset($data->kolicina)?$data->kolicina:"";?>">
    </div>
    <div class="form-group">
      <label for="stupanj_sredenosti">Stupanj sređenosti: <span class="text-red">*</span></label>
      <select name="stupanj_sredenosti" class="form-control" id="stupanj_sredenosti" required>
        <option value="">Odaberi</option>
        <option value="Arhivistički sređeno"<?php if(isset($data->stupanj_sredenosti) && ($data->stupanj_sredenosti=="Arhivistički sređeno")){echo "selected";}?>>Arhivistički sređeno</option>
        <option value="Osnovno sređeno"<?php if(isset($data->stupanj_sredenosti) && ($data->stupanj_sredenosti=="Osnovno sređeno")){echo "selected";}?>>Osnovno sređeno</option>
        <option value="Djelomično sređeno"<?php if(isset($data->stupanj_sredenosti) && ($data->stupanj_sredenosti=="Djelomično sređeno")){echo "selected";}?>>Djelomično sređeno</option>
        <option value="Nesređeno"<?php if(isset($data->stupanj_sredenosti) && ($data->stupanj_sredenosti=="Nesređeno")){echo "selected";}?>>Nesređeno</option>
      </select>
    </div>
    <div class="form-group">
      <label for="podfondovi_serije">Sadržaj: </label>
      <textarea rows="5" class="form-control" id="podfondovi_serije" name="podfondovi_serije"><?php echo isset($data->podfondovi_serije)?$data->podfondovi_serije:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="registraturna_pomagala">Registraturna pomagala (vrsta, vremenski raspon i količina): </label>
      <textarea rows="5" class="form-control" id="registraturna_pomagala" name="registraturna_pomagala"><?php echo isset($data->registraturna_pomagala)?$data->registraturna_pomagala:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="stvaratelji">Stvaratelji (naziv, vrijeme djelovanja i sjedište): </label>
      <textarea rows="5" class="form-control" id="stvaratelji" name="stvaratelji"><?php echo isset($data->stvaratelji)?$data->stvaratelji:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="arhivska_pomagala">Arhivska pomagala: </label>
      <textarea rows="5" class="form-control" id="arhivska_pomagala" name="arhivska_pomagala"><?php echo isset($data->arhivska_pomagala)?$data->arhivska_pomagala:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="akvizicije">Akvizicije (broj, godina i datum): </span></label>
      <textarea rows="5" class="form-control" id="akvizicije" name="akvizicije"><?php echo isset($data->akvizicije)?$data->akvizicije:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="napomena">Napomena: </label>
      <textarea rows="5" class="form-control" id="napomena" name="napomena"><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
    </div>
  <div class="heedingInformStyle">Kontrola zapisa</div>
  <div class="form-group">
    <label for="zapis_kreiran">Zapis kreiran: <span class="text-red">*</span></label>
    <input type="text" placeholder="Korisnik i datum" class="form-control" id="zapis_kreiran" name="zapis_kreiran" required value="<?php echo $this->session->userdata('user_details')[0]->name.", ".date('d.m.Y.');;?>" readonly="">
  </div>
  </div>
  <div class="box-footer">
    <input type="submit" value="Spremi" name="save" class="btn btn-primary btn-color" title="Spremi zapis">
    <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
  </div>
</form>
