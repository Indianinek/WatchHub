<?php

session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html
	xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>WatchHub</title>
		<!-- BOOTSTRAP CORE STYLE  -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONT AWESOME STYLE  -->
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
		<!-- DATATABLE STYLE  -->
		<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
		<!-- CUSTOM STYLE  -->
		<link href="assets/css/style.css" rel="stylesheet" />
		<!-- GOOGLE FONT -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
		<!------MENU SECTION START-->
		<?php include('includes/header.php');?>

		<!-- MENU SECTION END-->
		<?php if($_SESSION['loggedin'])
		{
		?>
		<div class="content-wrapper">
			<div class="container">

				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading">
              Collection info
              </div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>Brand</th>
												<th>Model</th>
												<th>Reference</th>
												<th>Variant</th>
												<th>Price</th>
												<th>Date Added</th>
												<th>Edit</th>
											</tr>
										</thead>


										<tbody>
											<?php
                      include("DBConnection.php");
											$idSession = $_SESSION["id"];
										//	echo "id:",$idSession;

                     	//$query = "select ISBN,Title,Author,Edition,Publication,time_added from book_info where id like '$idSession' order by ISBN"; //search with a book name in the table book_info
											$query = "SELECT book_info.brand,book_info.model,book_info.reference,book_info.variant,book_info.time_added,book_info.id_user,book_info.id_book,book_info.price FROM book_info INNER JOIN users ON book_info.id_user = users.id";
											$result = mysqli_query($db,$query);

											if ($result = mysqli_query($db, $query)) {//SQL CHECK
    										$numRows = mysqli_num_rows($result);
											} else {
    										var_export(mysqli_error($db));
											}

                    if(mysqli_num_rows($result)>0)if(mysqli_num_rows($result)>0)
                    {
										 while($row = mysqli_fetch_assoc($result))
                      {
												if($idSession == $row["id_user"]){
                        ?>
												<tr class="odd gradeX">
												<td class="center">
													<?php echo $row["brand"];?>
												</td>
												<td>
													<?php echo $row["model"];?>
												</td>
												<td>
													<?php echo $row["reference"];?>
												</td>
												<td>
													<?php echo $row["variant"];?>
												</td>
												<td>
													<?php echo $row["price"],"$";?>
												</td>
												<td>
													<?php echo $row["time_added"];?>
												</td>

													<td class="contact-delete" >
    											<form action='Delete.php?id_book="<?php echo $row['id_book']; ?>"' method="post">
        									<input type="hidden" name="id_book" value="<?php echo $row['id_book']; ?>">
        									<input type="submit" name="submit" value="Delete">
    											</form>
													</td>
											</tr>
											<?php
										}
										}// tutaj bylo zamkniecie while
                    }
                    else
                    echo "
											<center>No books found in the library by the name $search </center>" ;
                      ?>
										</tr>
									</tbody>
								</table>

								<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
								<?php
								//$search = $_REQUEST["search"];
							//	$query = "select id_user,Title,Author,Edition,Publication,time_added from book_info order by time_added"; //search with a book name in the table book_info
							//	$result = mysqli_query($db,$query);
							$query = "SELECT book_info.brand,book_info.model,book_info.reference,book_info.variant,book_info.time_added,book_info.id_user,book_info.id_book,book_info.price,book_info.current_price FROM book_info INNER JOIN users ON book_info.id_user = users.id";
								$result = mysqli_query($db,$query);
								$whileCount = 0;
 								$dates[] = array();
								$prices[] = array();
								$brands[] = array();
								$watches[] = array();
								$amntWatches[] = array();
								$ammountBooks = array();
								if(mysqli_num_rows($result)>0)if(mysqli_num_rows($result)>0)
								{

							 	while($row = mysqli_fetch_assoc($result))
								{
									if($idSession == $row["id_user"]){//database calculations
									$date = substr($row["time_added"],0,10);
									$price = $row["price"];
									$current_price = $row["current_price"];
									$brand = $row["brand"];
									$model = $row["model"];

									$watch = $brand ." ". $model;


									$dates[$whileCount] = $date;
									$prices[$whileCount] = $price;
									$current_prices[$whileCount] = $current_price;
									$brands[$whileCount] = $brand;
									$watches[$whileCount] = $watch;
									$amntWatches[$whileCount] = $whileCount;
									$whileCount =  $whileCount + 1;
								}
								}// tutaj bylo zamkniecie while

							//	$countedDates[] = array();
							//	$countedBrands[] = array();


								function chartSort($arrayName){
								foreach($arrayName as $key) { // key
								echo "'$key'";
								if($count == count($arrayName)-1){
									echo "";
								}
								else{
								echo ",";
								}
								$count = $count +1;
								}
								}

								function chartSortDates($arrayName,$operator){
								foreach($arrayName as $key => $value) { // key
								if($operator==1){
									echo "'$key'";
								}else if($operator == 2){
									echo "'$value'";
								}
								else{
									echo "bad operator";
								}
								if($count == count($arrayName)-1){
									echo "";
								}
								else{
								echo ",";
								}
								$count = $count +1;
								}
								}

								function random_color_part() {
    							return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
								}
								function random_color() {
    						return random_color_part() . random_color_part() . random_color_part();
								}

								?>
								<div class="chart-container"style="height:200px;">
									<div class="chart1"style="float:left;width:50%;">
									<canvas id="line-chart"  height="200px"></canvas>
								</div>
								<div class="chart2"style="width:50%;float:left">
									<canvas id="line-chart-price"  height="200px"></canvas>
								</div>
								</div>
								<script>

								new Chart(document.getElementById("line-chart"), {
								type: 'bar',
								data: {
									labels: [
									<?php
									chartSortDates(array_count_values($brands),1);//key
									?>
									],
									datasets: [{
											data: [
												<?php
												$count = 0;
												chartSortDates(array_count_values($brands),2);//key
												?>
											],
											label: "Ammount of stored watches to this date",
											borderColor: "#ff0000",
											backgroundColor:[
												<?php
												foreach($watches as $key) { // key
												echo "'",random_color(),"'";
												if($count == count($arrayName)-1){
												echo " ";
												}
												else{
												echo ",";
												}
												$count = $count +1;
												}
												 ?>
											],
											hoverBackgroundColor:"red",
											fill: true
										}
									]
								},
								options: {
									scales: {
											yAxes: [{
													ticks: {
															beginAtZero: true
																}
																	}]
																	}
																}
							});

							new Chart(document.getElementById("line-chart-price"), {
							type: 'line',
							data: {
								labels: [
								<?php
									$count = 0;
									chartSortDates(array_count_values($watches),1);
								?>
								],
								datasets: [{
									data: [
									<?php
										chartSort($prices);
									?>
									],
										label: "Purchased value of your watch",
										borderColor: "#ff0000",
										fill: true
									},
									{
										data: [
										<?php
											chartSort($current_prices);
										?>
										],
											label: "Estimated value of your watch",
											borderColor: "green",
											fill: true

										}
								]
							},
							options: {
								title: {
									display: true
								}
							}
						});
						</script>
						<?php
						//	}// zamkniecie while !!!!!!
							}
							else
							echo "
								<center>No books found in the library by the name $search </center>" ;
								?>
							</div>
						</div>
					</div>
					<!--End Advanced Tables -->
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
	<!-- CONTENT-WRAPPER SECTION END-->
	<?php include('includes/footer.php');?>
	<!-- FOOTER SECTION END-->
	<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
	<!-- CORE JQUERY  -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS  -->
	<script src="assets/js/bootstrap.js"></script>
	<!-- DATATABLE SCRIPTS  -->
	<script src="assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
	<!-- CUSTOM SCRIPTS  -->
	<script src="assets/js/custom.js"></script>
</body>
</html>
