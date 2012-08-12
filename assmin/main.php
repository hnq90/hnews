<?php
if(!isset($NOTDIRECT)) {
    die ("Fuck you");   
} else {   
?>
<!-- MAIN -->
    <div id="container">
        <div id="navigator">
            <a href="index.php">Home</a> |
            <a href="/hnews">Index</a> |
      		<a href="?admin=logout">Log Out</a>
        </div>
        <div id="header">
            LOGO HERE
            <h2>HNews' Admin Panel</h2>
        </div>
        <div id="sidebar">
            <div class="padding">
                <?php include('sidebar.php'); ?>
            </div>
        </div>
        <div id="content">
            <div class="padding">
            <?
            if(isset($_GET['admin'])) {
                $do = $_GET['admin'];
                switch($do) {
                    case 'logout':
                        session_destroy();
                        header('refresh: 0; url=index.php');
                        break;
                    case 'ads':
                        echo "<h2>Trang quản lý quảng cáo</h2><br />";
                        include('mads.php');
                        break;
                    case 'addnews':
                        echo "<h2>Gửi bài viết mới</h2><br />";
                        include_once('newsf/addnews.php');
                        break;
                    case 'editnews':
                        echo "<h2>Xem / Sửa / Xóa bài viết</h2><br />";
                        include_once('newsf/editnews.php');
                        break;
                    case 'categories':
                        echo "<h2>Trang quản lý chuyên mục</h2><br />";
                        include('mcat.php');
                        break;
                    case 'users':
                        echo "<h2>Quản lý người dùng</h2><br />";
                        include_once('userf/muser.php');
                        break;
                    case 'comments':
                        echo "<h2>Trang quản lý bình luận</h2><br />";
                        include('mcomments.php');
                        break;
                    case 'config':
                        echo "<h2>Trang cấu hình hệ thống</h2><br />";
                        include ('mconfig.php');
                        break;
                    default:
                        echo "<h2>Trang quản lý tin tức HNews</h2><br />";
                        break;
                }
            } else {
                echo "Trang quản lý tin tức HNews<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
            }
            ?>
        </div>
        </div>  
        </div>
        <div id="footer">
            <div id="navi2">
        		<a href="index.php">Home</a> |
                <a href="/hnews">Index</a> |
                <a href="?admin=logout">Log Out</a>
        	</div>
            <div id="powered">Powered by HNews v0.1 - HNQ</div>
        </div>
    </div>
    <?php
    }
    ?>