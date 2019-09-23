<?php
	//home
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/tudou/public/css/zui.min.css">
    <link  rel="stylesheet" href="/tudou/public/css/buttons.css">
    <link rel="stylesheet" href="/tudou/public/css/head.css">
    <link rel="stylesheet" href="/tudou/public/css/style.css">
    <link rel="stylesheet" href="/tudou/public/css/font-awesome.min.css">
    <script src="/tudou/public/js/jquery-1.12.4.js"></script>
</head>
<body>

    <div class="row" id="head">
    <nav class="navbar navbar-fixed-top" role="navigation">
      <div class="container-fluid">
      
        <div class="container">
        <div class="navbar-header">
       
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-example">
            <span class="sr-only">chaneg</span>
            <i class="icon icon-align-justify"></i>
          </button>
        
          <a class="navbar-brand" href="/tudou/">Tudou</a>
        </div>
     
        <div class="collapse navbar-collapse navbar-collapse-example">
          
          <ul class="nav navbar-nav">
            <li class="active"><a href="/tudou/">Home</a></li>
            <li><a href="/tudou/app/home/recommend.php">recommend</a></li>
            <li><a href="/tudou/app/home/search_detail.php">search page</a></li>
          </ul>
    


         <?php
          
            if(!isset($_SESSION)) {
         
                 @session_start();  
            }
            if(isset($_SESSION['user'])) {
         ?>
          <ul class="nav navbar-nav navbar-right">
            <li></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']['name'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu">
                 <li><a href="/tudou/app/home/profile.php">profile</a></li>
                <li><a href="javascript:void(0)" onclick="logout()">logout</a></li>
              </ul>
            </li>
          </ul>
          <?php }else{ ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="/tudou/app/home/login.php">login</a></li>
            <li class="nav-login"><a href="/tudou/app/home/register.php">register</a></li>
          </ul>
         <?php }?>
        </div><!-- END .navbar-collapse -->
      </div>
      </div>
    </nav>
    </div>


    <script>
       
        function logout(){
             
             $.get("/tudou/app/home/handler/logout.handler.php",{}, function(data){
                if( data.result == 1 ){
                    alert('logout success！');
                    window.location.href="/tudou/"; 
                }
                if( data.result == 0 ){
                    alert('error');
                }
            },'json');
        }   

       
        function search() {
            var search_name = $('#search_name').val();

                    $.post('/tudou/app/home/handler/search.handler.php',{search_name:search_name},function(data){
                        if(data.result == 1) {
                            window.location.href='/tudou/app/home/search.php?id='+data.message;
                        }
                        if(data.result == 0) {
                            alert('error！');
                        }
                    },'json');
        }
    </script>










