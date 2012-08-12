<a href="index.php?admin=users&do=adduser"><strong>Thêm thành viên mới</strong></a> <br /><br />
<br />
<?php
error_reporting(E_ALL);
require('function.php');
if(isset($_GET['do'])) {
        $do = $_GET['do'];
        switch ($do) {
                case 'edituser':
                        edituser($_GET['userid']);
                        break;
                
                case 'adduser':
                        adduser();
                        break;
                case 'deleteuser':
                        deleteuser($_GET['userid']);
                        //showuser();
                        break;
                case 'add':
                        add();
                        //showuser();
                        break;
                case 'save':
                        save();
                        break;
        }
}       
showuser();
?>