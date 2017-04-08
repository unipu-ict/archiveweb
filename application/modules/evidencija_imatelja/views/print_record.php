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
          <td class="print-name" colspan="2">EVIDENCIJA IMATELJA ARHIVSKOGA GRADIVA</td>
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
            </br>Datum, klasa i urbroj isprave o unosu:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->isprava_o_unosu)?$data->isprava_o_unosu:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Datum, klasa i urbroj isprave o brisanju:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->isprava_o_brisanju)?$data->isprava_o_brisanju:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Matični broj:</br></br>
          </td>
          <td class='border_right'>
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
          </br>Sjedište:</br></br>
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
            </br>Odgovorna osoba:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->odgovorna_osoba)?$data->odgovorna_osoba:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Naziv(i)/prezime i ime stvaratelja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->naziv_stvaratelja)?$data->naziv_stvaratelja:"";?>
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
