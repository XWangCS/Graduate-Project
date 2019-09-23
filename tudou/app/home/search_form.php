<?php 
    // +----------------------------------------------------------------------
    // | search pages
    // +----------------------------------------------------------------------
    include('../../config/config.php');
      include('header-layout.php');
  

    $tj1 = "1=1";
    $tj2 = "1=1";
    $tj3 = "1=1";
    $tj4 = "1=1";
    $tj5 = "1=1";
    $tj6 = "1=1";

    if(!empty($_GET['movie_name'])){
    		$name = $_GET['movie_name'];
    		$tj1 = "original_title like '%{$name}%'";
    }

    if(!empty($_GET['director'])){
    		$director = $_GET['director'];
    		$tj2 = "director like '%{$director}%'";
    }

    if(!empty($_GET['actor'])){
    		$actor = $_GET['actor'];
    		$tj3 = "actor like '%{$actor}%'";
    }

     if(!empty($_GET['time'])){
    		$time = $_GET['time'];
    		$tj4 = "release_date like '%{$time}%'";
    }

    if(!empty($_GET['lavel'])){
    		$lavel = $_GET['lavel'];
    		$tj5 = "level = '$lavel'";
    }

    if(!empty($_GET['cinema'])){
    		$cinema = $_GET['cinema'];
    		$tj6 = "cinema like '%{$cinema}%'";
    }

   $sql = "SELECT * FROM movies WHERE {$tj1} AND {$tj2} AND {$tj3} AND {$tj4} AND  {$tj5} AND {$tj6}";

   $movies = fetchAll($link,$sql);

    
?>

<div class="container" style="margin-top: 75px;">

	<div class="row"> 
	 	<p class="text-center" style="font-size: 40px;margin-top: 20px"><i class="fa fa-film "></i></p>
	 	<h2 class="text-center" style="margin-top: -10px"> Tudou File Search </h2>
	 </div>
	

	 <div class="row">
		<div class="cards">
		  <?php
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