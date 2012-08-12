<?php
function showuser() {
        ?>
        <table width="100%" border="1">
        <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Tên</td>
                <td>Email</td>
                <td>Nhóm</td>
                <td>Active</td>
                <td>Ngày ĐK</td>
                <td>Sửa</td>
                <td>Xóa</td>
        </tr>
<?php
$queryuser = "SELECT * FROM user";
$resultuser = mysql_query($queryuser) or die(mysql_error());
while($row = mysql_fetch_array($resultuser)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['group']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td>".$row['reg_date']."</td>";
        echo "<td><a href='index.php?admin=users&do=edituser&userid=".$row['id']."'>Sửa</a></td>";
        echo "<td><a href='index.php?admin=users&do=deleteuser&userid=".$row['id']."'>Xóa</a></td>";
        echo "</tr>";
}
?>
</table>
<?php
}

function adduser() {
        echo "Add user<br />";
        include('formuser.php');
}

function edituser($id) {
        $queryuser = "SELECT * FROM user WHERE id=".$id;
        $resultuser = mysql_query($queryuser) or die(mysql_error());
        while($row = mysql_fetch_array($resultuser)) {
                $username = $row['username'];
                $password = $row['password'];
                $name = $row['name'];
                $email = $row['email'];
                $group = $row['group'];
                $status = $row['status'];
                $phone = $row['phone'];
        }
        include('formedit.php');
        echo "Edit user".$id;
}

function deleteuser($id) {
        $querydeluser = "DELETE FROM user WHERE id=".$id;
        mysql_query($querydeluser) or die(mysql_error());
        echo "Xoa thanh cong";
}

function add() {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $group = $_POST['group'];
        if($_POST['status'] == 'on') {
                $status = 1;
        } else {
                $status = 0;
        }

        $queryadduser = "INSERT INTO `user`(`username`, `password`, `name`, `email`, `phone`, `reg_date`, `group`, `status`) VALUES ('$username','$password','$name','$email','$phone',NOW(),'$group','$status')";
        mysql_query($queryadduser) or die ('fuck');
        echo "Thêm thành công";       

        
}

function save() {
        $id = $_POST['userid'];
        $username = $_POST['username2'];
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $group = $_POST['group'];
        if($_POST['status'] == 'on') {
                $status = 1;
        } else {
                $status = 0;
        }

        if(isset($_POST['newpassword'])) {
               $password = md5($_POST['newpassword']);
               $queryx2 = "UPDATE `user` SET `username`='$username',`password`='$password',`name`='$name',`email`='$email',`phone`='$phone',`group`='$group',`status`='$status' WHERE id=".$id;
        } else {
                $queryx2 = "UPDATE `user` SET `username`='$username',`name`='$name',`email`='$email',`phone`='$phone',`group`='$group',`status`='$status' WHERE id=".$id;
        }
        //$queryx2 = "UPDATE `user` SET `username`='$username',`password`='$password',`name`='$name',`email`='$email',`phone`='$phone',`group`='$group',`status`='$status' WHERE id=".$id;
        //echo $queryx2;
        mysql_query($queryx2) or die (mysql_error());
        echo "Sửa thành công";
}
?>