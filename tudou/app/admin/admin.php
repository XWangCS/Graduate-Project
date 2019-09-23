<?php
	// +----------------------------------------------------------------------
    // | admin info
    // +----------------------------------------------------------------------
	
	require_once('../../config/config.php');

	
	validateAdmin();
	
	include('header-layout.php');

   
    $sql = "SELECT * FROM users WHERE is_admin=1";
    $admin = fetchOne($link,$sql);

?>
 




  <div class="content-wrapper">
        <section class="content-header">
            <h1>Admin Info</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> admin</a></li>
                <li class="active">Admin Info</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">adminInfo</h3>
                         
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-warning">
                                    <div class="panel-body">
                                        <form role="form" action="/tudou/app/admin/handler/profile.handler.php" method="post" enctype=multipart/form-data>
                                            <fieldset>
                                                    <div class="form-group">
                                                        <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;User Name</label>
                                                        <input id="input_name" class="form-control" disabled  value="<?php echo $admin['name'] ?>" name="name" type="text" autofocus value="jinlong">
                                                    </div>
                                                    <div class="col-md-12" id="error_name"></div>
                                                    <div class="form-group">
                                                        <label for="input_email"><span class="glyphicon glyphicon-envelope"></span>&nbsp;email</label>
                                                        <input id="input_email" class="form-control" disabled  value="<?php echo $admin['email'] ?>" name="email" type="email" autofocus value="1780316635@qq.com">
                                                    </div>
                                                    <div class="col-md-12" id="error_email"></div>
                                                    <div class="form-group">
                                                        <label for="input_phone"><span class="glyphicon glyphicon-phone"></span>&nbsp;phone</label>
                                                        <input id="input_phone" class="form-control"  name="phone" value="<?php echo $admin['phone'] ?>" type="text" autofocus>
                                                    </div>
                                                    <div class="col-md-12" id="error_email"></div>
                                                    <div class="form-group">
                                                        <label for="input_phone"><span class="glyphicon glyphicon-flag"></span>&nbsp;address</label>
                                                        <input id="input_phone" class="form-control"  value="<?php echo $admin['address'] ?>" name="address" type="text" autofocus>
                                                    </div>
                                                    <div class="col-md-12" id="error_phone"></div>
                                                    <div class="form-group">
                                                        <label for="input_face"><span class="glyphicon glyphicon-picture"></span>&nbsp;avatar</label>
                                                        <input id="input_face" class="form-control" name="avatar" type="file" autofocus>
                                                    </div>
                                                    <div class="col-md-12" id="error_face"></div>
                                                    <div class="form-group">
                                                        <label for="input_info"><span class="glyphicon glyphicon-edit"></span>&nbsp;info</label>
                                                        <textarea class="form-control" rows="10" name="info"><?php echo $admin['info'] ?>
                                                        </textarea>
                                                    </div>
                                                    <div class="col-md-12" id="error_info"></div>
                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>&nbsp;save</button>
                                                </fieldset>
                                    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


<?php include('footer-layout.php'); ?>
