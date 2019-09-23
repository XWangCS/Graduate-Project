<?php
    // +----------------------------------------------------------------------
    // | forget password
    // +----------------------------------------------------------------------

    include('header-layout.php');
?>


<div class="container" style="margin-top: 10%;margin-bottom: 15%">
    <div class="row">
       
        <div class="col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-log-in"></span>&nbsp;send email</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="/tudou/app/home/handler/sendemail.handler.php" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;your email</label>
                                <input  class="form-control input-lg" name="email" type="email" value="">
                            </div>
            
                            <div class="col-md-12" id="error_password"></div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">send</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php          
    //footer
    include('footer-layout.php');
?>
