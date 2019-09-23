<?php 
    // +----------------------------------------------------------------------
    // | search pages
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php');

    $keywords = $_GET['keyword'];
    $sql2 = "SELECT * FROM movies WHERE original_title like '%{$keywords}%'";
?>

<div class="container" style="margin-top: 75px;">

	<div class="row"> 
	 	<p class="text-center" style="font-size: 40px;margin-top: 20px"><i class="fa fa-film "></i></p>
	 	<h2 class="text-center" style="margin-top: -10px"> Tudou File Search </h2>
	 </div>
	

	 <div class="row">
		<div class="cards">
		  <?php
		  	$movies = fetchAll($link,$sql2);
		  	if(is_array($movies)){
		  		foreach($movies as $movie){
		  ?>
		  <div class="col-md-4 col-sm-6 col-lg-3">
		    <div class="card"><a href="/tudou/app/home/detail.php?id=<?php echo $movie['id'] ?>"><img src="<?php echo $movie['backdrop_path'] ?>" width="274px" height="184px" alt=""></a></div>
		    <p class="fen-title"><?php echo cur_str($movie['original_title'],40) ?></p>
		    <p class="fen-author text-muted">city：<?php echo $movie['city'] ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspvote:<?php echo $movie['vote_average'] ?></p>
		  </div>
		  <?php }}else{
		  	echo "have no movies";
		  	} ?>
		</div>
	 </div>









</div>