<?php
    // +----------------------------------------------------------------------
    // | login page
    // +----------------------------------------------------------------------

    include('header-layout.php');
?>


<div class="container" style="margin-top: 10%;margin-bottom: 15%">
    <div class="row">
       
        <div class="col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-log-in"></span>&nbsp;User Login</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <label for="input_contact"><span class="glyphicon glyphicon-phone"></span>&nbsp;User Name</label>
                                <input id="name" class="form-control input-lg"  name="name" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_contact"></div>
                            <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;Password</label>
                                <input id="password" class="form-control input-lg" name="password" type="password" value="">
                            </div>
                             <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;role</label>
                               	<input type="radio" name="role" checked="checked" value="1">user <input type="radio" name="role" value="2">admin
                            </div>

            
                            <div class="col-md-12" id="error_password"></div>
                            <a href="javascript:void(0)" onclick="login()" class="btn btn-lg btn-success btn-block">login</a>
                        </fieldset>
                    </form>
                </div>
                 <div class="panel-footer">
                     <a href="/tudou/app/home/forget.php">forget password?</a>
                  </div>
            </div>
        </div>
    </div>
</div>

<script>
	//login
	function login(){
		 var name = $('#name').val();
		 var password = $('#password').val();
		 var role = $('input:radio:checked').val();
		 //ajax
		 $.post("/tudou/app/home/handler/login.handler.php",{name:name,password:password,role:role}, function(data){
            if( data.result == 1 ){
                alert('login success');
                window.location.href="/tudou/app/home/profile.php"; 
            }else if(data.result == 2){
            	alert('login success');
            	window.location.href="/tudou/app/admin/index.php"; 
            }
            else{
                alert(data.message);
            }
		},'json');
	}	
</script>

<?php          
    //footer
    include('footer-layout.php');
?>
