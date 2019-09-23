<?php
    // +----------------------------------------------------------------------
    // | regesiter page
    // +----------------------------------------------------------------------


    include('header-layout.php');
?>


<div class="container" style="margin-top: 10%;margin-bottom: 5%">
    <div class="row">
       
        <div class="col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-log-in"></span>&nbsp;User Register</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <label for="input_contact"><span class="glyphicon glyphicon-phone"></span>&nbsp;Email</label>
                                <input id="email" class="form-control input-lg" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="input_contact"><span class="glyphicon glyphicon-phone"></span>&nbsp;User name</label>
                                <input id="name" class="form-control input-lg"  name="phone" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_contact"></div>
                            <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;password</label>
                                <input id="password" class="form-control input-lg"  name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;repeat password</label>
                                <input id="password_o" class="form-control input-lg" name="password_o" type="password" value="">
                            </div>
                          
                          
            
                            <div class="col-md-12" id="error_password"></div>
                            <a href="javascript:void(0)" onclick="register()" class="btn btn-lg btn-success btn-block">register</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function register(){
         var name = $('#name').val();
         var email = $('#email').val();
         var password_o = $('#password_o').val();
         var password = $('#password').val();
         $.post("/tudou/app/home/handler/register.handler.php",{name:name,email:email,password_o:password_o,password:password}, function(data){
            if( data.result == 1 ){
                alert('register success');
                window.location.href="/tudou/app/home/login.php"; 
            }
            if(data.result == 0 ) {
                alert(data.message);
            }
        },'json');
    }   
</script>

<?php          
    include('footer-layout.php');
?>
