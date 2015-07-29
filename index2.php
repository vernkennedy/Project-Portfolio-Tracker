<?php
//for logout
include_once 'databaseconfig.php';
if(!$user->is_loggedin())
{
	$user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>





<?php
include_once 'dbconfig.php';

// delete condition
if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
 mysql_query($sql_query);
 header("Location: $_SERVER[PHP_SELF]");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>welcome - <?php print($userRow['user_email']); ?></title>
      <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script>
         $(document).ready(function(){
	
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

})
      </script>
      <style>
        body{
			margin-top: 0px;
			overflowY:scroll;
			
		}
		.container{
			width: 100%;
			margin: 0 auto;
			line-height: 2.7;
			margin-top: 0px;
			font-family: 'Trebuchet MS', serif;
			margin-top:40px;
			
		}



		ul.tabs{
			margin: 0px;
			padding: 0px;
			list-style: none;
			border-bottom:1px solid silver;
			background:white;
		}
		ul.tabs li{
			background: none;
			color: #222;
			display: inline-block;
			padding: 10px 15px;
			cursor: pointer;
			border:0px solid silver;
			
		}

		ul.tabs li.current{
			background: #ededed;
			color: #222;
			border-bottom:6px solid silver;
		}

		.tab-content{
			display: none;
			background: ededed;
			padding: 15px;
			margin-left:0px;
			
		}

		.tab-content.current{
			display: inherit;
		
		}
		#tab-1{position:relative; height:498px; overflow-y:scroll; 
			 }
		
		button{border:1px solid silver; font-weight:bold; padding:10px; background:white; margin-left:500px; border-radius:5px; position:fixed; bottom:605px;}
		#welcome{border:0px solid silver; font-style:italic; padding:10px; background:hite; margin-left:-65px; border-radius:5px; position:fixed; bottom:595px;}
        button>a{color:black; text-decoration:none; }
      </style>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="tyle.css" type="text/css" />




 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ProjectName', 'Cost in Dollars'],         
        
         <?php
 $sql_query="SELECT * FROM users";
 $result_set=mysql_query($sql_query);
 while($row=mysql_fetch_row($result_set))
 { 
  	echo "['".$row[1]."',".$row[3]."],";    
 }									 
		  ?>  	
          
        ]);

        var options = {
          title: 'A snapshot of projects costs ($)',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
	
	<style>
	body{overflow:hidden;}
h4 a{color:black;text-decoration:none; }
a{color:black;}
h4{border:1px solid silver; border-radius:3px; padding:5px; width:140px; margin-left:-15.5px;}
piechart{width:900px; height:560px; overflowX:hidden; overflow-y:hidden; border:4px solid white; }
#graph{width:1339px; height:540px; overflowX:hidden; overflow-y:idden; border:4px solid white; position:relative; bottom:15.5px;}

h3{ackground:white; border:0px solid silver; text-align:center; top:15px;}
#budget,#status{position:relative; ottom:840px; width:200px; margin-left:0px; padding:10px;}
#status{margin-left:0px; ottom:900px;}
#header{ background:#FCFCFC; border-bottom:1px solid silver; bottom:600px; width:100%; padding:20px; margin-left:-10px; position:fixed; text-align:center;}
#header>h3{position:relative; top:10px;}
	</style>

</head>
<body>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["table"]});
      google.setOnLoadCallback(drawTable);

      function drawTable() {
	    
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'ProjectName');
        data.addColumn('number', 'Cost');
		data.addColumn('number', 'Duration');
		data.addColumn('number', '# of issues');
		data.addColumn('string', 'ProjectType');
        data.addColumn('boolean', 'Completed');
		data.addColumn('string', 'Information');
		data.addColumn('string', 'Edit');
		data.addColumn('string', 'Delete');      
   	 
		
		data.addRows([		
        
		  <?php
						 

								 // Create connection
		$myconnection = new mysqli("localhost", "root", "", "dbtuts");
		// Retrieve information from the database
		$myinformation = $myconnection->query("SELECT * FROM users");

				 // output data of each record
				 while($record = $myinformation->fetch_assoc()) {
					
					$completed=$record["completed"]; //latitude				
					$projectName=$record["projectName"];
					$cost=$record["cost"];
					$duration=$record["duration"];
					$issues=$record["issues"];
					$projectType=$record["projectType"];
					$id=$record["user_id"];
				
					print "['".$projectName."',"."{v:".$cost.",f:'$".$cost."'},"."{v:".$duration.",f:'".$duration."'},"."{v:".$issues.",f:'".$issues."'},"."'".$projectType."',".$completed.",'<a href=javascript:infor_id(".$id.")>details</a>'".",'<a href=javascript:edt_id(".$id.")>edit</a>'".",'<a href=javascript:delete_id(".$id.")>delete</a>'". "],";
				 
				 }				 
								 
		  ?>  
		  
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true,allowHtml:true});
      }
    </script>

	
	
    

	<script type="text/javascript">
	function edt_id(id)
	{
	 if(confirm('Sure to edit ?'))
	 {
	  window.location.href='edit_data.php?edit_id='+id;
	 }
	}
	function delete_id(id)
	{
	 if(confirm('Sure to Delete ?'))
	 {
	  window.location.href='index2.php?delete_id='+id;
	 }
	}
	function infor_id(id)
	{
	 
	  window.location.href='project_infor.php?infor_id='+id;
	 
	}
	</script>
	


 
 
 <div id="header" >
 <button><a href="logout.php?logout=true">Log Out</a></button>
 <span id="welcome">Hello <?php print($userRow['user_name']); ?></span><br>
 <h3>Project Portfolio Tracker</h3>
 
 </div><br>
 <div class="container">
 
 
			<ul class="tabs">
				<li class="tab-link current" data-tab="tab-1">Projects Home</li>
				<li class="tab-link" data-tab="tab-2">Reporting</li>
			</ul>

			
			
		
		

			<div id="tab-1" class="tab-content current">			  
			  <h4><a href="add_data.php"> + Add New Project</a></h4>
 <div id="table_div" style="margin-left: -15.5px; "></div>
 <div id="piechart_3d" style="width: 530px; height: 550px; position:fixed; top:168px; margin-left:779px;  "></div>
			</div>
			
				<div id="tab-2" class="tab-content">
						
				<iframe id="graph" src="http://localhost/PHP5/bargraph2.php"></iframe> <br>
				
 	
					
				
 
			</div>	
	  </div><!-- container -->
	  
 
 
</body>
</html>