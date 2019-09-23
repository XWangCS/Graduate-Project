  <?php
    // +----------------------------------------------------------------------
    // | Add Film Page
    // +----------------------------------------------------------------------

    require_once('../../config/config.php');

    //auth
    validateAdmin();

    include('header-layout.php');
?>

<link rel="stylesheet" href="/tudou/public/wangEditor/dist/css/wangEditor.min.css">  
<div class="content-wrapper">
        <section class="content-header">
            <h1>Add Film</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> film</a></li>
                <li class="active">Add Film</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Film</h3>
                        </div>
                        <form role="form" action="/tudou/app/admin/handler/get_movies.handler.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_title">choose start time</label>
                                    <input type="text" class="form-control datepicker" id="starttime" name="starttime">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_title">choose end time</label>
                                    <input type="text" class="form-control datepicker2" id="endtime" name="endtime">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-primary" onclick="addmovie()">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="loadingModal" data-backdrop="static">
        <div style="width: 200px;height:20px; z-index: 20000; position: absolute; text-align: center; left: 50%; top: 50%;margin-left:-100px;margin-top:-10px">
            <div class="progress progress-bar-success progress-striped active" style="margin-bottom: 0;">
                <div class="progress-bar progress-bar-success" style="width: 100%;"></div>
            </div>
            <h4 style="color:white">Add Film Data Now</h4>
        </div>
    </div>


<script src="/tudou/public/admin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>          
    $('.datepicker').datepicker({
        language: 'cn',
        autoclose:true,
        todayBtn: 1,
        format:'yyyy-mm-dd',
    });
     $('.datepicker2').datepicker({
        language: 'cn',
        autoclose:true,
        todayBtn: 1,
        format:'yyyy-mm-dd',
    });
</script>
<script>
    function addmovie() {
        var starttime = $('#starttime').val();
        var endtime = $('#endtime').val();

        $.ajax({
          type:'POST',
          url:"/tudou/app/admin/handler/get_movies.handler.php",
          dataType:'json',
          data:{'starttime':starttime,'endtime':endtime},
          beforeSend:function() {
             $("#loadingModal").modal('show');
  
          },
          error:function() {
            $("#loadingModal").modal('hide');
            alert('Add Film success');
            window.location.href="/tudou/app/admin/movies.php";
          },
          success:function(data) {
             if(data.result == 1) {
                $('#loadingModal').modal('hide');
                alert('Add Film Success！');
                window.location.href="/tudou/app/admin/movies.php";
             }

          }
         });
    }

</script>






<?php include('footer-layout.php') ?>