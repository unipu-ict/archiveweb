<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 28.03.2017. -->
<html>
<head>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url()."assets/images/favicon.ico"?>">
  <title>ArchiveWeb</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style-print.css');?>">
</head>
<body>
  <div class="printing-landscape">
    <div>
      <table>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="print-name" colspan="9">EVIDENCIJA KORISNIKA</td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
      </table>
      <table>
        <tr>
          <thead>
            <th class="border_right" width="5%">ID</th>
            <th class="border_right" width="5%">RB</th>
            <th class="border_right" width="15%">Prezime i ime</th>
            <th class="border_right" width="15%">Adresa stalnog boravka</th>
            <th class="border_right" width="15%">Adresa privremenog boravka</th>
            <th class="border_right" width="10%">Datum rođenja</th>
            <th class="border_right" width="10%">Mjesto rođenja</th>
            <th class="border_right" width="15%">Zvanje, zanimanje i ustanova zaposlenja</th>
            <th class="border_right" width="10%">Napomena</th>
          </thead>
        </tr>
        <tbody>
          <?php foreach($data as $data){?>
            <tr class="report">
              <td class="border_right_nobold">
                <?php echo isset($data->id_korisnika)?$data->id_korisnika:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->prezime_i_ime)?$data->prezime_i_ime:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->adresa_stalna)?$data->adresa_stalna.', '.$data->mjesto_sta:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->adresa_privremena)?$data->adresa_privremena.', '.$data->mjesto_pri:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo date("d.m.Y.",strtotime($data->datum_rodenja));?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->mjesto_rod)?$data->mjesto_rod:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->zvanje)?$data->zvanje:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->napomena)?$data->napomena:"";?>
              </td>
              <?php }?>
            </tr>
          </tbody>
        </table>
      </div>
    </body>
</div>
<script>
window.print();
setTimeout(function () { window.close(); }, 100);
</script>
