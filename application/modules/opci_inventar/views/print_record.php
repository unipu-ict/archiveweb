<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 24.03.2017. -->
<html>
<head>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url()."assets/images/favicon.ico"?>">
  <title>ArchiveWeb</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style-print.css');?>">
</head>
<body>
  <div class="printing">
    <div>
      <table>
        <tr>
          <td width='51%' colspan="2">
            <?php $logo=(setting_all('logo'))?setting_all('logo'):'logo-print.png'; ?>
            <span class="logo-lg"><img src="<?php echo base_url().'assets/images/'.$logo; ?>" id="logo"></span>
          </td>
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
        <tr>
          <td class="print-name" colspan="2">OPĆI INVENTAR (NAŠASTAR) ARHIVSKOGA GRADIVA</td>
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
        <tr>
          <td class="noborder" width='25%'>
            </br>Redni broj fonda/zbirke (signatura):</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->signatura)?$data->signatura:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Klasifikacijska oznaka:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->klasifikacijska_oznaka)?$data->klasifikacijska_oznaka:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Naziv fonda/zbirke:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->naziv)?$data->naziv:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Vremenski raspon cjeline gradiva:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->vremenski_raspon)?$data->vremenski_raspon:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Količina cjeline gradiva:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->kolicina)?$data->kolicina:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Stupanj sređenosti:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->stupanj_sredenosti)?$data->stupanj_sredenosti:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Sadržaj:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->podfondovi_serije)?$data->podfondovi_serije:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Registraturna pomagala (vrsta, vremenski raspon i količina):</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->registraturna_pomagala)?$data->registraturna_pomagala:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Stvaratelji (naziv, vrijeme djelovanja i sjedište):</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->stvaratelji)?$data->stvaratelji:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Arhivska pomagala:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->arhivska_pomagala)?$data->arhivska_pomagala:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Akvizicije (broj, godina i datum):</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->akvizicije)?$data->akvizicije:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Napomena:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->napomena)?$data->napomena:"";?>
          </td>
        </tr>
      </table>
    </div>
  </body>
</div>
<script>
window.print();
setTimeout(function () { window.close(); }, 100);
</script>
