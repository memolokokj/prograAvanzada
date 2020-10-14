<?php 
	include "controllers/UserController.php";

	$userController = new UserController();

	$users = $userController->get();

	//echo json_encode($users);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<style type="text/css">
		.carousel-inner > img {
		  width:240px;
		  height:260px;
		}
	</style>
</head>
<body>

	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">
		  	Guacamoleishon
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">
		        	Dashboard 
		        	<span class="sm-only">(current)</span>
		        </a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">
		        	Users
		        </a>
		      </li> 
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
		      	Search
		      </button>
		    </form>
		  </div>
		</nav>
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">Home</li>
		  </ol>
		</nav>

		<?php if(isset($_SESSION["massage"])): ?>
			<div class="alert alert-danger" role="alert">
				a simple danger alert-chech it out
			</div>
		<?php endif ?>

		<div class="row mt-5 ">
			
			<div class="col"> 
			
				<div class="card">
				  <div class="card-header">
				    
				    Tabla de usuarios registrados
				    <button onclick="add()" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
				    	Add User
				    </button>
				  </div>
				  <div class="card-body"> 
				  	<table class="table table-bordered table-striped">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Name</th>
					      <th scope="col">LastName</th>
					      <th scope="col">Email</th>
					      <th scope="col">Status</th>
					      <th scope="col">Options</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($users as $user): ?>
						    <tr>
						      <th scope="row"> <?= $user["idUser"]?> </th>
						      <td> <?= $user["name"]?> </td>
						      <td> <?= $user["lastName"]?> </td>
						      <td> <?= $user["email"]?> </td>
						      <td>
						      	<?php if ($user["stat"]): ?>
						      		<span class="badge badge-success">On</span>
						      	<?php else: ?>
						      		<span class="badge badge-warning">Down</span>
						      	<?php endif ?>
						      	
						      </td>
						      <td>
						      	<div class="btn-group" role="group">
								    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								      Action
								    </button>
								    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
								      <a class="dropdown-item" href="#" data-info='<?= json_encode($user) ?>' onclick="edit(this)" data-toggle="modal" data-target="#exampleModal">Update</a>
								      <a class="dropdown-item" href="#" onclick="sure(<?= $user["idUser"]?>)">Delete</a>
								    </div>
								</div>
						      </td>
						    </tr>
					    <?php endforeach ?>
					  </tbody>
					</table> 
				  </div>
				</div>
			</div>
		</div>
		
		<section id="footer">
			<div class="container">
				<div class="row text-center text-xs-center text-sm-left text-md-left">
					<div class="col-xs-12 col-sm-4 col-md-4">
						<h5>Quick links</h5>
						<ul class="list-unstyled quick-links">
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Videos</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<h5>Quick links</h5>
						<ul class="list-unstyled quick-links">
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Videos</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<h5>Quick links</h5>
						<ul class="list-unstyled quick-links">
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
							<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
							<li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
						<ul class="list-unstyled list-inline social text-center">
							<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
							<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
						</ul>
					</div>
					<hr>
				</div>	
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
						<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
						<p class="h6">All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
					</div>
					<hr>
				</div>	
			</div>
		</section>
		<!-- ./Footer -->
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Register User</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="user" method="POST" onsubmit="return validateForm()">
	        	<div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Last Name</label>
			    <input type="text" class="form-control" name="lastName" id="lastName"  placeholder="Enter last name" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="text" class="form-control" name="email" id="email"  placeholder="Enter email" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password Confirm</label>
			    <input type="password" class="form-control" id="passConfirm" placeholder="Password" required>
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			  <input type="hidden" id="action" name="action" value="store">
			  <input type="hidden" id="user_id" name="id">
			  <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

	<script type="text/javascript">
		function add()
		{
			$("#exampleModalLabel").text("Add user");
			$("#action").val("store");
		}

		function edit(target)
		{
			$("#exampleModalLabel").text("Edit update");
			var info = $(target).data("info");
			
			$("#user_id").val(info.idUser);
			$("#name").val(info.name);
			$("#lastName").val(info.lastName);
			$("#email").val(info.email);
			$("#pass").val(info.pass);
			$("#passConfirm").val(info.pass);

			$("#action").val("update");
		}

		function validateForm()
		{
			if($("#pass").val() == $("#passConfirm").val())
			{
				return true;
			}
			else
			{
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: "Passwords doesnt match"
				})
				return false;
			}
		}

		function sure(id)
		{
			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    swal("waiting! Your imaginary file has been deleted!", {
			      icon: "success",
			    });

			    $.ajax({
			    	url: "user",
			    	data: {id: id, action: "remove", token: <?= $_SESSION['token']?>},
			    	type: "POST",
			    	dataType: "json",
			    	success : function(json){
			    		if(json.status == "success")
			    		{
			    			swal(json.messege, {
			    				icon: "success",
			    			});
			    			setTimeout(location.reload(), 1000);
			    		}
			    		else
			    		{
			    			alert(json.messege);
			    		}
			    	},
			    	error : function(xhr, status){
			    		console.log(status);
			    	}
			    });
			  }
			})
		}

	</script>
</body>
</html>