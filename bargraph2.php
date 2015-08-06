<html>
  <head>
  
 
  <style>
  #report{display:none; position:relative; margin-left:750px; bottom:450px; height:400px; overflowX:hidden;overflowY:scroll;}
  body{background:white;}
  .ui-content {
border-width : 0;
width:100%;

padding : 0em;
}
#banner{position:fixed; margin-top:-30px; color: white; padding:50px; width:100%; margin-left: 1000px; overflow:hidden; border:1px solid silver; }
button{position:relative; margin:1px; padding:3px; border:1px solid silver; background:white; bottom:30px;}
button:hover{background:#ededed; }
#filter{background:ededed; color:black; border:1px solid white; text-decoration:underline; font-weight:bold; bottom:30px; margin-left:-1.5px;}
h1{background:#ededed; width:70%;}
  </style>
  
  <div id="banner"><button id="filter">Filter Project Reports</button><br>
  <button onclick="home()">AllProjects</button>
  <button onclick="highcost()">HighestCostProject</button> <br>
  <button onclick="lowcost()">LowestCost </button>
   <button onclick="highDuration()">HighestDuration</button><br>
    <button onclick="lowDuration()">LowestDuration</button>
  <button onclick="highIssues()">HighestNumberofIssues</button><br>
  <button onclick="LowestNumberofIssues()">LowestNumberofIssues</button>
   <button onclick="Completed()">Completed</button><br>
   <button onclick="InComplete()">InComplete</button>
    <button onclick="Current()">Current</button>
	 <button onclick="Past()">Past</button>
   
  </div>
  
  
  <h1>Report on all projects</h1>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Project Name', 'Number of Issues', 'Duration (Days)'],
            <?php
					// Create connection
		$myconnection = new mysqli("localhost", "root", "", "dbtuts");
		// Retrieve information from the database
		$myinformation = $myconnection->query("SELECT * FROM users ORDER BY projectName ASC");

				 // output data of each record
				 while($record = $myinformation->fetch_assoc()) {
				 
				 $completed=$record["completed"]; //latitude				
					$projectName=$record["projectName"];
					$cost=$record["cost"];
					$duration=$record["duration"];
					$issues=$record["issues"];
					$projectType=$record["projectType"];
					$id=$record["user_id"];
					
					
					print "['".$projectName."',".$issues.",".$duration."],";
					
				
				 }				
		  ?> 	
        ]);

        var options = {
          chart: {
            //title: 'Company Performance',
            //subtitle: 'Project Issues, and Duration of projects',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 850px; height: 540px; "></div>
	
	<div id="report">
	<h1>Report</h1>
	  <?php
			
include("dbconfig.php"); 


/* COST*/
	//Max cost
	$result = mysql_query("SELECT MAX(cost) FROM users");  
	while($row=mysql_fetch_array($result))  
	{   
	$maxCost= $row['MAX(cost)'];
	
	}

	$result = mysql_query("SELECT projectName FROM users where cost=$maxCost");  
	while($row=mysql_fetch_array($result))  
	{   
	$maxCostName= $row['projectName'];
	//echo "The most expensive project is ".$maxCostName."and it costs: $".$maxCost."<br>";
	
	}  

	//Min cost
	$result = mysql_query("SELECT MIN(cost) FROM users");  
	while($row=mysql_fetch_array($result))  
	{   
	$minCost= $row['MIN(cost)'];
	}


	$result = mysql_query("SELECT projectName FROM users where cost=$minCost");  
	while($row=mysql_fetch_array($result))  
	{   
	$minCostName= $row['projectName'];
	//echo "The least project is ".$minCostName."and it costs: $".$minCost."<br>";
	}

/* DURATION*/
	//Max duration
	$result = mysql_query("SELECT MAX(duration) FROM users");  
	while($row=mysql_fetch_array($result))  
	{   
	$maxDuration= $row['MAX(duration)'];
	}

	$result = mysql_query("SELECT projectName FROM users where duration=$maxDuration");  
	while($row=mysql_fetch_array($result))  
	{   
	$maxDurationName= $row['projectName'];
	//echo "The project that took the longest is ".$maxDurationName." and it took ".$maxDuration." days<br>";
	}  

	//Min duration
	$result = mysql_query("SELECT MIN(duration) FROM users");  
	while($row=mysql_fetch_array($result))  
	{   
	$minDuration= $row['MIN(duration)'];
	
	}


	$result = mysql_query("SELECT projectName FROM users where duration=$minDuration");  
	while($row=mysql_fetch_array($result))  
	{   
	$minDurationName= $row['projectName'];
		
	//echo "The project that took the shortest time is ".$minDurationName." and it took ".$minDuration." days<br>";
	}


/* Issues*/
	//Max issues
	$result = mysql_query("SELECT MAX(issues) FROM users");  
	while($row=mysql_fetch_array($result))  
	{   
	$maxIssues= $row['MAX(issues)'];
	}

	$result = mysql_query("SELECT projectName FROM users where issues=$maxIssues");  
	while($row=mysql_fetch_array($result))  
	{   
	$maxIssuesName= $row['projectName'];
	//echo "The project with the most number of issues is ".$maxIssuesName." and it has ".$maxIssues." issue(s)<br>";
	}  

	//Min issues
	$result = mysql_query("SELECT MIN(issues) FROM users");  
	while($row=mysql_fetch_array($result))  
	{   
	$minIssues= $row['MIN(issues)'];
	}


	$result = mysql_query("SELECT projectName FROM users where issues=$minIssues");  
	while($row=mysql_fetch_array($result))  
	{   
	$minIssuesName= $row['projectName'];
	//echo "The project with the least number of issues is ".$minIssuesName." and it has ".$minIssues." issue(s)<br>";
	}

	/*Complete*/	
	$result = mysql_query("SELECT projectName FROM users where completed='true'");  
	print "The projects that are complete are :";
	while($row=mysql_fetch_array($result))  
	{   
	$completeName= $row['projectName'];	
	//echo "<ul><li>".$completeName."</li></ul>"; 
	}
	
	/*InComplete*/	
	$result = mysql_query("SELECT projectName FROM users where completed='false'");  
	print "The project that are incomplete are :";
	while($row=mysql_fetch_array($result))  
	{   
	$incompleteName= $row['projectName'];	
	//echo "<ul><li>".$incompleteName."</li></ul>"; 
	}	

		/*Current*/	
	$result = mysql_query("SELECT projectName FROM users where projectType='Current'");  
	print "The current projects are :";
	while($row=mysql_fetch_array($result))  
	{   
	$currentName= $row['projectName'];	
	//echo "<ul><li>".$currentName."</li></ul>"; 
	}	
	
		/*Past*/	
	$result = mysql_query("SELECT projectName FROM users where projectType='Past'");  
	print "The past projects are :";
	while($row=mysql_fetch_array($result))  
	{   
	$pastName= $row['projectName'];	
	//echo "<ul><li>".$pastName."</li></ul>"; 
	}	


	



		  ?> 	
	</div>


<!---------------MAX COST------------------------------------------------------------------>
	<script type="text/javascript">
		//MAX COST GRAPH
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Project Name', 'Number of Issues', 'Duration (Days)'],
				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where cost=$maxCost ORDER BY projectName ASC");

					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					 $completed=$record["completed"]; //latitude				
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
						
						
						print "['".$projectName."',".$issues.",".$duration."],";
						
					
					 }				
			  ?> 	
			]);

			var options = {
			  chart: {
				//title: 'Company Performance',
				//subtitle: 'Project Issues, and Duration of projects',
			  },
			  bars: 'vertical' // Required for Material Bar Charts.
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material2'));

			chart.draw(data, options);
		  }
    </script>
	
	 
			 <h1>Report on highest cost project</h1>
			 <?PHP
			 //Max cost
			$result = mysql_query("SELECT MAX(cost) FROM users ORDER BY projectName ASC");  
			while($row=mysql_fetch_array($result))  
			{   
			$maxCost= $row['MAX(cost)'];
			
			}

			$result = mysql_query("SELECT projectName FROM users where cost=$maxCost ORDER BY projectName ASC");  
			echo "<b>Summary : </b><br>";
			while($row=mysql_fetch_array($result))  
			{   
			$maxCostName= $row['projectName'];
			echo "The most expensive project is ".$maxCostName." and it costs: $".$maxCost."<br>";
			
			}  
			 ?>	
	 
