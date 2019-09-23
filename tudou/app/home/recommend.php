<?php 
    // +----------------------------------------------------------------------
    // | recommend movies
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php'); 

     //get my profile data
    $id = $_SESSION['user']['id'];  //get user id
    $sql = "SELECT * FROM users WHERE id='$id'"; 
    $user = fetchOne($link,$sql); 

    if (empty($_SESSION['user'])){
            echo "<script>alert('sorry,you need login')</script>";
            redirect('/tudou/app/home/login.php');
    } 

    if(empty($user['like_star'])){
               echo 
               "   
                <script>
                    $(function(){
                      new $.zui.Messager(' In order to ensure recommended movie, please be sure to complete your profile data!', {
                            type: 'info',
                            placement: 'top'
                       }).show();
                     });
               </script>  
               ";
       }elseif(empty($user['like_director'])){
               echo 
               "   
                <script>
                    $(function(){
                      new $.zui.Messager(' In order to ensure recommended movie, please be sure to complete your profile data!', {
                            type: 'info',
                            placement: 'top'
                       }).show();
                     });
               </script>  
               ";
       }elseif(empty($user['age'])){
               echo 
               "   
                <script>
                    $(function(){
                      new $.zui.Messager(' In order to ensure recommended movie, please be sure to complete your profile data!', {
                            type: 'info',
                            placement: 'top'
                       }).show();
                     });
               </script>  
               ";
       }elseif(empty($user['address'])){
               echo 
               "   
                <script>
                    $(function(){
                      new $.zui.Messager(' In order to ensure recommended movie, please be sure to complete your profile data!', {
                            type: 'info',
                            placement: 'top'
                       }).show();
                     });
               </script>  
               ";
       }

     $city = $user['address'];
     $age = $user['age'];
     $like_genres = $user['like_genres'];

     if($age <= 13){
     	$sql2 = "SELECT * FROM movies WHERE level !='PG13' AND level!='NC17' AND level!='R' OR city='$city' ORDER BY release_date DESC, vote_average DESC limit 20";
     }
    if( $age >= 17){
     	$sql2 = "SELECT * FROM movies WHERE level!='R' AND level!='NC17' ORDER BY release_date DESC, vote_average DESC limit 20";
     }
	
	
	
     if($age==''){
     	$sql2 = "SELECT * FROM movies ORDER BY release_date DESC, vote_average DESC";
     }




?>
<div class="container" style="margin-top: 75px;">

	<div class="row"> 
	 	<p class="text-center" style="font-size: 40px;margin-top: 20px"><i class="fa fa-film "></i></p>
	 	<h2 class="text-center" style="margin-top: -10px"> Recommend File</h2>
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
		  <?php }} ?>
		</div>
	 </div>
</div>




<?php          
    include('footer-layout.php');
?>
