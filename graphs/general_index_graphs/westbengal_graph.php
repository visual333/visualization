<?php
$type=$_REQUEST['graph_type'] ;
?>

<?php
include('../connection.php');
$sector=$_REQUEST['sector'];
$year=$_REQUEST['year'];
$month=$_REQUEST['month'];
echo "You have chosen-Sector=";
echo $sector;
echo "year=";
echo $year;
echo "Month=";
echo $month;
$result=mysql_query("SELECT * FROM stateindex_data WHERE Sector='$sector' and Year='$year' and Month='$month'",$link);
if(!$result)
{
	echo "no never";
}
while($row=mysql_fetch_array($result))
{
	$wb=$row['West Bengal'];
}
	
?>
<head>
  <script type="text/javascript">
  window.onload = function () {
	  
  var wb=<?php echo $wb?>;   
  var chart = new CanvasJS.Chart("chartContainer", {
		
      title:{
        text: "General State Index"              
      },
      data: [//array of dataSeries              
        { //dataSeries object

         /*** Change type "column" to "bar", "area", "line" or "pie"***/
         type: '<?php echo $type ?>',
		 showInLegend: true,
		 color: "rgba(150,96,120,.6)",
        dataPoints: [
         {label: "West Bengal", y: wb }
		]
       }
       ]
     });

    chart.render();
  }
  </script>
  <script type="text/javascript" src="../canvasjs.min.js"></script>
</head>
<body>
  <div id="chartContainer" style="height: 350px; width: 400px; margin-top:350px;">  </div>
<form action="#" method="post">
<select name="sector">
 	<option selected value="Sector">Sector</option>
    <option value="Rural" >rural</option>
    <option  value="Rural+Urban" >rural+urban</option>
    <option  value="Urban" >urban</option>
</select>

<select name="year">
 	<option selected value="Year">Year</option>
    <option value="2011" >2011</option>
    <option  value="2012" >2012</option>
    <option  value="2013" >2013</option>
  </select>  
 
 <select name="month">
 <option selected value="Month" >Month</option>
    <option value="January" >January</option>
    <option  value="February" >February</option>
    <option  value="March" >March</option>
    <option  value="April" >April</option>
    <option  value="May" >May</option>
    <option  value="June" >June</option>
    <option  value="July" >July</option>
    <option  value="August" >August</option>
    <option  value="September" >September</option>
    <option  value="October" >October</option>
    <option  value="November" >November</option>
    <option  value="December" >December</option>
  </select>
  <?php echo 'Your type is '.$type. ' ' ; ?>
  <select name="graph_type" multiple="multiple" id="graph_type">
  
 <option selected value=" <?php if(!empty($type)) echo $type ; ?>"><?php if(!empty($type)) echo $type ; ?></option>
    <option value="column">column</option>
    <option value="bubble">bubble</option>
    <option value="bar">bar</option>
  </select>
  <script>
  $(document).ready(function(e) {
    $('#graph_type').change(function(e) {
  var type = $(this).val();
  });
  </script>
  <input type="submit" name="submit" value="submit" />
  </form>
</body>
</html>