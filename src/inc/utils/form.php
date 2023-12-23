<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="text" name="text">
  <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $text = $_REQUEST['text'];
  if (empty($text)) {
    echo "empty";
  } else {
    echo $text;
  }
}
?>