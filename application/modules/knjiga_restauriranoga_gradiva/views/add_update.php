<!-- Knjiga restauriranoga gradiva - unos i izmjene - 16.03.2017. -->
<form action="<?php echo base_url()."knjiga_restauriranoga_gradiva/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->knjiga_restauriranoga_gradiva_id)){?><input type="hidden"  name="id" value="<?php echo isset($data->knjiga_restauriranoga_gradiva_id) ?$data->knjiga_restauriranoga_gradiva_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_upisa">Redni broj upisa: <span class="text-red">*</span></label>
      <input type="text" placeholder=" Redni broj upisa" class="form-control" id="rb_upisa" name="rb_upisa" required value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>">
    </div>
    <div class="form-group">
      <label for="imatelj">Imatelj arhivskoga gradiva (naziv/prezime i ime, adresa): <span class="text-red">*</span></label>
      <input type="text" placeholder="Imatelj arhivskoga gradiva (naziv/prezime i ime, adresa)" class="form-control" id="imatelj" name="imatelj" required value="<?php echo isset($data->imatelj)?$data->imatelj:"";?>">
    </div>
    <div class="form-group">
      <label for="signatura_fonda">Signatura i naziv fonda/zbirke: <span class="text-red">*</span></label>
      <input type="text" placeholder="Signatura i naziv fonda/zbirke" class="form-control" id="signatura_fonda" name="signatura_fonda" required value="<?php echo isset($data->signatura_fonda)?$data->signatura_fonda:"";?>">
    </div>
    <div class="form-group">
      <label for="signatura_izvornika">Signatura restaurirane/konzervirane jedinice/izvornika: <span class="text-red">*</span></label>
      <input type="text" placeholder="Signatura restaurirane/konzervirane jedinice/izvornika" class="form-control" id="signatura_izvornika" name="signatura_izvornika" required value="<?php echo isset($data->signatura_izvornika)?$data->signatura_izvornika:"";?>">
    </div>
    <div class="form-group">
      <label for="vrsta_i_podloga">Vrsta i podloga restauriranog gradiva: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="vrsta_i_podloga" name="vrsta_i_podloga" required><?php echo isset($data->vrsta_i_podloga)?$data->vrsta_i_podloga:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="kolicina">Količina i dimenzije gradiva: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="kolicina" name="kolicina" required><?php echo isset($data->kolicina)?$data->kolicina:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="sazeti_opis_ostecenja">Sažeti opis oštećenja: <span class="text-red">*</span></label>
      <textarea rows="5" class="form-control" id="sazeti_opis_ostecenja" name="sazeti_opis_ostecenja" required><?php echo isset($data->sazeti_opis_ostecenja)?$data->sazeti_opis_ostecenja:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="sazeti_opis_postupka">Sažeti opis postupka restauriranja/konzerviranja: <span class="text-red">*</span></label>
      <textarea rows="5" class="form-control" id="sazeti_opis_postupka" name="sazeti_opis_postupka" required><?php echo isset($data->sazeti_opis_postupka)?$data->sazeti_opis_postupka:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="datum_preuzimanja">Datum preuzimanja: </label>
      <input type="text" placeholder="Datum preuzimanja" class="form-control" id="datum_preuzimanja" name="datum_preuzimanja"  value="<?php echo isset($data->datum_preuzimanja)?date("Y-m-d",strtotime($data->datum_preuzimanja)):date("Y-m-d",strtotime("now"));?>">
      <script>
      $( function() {
        $("#datum_preuzimanja").datepicker({dateFormat: 'yy-mm-dd'});
        $("#datum_preuzimanja").datepicker("option", "changeMonth", true);
        $("#datum_preuzimanja").datepicker("option", "changeYear", true);
        $("#datum_preuzimanja").datepicker("option", "showAnim", "drop");
        $("#datum_preuzimanja").datepicker();
      } );
      </script>
    </div>
    <div class="form-group">
      <label for="datum_restauriranja">Datum restauriranja: </label>
      <input type="text" placeholder="Datum restauriranja" class="form-control" id="datum_restauriranja" name="datum_restauriranja" value="<?php echo isset($data->datum_restauriranja)?date("Y-m-d",strtotime($data->datum_restauriranja)):date("Y-m-d",strtotime("now"));?>">
      <script>
      $( function() {
        $("#datum_restauriranja").datepicker({dateFormat : 'yy-mm-dd'});
        $("#datum_restauriranja").datepicker("option", "changeMonth", true);
        $("#datum_restauriranja").datepicker("option", "changeYear", true);
        $("#datum_restauriranja").datepicker("option", "showAnim", "drop");
        $("#datum_restauriranja").datepicker();
      } );
      </script>
    </div>
    <div class="form-group">
      <label for="datum_povrata">Datum povrata gradiva imatelju: </label>
      <input type="text" placeholder="Datum povrata gradiva imatelju" class="form-control" id="datum_povrata" name="datum_povrata" value="<?php echo isset($data->datum_povrata)?date("Y-m-d",strtotime($data->datum_povrata)):date("Y-m-d",strtotime("now"));?>">
      <script>
      $( function() {
        $("#datum_povrata").datepicker({dateFormat : 'yy-mm-dd'});
        $("#datum_povrata").datepicker("option", "changeMonth", true);
        $("#datum_povrata").datepicker("option", "changeYear", true);
        $("#datum_povrata").datepicker("option", "showAnim", "drop");
        $("#datum_povrata").datepicker();
      } );
      </script>
    </div>
    <div class="form-group">
      <label for="restaurator">Prezime i ime restauratora: <span class="text-red">*</span></label>
      <input type="text" placeholder="Prezime i ime restauratora" class="form-control" id="restaurator" name="restaurator" required value="<?php echo isset($data->restaurator)?$data->restaurator:"";?>">
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