</div>
<div id="barchart_material2" style="width: 850px; height: 540px;"></div>


<!---------------MIN COST------------------------------------------------------------------>
	<script type="text/javascript">
		//MAX COST GRAPH
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Project Name', 'Number of Issues', 'Duration (Days)'],
				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where cost=$minCost ORDER BY projectName ASC");

					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					 $completed=$record["completed"]; //latitude				
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
						
						
						print "['".$projectName."',".$issues.",".$duration."],";
						
					
					 }				
			  ?> 	
			]);

			var options = {
			  chart: {
				//title: 'Company Performance',
				//subtitle: 'Project Issues, and Duration of projects',
			  },
			  bars: 'vertical' // Required for Material Bar Charts.
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material3'));

			chart.draw(data, options);
		  }
    </script>
	
	 <div>
			 <h1>Report on lowest cost project</h1>
			 <?PHP
			 //Max cost
			$result = mysql_query("SELECT MIN(cost) FROM users ORDER BY projectName ASC");  
			while($row=mysql_fetch_array($result))  
			{   
			$minCost= $row['MIN(cost)'];
			
			}

			$result = mysql_query("SELECT projectName FROM users where cost=$minCost ORDER BY projectName ASC");  
			echo "<b>Summary  </b><br>";
			while($row=mysql_fetch_array($result))  
			{   
			$minCostName= $row['projectName'];
			echo "The least expensive project is ".$minCostName." and it costs: $".$minCost."<br>";
			
			}  
			 ?>
	 </div>
	 <div id="barchart_material3" style="width: 850px; height: 540px;"></div>
	
