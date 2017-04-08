<!-- Knjiga snimljenoga gradiva - unos i izmjene - 16.03.2017. -->
<form action="<?php echo base_url()."knjiga_snimljenoga_gradiva/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->knjiga_snimljenoga_gradiva_id)){?><input type="hidden" name="id" value="<?php echo isset($data->knjiga_snimljenoga_gradiva_id) ?$data->knjiga_snimljenoga_gradiva_id : "";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_upisa">RB upisa: <span class="text-red">*</span></label>
      <input type="text" placeholder="Redni broj upisa preslike" class="form-control" id="rb_upisa" name="rb_upisa" required value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>">
    </div>
    <div class="form-group">
      <label for="signatura">Signatura izvornika: <span class="text-red">*</span></label>
      <input type="text" placeholder="Signatura izvornika" class="form-control" id="signatura" name="signatura" required value="<?php echo isset($data->signatura)?$data->signatura:"";?>">
    </div>
    <div class="form-group">
      <label for="naziv_izvornika">Naziv izvornika: <span class="text-red">*</span></label>
      <input type="text" placeholder="Naziv izvornika" class="form-control" id="naziv_izvornika" name="naziv_izvornika" required value="<?php echo isset($data->naziv_izvornika)?$data->naziv_izvornika:"";?>">
    </div>
    <div class="form-group">
      <label for="signatura_preslike">Signatura preslike: <span class="text-red">*</span></label>
      <input type="text" placeholder="Signatura preslike" class="form-control" id="signatura_preslike" name="signatura_preslike" required value="<?php echo isset($data->signatura_preslike)?$data->signatura_preslike:"";?>">
    </div>
    <div class="form-group">
      <label for="cjelovitost_snimanja">Cjelovitost snimanja: <span class="text-red">*</span></label>
      <select name="cjelovitost_snimanja" class="form-control" id="cjelovitost_snimanja" required>
        <option value="">Odaberi</option>
        <option value="Cjelovito"<?php if(isset($data->cjelovitost_snimanja) && ($data->cjelovitost_snimanja=="Cjelovito")){echo "selected";}?>>Cjelovito</option>
        <option value="Necjelovito"<?php if(isset($data->cjelovitost_snimanja) && ($data->cjelovitost_snimanja=="Necjelovito")){echo "selected";}?>>Necjelovito</option>
      </select>
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
      <select name="format" class="form-control" id="format" required="">
        <option value="">Odaberi</option>
        <option value="35 mm"<?php if(isset($data->format) && ($data->format=="35 mm")){echo "selected";}?>>35 mm</option>
        <option value="TIFF"<?php if(isset($data->format) && ($data->format=="TIFF")){echo "selected";}?>>TIFF</option>
        <option value="JPEG"<?php if(isset($data->format) && ($data->format=="JPEG")){echo "selected";}?>>JPEG</option>
      </select>
    </div>
    <div class="form-group">
      <label for="oblik_filma">Oblik filma: </label>
      <select name="oblik_filma" class="form-control" id="oblik_filma" required="">
        <option value="">Odaberi</option>
        <option value="Mikrofilmski svitak"<?php if(isset($data->oblik_filma) && ($data->oblik_filma=="Mikrofilmski svitak")){echo "selected";}?>>Mikrofilmski svitak</option>
        <option value="Aperturna kartica"<?php if(isset($data->oblik_filma) && ($data->oblik_filma=="Aperturna kartica")){echo "selected";}?>>Aperturna kartica</option>
        <option value="Mikrofiš"<?php if(isset($data->oblik_filma) && ($data->oblik_filma=="Mikrofiš")){echo "selected";}?>>Mikrofiš</option>
      </select>
    </div>
    <div class="form-group">
      <label for="vrsta_preslike">Vrsta preslike: </label>
      <select name="vrsta_preslike" class="form-control" id="vrsta_preslike" required="">
        <option value="">Odaberi</option>
        <option value="Matični negativ"<?php if(isset($data->vrsta_preslike) && ($data->vrsta_preslike=="Matični negativ")){echo "selected";}?>>Matični negativ</option>
        <option value="Posredni negativ"<?php if(isset($data->vrsta_preslike) && ($data->vrsta_preslike=="Posredni negativ")){echo "selected";}?>>Posredni negativ</option>
        <option value="Dijapozitiv"<?php if(isset($data->vrsta_preslike) && ($data->vrsta_preslike=="Dijapozitiv")){echo "selected";}?>>Dijapozitiv</option>
        <option value="Master datoteka"<?php if(isset($data->vrsta_preslike) && ($data->vrsta_preslike=="Master datoteka")){echo "selected";}?>>Master datoteka</option>
      </select>
    </div>
    <div class="form-group">
      <label for="generacija_preslika">Generacija preslika: <span class="text-red">*</span></label>
      <select name="generacija_preslika" class="form-control" id="generacija_preslika" required="">
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
      <label for="odgovorna_osoba">Odgovorna osoba: <span class="text-red">*</span></label>
      <input type="text" placeholder="Odgovorna osoba" class="form-control" id="odgovorna_osoba" name="odgovorna_osoba" required value="<?php echo isset($data->odgovorna_osoba)?$data->odgovorna_osoba:"";?>">
    </div>
    <div class="form-group">
      <label for="datum_izrade">Datum izrade: <span class="text-red">*</span></label>
      <input type="text" placeholder="Datum izrade" class="form-control" id="datum_izrade" name="datum_izrade" required value="<?php echo isset($data->datum_izrade)?date("Y-m-d",strtotime($data->datum_izrade)):date("Y-m-d",strtotime("now"));?>">
      <script>
      $( function() {
          $("#datum_izrade").datepicker({dateFormat : 'yy-mm-dd'});
          $("#datum_izrade").datepicker( "option", "changeMonth", true );
          $("#datum_izrade").datepicker( "option", "changeYear", true );
          $("#datum_izrade").datepicker( "option", "showAnim", "drop" );
          $("#datum_izrade").datepicker();
      } );
      </script>
    </div>
    <div class="form-group">
      <label for="ustanova">Ustanova: <span class="text-red">*</span></label>
      <input type="text" placeholder="Ustanova" class="form-control" id="ustanova" name="ustanova" required value="<?php echo isset($data->ustanova)?$data->ustanova:"";?>">
    </div>
    <div class="form-group">
      <label for="topografska_oznaka">Topografska oznaka preslike: <span class="text-red">*</span></label>
      <input type="text" placeholder="Topografska oznaka preslike" class="form-control" id="topografska_oznaka" name="topografska_oznaka" required value="<?php echo isset($data->topografska_oznaka)?$data->topografska_oznaka:"";?>">
    </div>
    <div class="form-group">
      <label for="dostupnost">Dostupnost: <span class="text-red">*</span></label>
      <select name="dostupnost" class="form-control" id="dostupnost" required>
        <option value="">Odaberi</option>
        <option value="Dostupno" <?php if(isset($data->dostupnost) && ($data->dostupnost == "Dostupno")){ echo "selected";}?>>Dostupno</option>
        <option value="Nedostupno" <?php if(isset($data->dostupnost) && ($data->dostupnost == "Nedostupno")){ echo "selected";}?>>Nedostupno</option>
      </select>
    </div>
    <div class="form-group">
      <label for="napomena">Napomena: </label>
      <textarea rows="5" class="form-control" id="napomena" name="napomena" ><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
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
