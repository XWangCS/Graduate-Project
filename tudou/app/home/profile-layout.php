    <div class="col-md-3">
    <nav class="menu" data-ride="menu" style="width: 200px">
          <ul id="treeMenu" class="tree tree-menu" data-ride="tree">
            <li style="background-color: #f39c12">
                
                <img src="/tudou/<?php echo $_SESSION['user']['avatar'] ?>" width="50px" height="50px" class="img-circle center-block">
                <p class="text-center" style="font-size: 20px"><?php echo $_SESSION['user']['name'] ?></p>
            </li>
            <li><a href="/tudou/app/home/profile.php"><i class="fa fa-user"></i>profile</a></li>
            <li>
              <a href="/tudou/app/home/comments.php"><i class="fa fa-commenting-o"></i>comments</a>
            </li>
            <li><a href="/tudou/app/home/password.php"><i class="fa fa-unlock-alt"></i>password</a></li>
            <li><a href="/tudou/app/home/delete_user.php"><i class="fa fa-delete"></i>delete account</a></li>
          </ul>
        </nav>
    </div>