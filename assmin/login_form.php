<?php
if(!isset($NOTDIRECT)) {
    die ("Fuck you");   
} else {  
    $num1 = rand(1,9);
    $num2 = rand(1,9);
    $ope = $num1 + $num2;    
?>

    <!-- Login Form -->
    <form>
    </form>
    <script type="text/javascript">
        function hideshow(){
            var regf = document.getElementById('register-form');
            var logf = document.getElementById('login-form');
            if (regf.style.display == "block") {
                regf.style.display = "none";
            } else {
                regf.style.display="block";
            }
        }
    </script>
    <div id="login-form">

        <h1 class="title">Log In to Admin Panel</h1>
        <form method="post" action="index.php">
        <p><strong>Username:</strong> <input type="text" name="user" autocomplete="false" /></p>
        <p><strong>Password:</strong> <input type="password" name="pwd" autocomplete="false" /></p>
        <p><strong>Anti-Spam:</strong> <em><?php echo $num1." + ".$num2 ?></em> = <input type="text" value="" name="result" autocomplete="false" size="13"/></p>
        <input type="hidden" value="<?php echo $ope; ?>" name="ope" />
        <p><input type="submit" value="Log In"/> <input type="button" value="Show/Hide Register" onclick="javascript:hideshow()"/></p>
        </form>
    <div>

    <div id="register-form" style="display: none">
        <h1 class="title">Register Form</h1>
        <form method="" action="">
        <p><strong>Username:</strong> <input type="text" name="user" autocomplete="false" /></p>
        <p><strong>Password:</strong> <input type="password" name="pwd" autocomplete="false" /></p>
        <p><strong>Password:</strong> <input type="password" name="pwd" autocomplete="false" /></p>
        <p><strong>Password:</strong> <input type="password" name="pwd" autocomplete="false" /></p>
        <p><strong>Password:</strong> <input type="password" name="pwd" autocomplete="false" /></p>
        <p><strong>Password:</strong> <input type="password" name="pwd" autocomplete="false" /></p>
        <p><strong>Password:</strong> <input type="password" name="pwd" autocomplete="false" /></p>
        <p><strong>Anti-Spam:</strong> <em><?php echo $num1." + ".$num2 ?></em> = <input type="text" value="" name="result" autocomplete="false" size="13"/></p>
        <input type="hidden" value="<?php echo $ope; ?>" name="ope" />
        <p><input type="submit" value="Register"/></p>
        </form>
    </div>
<?php
}
?>
