<?php 
    // +----------------------------------------------------------------------
    // | film detail
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php'); 

    $id = $_GET['id'];

    $sql = "SELECT * FROM movies WHERE id='$id'";

    $film = fetchOne($link,$sql);

    $film_id = $film['film_id'];

    $url = 'https://api.themoviedb.org/3/movie/'.$film_id.'?api_key=a2df3d1a7611194432bbdf1fc80540f2';
    //get movie json data
    $json_film_date = file_get_contents($url);

    $data = json_decode($json_film_date,true);

    //get this movie comments
    $sql2 = "SELECT * FROM comments INNER JOIN users ON comments.user_id=users.id WHERE comments.movie_id='$id' AND comments.status=1";
    $comments = fetchAll($link,$sql2);
?>
	<div class="container" style="margin-top:7%">
            <ol class="breadcrumb">
              <li><a href="/shopping/">Home</a></li>
              <li><a href="#"><?php echo $film['original_title'] ;?></a></li>
            </ol>
            <div class="col-md-11">
                <div class="panel">
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="card" style="width: 350px;height: 300px;margin:30px">
                                <img src="<?php echo $film['backdrop_path'] ;?>" style="width: 350px;height: 300px">
                            </div>
                        </div>
                        <div class="col-sm-6" style="margin-top: 20px">
                            <small>rank-<?php echo $film['level'] ;?><span style="font-size: 15px" class="pull-right">(<?php echo date('Y-m',strtotime($film['release_date'])) ?>)</span></small>
                            <p style="font-size: 30px;font-weight: bold"><?php echo $film['original_title'] ;?></p>
                            <hr/>
                            <span style="font-size: 35px;color:red">&nbsp;&nbsp;<?php echo $film['vote_average'] ?></span><span style="font-size: 20px;margin-left:20px">score</span>
                            <hr/>
                            <h2>OverView</h2>
                              <?php echo $data['overview'] ?>
                            <ul>
                                <li>
                                    Director：<?php echo $film['director'] ?>   
                                </li>
                                 <li>
                                    Actor: <?php echo $film['actor'] ?>   
                                </li>
                                <li>
                                    Cinema：<?php echo $film['cinema'] ?>   
                                </li>
                                <li>
                                    Language：<?php echo $data['original_language'] ?>   
                                </li>
                                <li>
                                    runtime:<?php echo $data['runtime'] ?>   
                                </li>
                                <li>
                                    genres:<?php
                                      foreach($data['genres'] as $val){
                                        echo '<span style="margin-left:5px" class="label label-success">'.$val['name'].'</span>';
                                      }

                                    ?>   
                                </li>
                    
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;comments</h3>
                    </div>
                      <div class="panel-body">
                             
                            <?php 
                                if(is_array($comments)){
                                    
                                    foreach($comments as $comment) {
                            ?>
                                <div class="comment">
                                 
                                  <div class="content">
                                    <div class="pull-right text-muted"><?php echo $comment['addtime'] ?></div>

                                    <div><strong><?php echo $comment['name'] ?></strong>
                                    <?php 

                                        for($i=0;$i < $comment['movie_score'];$i++){
                                    ?>
                                        <img src="/tudou/public/images/star-on.png" alt="1" title="bad">
                                    <?php } ?>

                                    <div class="text" style="font-size: 18px"><?php echo $comment['comment_content']; ?></div>
                                  
                                  </div>
                                </div>
                            
                          </div>
                          <?php }}else{
                            echo '<h4>Sorry, have no comments;</h4>';
                          } ?>
                        </div>
                </div>
                <div class="row">
                      <form role="form">
                        <div class="form-group">
                            
                            <label for="name">comment</label>
                            <div id="rate"></div>
                            <input type="hidden" id="movie_score" value="1">
                            <textarea id="comment_content" class="form-control"></textarea>
                            <input id="movie_id" value="<?php echo $id ?>" type="hidden">
                        </div>
                        <button type="button" class="btn btn-default pull-right" onclick="commit()">send</button>
                      </form>
                </div>
            </div>

        </div>


    <script>
    function commit() {
        var comment_content = $("#comment_content").val();
        var movie_id = $("#movie_id").val();
        var movie_score = $('#movie_score').val();
        $.post('/tudou/app/home/handler/commit.handler.php',{comment_content:comment_content,movie_id:movie_id,movie_score:movie_score},function(data){
                if(data.result == 1) {
                    alert(data.message);
                    window.location.reload();
                }
                if(data.result == 0){
                    alert(data.message);
                }
        },'json');      
    }
</script>
<script src="/tudou/public/js/jquery.raty.min.js"></script>
<script>
    $(function() {
        $.fn.raty.defaults.path = '/tudou/public/images/';
        $('#rate').raty({ score: 1 ,});
        $('#rate').raty({
          click: function(score, evt) {
                $('#movie_score').val(score);
          }
    });
    });
</script>
<?php          
    include('footer-layout.php');
?>