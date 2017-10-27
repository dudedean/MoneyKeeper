<?php

	require('config/config.php');

	if(isset($_POST['calculate'])){
		$update_id = mysqli_real_escape_string($conn,$_POST['update_id']);
		$amount = mysqli_real_escape_string($conn,$_POST['amountToSubmit']);
		
		$query = "UPDATE userinfo SET amount='$amount' WHERE id={$update_id}";

		if(mysqli_query($conn,$query)){
			header('Location: '.ROOT.'');
		}
		else{
			echo "Update Error!";
		}
	}

	$id = mysqli_real_escape_string($conn,$_GET['id']);

	$sql = "SELECT * FROM userinfo WHERE id = '$id' ";

	$result = mysqli_query($conn,$sql);

	$info = mysqli_fetch_assoc($result);

	mysqli_free_result($result);

	mysqli_close($conn);


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Amount</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>

<section name="Navbar">

	<nav class="navbar navbar-default">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?php echo ROOT ; ?>">The Money Keeper</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="<?php echo ROOT ; ?>">Home <span class="sr-only">(current)</span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
</section>

	<div class="container">
		<h1>Edit Amount</h1>
		<a href="<?php echo ROOT ; ?>"><button class="btn btn-info pull-right">Back</button></a>
		<hr>
		<div class="well well-lg">
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form-horizontal">
	
			<div class="form-group">
		      <label for="inputName" class="col-lg-2 control-label">Name</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" id="amount" disabled="" value="<?php echo $info['name'] ; ?>">
		      </div>
		    </div>

			<div class="form-group">
		      <label for="inputAmount" class="col-lg-2 control-label">Amount</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" id="amount" value="<?php echo $info['amount'] ; ?>" disabled="">
		      </div>
		    </div>

		    <div class="form-group">
		      <label for="select" class="col-lg-2 control-label">Operation</label>
		      <div class="col-lg-6">
		        <select class="form-control" id="select">
		          <option value="1">Add</option>
		          <option value="2">Substract</option>
		        </select>
		       </div>
		    </div>

		    <div class="form-group">
		      <label for="inputAmount" class="col-lg-2 control-label">Amount You Want to Add/Minus</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" id="operation">
		      </div>
		    </div>

		    <input type="hidden" name="amountToSubmit" id="aToSubmit">
		    <input type="hidden" name="update_id" value="<?php echo $info['id'] ; ?>">


		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="reset" class="btn btn-default">Cancel</button>
		        <!-- <button type="button" onclick="calculation()" class="btn btn-primary">Calculate</button> -->
		        <button type="submit" name="calculate" onclick="calculation()" class="btn btn-primary">Submit</button>
		      </div>
		    </div>


			</form>
		</div>
	</div>
		
	<script>
		
		function calculation(){
			var amount = parseFloat(<?php echo $info['amount'] ; ?>);
			console.log(amount);
			var toOperate = parseFloat(document.getElementById("operation").value);
			console.log(toOperate);

			var total=0;

			if(document.getElementById("select").value == 1){
				total = amount + toOperate;
			}
			else{
				total = amount - toOperate;
			}

			document.getElementById("aToSubmit").value = total;

			console.log(total);
		}

	</script>

</body>
</html>