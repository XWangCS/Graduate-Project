<?php
	// +----------------------------------------------------------------------
    // | list of users
    // +----------------------------------------------------------------------
	
	
	require_once('../../config/config.php');

	
	validateAdmin();

	
	include('header-layout.php');
?>
 




  <div class="content-wrapper">
        <section class="content-header">
            <h1>list of users</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> users</a></li>
                <li class="active">list</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">List</h3>
                            <div class="box-tools">
                               
                            </div>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>register time</th>
                                    <th>status</th>
                                    <th>option</th>
                                </tr>


                                <?php
                                	$sql = 'SELECT * FROM users where is_admin = 0';
                                	$users = fetchAll($link,$sql);

                                	if(is_array($users)){

                                		foreach($users as $user) {
                                ?>

                                <tr>
                                    <td><?php echo $user['id']?></td>
                                    <td><?php echo $user['name']?></td>
                                    <td><?php echo $user['email']?></td>
                                    <td><?php echo $user['addtime']?></td>
                                    <td>
                                    <?php 
                                        if($user['status'] == 1){
                                            echo "normal";
                                        }
                                        if($user['status'] == 0) {
                                            echo "block";
                                        }

                                    ?>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="deluser(<?php echo $user['id'] ?>,'users')"  class="label label-danger">delete</a>
                                        <a href="/tudou/app/admin/user_info.php?id=<?php echo $user['id'] ?>" class="label label-info">info</a>
                                        <a href="javascript:void(0)" onclick="block(<?php echo $user['id'] ?>)"  class="label label-primary">block</a>
                                    </td>
                                </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


<?php include('footer-layout.php'); ?>

<script>
    function deluser(id,table) {
        if(confirm('are you sure？')){
        $.post('/tudou/app/admin/handler/del_user.handler.php',{id:id,table:table},function(data){
            if(data.result == 1) {
                alert(data.message);
                window.location.reload();
            }

            if(data.result == 0) {
                alert(data.message);
            }
        },'json');
        }else{
            return false;
        }
    }

     function block(id) {
        if(confirm('block user?')){
            $.post('/tudou/app/admin/handler/block.handler.php',{id:id},function(data){
                if(data.result == 1) {
                    alert(data.message);
                    window.location.reload();
                }

                if(data.result == 0) {
                    alert(data.message);
                }
            },'json');
            }else{
                return false;
            }
    }
</script>
