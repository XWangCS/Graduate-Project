<?php
    // +----------------------------------------------------------------------
    // | delete account
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

  
?>
<div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
        include('profile-layout.php');
    ?>
    <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;delete my account</h3>
            </div>
            <div class="panel-body">
                    <button class="btn btn-danger btn-block" onclick="delete_account()">delete my account</button>
            </div>
        </div>
    </div>

</div>
<script>
    function delete_account(){
        $a = confirm('are you sure?');

        if($a) {
            $.get("/tudou/app/home/handler/delete_account.handler.php",{}, function(data){
                if( data.result == 1 ){
                    alert('success');
                    window.location.href="/tudou/"; 
                }
                else{
                    alert(data.message);
                }
            },'json');
        }
    }




</script>

<?php          

    include('footer-layout.php');
?>
