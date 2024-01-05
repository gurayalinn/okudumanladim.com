<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST["username"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
xss_clean($username);


if ($password != $confirm_password) {
$error_message = "Parolalar eşleşmiyor";
} else {

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $con->query($sql);
$result = $con->prepare($sql);
$result->execute();
if($result->execute()) {
        while($rows = $result->fetch()) {
                $fetch[] = $rows;
            }
            return $fetch;
        }
        else {
            return false;
        }
if ($rows > 0) {
$error_message = "Bu kullanıcı adı zaten kullanılıyor";
} else {

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$insert_sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

if ($con->query($insert_sql) === TRUE) {
session_start();
$_SESSION['uid'] = $con->insert_id;
header('Location: index.php');
exit();
} else {
$error_message = "Kayıt sırasında bir hata oluştu";
}
}
}
}
?>

<h2>Kayıt Ol</h2>
<?php if (isset($error_message)) : ?>
<p style="color: red;"><?php echo $error_message; ?></p>
<?php endif; ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="username">Kullanıcı Adı:</label>
  <input type="text" name="username" required><br>

  <label for="password">Şifre:</label>
  <input type="password" name="password" required><br>

  <label for="confirm_password">Şifre (Tekrar):</label>
  <input type="password" name="confirm_password" required><br>

  <button type="submit" name="signup">Kayıt Ol</button>
</form>