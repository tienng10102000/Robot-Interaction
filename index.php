<?php
session_start();
include "database/dbconnect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="TienNguyen">
    <title>Tương tác người máy</title>
    <!-- Bootstrap -->
    <link href="font-end/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-end/css/my.css" rel="stylesheet">
    <style>
  	@media(max-width:767px){
        #query_button {padding: 5px 20px;}
  	}
    </style>
</head>

<?php
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}

if (isset($_GET['response'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['response'] . '");
           </script>';
}

if(isset($_POST['submit']))
{
    if($_POST['submit']=="login")
    { 
        $username=$_POST['login_username'];
        $password=$_POST['login_password'];
        $query = "SELECT * FROM users WHERE UserName ='$username' AND Password='$password'";
        $result = mysqli_query($con,$query)or die(mysql_error());
        if(mysqli_num_rows($result) > 0)
        {
             $row = mysqli_fetch_assoc($result);
             $_SESSION['user']=$row['UserName'];
             $_SESSION['nameUser']=$row['nameUser'];
             print'
                <script type="text/javascript">alert("ĐĂNG NHẬP THÀNH CÔNG!!!");</script>
                  ';
        }
        else
        {    print'
              <script type="text/javascript">alert("ĐÃ SAI TÊN TÀI KHOẢN HOẶC MẬT KHẨU!!");</script>
                  ';
        }
    }
    else if($_POST['submit']=="register")
    {
        $username=$_POST['register_username'];
        $password=$_POST['register_password'];
        $query="SELECT * FROM users WHERE UserName = '$username'";
        $result=mysqli_query($con,$query) or die(mysql_error);
        if(mysqli_num_rows($result)>0)
        {   
            print'
            <script type="text/javascript">alert("TÊN TÀI KHOẢN NÀY ĐÃ TỒN TẠI");</script>
                ';
        }
        else
        {
        $query ="INSERT INTO users VALUES ('$username','$password')";
        $result=mysqli_query($con,$query);
        print'
            <script type="text/javascript">
            alert("ĐĂNG KÝ THÀNH CÔNG!!!");
            </script>
            ';
        }
    }
}
?>
<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                if(!isset($_SESSION['userName']))
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
                                                <label class="sr-only" for="password">mật khẩu</label>
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
                            <li> <a href="process/destroy.php" class="btn btn-lg"> Đăng xuất </a> </li>';
                    }?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div id="top" >
        <?php include "includes/searchBar.html"?>
        <div class="container-fluid" id="header">
            <div class="row">
                <div class="col-md-3 col-lg-3" id="category">
                    <?php include "includes/productsBook.html" ?>
                <div class="col-md-6 col-lg-6">
                    <?php include "includes/carousel.html"?>
                </div>
                <div class="col-md-3 col-lg-3" id="offer">
                    <?php include "includes/offer.html"?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center" id="new">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-1&category=new">
                    <div class="book-block">
                        <div class="tag">New</div>
                        <div class="tag-side"><img src="font-end/img/tag.png"></div>
                        <img class="book block-center img-responsive" src="font-end/img/new/1.jpg">
                        <hr>
                        Like A Love Song <br>
                        Rs 113  &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> 175 </span>
                        <span class="label label-warning">35%</span>
                    </div>
                </a>
            </div>
            
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-2&category=new">
                    <div class="book-block">
                        <div class="tag">New</div>
                        <div class="tag-side"><img src="font-end/img/tag.png"></div>
                        <img class="block-center img-responsive" src="font-end/img/new/2.jpg">
                        <hr>
                        General Knowledge 2017  <br>
                        Rs 68 &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> 120 </span>
                        <span class="label label-warning">43%</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-3&category=new">
                    <div class="book-block">
                        <div class="tag">New</div>
                        <div class="tag-side"><img src="font-end/img/tag.png"></div>
                        <img class="block-center img-responsive" src="font-end/img/new/3.png">
                        <hr>
                        Indian Family Bussiness Mantras <br>
                        Rs 400 &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> 595 </span>
                        <span class="label label-warning">33%</span>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="description.php?ID=NEW-4&category=new">
                    <div class="book-block">
                        <div class="tag">New</div>
                        <div class="tag-side"><img src="font-end/img/tag.png"></div>
                        <img class="block-center img-responsive" src="font-end/img/new/4.jpg">
                        <hr>
                        Kiran s SSC Mathematics Chapterwise Solutions <br>
                        Rs 289 &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> 435 </span>
                        <span class="label label-warning">33%</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="author">
        <h3 style="color:#4eb748;">TÁC GIẢ NỔI TIẾNG </h3>
        <div class="row">
            <div class="col-sm-5 col-md-3 col-lg-3">
                <a href="Author.php?value=Durjoy%20Datta"><img class="img-responsive center-block" src="font-end/img/popular-author/0.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Chetan%20Bhagat"><img class="img-responsive center-block" src="font-end/img/popular-author/1.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Dan%20Brown"><img class="img-responsive center-block" src="font-end/img/popular-author/2.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Ravinder%20Singh"><img class="img-responsive center-block" src="font-end/img/popular-author/3.jpg"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 col-md-3 col-lg-3">
                <a href="Author.php?value=Jeffrey%20Archer"><img class="img-responsive center-block" src="font-end/img/popular-author/4.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Salman%20Rushdie"><img class="img-responsive center-block" src="font-end/img/popular-author/5.jpg"><a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=J%20K%20Rowling"><img class="img-responsive center-block" src="font-end/img/popular-author/6.jpg"></a>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <a href="Author.php?value=Subrata%20Roy"><img class="img-responsive center-block" src="font-end/img/popular-author/7.jpg"></a>
            </div>
        </div>
    </div>

<?php include "includes/footer.html" ?>
<?php include "includes/suggestionBox.html" ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="font-end/js/bootstrap.min.js"></script>
</body>
</html>	