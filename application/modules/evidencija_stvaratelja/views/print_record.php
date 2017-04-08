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
          <td class="print-name" colspan="2">EVIDENCIJA STVARATELJA ARHIVSKOGA GRADIVA</td>
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
            </br>Datum unosa:</br></br>
          </td>
          <td class="border_right">
            <?php echo date("d.m.Y.",strtotime($data->datum_unosa));?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Matični broj:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->maticni_broj)?$data->maticni_broj:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Naziv(i)/prezime i ime:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->naziv)?$data->naziv:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Sjedište/prebivalište:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->mjesto)?$data->mjesto:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Adresa:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->adresa)?$data->adresa:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Vrijeme djelovanja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->vrijeme_djelovanja)?$data->vrijeme_djelovanja:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Klasifikacija djelatnosti:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->klasifikacija_djelatnosti)?$data->klasifikacija_djelatnosti:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Pravni status:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->pravni_status)?$data->pravni_status:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Povijest stvaratelja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->povijest_stvaratelja)?$data->povijest_stvaratelja:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Djelatnost:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->djelatnost)?$data->djelatnost:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Organizacijski ustroj:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->organizacijski_ustroj)?$data->organizacijski_ustroj:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Kategorija:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->kategorija)?$data->kategorija:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Veze:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->veze)?$data->veze:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Naziv/prezime i ime imatelja gradiva:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->naziv_imatelja)?$data->naziv_imatelja:"";?>
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
