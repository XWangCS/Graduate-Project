<?php 
    // +----------------------------------------------------------------------
    // | Home
    // +----------------------------------------------------------------------
    include('config/config.php');

    include('header-layout.php'); 

?>

<div class="container" style="margin-top: 75px;">

	<div class="row"> 
	 	<p class="text-center" style="font-size: 40px;margin-top: 20px"><i class="fa fa-film "></i></p>
	 	<h2 class="text-center" style="margin-top: -10px"> Tudou File</h2>
	 </div>
	

	 <div class="row">
		<div class="cards">
		  <?php
			$limit = 16;
		    $sql = "SELECT * FROM movies";

		    $num_max = getTotalRows($link,$sql);
		    if(isset($_REQUEST['start'])) { 
		    	$start = $_REQUEST['start']; 
		    }else { 
		    	$start = 0; 
		    } 
		    $sql2 = "SELECT * FROM movies ORDER BY release_date DESC limit $start,$limit"; 
	
		    $pre = $start-$limit;

		    $next = $start + $limit;

		  	$movies = fetchAll($link,$sql2);
		  	if(is_array($movies)){
		  		foreach($movies as $movie){
		  ?>
		  <div class="col-md-4 col-sm-6 col-lg-3">
		    <div class="card"><a href="/tudou/app/home/detail.php?id=<?php echo $movie['id'] ?>"><img src="<?php echo $movie['backdrop_path'] ?>" width="274px" height="184px" alt=""></a></div>
		    <p class="fen-title"><?php echo cur_str($movie['original_title'],40) ?></p>
		    <p class="fen-author text-muted">city：<?php echo $movie['city'] ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspvote:<?php echo $movie['vote_average'] ?></p>
		  </div>
		  <?php }} ?>
		</div>
	 </div>


	 <ul class="pager pull-right">
	    <?php
	      if($pre >= 0 ){
	    ?>
	 	  <li class="previous"><a href="/tudou/app/home/list.php?start=<?php echo $pre ?>">Previous</a></li>
	 	  <?php }else{ ?>
	 	  <li class="previous disabled"><a href="#">Previous</a></li>
	 	  <?php } ?>
	 	
	 	  <?php 
	 	  	if($next < $num_max) { ?>

	 	  	<li class="next"><a href="/tudou/app/home/list.php?start=<?php echo $next ?>">Next</a></li>
	 	  <?php  }else{ ?>
	 	  	<li class="next disabled"><a href="#">Next</a></li>
	 	  <?php } ?>
	 </ul>








</div>
<?php          
    include('footer-layout.php');
?>