<!---------------MAX DURATION------------------------------------------------------------------>
	<script type="text/javascript">
		//MAX DURATION GRAPH
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Project Name', 'Number of Issues', 'Duration (Days)'],
				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where duration=$maxDuration ORDER BY projectName ASC");

					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					 $completed=$record["completed"]; //latitude				
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
						
						
						print "['".$projectName."',".$issues.",".$duration."],";
						
					
					 }				
			  ?> 	
			]);

			var options = {
			  chart: {
				//title: 'Company Performance',
				//subtitle: 'Project Issues, and Duration of projects',
			  },
			  bars: 'vertical' // Required for Material Bar Charts.
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material4'));

			chart.draw(data, options);
		  }
    </script>
	
	 <div>
			 <h1>Report on highest duration project</h1>
			 <?PHP
			 //Max cost
			$result = mysql_query("SELECT MAX(duration) FROM users ORDER BY projectName ASC");  
			while($row=mysql_fetch_array($result))  
			{   
			$maxDuration= $row['MAX(duration)'];
			
			}

			$result = mysql_query("SELECT projectName FROM users where duration=$maxDuration ORDER BY projectName ASC");  
			echo "<b>Summary : </b><br>";
			while($row=mysql_fetch_array($result))  
			{   
			$maxDurationName= $row['projectName'];
			echo "The longest duration project is ".$maxDurationName." and it took ".$maxDuration." days<br>";
			
			}  
			 ?>
	 </div>
	 <div id="barchart_material4" style="width: 850px; height: 540px;"></div>


<!---------------MIN DURATION------------------------------------------------------------------>
	<script type="text/javascript">
		//MIN DURATION GRAPH
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Project Name', 'Number of Issues', 'Duration (Days)'],
				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where duration=$minDuration ORDER BY projectName ASC");

					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					 $completed=$record["completed"]; //latitude				
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
						
						
						print "['".$projectName."',".$issues.",".$duration."],";
						
					
					 }				
			  ?> 	
			]);

			var options = {
			  chart: {
				//title: 'Company Performance',
				//subtitle: 'Project Issues, and Duration of projects',
			  },
			  bars: 'vertical' // Required for Material Bar Charts.
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material5'));

			chart.draw(data, options);
		  }
    </script>
	
	 <div>
			 <h1>Report on lowest duration project(s)</h1>
			 <?PHP
			 //min duration
			$result = mysql_query("SELECT MIN(duration) FROM users ORDER BY projectName ASC");  
			while($row=mysql_fetch_array($result))  
			{   
			$minDuration= $row['MIN(duration)'];
			
			}

			$result = mysql_query("SELECT projectName FROM users where duration=$minDuration ORDER BY projectName ASC");  
			echo "<b>Summary  </b><br>";
			while($row=mysql_fetch_array($result))  
			{   
			$minDurationName= $row['projectName'];
			echo "The least duration project(s) is/are ".$minDurationName." and it/they took ".$minDuration." days<br>";
			
			}  
			 ?>
	 </div>
	 <div id="barchart_material5" style="width: 850px; height: 540px;"></div>
	 
