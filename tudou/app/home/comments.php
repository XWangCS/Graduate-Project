<?php
    // +----------------------------------------------------------------------
    // | my comment
    // +----------------------------------------------------------------------
    include('../../config/config.php');
    include('header-layout.php');

    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM comments INNER JOIN movies  ON comments.movie_id = movies.id WHERE comments.user_id='$user_id'";
    $comments = fetchAll($link,$sql);
  
?>
<div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
        include('profile-layout.php');
    ?>
    <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;my comments</h3>
            </div>
            <div class="panel-body">
            <?php 
             if(is_array($comments)) {
                foreach($comments as $comment) {
            ?>
    			<div class="comment">
    			  <div class="content">
    			    <div class="pull-right text-muted"><?php echo $comment['addtime'] ?></div>
    			    <div><a href="###"><strong><?php echo $_SESSION['user']['name'] ?></strong></a></div>
    			    <div class="text">(<?php echo $comment['original_title'] ?>):<?php echo $comment['comment_content'] ?></div>
    			  </div>
                </div>
            <?php }}else{

                echo "<h2>sorry ,have no data！</h2>";
            } ?>
        </div>
    </div>
</div>
</div>



<?php          

    include('footer-layout.php');
?>