 <?php
    // +----------------------------------------------------------------------
    // | list of films page 
    // +----------------------------------------------------------------------

    require_once('../../config/config.php');
    validateAdmin();

    include('header-layout.php');
?>
 

 <div class="content-wrapper">
        <section class="content-header">
            <h1>list of Film </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> film</a></li>
                <li class="active">film list</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">list</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="/tudou/app/admin/add_film.php"><button class="btn btn-success">Add Film</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>id</th>
                                    <th>images</th>
                                    <th>name</th>
                                    <th>release_date</th>
                                    <th>vote_average</th>
                                    <th>option</th>
                                </tr>

                                <?php
                                    $sql = "SELECT * FROM movies ORDER BY id DESC";
                                    $movies = fetchAll($link,$sql);
                                    if(is_array($movies)){
                                        foreach($movies as $movie) {
                                ?>

                                <tr>
                                    <td><?php echo $movie['id'] ?></td>
                                    <td><img src="<?php echo $movie['backdrop_path'] ?>" width="120px" height="100px"></td>
                                    <td><?php echo $movie['original_title'] ?></td>
                                    <td><?php echo date('Y-m-d',strtotime($movie['release_date'])) ?></td>
                                    <td><?php echo $movie['vote_average'];  ?></td>
                                    <td>
                                        <a class="label label-danger" onclick="del(<?php echo $movie['id'] ?>,'movies')">delete</a>
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
    function del(id,table) {
        if(confirm('are you sure?')){
        $.post('/tudou/app/admin/handler/del_movie.handler.php',{id:id,table:table},function(data){
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