<!---------------MAX ISSUES------------------------------------------------------------------>
	<script type="text/javascript">
		//MAX ISSUES GRAPH
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Project Name', 'Number of Issues', 'Duration (Days)'],
				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where issues=$maxIssues ORDER BY projectName ASC");

					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					 $completed=$record["completed"]; //latitude				
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
						
						
						print "['".$projectName."',".$issues.",".$duration."],";
						
					
					 }				
			  ?> 	
			]);

			var options = {
			  chart: {
				//title: 'Company Performance',
				//subtitle: 'Project Issues, and Duration of projects',
			  },
			  bars: 'vertical' // Required for Material Bar Charts.
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material6'));

			chart.draw(data, options);
		  }
    </script>
	
	 <div>
			 <h1>Report on highest issues project</h1>
			 <?PHP
			 //Max issues
			$result = mysql_query("SELECT MAX(issues) FROM users ORDER BY projectName ASC");  
			while($row=mysql_fetch_array($result))  
			{   
			$maxIssues= $row['MAX(issues)'];
			
			}

			$result = mysql_query("SELECT projectName FROM users where issues=$maxIssues ORDER BY projectName ASC");  
			echo "<b>Summary : </b><br>";
			while($row=mysql_fetch_array($result))  
			{   
			$maxIssuesName= $row['projectName'];
			echo "The most issues project is ".$maxIssuesName." and it has ".$maxIssues." issue(s)<br>";
			
			}  
			 ?>
	 </div>
	 <div id="barchart_material6" style="width: 850px; height: 540px;"></div>


<!---------------MIN ISSUES------------------------------------------------------------------>
	<script type="text/javascript">
		//MIN ISSUES GRAPH
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Project Name', 'Number of Issues', 'Duration (Days)'],
				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where issues=$minIssues ORDER BY projectName ASC");

					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					 $completed=$record["completed"]; //latitude				
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
						
						
						print "['".$projectName."',".$issues.",".$duration."],";
						
					
					 }				
			  ?> 	
			]);

			var options = {
			  chart: {
				//title: 'Company Performance',
				//subtitle: 'Project Issues, and Duration of projects',
			  },
			  bars: 'vertical' // Required for Material Bar Charts.
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material7'));

			chart.draw(data, options);
		  }
    </script>
	
	 <div>
			 <h1>Report on lowest issues project(s)</h1>
			 <?PHP
			 //min duration
			$result = mysql_query("SELECT MIN(issues) FROM users ORDER BY projectName ASC");  
			while($row=mysql_fetch_array($result))  
			{   
			$minIssues= $row['MIN(issues)'];
			
			}

			$result = mysql_query("SELECT projectName FROM users where issues=$minIssues ORDER BY projectName ASC");  
			echo "<b>Summary  </b><br>";
			while($row=mysql_fetch_array($result))  
			{   
			$minIssuesName= $row['projectName'];
			echo "The least issues project(s) is/are ".$minIssuesName." and it/they has ".$minIssues." issue(s)<br>";
			
			}  
			 ?>
	 </div>
	 <div id="barchart_material7" style="width: 850px; height: 540px;"></div>
	 
	 <!---------------COMPLETE------------------------------------------------------------------>
	<script type="text/javascript">
		//COMPLETE GRAPH
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Project Name', 'Number of Issues', 'Duration (Days)'],
				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where completed='true' ORDER BY projectName ASC");

					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					 $completed=$record["completed"]; //latitude				
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
						
						
						print "['".$projectName."',".$issues.",".$duration."],";
						
					
					 }				
			  ?> 	
			]);

			var options = {
			  chart: {
				//title: 'Company Performance',
				//subtitle: 'Project Issues, and Duration of projects',
			  },
			  bars: 'vertical' // Required for Material Bar Charts.
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material8'));

			chart.draw(data, options);
		  }
    </script>
	
	 <div>
			 <h1>Report on completed projects</h1>
			 <?PHP
			 //completed
			

			$result = mysql_query("SELECT projectName FROM users where completed='true' ORDER BY projectName ASC");  
			echo "<b>Summary : </b><br>The completed projects are ";
			while($row=mysql_fetch_array($result))  
			{   
			$completedName= $row['projectName'];
			echo "<ul><li>".$completedName."</li></ul>";
			
			}  
			 ?>
	 </div>
	 <div id="barchart_material8" style="width: 850px; height: 540px;"></div>

	 <!---------------INCOMPLETE------------------------------------------------------------------>
	<script type="text/javascript">
		//INCOMPLETE GRAPH
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Project Name', 'Number of Issues', 'Duration (Days)'],
				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where completed='false' ORDER BY projectName ASC");

					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					 $completed=$record["completed"]; //latitude				
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
						
						
						print "['".$projectName."',".$issues.",".$duration."],";
						
					
					 }				
			  ?> 	
			]);

			var options = {
			  chart: {
				//title: 'Company Performance',
				//subtitle: 'Project Issues, and Duration of projects',
			  },
			  bars: 'vertical' // Required for Material Bar Charts.
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material9'));

			chart.draw(data, options);
		  }
    </script>
	
	 <div>
			 <h1>Report on incompleted projects</h1>
			 <?PHP
			 //completed
			

			$result = mysql_query("SELECT projectName FROM users where completed='false' ORDER BY projectName ASC");  
			echo "<b>Summary : </b><br>The incompleted project(s) ";
			while($row=mysql_fetch_array($result))  
			{   
			$incompletedName= $row['projectName'];
			echo "<ul><li>".$incompletedName."</li></ul>";
			
			}  
			 ?>
	 </div>
	 <div id="barchart_material9" style="width: 850px; height: 540px;"></div>
	 
