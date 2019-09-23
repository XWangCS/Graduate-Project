<?php
    // +----------------------------------------------------------------------
    // | my profile
    // +----------------------------------------------------------------------
    
    include('../../config/config.php');
    
    include('header-layout.php');

    //get my profile data
    $id = $_SESSION['user']['id'];  //get user id
    $sql = "SELECT * FROM users WHERE id='$id'"; 
    $user = fetchOne($link,$sql); 

    if (empty($_SESSION['user'])){
            echo "<script>alert('sorry,you need login')</script>";
            redirect('/app/home/login.php');
    } 

    if(empty($user['like_star'])){
            echo 
            "   
             <script>
                 $(function(){
                   new $.zui.Messager(' In order to ensure recommended movie, please be sure to complete your  profile data!', {
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

   



  
?>
<div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
        include('profile-layout.php');
    ?>
    <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;my profile</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="/tudou/app/home/handler/profile.handler.php" method="post" enctype=multipart/form-data>
                    <fieldset>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;User Name</label>
                                <input id="input_name" class="form-control" disabled  value="<?php echo $user['name'] ?>" name="name" type="text" >
                            </div>
                            <div class="col-md-12" id="error_name"></div>
                            <div class="form-group">
                                <label for="input_email"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Email</label>
                                <input id="input_email" class="form-control" disabled value="<?php echo $user['email'] ?>" name="email" type="email" autofocus value="1780316635@qq.com">
                            </div>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;my favorite kind of movie</label>
                                <select class="form-control" name="like_genres">
                                  <option value="Family">Family</option>
                                  <option value="Fantasy">Fantasy</option>
                                  <option value="Adventure">Adventure</option>
                                  <option value="Animation">Animation</option>
                                  <option value="Comedy">Comedy</option>
                                  <option value="Action">Action</option>
                                  <option value="Thriller">Thriller</option>
                                  <option value="Crime">Crime</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;my favorite star</label>
                                <input id="input_name" class="form-control"  value="<?php echo $user['like_star'] ?>" name="like_star" type="text" >
                            </div>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;my favorite director</label>
                                <input id="input_name" class="form-control"  value="<?php echo $user['like_director'] ?>" name="like_director" type="text" >
                            </div>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;my age</label>
                                <input id="input_name" class="form-control"  value="<?php echo $user['age'] ?>" name="age" type="text" >
                            </div>
                             <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;my address</label>
                                <input id="input_name" class="form-control"  value="<?php echo $user['address'] ?>" name="address" type="text" >
                            </div>
                            
                          
                            <div class="col-md-12" id="error_info"></div>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>&nbsp;save</button>
                        </fieldset>
            
                </form>
            </div>
        </div>
    </div>

</div>

<script>

</script>
<?php          
    include('footer-layout.php');
?>
