<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>WatchHub</title>
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
		<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<?php
  session_start();
  error_reporting(0);
    if(array_key_exists('delete', $_POST)) {
        			delete();
    }

?>
	<body>
		<?php include('includes/header.php');?>
		<?php if($_SESSION['loggedin'])
		{
		?>
		<div class="content-wrapper">
			<div class="container">
				<div class="row pad-botm">
					<div class="col-md-12">
						<h4 class="header-line">Fill in your watch information</h4>
					</div>

				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
                Information
                </div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<form action="InsertBooks.php" method="post">

												<tr>
													<td> Enter Brand :</td>
													<td class="center">
														<input type="text" name="brand" size="48">
														</td>
													</tr>
													<tr class="odd gradeX">
														<td> Enter Model :</td>
														<td>
															<input type="text" name="model" size="48">
															</td>
														</tr>
														<tr class="odd gradeX">
															<td> Enter Reference :</td>
															<td>
																<input type="text" name="reference" size="48">
																</td>
															</tr>
															<tr class="odd gradeX">
																<td> Enter Variant: </td>
																<td>
																	<input type="text" name="variant" size="48">
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td> Enter price (when bought): </td>
																	<td>
																		<input type="text" name="price" size="48">$
																		</td>
																	</tr>
																	<tr class="odd gradeX">
																		<td> Enter current price (market): </td>
																		<td>
																			<input type="text" name="current_price" size="48">
																			</td>
																		</tr>
																<tr class="odd gradeX">
																	<td></td>
																	<td>
																		<input type="submit" value="submit">
																			<input type="reset" value="Reset">
																			</td>
																		</tr>
																	</table>
																</form>
																<tbody>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							else {
								echo "<center>Please log in first</center>";
							}
							?>
							<?php include('includes/footer.php');?>
							<script src="assets/js/jquery-1.10.2.js"></script>
							<script src="assets/js/bootstrap.js"></script>
							<script src="assets/js/dataTables/jquery.dataTables.js"></script>
							<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
							<script src="assets/js/custom.js"></script>
						</body>
					</html>
