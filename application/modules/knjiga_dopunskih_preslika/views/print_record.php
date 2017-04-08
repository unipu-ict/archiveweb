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
          <td class="print-name" colspan="2">KNJIGA ARHIVSKOGA GRADIVA SNIMLJENOG U DOPUNSKE SVRHE</td>
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
            </br>Redni broj upisa:</br></br>
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
            </br>Država, mjesto i ustanova čije je gradivo preslikano:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->drzava)?$data->drzava:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Signatura i naziv fonda/zbirke:</br></br>
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
          </br>Signatura i sadržaj preslikane arhivske jedinice/izvornika:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->signatura_izvornika)?$data->signatura_izvornika.' '.$data->sadrzaj_preslike:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Vremenski raspon gradiva:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->vremenski_raspon_gradiva)?$data->vremenski_raspon_gradiva:"";?>
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
          </br>Podaci o nabavi:</br></br>
          </td>
          <td class='border_right'>
            <?php echo $data->podaci_o_nabavi.', '.date("d.m.Y.",strtotime($data->datum_narudzbe));?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Oznaka smještaja/topografska oznaka preslike:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->oznaka_smjestaja)?$data->oznaka_smjestaja:"";?>
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
