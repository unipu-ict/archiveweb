<!-- Knjiga dopunskih preslika - unos i izmjene - 16.03.2017. -->
<form action="<?php echo base_url()."knjiga_dopunskih_preslika/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->knjiga_dopunskih_preslika_id)){?><input type="hidden" name="id" value="<?php echo isset($data->knjiga_dopunskih_preslika_id) ?$data->knjiga_dopunskih_preslika_id : "";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_upisa">Redni broj upisa: <span class="text-red">*</span></label>
      <input type="text" placeholder="Redni broj upisa" class="form-control" id="rb_upisa" name="rb_upisa" required value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>">
    </div>
    <div class="form-group">
      <label for="drzava">Država, mjesto i ustanova čije je gradivo preslikano: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="drzava" name="drzava" required><?php echo isset($data->drzava)?$data->drzava:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="signatura">Signatura i naziv fonda/zbirke: <span class="text-red">*</span></label>
      <input type="text" placeholder="Signatura i naziv fonda/zbirke" class="form-control" id="signatura" name="signatura" required value="<?php echo isset($data->signatura)?$data->signatura:"";?>">
    </div>
    <div class="form-group">
      <label for="signatura_izvornika">Signatura preslikane arhivske jedinice/izvornika: <span class="text-red">*</span></label>
      <input type="text" placeholder="Signatura preslikane arhivske jedinice/izvornika" class="form-control" id="signatura_izvornika" name="signatura_izvornika" required value="<?php echo isset($data->signatura_izvornika)?$data->signatura_izvornika:"";?>">
    </div>
    <div class="form-group">
      <label for="sadrzaj_preslike">Sadržaj preslike: <span class="text-red">*</span></label>
      <input type="text" placeholder="Sadržaj preslike" class="form-control" id="sadrzaj_preslike" name="sadrzaj_preslike" required value="<?php echo isset($data->sadrzaj_preslike)?$data->sadrzaj_preslike:"";?>">
    </div>
    <div class="form-group">
      <label for="vremenski_raspon_gradiva">Vremenski raspon gradiva: <span class="text-red">*</span></label>
      <input type="text" placeholder="Vremenski raspon gradiva" class="form-control" id="vremenski_raspon_gradiva" name="vremenski_raspon_gradiva" required value="<?php echo isset($data->vremenski_raspon_gradiva)?$data->vremenski_raspon_gradiva:"";?>">
    </div>
    <div class="form-group">
      <label for="podloga_snimanja">Podloga snimanja: <span class="text-red">*</span></label>
      <select name="podloga_snimanja" class="form-control" id="podloga_snimanja" required>
        <option value="">Odaberi</option>
        <option value="CD"<?php if(isset($data->podloga_snimanja) && ($data->podloga_snimanja=="CD")){echo "selected";}?>>CD</option>
        <option value="DVD"<?php if(isset($data->podloga_snimanja) && ($data->podloga_snimanja=="DVD")){echo "selected";}?>>DVD</option>
        <option value="Mikrofilm"<?php if(isset($data->podloga_snimanja) && ($data->podloga_snimanja=="Mikrofilm")){echo "selected";}?>>Mikrofilm</option>
        <option value="Tvrdi disk"<?php if(isset($data->podloga_snimanja) && ($data->podloga_snimanja=="Tvrdi disk")){echo "selected";}?>>Tvrdi disk</option>
      </select>
    </div>
    <div class="form-group">
      <label for="tehnika_snimanja">Tehnika snimanja: <span class="text-red">*</span></label>
      <select name="tehnika_snimanja" class="form-control" id="tehnika_snimanja" required>
        <option value="">Odaberi</option>
        <option value="Mikrofilmiranje"<?php if(isset($data->tehnika_snimanja) && ($data->tehnika_snimanja=="Mikrofilmiranje")){echo "selected";}?>>Mikrofilmiranje</option>
        <option value="Skeniranje (c/b)"<?php if(isset($data->tehnika_snimanja) && ($data->tehnika_snimanja=="Skeniranje (c/b)")){echo "selected";}?>>Skeniranje (c/b)</option>
        <option value="Skeniranje (u boji)"<?php if(isset($data->tehnika_snimanja) && ($data->tehnika_snimanja=="Skeniranje (u boji)")){echo "selected";}?>>Skeniranje (u boji)</option>
        <option value="Fotografiranje (c/b)"<?php if(isset($data->tehnika_snimanja) && ($data->tehnika_snimanja=="Fotografiranje (c/b)")){echo "selected";}?>>Fotografiranje (c/b)</option>
        <option value="Fotografiranje (u boji)"<?php if(isset($data->tehnika_snimanja) && ($data->tehnika_snimanja=="Fotografiranje (u boji)")){echo "selected";}?>>Fotografiranje (u boji)</option>
      </select>
    </div>
    <div class="form-group">
      <label for="format">Format filma ili digitalnog zapisa: <span class="text-red">*</span></label>
      <select name="format" class="form-control" id="format"  required>
        <option value="">Odaberi</option>
        <option value="35 mm"<?php if(isset($data->format) && ($data->format=="35 mm")){echo "selected";}?>>35 mm</option>
        <option value="TIFF"<?php if(isset($data->format) && ($data->format=="TIFF")){echo "selected";}?>>TIFF</option>
        <option value="JPEG"<?php if(isset($data->format) && ($data->format=="JPEG")){echo "selected";}?>>JPEG</option>
      </select>
    </div>
    <div class="form-group">
      <label for="oblik_filma">Oblik filma: </label>
      <select name="oblik_filma" class="form-control" id="oblik_filma">
        <option value="">Odaberi</option>
        <option value="Mikrofilmski svitak"<?php if(isset($data->oblik_filma) && ($data->oblik_filma=="Mikrofilmski svitak")){echo "selected";}?>>Mikrofilmski svitak</option>
        <option value="Aperturna kartica"<?php if(isset($data->oblik_filma) && ($data->oblik_filma=="Aperturna kartica")){echo "selected";}?>>Aperturna kartica</option>
        <option value="Mikrofiš"<?php if(isset($data->oblik_filma) && ($data->oblik_filma=="Mikrofiš")){echo "selected";}?>>Mikrofiš</option>
      </select>
    </div>
    <div class="form-group">
      <label for="vrsta_preslike">Vrsta preslike: </label>
      <select name="vrsta_preslike" class="form-control" id="vrsta_preslike">
        <option value="">Odaberi</option>
        <option value="Matični negativ"<?php if(isset($data->vrsta_preslike) && ($data->vrsta_preslike=="Matični negativ")){echo "selected";}?>>Matični negativ</option>
        <option value="Posredni negativ"<?php if(isset($data->vrsta_preslike) && ($data->vrsta_preslike=="Posredni negativ")){echo "selected";}?>>Posredni negativ</option>
        <option value="Dijapozitiv"<?php if(isset($data->vrsta_preslike) && ($data->vrsta_preslike=="Dijapozitiv")){echo "selected";}?>>Dijapozitiv</option>
        <option value="Master datoteka"<?php if(isset($data->vrsta_preslike) && ($data->vrsta_preslike=="Master datoteka")){echo "selected";}?>>Master datoteka</option>
      </select>
    </div>
    <div class="form-group">
      <label for="generacija_preslika">Generacija preslika: <span class="text-red">*</span></label>
      <select name="generacija_preslika" class="form-control" id="generacija_preslika" required>
        <option value="Odaberi">Odaberi</option>
        <option value="Prva generacija"<?php if(isset($data->generacija_preslika) && ($data->generacija_preslika=="Prva generacija")){echo "selected";}?>>Prva generacija</option>
        <option value="Druga generacija"<?php if(isset($data->generacija_preslika) && ($data->generacija_preslika=="Druga generacija")){echo "selected";}?>>Druga generacija</option>
        <option value="Treća generacija"<?php if(isset($data->generacija_preslika) && ($data->generacija_preslika=="Treća generacija")){echo "selected";}?>>Treća generacija</option>
      </select>
    </div>
    <div class="form-group">
      <label for="kolicina_zapisa">Količina zapisa: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="kolicina_zapisa" name="kolicina_zapisa" required><?php echo isset($data->kolicina_zapisa)?$data->kolicina_zapisa:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="datum_narudzbe">Datum narudžbe: <span class="text-red">*</span></label>
      <input type="text" placeholder="Datum narudžbe" class="form-control" id="datum_narudzbe" name="datum_narudzbe" required value="<?php echo isset($data->datum_narudzbe)?date("Y-m-d",strtotime($data->datum_narudzbe)):date("Y-m-d",strtotime("now"));?>">
      <script>
      $( function() {
        $("#datum_narudzbe").datepicker({dateFormat : 'yy-mm-dd'});
        $("#datum_narudzbe").datepicker("option", "changeMonth", true);
        $("#datum_narudzbe").datepicker("option", "changeYear", true);
        $("#datum_narudzbe").datepicker("option", "showAnim", "drop");
        $("#datum_narudzbe").datepicker();
      } );
      </script>
    </div>
    <div class="form-group">
      <label for="podaci_o_nabavi">Podaci o nabavi: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="podaci_o_nabavi" name="podaci_o_nabavi" required><?php echo isset($data->podaci_o_nabavi)?$data->podaci_o_nabavi:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="oznaka_smjestaja">Oznaka smještaja/topografska oznaka preslike: <span class="text-red">*</span></label>
      <input type="text" placeholder="Oznaka smještaja/topografska oznaka preslike" class="form-control" id="oznaka_smjestaja" name="oznaka_smjestaja" required value="<?php echo isset($data->oznaka_smjestaja)?$data->oznaka_smjestaja:"";?>">
    </div>
    <div class="form-group">
      <label for="dostupnost">Dostupnost: <span class="text-red">*</span></label>
      <select name="dostupnost" class="form-control" id="dostupnost" required>
        <option value="">Odaberi</option>
        <option value="Dostupno"<?php if(isset($data->dostupnost) && ($data->dostupnost=="Dostupno")){echo "selected";}?>>Dostupno</option>
        <option value="Nedostupno"<?php if(isset($data->dostupnost) && ($data->dostupnost=="Nedostupno")){echo "selected";}?>>Nedostupno</option>
      </select>
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
