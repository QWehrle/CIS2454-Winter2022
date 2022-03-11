<?php include './views/header.php' ?>



<br>
<?php
if (isset($message)) {
    echo "$message <br>";
}

if (isset($_SESSION['is_logged_in_as_admin'])) {
    echo "Welcome " . $_SESSION['username'];
    ?>
    <form action="login.php" method="post">
        <input type="hidden" name="action" value="logout"/><br>
        <input type="submit" value="Logout"/>
    </form>
<?php } else { ?>

    <form action="login.php" method="post">
        <label>User Name</label>
        <input type="text" name="username"/><br>
        <label>Password</label>
        <input type="password" name="password"/><br>

        <input type="submit" value="Login"/>
    </form>
<?php } ?>
<br>

<?php include './views/footer.php' ?>