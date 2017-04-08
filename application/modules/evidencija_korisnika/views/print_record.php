<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 27.03.2017. -->
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
          <td class="print-name" colspan="2">EVIDENCIJA KORISNIKA</td>
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
            </br>Identifikacijski broj:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->id_korisnika)?$data->id_korisnika:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Redni broj prijave:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Prezime i ime:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->prezime_i_ime)?$data->prezime_i_ime:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Adresa stalnog boravka:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->adresa_stalna)?$data->adresa_stalna:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Mjesto stalnog boravka:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->mjesto_sta)?$data->mjesto_sta:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Adresa privremenog boravka:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->adresa_privremena)?$data->adresa_privremena:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Mjesto privremenog boravka:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->mjesto_pri)?$data->mjesto_pri:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Datum rođenja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo date("d.m.Y.",strtotime($data->datum_rodenja));?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Mjesto rođenja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->mjesto_rod)?$data->mjesto_rod:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Zvanje, zanimanje i ustanova zaposlenja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->zvanje)?$data->zvanje:"";?>
          </td>
        </tr>
        <tr class="signature">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="signature">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="signature">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
          <td class="noborder">
            Vlastoručni potpis:
          </td>
        </tr>
        <tr class="signature">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td>
            U Pazinu, <?php echo date("d.m.Y.");?>
          </td>
          <td class='signature' colspan="1">
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
