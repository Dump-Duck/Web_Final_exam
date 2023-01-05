<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comic</title>
        <link rel="stylesheet" href="CSS/style_manga.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!--Navigation-->
        <nav class="nav">
            <div class="nav-menu">
                <div class="icon">
                    <a href="#" class="name-group">Nhóm ...</a>
                </div>
                <div>
                    <ul class="menu-items">
                        <li class="menu-link"><a href="Music/music_page.php" class="menu-option">Music</a></li>
                        <li class="menu-link"><a href="Movie/movie_page.php" class="menu-option">Watch</a></li>
                        <?php 
                            require 'connect.php';
                            session_start();
                            error_reporting(0);
                            // $admin = $_SESSION['username'];
                            // $check_admin = "select account_type from users where user_name = '$admin'";
                            // $check_admin_result = $conn->query($check_admin);
                            // if($check_admin_result-> num_rows > 0) {
                            //     while($row = $check_admin_result->fetch_assoc()) {
                            //         if($row['account_type']==1) {
                            //             echo "<li class='menu-link'><a href='' class='menu-option'>Manage Users</a></li>";
                            //         }
                            //     }
                            // }
                            if(isset($_SESSION['username'])) {
                                echo "<li class='menu-link'><a href='#' class='menu-option'>".$_SESSION['username']."</a></li>";
                                echo "<li class='menu-link'><a href='logout.php' class='menu-option'>Logout</a></li>
                                    <li class='menu-link'><a href='change_password.php' class='menu-option'>Change Password</a></li>";
                            } else { echo "<li class='menu-link'><a href='login.php' class='menu-option'>Login</a></li>"; }
                        ?>
                    </ul>
                </div>
                <div class="search-area">
                    <form class="form-search" method="get" action="search_result.php">
                        <input type="text" name="category" placeholder="Search comic" class="search-box">
                    </form>
                </div>
                <div class="btn">
                    <div class="btn_list_dark">
                        <button class="btn_dark"></button>  
                    </div>

                    <div class="btn_list_light">
                        <button class="btn_light"></button>  
                    </div>
                </div>

                <div class="social">
                    <a href="#" class="fa fa-facebook icon-social"></a>
                    <a href="#" class="fa fa-youtube icon-social"></a>
                    <a href="#" class="fa fa-github icon-social"></a>
                </div>
            </div>
        </nav>

        <!--main-->
        <main>
            <div class="inner">
                <div class="container">
                    <ul class="nav-bar main-menu">
                        <li class="main-option"><?php 
                                                    require 'connect.php';
                                                    $acc = $_SESSION['username'];
                                                    $check_account_type = "select account_type from users where user_name='$acc'";
                                                    $check_result = $conn->query($check_account_type);
                                                    if($check_result-> num_rows > 0){
                                                        while($row = $check_result->fetch_assoc()) {
                                                            if($row['account_type']==1 or $row['account_type']==3) {
                                                                echo "<a href='create.php' class='in-menu'>Create new content</a></li>
                                                                <li class='main-option'><a href='manage_upload.php' class='in-menu'>Manage Upload</a></li>";
                                                            }
                                                        }
                                                    }
                                                    
                                                ?>
                        <li class="main-option"><a href="" class="in-menu">Save</a></li>
                        <li class="main-option drop-down"><button class="dropbtn">Choose type</button>
                        <div class="dropdown-content">
                            <?php 
                                require 'connect.php';
                                $type_contents = "select * from type_contents";
                                $type_of_content = $conn->query($type_contents);
                                if($type_of_content->num_rows > 0) {
                                    while ($type = $type_of_content->fetch_assoc()) {
                                        echo "<a href='search_result.php?category=".$type['id']."' class='filteropt'>".$type['type_of_content']."</a>";
                                    }
                                }
                            ?>
                        </div></li>
                    </ul>
                </div>
            </div>
            <div>
                <h1>Manga</h1>
                <?php
                    $manga = "select * from contents where type_content = 1";
                    $manga_query = $conn->query($manga);
                    if($manga_query->num_rows > 0){
                        while($mg = $manga_query->fetch_assoc()){
                            echo "<div class='dropdown'>
                                        <img src='img/".$mg['cover_img']."' alt='".$mg['name']."' class='min-img' width='200' height='275'>
                                        <a href='info_comic.php?id=".$mg['id']."' class='name-title'><b>".$mg['name']."</b></a>
                                        <div class='dropdowncontent'>
                                            <img src='img/".$mg['cover_img']."' alt='".$mg['name']."' width='250' height='300'>
                                            <div class='desc'><b>".$mg['name']."</b>
                                                <p>".$mg['description']."</p>
                                            </div>
                                        </div>
                                    </div>";
                        }
                    }
                ?>
            </div>
                <div>
                    <h1>Light Novel</h1>
                    <?php
                        $light_novel = "select * from contents where type_content = 2";
                        $light_novel_query = $conn->query($light_novel);
                        if($light_novel_query->num_rows > 0){
                            while($ln = $light_novel_query->fetch_assoc()){
                                echo "<div class='dropdown'>
                                            <img src='img/".$ln['cover_img']."' alt='".$ln['name']."' class='min-img' width='200' height='275'>
                                            <a href='info_comic.php?id=".$ln['id']."' class='name-title'><b>".$ln['name']."</b></a>
                                            <div class='dropdowncontent'>
                                                <img src='img/".$ln['cover_img']."' alt='".$ln['name']."' width='250' height='300'>
                                                <div class='desc'><b>".$ln['name']."</b>
                                                    <p>".$ln['description']."</p>
                                                </div>
                                            </div>
                                        </div>";
                            }
                        }
                    ?>
                </div>
                <div>
                    <h1>Composed</h1>
                    <?php
                        $composed = "select * from contents where type_content = 3";
                        $composed_query = $conn->query($composed);
                        if($composed_query->num_rows > 0){
                            while($cp = $composed_query->fetch_assoc()){
                                echo "<div class='dropdown'>
                                            <img src='img/".$cp['cover_img']."' alt='".$cp['name']."' class='min-img' width='200' height='275'>
                                            <a href='info_comic.php?id=".$cp['id']."' class='name-title'><b>".$cp['name']."</b></a>
                                            <div class='dropdowncontent'>
                                                <img src='img/".$cp['cover_img']."' alt='".$cp['name']."' width='250' height='300'>
                                                <div class='desc'><b>".$cp['name']."</b>
                                                    <p>".$cp['description']."</p>
                                                </div>
                                            </div>
                                        </div>";
                            }
                        }
                    ?>
                </div>
            </div>
        </main>

        <!-- Sidebar -->
        <div class="sidebar">
            <h3 id="sidebar-title">Xem gần đây</h3><hr>
            <ul class="recent">
                <li>
                    <img src="Pic/Kanokari.jpg" class="recent-img" width="90" height="90">
                    <a href="#" class="recent-name"><b>Rent a Girlfriend</b></a><br><br>
                    <a href="#" class="recent-chap"><span><i>Chap 190</i></span></a>
                </li><br><br><hr>
                <li>
                    <img src="Pic/Naruto.webp" class="recent-img" width="90" height="90">
                    <a href="#" class="recent-name"><b>Naruto</b></a><br><br>
                    <a href="#" class="recent-chap"><span><i>Chap 590</i></span></a>
                </li><br><br><hr>
                <li>
                    <img src="Pic/one-piece-109423.jpg" class="recent-img" width="90" height="90">
                    <a href="#" class="recent-name"><b>One Piece</b></a><br><br>
                    <a href="#" class="recent-chap"><span><i>Chap 1010</i></span></a>
                </li><br><br><hr>
                <li>
                    <img src="Pic/one-piece-109423.jpg" class="recent-img" width="90" height="90">
                    <a href="#" class="recent-name"><b>One Piece</b></a><br><br>
                    <a href="#" class="recent-chap"><span><i>Chap 1010</i></span></a>
                </li><br><br><hr>
            </ul>
        </div>
        <footer class="footer">   
            <div class="container">
                <div class="about-us">
                    <h2>Về Nhóm</h2>
                    <p class="content-abu"><b>Các thành viên tham gia dự án gồm:</b><br>Nguyễn Hoài Nam - 2121050849<br>Trần Văn Phương - 2121050295<br>Kiều Duy Phong -  </p><br><br><hr>
                    <ul class="social-icon">
                        <li><a href="" class="social ft"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="" class="social ft"><i class="fa fa-github"></i></a></li>
                        <li><a href="" class="social ft"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="links">
                    <h2>Đường dẫn</h2>
                    <ul class="link">
                        <li><a href="music_page.html" class="link-ft">Nghe nhạc</a></li><br>
                        <li><a href="trang_chu_tube.html" class="link-ft">Xem phim</a></li><br>
                        <li><a href="manga_page.html" class="link-ft">Đọc truyện</a></li><br>
                        <li><a href="" class="link-ft">Dịch vụ</a></li><br>
                    </ul>
                </div>
                <div class="contact">
                    <h2>Thông tin liên hệ</h2>
                    <ul class="info">
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <p>18 Phố Viên<br />
                                Quận Bắc Từ Liêm, Thành Phố Hà Nội<br />
                                Việt Nam</p>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <p><a href="#" class="contact-info">+84 123 456 789</a>
                                <br />
                                <a href="#" class="contact-info">+84 987 654 321</a></p>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <p><a href="#" class="contact-info">2121050849@student.humg.edu.vn</a></p><br>
                       </li>
                    </ul>
                </div>
                <div class="subscribe"><h2>Đăng ký liên hệ</h2>
                    <p>Vui lòng nhập số điện thoại để nhận thông tin<br> cập nhật mới nhất:</p><hr>
                    <ul>
                        <li>
                            <form class="form">
                                <input type="text" class="form__field" placeholder="Subscribe Phone" />
                                <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>
    <script src="Javascript/change_background_color.js"></script>
    <script src="Javascript/onkeyup.js"></script>
</html>