<STYLE>
* {
  box-sizing: border-box;
}
.datetimepicker {
  display: inline-flex;
  align-items: center;
  border-radius: 8px;
  &:focus-within {
    border-color: teal;
  }
  
  input {
    font: inherit;
    color: inherit;
    appearance: none;
    outline: none;
    border: 0;
    background-color: transparent;
    
    &[type=date] {
      width: 10rem;
      padding: .25rem 0 .25rem .5rem;
      border-right-width: 0;
    }
    
    &[type=time] {
      width: 5.5rem;
      padding: .25rem .5rem .25rem 0;
      border-left-width: 0;
    }
  }
  
  span {
    height: 1rem;
    margin-right: .25rem;
    margin-left: .25rem;
    border-right: 1px solid #ddd;
  }
}

.info {
  padding-top: .5rem;
  font-size: .8rem;
  color: rgba(255, 255, 255, .5);
}
#chart-container {
    width: 100%;
    height: auto;
}
</STYLE>

	  <br></br>
	  <br></br>
	  	<form method="post">
	  		<script type="text/javascript" src="js/jquery.min.js"></script>
			<script type="text/javascript" src="js/Chart.min.js"></script>
	  		<script   src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
			<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
			<script>
			$( document ).ready(function() {
			    $("#from-datepicker").datepicker({ 
			        format: 'yyyy-mm'
			    });
			    $("#from-datepicker").on("change", function () {
			        var fromdate = $(this).val();
			        //alert(fromdate);
			    });

			    $("#from-datepicker2").datepicker({ 
			        format: 'yyyy-mm-dd'
			    });
			    $("#from-datepicker2").on("change", function () {
			        var fromdate = $(this).val();
			       // alert(fromdate);
			    });

			     $("#from-datepicker3").datepicker({ 
			        format: 'yyyy-mm-dd'
			    });
			    $("#from-datepicker3").on("change", function () {
			        var fromdate = $(this).val();
			        //alert(fromdate);
			    });

			     $("#from-datepicker4").datepicker({ 
			        format: 'yyyy-'
			    });
			    $("#from-datepicker4").on("change", function () {
			        var fromdate = $(this).val();
			       // alert(fromdate);
			    });
			}); 

			</script>
	  		<center><H2>INVENTORY FILTERS</H2></center>
          		<table id="filter" style="font-size:12px" class="table table-striped table-hover table-responsive"  cellspacing="0">
          			<th><h3>DATE BUTTON FILTER</h3></th>
          			<th><h3>DATE OPTIONS</h3></th>
          			<tbody>
          				<tr>
          				<td><button type="submit" class="btn btn-default" id="ALLCLICK" name="ALL" >DISPLAY ALL</button></td>
          				</tr>
          				<tr>
          				<td><button type="submit" class="btn btn-default" name="C" >MONTHLY</button></td>
          				<td><div class="datetimepicker"> <input type="text" id="from-datepicker" name="M" placeholder="Month" value=""> </div></td>
          				</tr>
          				<tr>
          				<td><button type="submit" class="btn btn-default" name="CH" >WEEKLY</button></td>
          				<td><div class="datetimepicker"> <input type="text" id="from-datepicker2" name="S" placeholder="Start Date" value=""></div><div class="datetimepicker"> <input type="text" id="from-datepicker3" name="E" placeholder="Start Date" value=""> </div></td>
          				</tr>
          				<tr>
          				<td><button type="submit" class="btn btn-default" name="CL" >ANNUALLY</button></td>
          				<td><div class="datetimepicker"> <input type="text" id="from-datepicker4" name="Y" placeholder="Year" value=""> </div></td>
          				</tr>
          			</tbody>
          		</table>   


    <div id="chart-container">
    <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                    var x = [];
                    var y = [];

                    for (var i in data) {
                        x.push(data[i].inv_startdate);
                        y.push(data[i].inv_guest_to_pay);
                    }

                    var chartdata = {
                        labels: x,
                        datasets: [
                            {
                                label: 'Total Sales Chart',
                                backgroundColor: '#FFD700',
                                borderColor: '#b9f2ff',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: y
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>

		</form>
<body>
<div class="container">
		<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
			<h3 align="left">Sales Lists</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" style="font-size:12px" class="table table-striped table-hover table-responsive"  cellspacing="0">
					
				  <thead>
				  	<tr >
				  		<th align="top"  width="200">INVENTORY ID</th>	 <!-- inv_id -->
				  		<th align="top" width="300">ROOM NAME</th> <!-- inv_guest_room -->
				  		<th align="top" width="300">ROOM DESCRIPTION</th> <!-- inv_desc -->
				  		<th align="top" width="300">GUEST ID</th> <!-- User_user_id -->
				  		<th align="top"  width="300">GUEST NAME</th> <!-- inv_guestname -->
				  		<th align="top"  width="300">START DATE</th> <!-- inv_startdate -->
				  		<th align="top"  width="300">END DATE</th> <!-- inv_guest_end_date -->
				  		<th align="top"  width="300">ROOM RATE</th>	 <!-- inv_rate -->
				  		<th align="top"  width="300">TOTAL AMOUNT</th>	 <!-- inv_guest_to_pay -->
				  		<th align="top"  width="300">TOTAL PAID AMOUNT</th>	 <!-- inv_guestpaid -->
				  		<th align="top"  width="300">TOTAL BALANACE AMOUNT</th>	 <!-- inv_bal -->
				  		<!-- <th># of Rooms</th> -->
				  	</tr>	
				  </thead>
				  <tbody>

				  	<?php 
				  	if(empty($_POST)){
				  			$mydb->setQuery("SELECT * FROM tblinventory");	
						  		$cur = $mydb->loadResultList();
									foreach ($cur as $result) {
							  		echo '<tr>';
							  				echo '<td>'. $result->inv_id.'</td>';
							  				echo '<td>'. $result->inv_guest_room.'</td>';
											echo '<td>'. $result->inv_desc.'</td>';
											echo '<td>'. $result->User_user_id.'</td>';
											echo '<td>'. $result->inv_guestname.'</td>';					
											echo '<td>'. $result->inv_startdate.'</td>';
											echo '<td>'. $result->inv_guest_end_date.'</td>';
											echo '<td>'. $result->inv_rate.'</td>';
											echo '<td>'. $result->inv_guest_to_pay.'</td>';
											echo '<td>'. $result->inv_guestpaid.'</td>';
											echo '<td>'. $result->inv_bal.'</td>';
							  		echo '</tr>';
						  	} 
				  	}

				  	if(isset($_POST["ALL"])){
							$mydb->setQuery("SELECT * FROM tblinventory");	
						  		$cur = $mydb->loadResultList();
									foreach ($cur as $result) {
							  		echo '<tr>';
							  				echo '<td>'. $result->inv_id.'</td>';
							  				echo '<td>'. $result->inv_guest_room.'</td>';
											echo '<td>'. $result->inv_desc.'</td>';
											echo '<td>'. $result->User_user_id.'</td>';
											echo '<td>'. $result->inv_guestname.'</td>';					
											echo '<td>'. $result->inv_startdate.'</td>';
											echo '<td>'. $result->inv_guest_end_date.'</td>';
											echo '<td>'. $result->inv_rate.'</td>';
											echo '<td>'. $result->inv_guest_to_pay.'</td>';
											echo '<td>'. $result->inv_guestpaid.'</td>';
											echo '<td>'. $result->inv_bal.'</td>';
							  		echo '</tr>';
						  	} 
				  	}

				  	if (isset($_POST["C"])) {
								$mydb->setQuery("SELECT * FROM tblinventory WHERE inv_startdate LIKE '%".$_POST['M']."%'");	
						  		$cur = $mydb->loadResultList();
									foreach ($cur as $result) {
							  		echo '<tr>';
							  				echo '<td>'. $result->inv_id.'</td>';
							  				echo '<td>'. $result->inv_guest_room.'</td>';
											echo '<td>'. $result->inv_desc.'</td>';
											echo '<td>'. $result->User_user_id.'</td>';
											echo '<td>'. $result->inv_guestname.'</td>';					
											echo '<td>'. $result->inv_startdate.'</td>';
											echo '<td>'. $result->inv_guest_end_date.'</td>';
											echo '<td>'. $result->inv_rate.'</td>';
											echo '<td>'. $result->inv_guest_to_pay.'</td>';
											echo '<td>'. $result->inv_guestpaid.'</td>';
											echo '<td>'. $result->inv_bal.'</td>';
							  		echo '</tr>';
						  	} 
				  	}

				  	if (isset($_POST["CH"])) {
					$mydb->setQuery("SELECT * FROM tblinventory WHERE inv_startdate BETWEEN '".$_POST['S']."' and '".$_POST['E']."' ");	
						  		$cur = $mydb->loadResultList();
									foreach ($cur as $result) {
							  		echo '<tr>';
							  				echo '<td>'. $result->inv_id.'</td>';
							  				echo '<td>'. $result->inv_guest_room.'</td>';
											echo '<td>'. $result->inv_desc.'</td>';
											echo '<td>'. $result->User_user_id.'</td>';
											echo '<td>'. $result->inv_guestname.'</td>';					
											echo '<td>'. $result->inv_startdate.'</td>';
											echo '<td>'. $result->inv_guest_end_date.'</td>';
											echo '<td>'. $result->inv_rate.'</td>';
											echo '<td>'. $result->inv_guest_to_pay.'</td>';
											echo '<td>'. $result->inv_guestpaid.'</td>';
											echo '<td>'. $result->inv_bal.'</td>';
							  		echo '</tr>';
						  	} 
				  	}

				  	if (isset($_POST["CL"])) {
						  		$mydb->setQuery("SELECT * FROM tblinventory WHERE inv_startdate LIKE '".$_POST['Y']."%'");	
						  		$cur = $mydb->loadResultList();
									foreach ($cur as $result) {
							  		echo '<tr>';
							  				echo '<td>'. $result->inv_id.'</td>';
							  				echo '<td>'. $result->inv_guest_room.'</td>';
											echo '<td>'. $result->inv_desc.'</td>';
											echo '<td>'. $result->User_user_id.'</td>';
											echo '<td>'. $result->inv_guestname.'</td>';					
											echo '<td>'. $result->inv_startdate.'</td>';
											echo '<td>'. $result->inv_guest_end_date.'</td>';
											echo '<td>'. $result->inv_rate.'</td>';
											echo '<td>'. $result->inv_guest_to_pay.'</td>';
											echo '<td>'. $result->inv_guestpaid.'</td>';
											echo '<td>'. $result->inv_bal.'</td>';
							  		echo '</tr>';
						  	} 
				  	}
				  	?>
				  </tbody>

				</table>
				</form>
	  		</div><!--End of Panel Body-->
	  		 	<!-- </div> -->
	  	<!--End of Main Panel-->
</div><!--End of container-->
<div class="modal fade" id="myModal" tabindex="-1">
</div>
</body>
