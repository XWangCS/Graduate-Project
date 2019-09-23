<?php 
    // +----------------------------------------------------------------------
    // | search page
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php'); 

?>

	<div class="container" style="margin-top: 75px;">

		<div class="row"> 
		 	<p class="text-center" style="font-size: 40px;margin-top: 20px"><i class="fa fa-film "></i></p>
		 	<h2 class="text-center" style="margin-top: -10px"> Search File</h2>
		 </div>

		 <div class="row">
		 	<div class="col-sm-6 col-sm-offset-3">
				<div class="panel">
					<div class="panel-body">
						<form action="/tudou/app/home/search_form.php">
						  <div class="form-group">
						    <label for="exampleInputAccount1">Movie Name</label>
						    <input type="text" class="form-control" name="movie_name">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Director</label>
						    <input type="text" class="form-control" name="director">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Actor</label>
						    <input type="text" class="form-control" name="actor">
						  </div>
						   <div class="form-group">
						    <label for="exampleInputPassword1">release time</label>
						    <input type="text" class="form-control" name="time">
						  </div>
						  <select class="form-control" name="lavel">
						    <label for="exampleInputPassword1">level</label>
						    <option value="">choose</option>
						    <option value="G">G</option>
						    <option value="PG">PG</option>
						    <option value="PG13">PG13</option>
						    <option value="R">R</option>
						    <option value="NC17">NC17</option>
						  </select>
						   <div class="form-group">
						    		<label for="exampleInputPassword1">cinema</label>
						    <input type="text" class="form-control" name="cinema">
						  </div>
						
						  <button type="submit" class="btn btn-primary">search</button>
						</form>
					</div>
				</div>
			</div>			
		 </div>
	</div>

<?php          
    include('footer-layout.php');
?>
