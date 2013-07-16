<!DOCTYPE HTML>
<html>
<style>
#tablestate th {
	color:#FFFFFF;
}
</style>
<?php
$type=$_REQUEST['graph_type'] ;
?>

<?php
include('../connection.php');
$sector=$_REQUEST['sector'];
$year=$_REQUEST['year'];
$month=$_REQUEST['month'];
$result=mysql_query("SELECT * FROM stateindex_data WHERE Sector='$sector' and Year='$year' and Month='$month'",$link);
if(!$result)
{
	echo "no never";
}
while($row=mysql_fetch_array($result))
{
	$jk=$row['Jammu and Kashmir'];
}
	
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function() {
	var jk=<?php echo $jk?>;
    $('#container').highcharts({

        chart: {
            type: '<?php echo $type ?>',
            plotBorderWidth: 1,
            zoomType: 'xy'
        },

        title: {
            text: 'General State Index'
        },

        xAxis: {
            gridLineWidth: 1,
			categories: ['Jammu & Kashmir']
        },

        yAxis: {
			min: 0,
            startOnTick: false,
            endOnTick: false
        },

        series: [{
			name: 'Jammu & Kashmir',
            data: [
                [jk, jk]
            ],
            marker: {
                 fillColor: {
                     radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                     stops: [
                         [0, 'rgba(255,250,255,0.5)'],
                         [1, 'rgba(69,114,167,0.5)']
                     ]
                 }
            }
        }]

    });
});
		</script>
	</head>
	<body>
<script src="../highcharts/js/highcharts.js"></script>
<script src="../highcharts/js/highcharts-more.js"></script>

<div id="container" style="width: 600px; height: 400px; margin: 0 auto;"></div>
	
    <?php require_once('table.php') ?>
    
  <script>
  $(document).ready(function(e) {
    $('#graph_type').change(function(e) {
  var type = $(this).val();
  });
  </script>
  <input type="submit" name="submit" value="submit" style="background:#0099CC; padding:5px; margin-left:125px; border:none; margin-top:10px; color:#FFFFFF; font-size:24px; "  />
  </form>
  </body>
</html>
