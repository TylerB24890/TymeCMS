<h2>Store Manager - Dashboard</h2>

<?php

function second_to_minute($seconds) {
  	$minResult = floor($seconds/60);
  	if($minResult < 10){$minResult = 0 . $minResult;}
  	$secResult = ($seconds/60 - $minResult)*60;
  	if($secResult < 10){$secResult = 0 . round($secResult);}
  	else { $secResult = round($secResult); }
  	return $minResult.":".$secResult;
}

?>

<div class='row'>
	<div class='navbar'>
		<ul class='nav nav-pills'>
			<li class='active'><a href='<?php echo site_url() . 'admin/store'; ?>'>Store Home</a></li>
			<li class='dropdown'>
				<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Products<b style='position: relative; bottom:2px;' class='caret'></b></a>
				<ul class='dropdown-menu'>
					<li><a href='<?php echo site_url() . 'admin/store/addProduct'; ?>'>Add Products</a></li>
					<li><a href='<?php echo site_url() . 'admin/store/editProduct'; ?>'>Edit Products</a></li>
				</ul>
			</li>
			<li><a href='<?php echo site_url() . 'admin/store/viewOrders'; ?>'>View Orders</a></li>
			<li><a href='<?php echo site_url() . 'admin/store/viewQuoteRequests'; ?>'>Quote Requests</a></li>
		</ul>
	</div>
</div>

<hr />

<div class='row'>
	<strong>Store Analytics</strong>
	
	<!-- Create a new chart and plot the pageviews for each day -->
	<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = new google.visualization.DataTable();

		data.addColumn('string', 'Day');
		data.addColumn('number', 'Pageviews');


		data.addRows([
		  <?php
		  foreach($this->data['analytics'] as $result) {
			  echo '["' . date('M j',strtotime($result->getDate())) . '", ' . $result->getPageviews() . '],';
		  }
		  ?>
		]);

		var chart = new google.visualization.AreaChart(document.getElementById('chart'));
		chart.draw(data, {width: 620, height: 180, title: '<?php echo date('M j, Y',strtotime('-15 day')).' - '.date('M j, Y'); ?>',
						  colors:['#058dc7','#e6f4fa'],
						  areaOpacity: 0.1,
						  hAxis: {textPosition: 'in', showTextEvery: 5, slantedText: false, textStyle: { color: '#058dc7', fontSize: 10 } },
						  pointSize: 5,
						  legend: 'none',
						  chartArea:{left:0,top:30,width:"100%",height:"100%"}
		});
	  }
	</script>

	<div class="well">
		<div id="chart"></div>
	</div>


	<table class="analytic-table" width="100%" cellpadding="5">
		<tr style="text-align: center;"><th>Date</th><th>Page</th><th>Page Views</th><th>Avg Time on Page</th></tr>
		<?php foreach($this->data['analytics'] as $results) : ?>
			<tr style="text-align: center;">
				<td><?php echo date('M j',strtotime($results->getDate())); ?></td>
				<td><?php echo "<a href=" . $results->getPagePath() . ">" . $results->getPagePath(); ?></a></td>
				<td><?php echo $results->getPageViews(); ?></td>
				<td><?php echo second_to_minute($results->getAvgTimeOnPage()); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	
</div>


