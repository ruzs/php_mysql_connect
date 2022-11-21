<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>教師註冊</title>
  <style>
    *{
      font-family: 微軟正黑體;
      text-align: center;
    }
    div{
      margin: 10px;
    }
  </style>
</head>
<body>
  <h1>教師註冊</h1>
  <form action="./api/reg_user.php" method="post">
    <div><label for="">帳號：<input type="text" name="acc"></label></div>
    <div><label for="">密碼：<input type="password" name="pw"></label></div>
    <div><label for="">信箱：<input type="text" name="email"></label></div>
    <div><label for="">姓名：<input type="text" name="name"></label></div>
    <div>
      <label for=""><input type="submit" value="註冊"></label></div>
      <label for=""><input type="reset"value="重置"></label></div>
  </form>
</body>
</html>