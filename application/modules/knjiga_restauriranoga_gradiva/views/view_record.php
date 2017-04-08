<!-- Knjiga restauriranoga gradiva - pregled view - 16.03.2017. -->
<form action="<?php echo base_url()."knjiga_restauriranoga_gradiva/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="blank">
  <?php if(isset($data->knjiga_restauriranoga_gradiva_id)){?><input type="hidden"  name="id" value="<?php echo isset($data->knjiga_restauriranoga_gradiva_id) ?$data->knjiga_restauriranoga_gradiva_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_upisa">Redni broj upisa: </label>
      <input type="text" class="form-control" id="rb_upisa" name="rb_upisa" value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="imatelj">Imatelj arhivskoga gradiva: </label>
      <input type="text" class="form-control" id="imatelj" name="imatelj" value="<?php echo isset($data->imatelj)?$data->imatelj:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="signatura_fonda">Signatura i naziv fonda/zbirke: </label>
      <input type="text" class="form-control" id="signatura_fonda" name="signatura_fonda" value="<?php echo isset($data->signatura_fonda)?$data->signatura_fonda:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="signatura_izvornika">Signatura restaurirane/konzervirane jedinice/izvornika: </label>
      <input type="text" placeholder="Signatura restaurirane/konzervirane jedinice/izvornika" class="form-control" id="signatura_izvornika" name="signatura_izvornika" value="<?php echo isset($data->signatura_izvornika)?$data->signatura_izvornika:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="vrsta_i_podloga">Vrsta i podloga restauriranog gradiva: </label>
      <textarea rows="3" class="form-control" id="vrsta_i_podloga" name="vrsta_i_podloga" disabled=""><?php echo isset($data->vrsta_i_podloga)?$data->vrsta_i_podloga:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="kolicina">Količina i dimenzije gradiva: </label>
      <textarea rows="3" class="form-control" id="kolicina" name="kolicina" disabled=""><?php echo isset($data->kolicina)?$data->kolicina:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="sazeti_opis_ostecenja">Sažeti opis oštećenja: </label>
      <textarea rows="5" class="form-control" id="sazeti_opis_ostecenja" name="sazeti_opis_ostecenja" disabled=""><?php echo isset($data->sazeti_opis_ostecenja)?$data->sazeti_opis_ostecenja:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="sazeti_opis_postupka">Sažeti opis postupka restauriranja/konzerviranja: </label>
      <textarea rows="5" class="form-control" id="sazeti_opis_postupka" name="sazeti_opis_postupka" disabled=""><?php echo isset($data->sazeti_opis_postupka)?$data->sazeti_opis_postupka:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="datum_preuzimanja">Datum preuzimanja: </label>
      <input type="text" placeholder="Datum preuzimanja" class="form-control" id="datum_preuzimanja" name="datum_preuzimanja" value="<?php echo date("d.m.Y.",strtotime($data->datum_preuzimanja))?>" disabled="">
    </div>
    <div class="form-group">
      <label for="datum_restauriranja">Datum restauriranja: </label>
      <input type="text" placeholder="Datum restauriranja" class="form-control" id="datum_restauriranja" name="datum_restauriranja" value="<?php echo date("d.m.Y.",strtotime($data->datum_restauriranja))?>" disabled="">
    </div>
    <div class="form-group">
      <label for="datum_povrata">Datum povrata gradiva imatelju: </label>
      <input type="text" placeholder="Datum povrata gradiva" class="form-control" id="datum_povrata" name="datum_povrata" value="<?php echo date("d.m.Y.",strtotime($data->datum_povrata))?>" disabled="">
    </div>
    <div class="form-group">
      <label for="restaurator">Prezime i ime restauratora: </label>
      <input type="text" placeholder="Restaurator" class="form-control" id="restaurator" name="restaurator" value="<?php echo isset($data->restaurator)?$data->restaurator:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="napomena">Napomena: </label>
      <textarea rows="5" class="form-control" id="napomena" name="napomena" disabled="" ><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
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
