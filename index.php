
<?php 

//  $json_data=include('customesinfodatabase.php');

?>
<!DOCTYPE html>

<html>
	<head>
		<!-- COMMENT ADDED -->
		<meta name="description" content="htmltags/css">
		<meta name="keywords" content="css">
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- BOOT GRID -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/jquery.bootgrid.min.css" >
   <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.bootgrid.min.js"></script>  
  <script src="js/jquery.bootgrid.fa.min.js"></script>

  <script src="js/jquery-validation-1.19.2/dist/jquery.validate.min.js"></script>
	<script src="js/jquery-validation-1.19.2/dist/additional-methods.min.js"></script>
    
    <link rel="stylesheet" href="css/style.css">

    
    <!-- HIGH CHART -->
    <script src="charts/code/highcharts.js"></script>
	<script src="charts/code/highcharts-more.js"></script>
	<script src="charts/code/modules/dumbbell.js"></script>
	<script src="charts/code/modules/lollipop.js"></script>
	<script src="charts/code/modules/exporting.js"></script>
	<script src="charts/code/modules/accessibility.js"></script>
		
	</head>
	<body>
	<form name="RegForm" id="RegForm" action="hotel.php" method="POST">
	<div class="container">
		<div class="row text-center">
			<h1>Hotel Management System</h1>
		</div>
		<div class="container form">
					<div class="row" style="margin-left:-30px">
						<div class="col input_fields" style="margin-top:24px">
						<input type="text" id ="firstname" placeholder="first name" name="firstname"> 
						</div>
						<br>
						<div class="col input_fields"style="margin-top:24px">
						<input type="text" id ="lastname" placeholder="lastname" name="lastname"> 
						</div>
					</div>
					<br>
					
					<div class="row input_fields">
					<input type="text" id ="username" placeholder="username" name="username"> 
					</div>				
					<br>
					<div class="row input_fields">
					<input type="password" id ="password" placeholder="password" name="password"> 
					</div>
					 <!-- <span id="passwordcheck"></span> --> 
					<br>
					<div class="row input_fields">	
					<input type="text" id ="cnic" placeholder="CNICNO" name="cnic">
					</div> 
					<br> 
					<div class="row input_fields">	
					<input type="email" id ="Email" placeholder="Email" name="Email">
					</div>
					<br>
					<div class="row input_fields">
					<input id ="phone" placeholder="Phone" name="phone" >
					</div> 
					<br>
					<div class="row input_fields">
					<select id ="option" name="option">
						<option value="" disabled selected hidden class ="options">Room NO</option>
						<option class ="options" value="R1">R1</option>
						<option class ="options" value="R2">R2</option>
						<option class ="options" value="R3">R3</option>
						<option class ="options" value="R4">R4</option>
					</select>
					</div>
					<br>
					<div class="row" id ="input">
					<p>Gender:</p>
						<div class="col">
						<input type="radio" class="gender" value="male" name="gender" >Male					
						<input type="radio" class="gender" value="female" name="gender" >Female
						<div>
					</div>
					<br>
					<div class="row btn">
							<button type="submit" class="btn btn-success" id="sub">Register</button>
							
					</div>
			
		</div>
	</div>
	</form>

		
	

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        A chart for showing the number of customers in each room
    </p>
</figure>
<div class="container">
	<h1>CUSTOMERS INFO </h1>
	<div class="table-responsive">
		<table id="customerstable" class="table table-striped table-hover table-bordered" >
			<thead>
				<tr>
					<th data-column-id="customer_id" data-type="numeric">CUSTOMER ID</th>
					<th data-column-id="firstname">FIRSTNAME</th>
					<th data-column-id="lastname">LASTNAME</th>
					<th data-column-id="username">USERNAME</th>
					<th data-column-id="password">PASSWORD</th>
					<th data-column-id="room_no">ROOMNO</th>
					<th data-column-id="gender">GENDER</th>
					<th data-column-id="email">EMAILID</th>
					<th data-column-id="cnic">CNICNO</th>
					<th data-column-id="phone_no">PHONE</th>
					
				</tr>
			</thead>
		</table>	
	</div>
</div>

<script type="text/javascript">
	$('#customerstable').bootgrid({
        ajax:true,
        rowSelect:true,
        post:function(){
          return{
            id:"b0df282a-0d67-40e5-8558-c9e93b7befed"
          };
        },
        url:'customersinfo.php'
        
        
    })
</script>
	
	
	
	
	
	<script src="js/script.js"></script>
	</body>
		
</html>
