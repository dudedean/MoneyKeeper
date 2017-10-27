<?php

	require('config/config.php');

	$sql = "SELECT * FROM userinfo ORDER BY name ASC ";

	$result = mysqli_query($conn,$sql);

	$info = mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Money Keeper for Trip Sem 5</title>
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
	        <li class="active"><a href="<?php echo ROOT ; ?>">Home <span class="sr-only">(current)</span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
</section>

<section name="Content">
	
	<div class="container">
		<h1>Status</h1>
		<table class="table table-striped table-hover ">
			<thead>
			    <tr>
			      <th>No</th>
			      <th>Name</th>
			      <th>Amount(RM)</th>
			      <th>Action</th>
			    </tr>
		  	</thead>
			  <tbody>
			  	<?php foreach($info as $i) : ?>
			    <tr>
			    	<td><?php echo $i['id'] ; ?></td>
			    	<td><?php echo $i['name'] ; ?></td>
			    	<td><?php echo $i['amount'] ; ?></td>
			    	<td><a href="edit.php?id=<?php echo $i['id'] ; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>	</a></td>
			    </tr>	
			    <?php endforeach ; ?>
			  </tbody>
		</table>

	</div>

</section>
	
</body>
</html>