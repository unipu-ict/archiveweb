<!-- Evidencija korištenja - statistika - 07.04.2017. -->
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Evidencija korištenja - statistika</h3>
					</div>
            <div class="box-body">
							<div class="form-group">
              <div id="chart1" class="col-md-6"></div>
							<div id="chart2"></div>
						</div>
            </div>
						<div class="box-body">
							<div class="form-group">
              <div id="chart3" class="col-md-6"></div>
							<div id="chart4"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  </div>
  <script type="text/javascript">
  FusionCharts.ready(function(){
		var chartdata1 = <?php echo $json1 ?>;
		var Chart1=new FusionCharts({
			"type": "column3d",
			"renderAt": "chart2",
      "width": "480",
      "height": "330",
      "dataFormat": "json",
      "dataSource":  {
				"chart": {
					"caption": "Ukupno korišteno arhivskih jedinica u godini",
					"captionFontColor": "#444",
					"xAxisName": "Godina",
					"yAxisName": "Broj arhivskih jedinica",
					"theme": "zune",
					"bgColor":"#f9fafc",
					"placevaluesInside":"0",
					"valuefontcolor":"#444",
					"rotatevalues":"0",
					"usePlotGradientColor":"0",
					"plotGradientColor":"#eeeeee",
					"dataLoadStartMessage":"Učitavam podatke...",
					"dataLoadStartMessage":"Nema podataka...",
					"palettecolors":"#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000"
				},
				"data": chartdata1
      }
    });
    Chart1.render();
		var chartdata2 = <?php echo $json2 ?>;
		var Chart2=new FusionCharts({
			"type": "pie3d",
			"renderAt": "chart3",
			"width": "480",
			"height": "330",
			"dataFormat": "json",
			"dataSource":  {
				"chart": {
					"caption":"Ukupno prema svrsi istraživanja",
					"captionFontColor": "#444",
	        "paletteColors":"#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
	        "showPercentValues":"0",
	        "decimals":"1",
	        "theme":"zune",
	        "bgColor":"#f9fafc",
	        "toolTipBgColor":"#444",
	        "toolTipColor":"#ffffff",
	        "toolTipBgAlpha":"80",
	        "toolTipBorderRadius":"2",
	        "toolTipPadding":"5",
	        "showHoverEffect":"1",
	        "showLegend":"1",
	        "legendItemFontSize":"10",
	        "legendItemFontColor":"#444",
	        "dataLoadStartMessage":"Učitavam podatke...",
	        "dataLoadStartMessage":"Nema podataka...",
	        "legendItemFontSize":"10"
				},
				"data": chartdata2
      }
    });
		Chart2.render();
		var chartdata3 = <?php echo $json3 ?>;
		var Chart3=new FusionCharts({
			"type": "bar3d",
			"renderAt": "chart4",
			"width": "480",
			"height": "330",
			"dataFormat": "json",
			"dataSource":  {
				"chart": {
					"caption": "Najviše korišteni fondovi/zbirke",
					"captionFontColor": "#444",
					"xAxisName": "Fond/zbirka",
					"yAxisName": "Ukupno korišteno",
					"theme": "zune",
					"bgColor":"#f9fafc",
					"placevaluesInside":"0",
					"valuefontcolor":"#444",
					"rotatevalues":"0",
					"usePlotGradientColor":"0",
					"plotGradientColor":"#eeeeee",
					"dataLoadStartMessage":"Učitavam podatke...",
					"dataLoadStartMessage":"Nema podataka...",
					"palettecolors":"#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000"
				},
				"data": chartdata3
      }
    });
		Chart3.render();
		var chartdata4 = <?php echo $json4 ?>;
		var Chart4=new FusionCharts({
			"type": "column3d",
			"renderAt": "chart1",
      "width": "480",
      "height": "330",
      "dataFormat": "json",
      "dataSource":  {
				"chart": {
					"caption": "Ukupno zahtjevnica u godini",
					"captionFontColor": "#444",
					"xAxisName": "Godina",
					"yAxisName": "Broj zahtjevnica",
					"theme": "zune",
					"bgColor":"#f9fafc",
					"placevaluesInside":"0",
					"valuefontcolor":"#444",
					"rotatevalues":"0",
					"usePlotGradientColor":"0",
					"plotGradientColor":"#eeeeee",
					"dataLoadStartMessage":"Učitavam podatke...",
					"dataLoadStartMessage":"Nema podataka...",
					"palettecolors":"#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000"
				},
				"data": chartdata4
			}
		});
		Chart4.render();
})
</script>
