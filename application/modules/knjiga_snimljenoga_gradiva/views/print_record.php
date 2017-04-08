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
          <td class="print-name" colspan="2">KNJIGA ARHIVSKOGA GRADIVA SNIMLJENOG U SIGURNOSNE I ZAŠTITNE SVRHE</td>
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
            </br>Redni broj upisa preslike:</br></br>
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
            </br>Signatura izvornika:</br></br>
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
            </br>Naziv izvornika:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->naziv_izvornika)?$data->naziv_izvornika:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Signatura preslike:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->signatura_preslike)?$data->signatura_preslike:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Cjelovitost snimanja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->cjelovitost_snimanja)?$data->cjelovitost_snimanja:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Podloga i tehnika snimanja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->podloga_snimanja)?$data->podloga_snimanja.', '.$data->tehnika_snimanja.', '.$data->format.', '.$data->oblik_filma:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Vrsta preslike:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->vrsta_preslike)?$data->vrsta_preslike.', '.$data->generacija_preslika:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Količina zapisa:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->kolicina_zapisa)?$data->kolicina_zapisa:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Podaci o odgovornosti za izradu preslike:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->odgovorna_osoba)?$data->odgovorna_osoba.', '.date("d.m.Y.",strtotime($data->datum_izrade)).', '.$data->ustanova:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Topografska oznaka preslike:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->topografska_oznaka)?$data->topografska_oznaka:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Dostupnost:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->dostupnost)?$data->dostupnost:"";?>
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
