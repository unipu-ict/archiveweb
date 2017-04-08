<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 26.03.2017. -->
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
          <td class="print-name" colspan="2">KNJIGA RESTAURIRANOGA I KONZERVIRANOGA ARHIVSKOGA GRADIVA</td>
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
            </br>Imatelj arhivskoga gradiva:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->imatelj)?$data->imatelj:"";?>
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
            <?php echo isset($data->signatura_fonda)?$data->signatura_fonda:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Signatura restaurirane/konzervirane jedinice/izvornika:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->signatura_izvornika)?$data->signatura_izvornika:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Vrsta i podloga restauriranog gradiva:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->vrsta_i_podloga)?$data->vrsta_i_podloga:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Količina i dimenzije gradiva:</br></br>
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
            </br>Sažeti opis oštećenja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->sazeti_opis_ostecenja)?$data->sazeti_opis_ostecenja:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Sažeti opis postupka restauriranja/konzerviranja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->sazeti_opis_postupka)?$data->sazeti_opis_postupka:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Datum preuzimanja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo date("d.m.Y.",strtotime($data->datum_preuzimanja))?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Datum restauriranja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo date("d.m.Y.",strtotime($data->datum_restauriranja))?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Datum povrata gradiva imatelju:</br></br>
          </td>
          <td class='border_right'>
            <?php echo date("d.m.Y.",strtotime($data->datum_povrata))?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Prezime i ime restauratora:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->restaurator)?$data->restaurator:"";?>
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
