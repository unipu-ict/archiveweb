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
          <td class="print-name" colspan="12">OPĆI INVENTAR (NAŠASTAR) ARHIVSKOGA GRADIVA</td>
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
            <th class="border_right" width="5%">Signatura</th>
            <th class="border_right" width="5%">Klasifikacija</th>
            <th class="border_right" width="10%">Naziv</th>
            <th class="border_right" width="5%">Vremenski raspon</th>
            <th class="border_right" width="7%">Količina</th>
            <th class="border_right" width="8%">Sređenost</th>
            <th class="border_right" width="10%">Sadržaj</th>
            <th class="border_right" width="10%">Registraturna pomagala</th>
            <th class="border_right" width="10%">Stvaratelji</th>
            <th class="border_right" width="10%">Arhivska pomagala</th>
            <th class="border_right" width="10%">Akvizicije</th>
            <th class="border_right" width="10%">Napomena</th>
          </thead>
        </tr>
        <tbody>
          <?php foreach($data as $data){?>
            <tr class="report">
              <td class="border_right_nobold">
                <?php echo isset($data->signatura)?$data->signatura:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->klasifikacijska_oznaka)?$data->klasifikacijska_oznaka:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->naziv)?$data->naziv:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->vremenski_raspon)?$data->vremenski_raspon:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->kolicina)?$data->kolicina:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->stupanj_sredenosti)?$data->stupanj_sredenosti:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->podfondovi_serije)?$data->podfondovi_serije:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->registraturna_pomagala)?$data->registraturna_pomagala:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->stvaratelji)?$data->stvaratelji:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->arhivska_pomagala)?$data->arhivska_pomagala:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->akvizicije)?$data->akvizicije:"";?>
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
