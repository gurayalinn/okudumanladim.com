<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $password = $_POST["password"];
  $username = $_POST["username"];
  xss_clean($username);
  if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}

$sql = "SELECT uid FROM users WHERE username = ? AND password = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('ss', $_POST['username'], $_POST['password']);
$stmt->execute();
$stmt->store_result();

mysqli_real_escape_string($con, $username);

$sql = "SELECT uid FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$active = $row['id'];
$count = mysqli_num_rows($result);
if ($count == 1) {
  $_SESSION['login_user'] = $username;
   header("location: login.php");
 } else {
if ($stmt->num_rows == 1) {
$row = $stmt -> fetch();

if (isset($_POST["remember_me"]) && $_POST["remember_me"] == 'on') {
setcookie('username', $username, time() + (86400 * 30), "/");
setcookie('password', $password, time() + (86400 * 30), "/");
}

header('Location: index.php');
exit();
} else {
$error_message = "Kullanıcı adı veya şifre hatalı";
}
$stmt->close();

}

}
?>

<h2>Giriş Yap</h2>

<?php if (isset($error_message)) : ?>
<p style="color: red;"><?php echo $error_message; ?></p>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="username">Kullanıcı Adı:</label>
  <input type="text" name="username" required><br>

  <label for="password">Şifre:</label>
  <input type="password" name="password" required><br>
  <label>
    <input type="checkbox" name="remember_me"> Beni Hatırla
  </label><br>
  <button type="submit">Giriş Yap</button>
</form>