<h2>Website Title</h2>

<hr />


<h2>Site Stats - Last 15 Days</h2>

<?php

function secondMinute($seconds) {
  	$minResult = floor($seconds/60);
  	if($minResult < 10){$minResult = 0 . $minResult;}
  	$secResult = ($seconds/60 - $minResult)*60;
  	if($secResult < 10){$secResult = 0 . round($secResult);}
  	else { $secResult = round($secResult); }
  	return $minResult.":".$secResult;
}

?>


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
          echo '["'.date('M j',strtotime($result->getDate())).'", '.$result->getPageviews().'],';
      }
      ?>
    ]);

    var chart = new google.visualization.AreaChart(document.getElementById('chart'));
    chart.draw(data, {width: 630, height: 180, title: '<?php echo date('M j, Y',strtotime('-30 day')).' - '.date('M j, Y'); ?>',
                      colors:['#058dc7','#e6f4fa'],
                      areaOpacity: 0.1,
                      hAxis: {textPosition: 'in', showTextEvery: 5, slantedText: false, textStyle: { color: '#058dc7', fontSize: 10 } },
                      pointSize: 5,
                      legend: 'none',
                      chartArea:{left:0,top:30,width:"100%",height:"100%"}
    });
  }
</script>

<div id="chart"></div>

<table width="100%" cellpadding="5">
	<tr style="text-align: center;"><th>Date</th><th>Visits</th><th>New Visits</th><th>Percent New Vists</th><th>Pageviews</th><th>Avg Time on Site</th></tr>
	<?php foreach($this->data['analytics'] as $results) : ?>
		<tr style="text-align: center;">
			<td><?php echo date('M j',strtotime($results->getDate())); ?></td>
			<td><?php echo $results->getVisits(); ?></td>
			<td><?php echo $results->getNewVisits(); ?></td>
			<td><?php echo round($results->getPercentNewVisits(), 2); ?>%</td>
			<td><?php echo $results->getPageviews(); ?></td>
			<td><?php echo secondMinute($results->getAvgTimeOnSite()); ?></td>
		</tr>
	<?php endforeach; ?>
</table>
