<?php
	// +----------------------------------------------------------------------
    // | check user info
    // +----------------------------------------------------------------------
	
	require_once('../../config/config.php');

	
	validateAdmin();
	
	include('header-layout.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $user = fetchOne($link,$sql);
?>

  <div class="content-wrapper">
        <section class="content-header">
            <h1>User Info</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Info</a></li>
                <li class="active">User Info</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">user info</h3>
                         
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-warning">
                                    <div class="panel-body">
                                            <fieldset>
                                                    <div class="form-group">
                                                        <label for="input_name">&nbsp;Name</label>
                                                        <input id="input_name" class="form-control" value="<?php echo $user['name'] ?>" name="name" type="text" autofocus value="jinlong">
                                                    </div>
                                                    <div class="col-md-12" id="error_name"></div>
                                                    <div class="form-group">
                                                        <label for="input_email">&nbsp;email</label>
                                                        <input id="input_email" class="form-control" value="<?php echo $user['email'] ?>" name="email" type="email" autofocus value="1780316635@qq.com">
                                                    </div>
                                                    <div class="col-md-12" id="error_email"></div>
                                                    <div class="form-group">
                                                        <label for="input_phone">&nbsp;favorite kind of movie</label>
                                                        <input id="input_phone" class="form-control"  value="<?php echo $user['like_genres'] ?>" type="text" autofocus>
                                                    </div>
                                                    <div class="col-md-12" id="error_email"></div>
                                                    <div class="form-group">
                                                        <label for="input_phone">&nbsp;favorite director</label>
                                                        <input id="input_phone" class="form-control"  value="<?php echo $user['like_director'] ?>" name="address" type="text" autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input_phone">&nbsp;favorite star</label>
                                                        <input id="input_phone" class="form-control"  value="<?php echo $user['like_star'] ?>" name="address" type="text" autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input_phone">&nbsp;age</label>
                                                        <input id="input_phone" class="form-control"  value="<?php echo $user['age'] ?>" name="address" type="text" autofocus>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="input_name">&nbsp;address</label>
                                                        <input id="input_name" class="form-control"  value="<?php echo $user['address'] ?>" name="address" type="text" >
                                                    </div>
                                                    <div class="col-md-12" id="error_face"></div>
                                                    <div class="form-group">
                                                        <label for="input_info">&nbsp;info</label>
                                                        <textarea class="form-control" rows="10" name="info"><?php echo $user['info'] ?>
                                                        </textarea>
                                                    </div>
                                                    <div class="col-md-12" id="error_info"></div>
                                         
                                                </fieldset>
                                
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
