
<div class="navbar navbar-inverse set-radius-zero" >
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" >
				<a href="index.php"><img src="assets/img/logo.png" /></a>
			</a>
		</div>
		<?php

		if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

		}else{
		?>
		<?php if($_SESSION['loggedin'])
		{
			?>
		<div class="right-div">
			<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
			<a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
		</div>
	<?php }
		?>
	</div>
</div>
<!-- LOGO HEADER END-->

<section class="menu-section">
	<div class="container">
		<div class="row ">
			<div class="col-md-12">
				<div class="navbar-collapse collapse ">
					<ul id="menu-top" class="nav navbar-nav navbar-right">
						<li>
							<a href="add_watch.php">Add watch</a>
						</li>
            <li>
              <a href="display.php">Dashboard</a>
            </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php
	}?>
</section>
