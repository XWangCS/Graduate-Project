 <?php
    // +----------------------------------------------------------------------
    // | list of comments
    // +----------------------------------------------------------------------
    
    require_once('../../config/config.php');

    validateAdmin();

    include('header-layout.php');
?>
 

 <div class="content-wrapper">
        <section class="content-header">
            <h1>list of comments</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> comments</a></li>
                <li class="active">comments page</li>
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
                                    <th>user name</th>
                                    <th>content</th>
                                    <th>movie</th>
                                    <th>time</th>
                                    <th>option</th>
                                </tr>


                                <?php
                                    $sql = "SELECT users.name,comments.*,movies.original_title FROM comments INNER JOIN users ON users.id=comments.user_id INNER JOIN movies ON movies.id=comments.movie_id";
                                    $results = fetchAll($link,$sql);

                                    if(is_array($results)){
                                        foreach($results as $result) {

                                ?>

                                <tr>
                                    <td><?php echo $result['id'] ?></td>
                                    <td><?php echo $result['name'] ?></td>
                                    <td><?php echo mb_substr($result['comment_content'], 0,40); ?></td>
                                    <td><?php echo $result['original_title'] ?></td>
                                    <td><?php echo $result['addtime'] ?></td>  
                                    <td>
                                        <a class="label label-danger" onclick="del(<?php echo $result['id'] ?>,'comments')">delete</a>
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
    //delete
    function del(id,table) {
        if(confirm('are you sure？')){
        $.post('/tudou/app/admin/handler/del_comment.handler.php',{id:id,table:table},function(data){
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