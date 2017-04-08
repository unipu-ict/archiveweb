<!-- Prijavnice - unos i izmjene - 28.03.2017. -->
<form action="<?php echo base_url()."prijavnice_fond/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->prijavnice_fond_id)){?><input type="hidden" name="id" value="<?php echo isset($data->prijavnice_fond_id) ?$data->prijavnice_fond_id:"";?>"> <?php } ?>
    <div class="box-body">
      <div class="form-group">
        <label for="id_prijave">Broj prijave (u prijavnici): <span class="text-red">*</span></label>
        <?php echo selectBoxDynamic("id_prijave","prijavnice","rb_prijave",isset($data->id_prijave)?$data->id_prijave:"", required);?>
      </div>
      <div class="form-group">
        <label for="signatura_fonda">Signatura: <span class="text-red">*</span></label>
        <?php echo selectBoxDynamic("signatura_fonda","opci_inventar","signatura",isset($data->signatura_fonda) ?$data->signatura_fonda:"", required);?>
      </div>
      <div class="heedingInformStyle">Kontrola zapisa</div>
      <div class="form-group">
        <label for="zapis_kreiran">Zapis kreiran: <span class="text-red">*</span></label>
        <input type="text" placeholder="Korisnik i datum" class="form-control" id="zapis_kreiran" name="zapis_kreiran" required value="<?php echo $this->session->userdata('user_details')[0]->name.", ".date('d.m.Y.');;?>" readonly>
      </div>
      <div class="box-footer">
        <input type="submit" value="Spremi" name="save" class="btn btn-primary btn-color" title="Spremi zapis">
        <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
      </div>
</form>
