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
          <td class="print-name" colspan="15">EVIDENCIJA STVARATELJA ARHIVSKOGA GRADIVA</td>
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
            <th class="border_right" width="5%">RB</th>
            <th class="border_right" width="10%">Datum unosa</th>
            <th class="border_right" width="5%">Matični broj</th>
            <th class="border_right" width="5%">Naziv(i)/prezime i ime</th>
            <th class="border_right" width="5%">Sjedište</th>
            <th class="border_right" width="5%">Adresa</th>
            <th class="border_right" width="10%">Klasifikacija djelatnosti</th>
            <th class="border_right" width="10%">Pravni status</th>
            <th class="border_right" width="10%">Povijest stvaratelja</th>
            <th class="border_right" width="5%">Djelatnost</th>
            <th class="border_right" width="5%">Organizacijski ustroj</th>
            <th class="border_right" width="5%">Kategorija</th>
            <th class="border_right" width="5%">Veze</th>
            <th class="border_right" width="5%">Imatelj</th>
            <th class="border_right" width="10%">Napomena</th>
          </thead>
        </tr>
        <tbody>
          <?php foreach($data as $data){?>
            <tr class="report">
              <td class="border_right_nobold">
                <?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo date("d.m.Y.",strtotime($data->datum_unosa));?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->maticni_broj)?$data->maticni_broj:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->naziv)?$data->naziv:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->mjesto)?$data->mjesto:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->adresa)?$data->adresa:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->klasifikacija_djelatnosti)?$data->klasifikacija_djelatnosti:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->pravni_status)?$data->pravni_status:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->povijest_stvaratelja)?$data->povijest_stvaratelja:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->djelatnost)?$data->djelatnost:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->organizacijski_ustroj)?$data->organizacijski_ustroj:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->kategorija)?$data->kategorija:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->veze)?$data->veze:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->naziv_imatelja)?$data->naziv_imatelja:"";?>
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
