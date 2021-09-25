<div class="navbar-header">
    <button type="button" 
    class="navbar-toggle collapsed" 
    data-toggle="collapse" 
    data-target="#bs-example-navbar-collapse-1" 
    aria-expanded="false">
        <span class="sr-only">Chuyển đổi</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>          
    </button>
    <a class="navbar-brand" href="#" style="padding: 1px;">
    <img class="img-responsive" alt="Brand" src="font-end/img/logo.png"  style="width: 47px;margin: 5px 0px 0px 15px;"></a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right" style="margin-top: 10px">
<?php
if(!isset($_SESSION['user']))
{
    echo'
    <li >
        <button type="button" id="login_button" class="btn btn-primary" style="margin-right:20px" data-toggle="modal" data-target="#login">Đăng nhập</button>
            <div id="login" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">ĐĂNG NHẬP HỆ THỐNG</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                            <div class="form-group">
                                <label class="sr-only" for="username">Tên đăng nhập</label>
                                <input type="text" name="login_username" class="form-control" placeholder="Tên đăng nhập" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Mật khẩu</label>
                                <input type="password" name="login_password" class="form-control"  placeholder="Mật khẩu" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" value="login" class="btn btn-block">
                                    Đăng nhập
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng cửa sổ</button>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li>
        <button type="button" id="register_button" class="btn btn-info" style="margin-right:20px;" data-toggle="modal" data-target="#register">Đăng ký</button>
            <div id="register" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Đăng ký tài khoản thành viên</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8">
                            <div class="form-group">
                                <label class="sr-only" for="username">Tên tài khoản</label>
                                <input type="text" name="register_username" class="form-control" placeholder="Tên đăng nhập" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" name="register_password" class="form-control"  placeholder="Mật khẩu" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" value="register" class="btn btn-block">
                                    Đăng ký
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng cửa sổ</button>
                    </div>
                </div>
            </div>
        </div>
    </li>';
}else
    {   
        echo' <li> <a href="#" class="btn btn-lg"> Chào,' .$_SESSION['nameUser']. '.</a></li>
            <li> <a href="cart.php" class="btn btn-lg"> Thanh toán </a> </li>; 
            <li> <a href="destroy.php" class="btn btn-lg"> Đăng xuất </a> </li>';
    }
?>

    </ul>
</div><!-- /.navbar-collapse -->