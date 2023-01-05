<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/Music_page_style.css" rel="stylesheet">
    <link href="CSS/Menu.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="CSS/Footer.css " rel="stylesheet">
    <title>MKD Entertaining Music</title>
</head>

<body>
    <!------------------------------------------------------------- Menu ------------------------------------------------------------->

    <nav class="nav">
        <div class="nav-menu">
            <div class="icon">
                <a href="#" class="name-group">MKD Team</a>
            </div>
            <div>
                <ul class="menu-items">
                    <?php
                    session_start();
                    require 'connect.php';
                    if (isset($_SESSION['username'])) {
                        echo "<li class='menu-link'><a class='menu-option'>" . $_SESSION['username'] . "</a></li>";
                    }
                    ?>
                    <li class="menu-link"><a href="music_page.php" class="menu-option">Nghe nhạc</a></li>
                    <li class="menu-link"><a href="../Movie/movie_page.php" class="menu-option">Xem phim</a></li>
                    <li class="menu-link"><a href="../manga_page.php" class="menu-option">Đọc truyện</a></li>
                    <li class="menu-link"><a href="search.php" class="menu-option">Tìm kiếm</a></li>
                    <?php
                    require 'connect.php';
                    if (isset($_SESSION['username'])) {
                        $check_account = "SELECT * FROM users WHERE user_name = '" . $_SESSION['username'] . "'";
                        $check_account_type = $conn->query($check_account);
                        if ($check_account_type->num_rows > 0) {
                            while ($row = $check_account_type->fetch_assoc()) {
                                if ($row['account_type'] == 1 or $row['account_type'] == 3) {
                                    echo "<li class='menu-link'><a href='song_manage.php' class='menu-option'>Quản lý nhạc</a></li>";
                                    echo "<li class='menu-link'><a href='logout.php' class='menu-option'>Đăng xuất</a></li>";
                                } else {
                                    echo "<li class='menu-link'><a href='logout.php' class='menu-option'>Đăng xuất</a></li>";
                                }
                            }
                        }
                    } else {
                        echo "<li class='menu-link'><a href='login.php' class='menu-option'>Đăng nhập</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="social">
                <a href="#" class="fa fa-facebook icon-social"></a>
                <a href="#" class="fa fa-youtube icon-social"></a>
                <a href="#" class="fa fa-github icon-social"></a>
            </div>
        </div>
    </nav>

    <!------------------------------x------------------------------ Menu ------------------------------x------------------------------>

    <!------------------------------------------------------------- Content ------------------------------------------------------------->
    <div class="content">
        <!------------------------------------------------------------- Sidebar 1 ------------------------------------------------------------->
        <div class="sidebar-one">
            <ul class="utility-list">
                <h1>Tiện ích</h1>
                <li><a href="" class="utility"><i class="bi bi-music-note-beamed"></i><span><b>Nhạc
                                mới</b></span></a></li>
                <li><a href="" class="utility"><i class="bi bi-grid"></i><span><b>Thể loại</b></span></a> </li>
                <li><a href="#" class="utility"><i class="bi bi-star"></i><span><b>Top 100</b></span></a></li>
                <li><a href="#" class="utility"><i class="bi bi-tv"></i><span><b>MV</b></span></a></li>
                <hr>
                <li><a href="#" class="utility"><i class="bi bi-boombox"></i><span><strong>Radio</strong></span></a>
                </li>
                <li><a href="#" class="utility"><i class="bi bi-disc"></i><span><strong>Playlist
                            </strong></span></a></li>
                <li><a href="#" class="utility"><i class="bi bi-lightbulb"></i><span><strong>Gợi ý</strong></span></a>
                </li>
            </ul>
        </div>
        <!------------------------------x------------------------------ Sidebar 1 ------------------------------x------------------------------>

        <!------------------------------------------------------------- Main ------------------------------------------------------------->
        <div class="main-content">

            <div class="search">
                <form class="search-form" action="" method="get">
                    <input class="search-input" type="text" placeholder="Tìm kiếm bài hát, nghệ sĩ, lời bài hát...">
                    <button class="search-button" type="submit"><img src="Images/search.png"></button>
                </form>
            </div>
            <!------------------------------------------------------------- Outstanding ------------------------------------------------------------->
            <h1>Nổi bật</h1>
            <div class="outstanding">
                <div class="outstanding-song">
                    <a href=""><img class="outstanding-image" src="Images/Song/Thế giới trong em.png"></a>
                    <b class="outstanding-song-name">Thế giới trong em</b>
                </div>
                <div class="outstanding-song">
                    <a href=""><img class="outstanding-image" src="Images/Song/Tại vì sao.png"></a>
                    <b class="outstanding-song-name">Tại vì sao</b>
                </div>
                <div class="outstanding-song">
                    <a href=""><img class="outstanding-image" src="Images/Song/Đáp án cuối cùng.png"></a>
                    <b class="outstanding-song-name">Đáp án cuối cùng</b>
                </div>
            </div>
            <p></p>
            <hr>
            <!------------------------------x------------------------------ Outstanding ------------------------------x------------------------------>
            <!------------------------------------------------------------- New-song ------------------------------------------------------------->
            <h1>Mới phát hành</h1>
            <div class="new-song-list">
                <div class="list">
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Làm sao xóa.png"></div>
                        <div class="new-song-info">
                            <h3><a href="#" class="song">Làm sao xóa</a></h3>
                            <h5><a href="#" class="singer">Dee Trần</a></h5>
                        </div>
                    </div>
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Tại vì sao.png"></div>
                        <div class="new-song-info">
                            <h3><a href="Tại vì sao.html" class="song">Tại vì sao</a></h3>
                            <h5><a href="https://zingmp3.vn/Nghiem-Vu-Hoang-Long" class="singer">MCK</a></h5>
                        </div>
                    </div>
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Yêu 3 năm dại 1 giờ.png"></div>
                        <div class="new-song-info">
                            <h3><a href="#" class="song">Yêu 3 năm dại 1 giờ</a></h3>
                            <h5><a href="#" class="singer">Chu Thúy Quỳnh</a></h5>
                        </div>
                    </div>
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Waiting for you.png"></div>
                        <div class="new-song-info">
                            <h3><a href="#" class="song">Waiting for you</a></h3>
                            <h5><a href="#" class="singer">MONO</a>, <a href="" class="singer">Onionn</a></h5>
                        </div>
                    </div>
                </div>
                <div class="list">
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Đáp án cuối cùng.png"></div>
                        <div class="new-song-info">
                            <h3><a href="Đáp án cuối cùng.html" class="song">Đáp án cuối cùng</a></h3>
                            <h5><a href="https://zingmp3.vn/Quan-A-P" class="singer">Quân A.P</a></h5>
                        </div>
                    </div>
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Khi ông mặt trời khóc.png"></div>
                        <div class="new-song-info">
                            <h3><a href="#" class="song">Khi ông mặt trời khóc</a></h3>
                            <h5><a href="#" class="singer">Tiên Tiên</a></h5>
                        </div>
                    </div>
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Tự tình 2.png"></div>
                        <div class="new-song-info">
                            <h3><a href="#" class="song">Tự tình 2</a></h3>
                            <h5><a href="#" class="singer">Trung Quân Idol</a></h5>
                        </div>
                    </div>
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Cô ta.png"></div>
                        <div class="new-song-info">
                            <h3><a href="#" class="song">Cô ta</a></h3>
                            <h5><a href="#" class="singer">Vũ</a></h5>
                        </div>
                    </div>
                </div>
                <div class="list">
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Em buông.png"></div>
                        <div class="new-song-info">
                            <h3><a href="#" class="song">Em buông</a></h3>
                            <h5><a href="#" class="singer">Hương Giang</a></h5>
                        </div>
                    </div>
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Từng là của nhau.png"></div>
                        <div class="new-song-info">
                            <h3><a href="#" class="song">Từng là của nhau</a></h3>
                            <h5><a href="#" class="singer">Bảo Anh</a>, <a href="" class="singer">Táo</a></h5>
                        </div>
                    </div>
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Thế giới trong em.png"></div>
                        <div class="new-song-info">
                            <h3><a href="#" class="song">Thế giới trong em</a></h3>
                            <h5><a href="#" class="singer">Hương Ly</a>, <a href="" class="singer">LY.M</a></h5>
                        </div>
                    </div>
                    <div class="new-song">
                        <div class="new-song-image"><img src="Images/Song/Sashimi.png"></div>
                        <div class="new-song-info">
                            <h3><a href="#" class="song">Sashimi</a></h3>
                            <h5><a href="#" class="singer">Chi Pu</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <hr>
            <!------------------------------x------------------------------ New-song ------------------------------x------------------------------>
            <!------------------------------------------------------------- Top-singer ------------------------------------------------------------->
            <h1>Ca sĩ yêu thích</h1>
            <div class="top-singer-list">
                <div class="singer-top">
                    <a href="https://zingmp3.vn/Nghiem-Vu-Hoang-Long">
                        <img src="Images/Singer/MCK.png">
                        <div class="singer-top-info">
                            <h3>MCK</h3>
                        </div>
                    </a>
                </div>
                <div class="singer-top">
                    <a href="https://zingmp3.vn/Phan-Manh-Quynh">
                        <img src="Images/Singer/Phan Mạnh Quỳnh.png">
                        <div class="singer-top-info">
                            <h3>Phan Mạnh Quỳnh</h3>
                        </div>
                    </a>
                </div>
                <div class="singer-top">
                    <a href="https://zingmp3.vn/Nguyen-Huong-Ly">
                        <img src="Images/Singer/Hương Ly.png">
                        <div class="singer-top-info">
                            <h3>Hương Ly</h3>
                        </div>
                    </a>
                </div>
                <div class="singer-top">
                    <a href="https://zingmp3.vn/nghe-si/Karik">
                        <img src="Images/Singer/Karik.png">
                        <div class="singer-top-info">
                            <h3>Karik</h3>
                        </div>
                    </a>
                </div>
                <div class="singer-top">
                    <a href="https://zingmp3.vn/Trung-Quan-Idol">
                        <img src="Images/Singer/Trung Quân Idol.png">
                        <div class="singer-top-info">
                            <h3>Trung Quân Idol</h3>
                        </div>
                    </a>
                </div>
            </div>
            <br>
            <hr>
            <!------------------------------x------------------------------ Top-singer ------------------------------x------------------------------>
            <!------------------------------------------------------------- Album ------------------------------------------------------------->
            <h1>Album Tháng 9</h1>
            <div class="album-list">
                <div class="album">
                    <a href="#">
                        <img src="Images/Album/Album 1.png">
                    </a>
                </div>
                <div class="album">
                    <a href="https://zingmp3.vn/album/V-Pop-Thang-9-2022-Quan-A-P-Huong-Giang-Phan-Manh-Quynh-Karik/69I8CU7C.html">
                        <img src="Images/Album/Album 2.png">
                    </a>
                </div>
                <div class="album">
                    <a href="#">
                        <img src="Images/Album/Album 3.png">
                    </a>
                </div>
                <div class="album">
                    <a href="#">
                        <img src="Images/Album/Album 4.png">
                    </a>
                </div>
                <div class="album">
                    <a href="https://zingmp3.vn/playlist/Soft-Jazz/6B6IEBEE.html">
                        <img src="Images/Album/Album 5.png">
                    </a>
                </div>
            </div>
            <!------------------------------x------------------------------ Album ------------------------------x------------------------------>
        </div>
        <!------------------------------x------------------------------ Main ------------------------------x------------------------------>

        <!------------------------------------------------------------- Sidebar 2 ------------------------------------------------------------->
        <div class="sidebar-two">
            <h1>BXH BÀI HÁT</h1>
            <ul>
                <li>
                    <span class="top-number top-song-1">1</span>
                    <div class="top-song-info top-1">
                        <h3><a href="Thế giới trong em.html" class="song">Thế giới trong em</a></h3>
                        <h4><a href="https://zingmp3.vn/Nguyen-Huong-Ly" class="singer">Hương Ly</a>, <a href="https://zingmp3.vn/nghe-si/LY-M" class="singer">LY.M</a></h4>
                    </div>
                    <img class="image-top" src="Images/Song/Thế giới trong em.png">
                </li>
                <li>
                    <span class="top-number top-song-2">2</span>
                    <div class="top-song-info top-2">
                        <h3><a href="Tại vì sao.html" class="song">Tại vì sao</a></h3>
                        <h4><a href="https://zingmp3.vn/Nghiem-Vu-Hoang-Long" class="singer">MCK</a></h4>
                    </div>
                    <img class="image-top" src="Images/Song/Tại vì sao.png">
                </li>
                <li>
                    <span class="top-number top-song-3">3</span>
                    <div class="top-song-info top-3">
                        <h3><a href="Đáp án cuối cùng.html" class="song">Đáp án cuối cùng</a></h3>
                        <h4><a href="https://zingmp3.vn/Quan-A-P" class="singer">Quân A.P</a></h4>
                    </div>
                    <img class="image-top" src="Images/Song/Đáp án cuối cùng.png">
                </li>
                <li>
                    <span class="top-number top-song-4">4</span>
                    <div class="top-song-info">
                        <h3><a href="https://www.nhaccuatui.com/bai-hat/em-lay-chong-khac-viet.01NZdH4IIPRq.html" class="song">Em lấy chồng</a></h3>
                        <h4><a href="#" class="singer">Khắc Việt</a></h4>
                    </div>
                    <img class="image-top" src="Images/Song/Em lấy chồng.png">
                </li>
                <li>
                    <span class="top-number top-song-5">5</span>
                    <div class="top-song-info">
                        <h3><a href="#" class="song">Waiting for you</a></h3>
                        <h4><a href="#" class="singer">MONO</a>, <a href="" class="singer">Onionn</a></h4>
                    </div>
                    <img class="image-top" src="Images/Song/Waiting for you.png">
                </li>
                <li>
                    <span class="top-number top-song-6">6</span>
                    <div class="top-song-info">
                        <h3><a href="#" class="song">Mặt mộc</a></h3>
                        <h4><a href="#" class="singer">Phạm Nguyên Ngọc</a>, <a href="" class="singer">Vanh</a>, <a href="" class="singer">Ân Nhi</a>, <a href="" class="singer">BMZ</a></h4>
                    </div>
                    <img class="image-top" src="Images/Song/Mặt mộc.png">
                </li>
                <li>
                    <span class="top-number top-song-7">7</span>
                    <div class="top-song-info">
                        <h3><a href="#" class="song">Dang dở</a></h3>
                        <h4><a href="#" class="singer">Nal</a>, <a href="" class="singer">CT</a></h4>
                    </div>
                    <img class="image-top" src="Images/Song/Dang dở.png">
                </li>
                <li>
                    <span class="top-number top-song-8">8</span>
                    <div class="top-song-info">
                        <h3><a href="#" class="song">Cô ta</a></h3>
                        <h4><a href="#" class="singer">Vũ</a></h4>
                    </div>
                    <img class="image-top" src="Images/Song/Cô ta.png">
                </li>
                <li>
                    <span class="top-number top-song-9">9</span>
                    <div class="top-song-info">
                        <h3><a href="#" class="song">Từng là của nhau</a></h3>
                        <h4><a href="#" class="singer">Bảo Anh</a>, <a href="" class="singer">Táo</a></h4>
                    </div>
                    <img class="image-top" src="Images/Song/Từng là của nhau.png">
                </li>
                <li>
                    <span class="top-number top-song-10">10</span>
                    <div class="top-song-info">
                        <h3><a href="#" class="song">Tòng phu</a></h3>
                        <h4><a href="#" class="singer">Keyo</a></h4>
                    </div>
                    <img class="image-top" src="Images/Song/Tòng phu.png">
                </li>
            </ul>
        </div>
        <!------------------------------x------------------------------ Sidebar 2 ------------------------------x------------------------------>
    </div>
    <!------------------------------x------------------------------ Content ------------------------------x------------------------------>

    <!------------------------------------------------------------- Footer ------------------------------------------------------------->
    <footer class="footer">
        <div class="container">
            <div class="about-us">
                <h2>Về Nhóm</h2>
                <p class="content-abu"><b>Các thành viên tham gia dự án gồm:</b><br>Nguyễn Hoài Nam - 2121050849<br>Trần
                    Văn Phương - 2121050295<br>Kiều Duy Phong - 2121050042</p><br><br>
                <hr>
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
                    <li><a href="" class="link-ft">Xem phim</a></li><br>
                    <li><a href="manga_page.html" class="link-ft">Đọc truyện</a></li><br>
                    <li><a href="" class="link-ft">Dịch vụ</a></li><br>
                </ul>
            </div>
            <div class="contact">
                <h2>Thông tin liên hệ</h2>
                <ul class="info">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <p>Số 18 Phố Viên<br>
                            Đông Ngạc, Bắc Từ Liêm, Hà Nội<br>
                            Việt Nam</p>
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <p><a href="#" class="contact-info">+84 962 382 512</a>
                            <br>
                            <a href="#" class="contact-info">+84 987 654 321</a>
                        </p>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <p><a href="#" class="contact-info">2121050295@student.humg.edu.vn</a><br>
                            <a href="#" class="contact-info">2121050849@student.humg.edu.vn</a><br>
                            <a href="#" class="contact-info">2121050042@student.humg.edu.vn</a>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="subscribe">
                <h2>Đăng ký email liên hệ</h2>
                <p>Vui lòng nhập email để nhận thông tin<br> cập nhật mới nhất:</p>
                <hr>
                <ul>
                    <li>
                        <form class="form">
                            <input type="email" class="form__field" placeholder="Subscribe Email" />
                            <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!------------------------------x------------------------------ Footer ------------------------------x------------------------------>
</body>

</html>