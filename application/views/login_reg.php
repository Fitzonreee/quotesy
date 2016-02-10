<html>
	<?php @include 'partials/head.php' ?>
<body>
	<?php @include 'partials/nav_reg.php' ?>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<form action="/users/register" method="post">
					<h2 class="well">Register</h2>
					<?php
					  if($this->session->flashdata('errors'))
					  {
					    foreach($this->session->flashdata('errors') as $value)
					    { ?>
					      <p><?= $value ?></p>
					<?php   }
					    } ?>
					<div class="form-group">
				    <label>First Name</label>
				    <input type="text" class="form-control" placeholder="First name" name="first_name">
				  </div>
				  <div class="form-group">
				    <label>Last Name</label>
				    <input type="text" class="form-control" placeholder="Last name" name="last_name">
				  </div>
				  <div class="form-group">
				    <label>Alias</label>
				    <input type="text" class="form-control" placeholder="Alias" name="alias">
				  </div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" placeholder="Email" name="email">
					</div>
				  <div class="form-group">
				    <label>Password</label>
				    <h6 id="validation">*Password should be at least 8 characters in length</h6>
				    <input type="password" class="form-control" placeholder="Password" name="password">
				  </div>
				  <div class="form-group">
				    <label>Confirm Password</label>
				    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
				  </div>
				  <div class="form-group">
				    <label>Date of Birth</label>
				    <input type="date" class="form-control" placeholder="DD/MM/YYYY" name="dob">
				  </div>
					<input type="submit" class="btn btn-default" value="Register">
				</form>
			</div> <!-- end of col-md-5 -->
			<div class="col-md-5 col-md-offset-2">
				<h2 class="well">Login</h2>
				<?php
				  if($this->session->flashdata('login_errors'))
				  {
				    foreach($this->session->flashdata('login_errors') as $value)
				    { ?>
				      <p><?= $value ?></p>
				<?php   }
				    } ?>
				<form action="/users/login" method="post">
				  <div class="form-group">
				    <label>Email</label>
				    <input type="email" class="form-control" placeholder="Email" name="email">
				  </div>
				  <div class="form-group">
				    <label>Password</label>
				    <input type="password" class="form-control" placeholder="Password" name="password">
				  </div>
					<input type="submit" class="btn btn-default" value="Login">
				</form>
			</div> <!-- end of col-md-5 -->
		</div> <!-- end of row -->
	</div> <!-- end of container -->
</body>
</html>