<!---------------CURRENT PROJECTS------------------------------------------------------------------>
	<script type="text/javascript">
		//INCOMPLETE GRAPH
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Project Name', 'Number of Issues', 'Duration (Days)'],
				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where projectType='Current' ORDER BY projectName ASC");

					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					 $completed=$record["completed"]; //latitude				
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
						
						
						print "['".$projectName."',".$issues.",".$duration."],";
						
					
					 }				
			  ?> 	
			]);

			var options = {
			  chart: {
				//title: 'Company Performance',
				//subtitle: 'Project Issues, and Duration of projects',
			  },
			  bars: 'vertical' // Required for Material Bar Charts.
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material10'));

			chart.draw(data, options);
		  }
    </script>
	
	 <div>
			 <h1>Report on Current projects</h1>
			 <?PHP
			 //completed
			

			$result = mysql_query("SELECT projectName FROM users where projectType='Current' ORDER BY projectName ASC");  
			echo "<b>Summary : </b><br>The current project(s) ";
			while($row=mysql_fetch_array($result))  
			{   
			$currentProjectName= $row['projectName'];
			echo "<ul><li>".$currentProjectName."</li></ul>";
			
			}  
			 ?>
	 </div>
	 <div id="barchart_material10" style="width: 850px; height: 540px;"></div>
	 
<!---------------PAST PROJECTS------------------------------------------------------------------>
	<script type="text/javascript">
		//INCOMPLETE GRAPH
		  google.load("visualization", "1.1", {packages:["bar"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
			  ['Project Name', 'Number of Issues', 'Duration (Days)'],
				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where projectType='Past' ORDER BY projectName ASC");

					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					 $completed=$record["completed"]; //latitude				
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
						
						
						print "['".$projectName."',".$issues.",".$duration."],";
						
					
					 }				
			  ?> 	
			]);

			var options = {
			  chart: {
				//title: 'Company Performance',
				//subtitle: 'Project Issues, and Duration of projects',
			  },
			  bars: 'vertical' // Required for Material Bar Charts.
			};

			var chart = new google.charts.Bar(document.getElementById('barchart_material11'));

			chart.draw(data, options);
		  }
    </script>
	
	 <div>
			 <h1>Report on Past projects</h1>
			 <?PHP
			 //completed
			

			$result = mysql_query("SELECT projectName FROM users where projectType='Past' ORDER BY projectName ASC");  
			echo "<b>Summary : </b><br>The past project(s) ";
			while($row=mysql_fetch_array($result))  
			{   
			$pastProjectName= $row['projectName'];
			echo "<ul><li>".$pastProjectName."</li></ul>";
			
			}  
			 ?>
	 </div>
	 <div id="barchart_material11" style="width: 850px; height: 540px;"></div>
	 <br><br><br>
	

	  
	
<!---------------Average cost------------------------------------------------------------------>

				<?php
						// Create connection
			$myconnection = new mysqli("localhost", "root", "", "dbtuts");
			// Retrieve information from the database
			$myinformation = $myconnection->query("SELECT * FROM users where cost<(SELECT AVG(cost) FROM users)");
			

			
					 // output data of each record
					 while($record = $myinformation->fetch_assoc()) {
					 
					    
						$projectName=$record["projectName"];
						$cost=$record["cost"];
						$duration=$record["duration"];
						$issues=$record["issues"];
						$projectType=$record["projectType"];
						$id=$record["user_id"];
			            echo "<ul><li>".$projectName." & ".$cost."</li></ul>";
						
											
					 }	

					  
			  ?> 	


	<script>
function home() {
    window.scrollTo(0, 0);
}
function lowcost() {
    window.scrollTo(0, 1280);
}
	
function highcost() {
    window.scrollTo(0, 610);
}


function highDuration() {
    window.scrollTo(0, 1930);
}
function lowDuration() {
    window.scrollTo(0, 2600);
}
function highIssues() {
    window.scrollTo(0, 3270);
}

function LowestNumberofIssues() {
    window.scrollTo(0, 3880);
}

function Completed() {
    window.scrollTo(0, 4580);
}

function InComplete() {
    window.scrollTo(0, 5390);
}

function Current() {
    window.scrollTo(0, 6150);
}

function Past() {
    window.scrollTo(0, 6970);
}

</script>
  </body>
</html>