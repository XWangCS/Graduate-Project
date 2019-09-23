  <?php
    // +----------------------------------------------------------------------
    // | edit password
    // +----------------------------------------------------------------------
    
    require_once('../../config/config.php');

    validateAdmin();

    include('header-layout.php');
?>


  <div class="content-wrapper">
        <section class="content-header">
            <h1>edit password</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> password</a></li>
                <li class="active">edit</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">edit password</h3>
                        </div>
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_pwd">admin new password</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="input_re_pwd">repeat password</label>
                                    <input type="password" class="form-control" id="password_o">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-primary" onclick="edit()">edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>



<?php include('footer-layout.php') ?>

<script>
    function edit() {
         var password_o = $('#password_o').val();
         var password = $('#password').val();
        $.post("/tudou/app/admin/handler/edit_password.handler.php",{password_o:password_o,password:password}, function(data){
            if( data.result == 1 ){
                alert('success');
                window.location.reload(); 
            }
            if(data.result == 0 ) {
                alert(data.message);
            }
        },'json');
    }






</script>