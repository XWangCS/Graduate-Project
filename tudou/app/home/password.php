<?php
    // +----------------------------------------------------------------------
    // | user change password
    // +----------------------------------------------------------------------

    include('header-layout.php');
  
?>
<div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
        include('profile-layout.php');
    ?>
    <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;change password</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="/tudou/app/home/handler/password.handler.php" method="post" enctype=multipart/form-data>
                    <fieldset>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;my old password</label>
                                <input id="input_name" class="form-control"   name="oldpassword" type="text">
                            </div>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;my new password</label>
                                <input id="input_name" class="form-control"   name="password" type="password">
                            </div>
                            <div class="col-md-12" id="error_name"></div>
                            <div class="form-group">
                                <label for="input_email"><span class="glyphicon glyphicon-envelope"></span>&nbsp;repeat password</label>
                                <input id="input_email" class="form-control" value="" name="repassword" type="password" >
                            </div>
                            <div class="col-md-12" id="error_info"></div>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>&nbsp;edit</button>
                        </fieldset>
            
                </form>
            </div>
        </div>
    </div>

</div>
<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
