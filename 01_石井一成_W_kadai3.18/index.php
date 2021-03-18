<?php

session_start();

if(!isset($_SESSION['money']) || !isset($_POST['start'])){
  $_SESSION['money'] = 1000;
}

if(isset($_POST['start'])){
  if($_SESSION['money'] > 0){
  $_SESSION['money'] -= 100;
  $reel_1 = rand(1,3);
  $reel_2 = rand(1,3);
  $reel_3 = rand(1,3);

    if($reel_1==$reel_2 && $reel_1==$reel_3){
      $_SESSION['money'] += 500;
      $message = $message."<span>当たり！！500ポイントゲット！</span><br /><br />".PHP_EOL;
    }else{
      $message = $message."残念！<br /><br />".PHP_EOL;
    }
  }else{
    $message = $message."ポイントが足りないよ！<br /><br />";
  }
  $message = $message."あなたのポイント：".$_SESSION['money']."ポイント<br /><br />";
}

if($_SESSION['money'] > 0 && $_SESSION['money'] < 1200 ){
  $buttonName = 'start';
  $buttonValue = 'スロットをまわす！';
}elseif($_SESSION['money'] >= 1200){
  echo '<img src="img/4.png"/>';
  $buttonName = 'finish';
  $buttonValue = 'パスワードが表示されたよ↑';
}else{
  $buttonName = 'replay';
  $buttonValue = 'ゲームオーバー（再チャレンジする？）';
}
?>

<html>
<head>
<meta charset="utf-8" />
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>どうぶつスロット</title>
  <link rel='stylesheet' href='reset.css'>
  <link rel='stylesheet' href='style.css'>
  <link rel="stylesheet" type="text/css" href="http://mplus-fonts.sourceforge.jp/webfonts/general-j/mplus_webfonts.css">
</head>

<body>

<header>
<h1>どうぶつスロット</h1>
</header>

<main>
<p class="explanation">スロット一回100ポイント<br>当たりが出たら500ポイント<br>1200ポイントを超えるとパスワードが表示されるよ</p>

<?php
if($reel_1===1){
    echo '<img src="img/1.png"/>';
}
if($reel_2===1){
    echo '<img src="img/1.png"/>';
}
if($reel_3===1){
    echo '<img src="img/1.png"/>';
}
if($reel_1===2){
    echo '<img src="img/2.png"/>';
}
if($reel_2===2){
    echo '<img src="img/2.png"/>';
}
if($reel_3===2){
    echo '<img src="img/2.png"/>';
}
if($reel_1===3){
    echo '<img src="img/3.png"/>';
}
if($reel_2===3){
    echo '<img src="img/3.png"/>';
}
if($reel_3===3){
    echo '<img src="img/3.png"/>';
}
?>

<br><?php echo $message; ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input id="button1" type="submit" name="<?php echo $buttonName; ?>" value="<?php echo $buttonValue; ?>" />
</form>

</main>

<footer>

<form action="index.php" method="POST">
    <p>Please enter the password!：<input type="password" name="password"></p>
    <input id="button2" type="submit" name="login" value="OK!">
</form>

<?php
session_start();

if(isset($_POST["login"])) {

    if($_POST["password"] == "hippopotamus") {
        $_SESSION["password"] = $_POST["password"];
        $login_success_url = "login_success.php";
        header("Location: {$login_success_url}");
        exit;
      }else{
        echo "※Your password is incorrect! Please enter again!";
          }
}
?>
</footer>
</body>
</html>