<?php
include('connectToDb.php');

$queryResult  =  mysql_query("select * from questions group by id desc")or die(mysql_error());

$queryOrders = mysql_query("select * from orders group by id desc ") or die(mysql_error());

$queryStatements = mysql_query("select * from statements group by id desc ") or die(mysql_error());

echo("<!DOCTYPE html>
<html>
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />
<meta name='viewport' content='width=device-width, initial-scale=0.4'/>
<head>
    <title>Wreck This Journal</title>
    <link rel='shortcut icon' href='img/ks.jpeg' />
    <link rel='stylesheet' href='css/styleParallax.css'>
    <link rel='stylesheet' href='css/start.css'>
    <link rel='stylesheet' href='css/hover.css'>
    <link rel='stylesheet' href='css/review.css'>
    <link rel='stylesheet' href='css/animations.css'>
      <style>

          input:focus{
              outline: none;
          }

          table{
          border-collapse: collapse;
          border: 2px solid #000000;
          }

          th{
          font-family: 'Open Sans', sans-serif bold;
          }
          td,th{
             padding: 3px;
             border: 1px solid #000000;
          }

      </style>
            </head>

<body>
    <script language='JavaScript'>
          if (top.location.search=='') {
             pass = prompt('Введите пароль');
             if (pass=='2') // Ваш пароль акивации
               { alert('Пароль принят') }
               else { alert('Пароль непринят!'), top.location.href='errorpas.htm' }//Адрес страниц на которую перейдет пользователь при ошибке
 };
</script>");

echo("
    <h2 align = 'center'>Отзывы</h2>
    <table style='margin: auto; width: 800px'>
     <tr>
        <th>Номер записи</th><th>Автор</th><th>Вопрос</th><th>Ответ</th><th>Адрес</th><th>Статус сообщения</th>
    </tr>");
while ($data = mysql_fetch_array($queryResult)){

      if($data['answered'] == true){
          $checker = "ответ дан";
      }else{
          $checker = "в ожидании";
      }

      if($data['answer'] == null){
          $checkAnswer = "ожидает";
      }else{
          $checkAnswer = $data['answer'];
      }
 echo("
      <tr>
          <td>$data[id]</td><td>$data[name]</td><td style='width: 300px'>$data[question]</td><td>$checkAnswer</td><td>$data[email]</td><td>$checker</td>
      </tr>
      ");
}
echo("</table>
      <br>
      <br>
      <form method='post' action='controller.php' enctype='multipart/form-data' align='center'>
      <table style='margin: auto'>
        <tr>
          <td><label>Номер записи: </label><input type='text' name ='shit'  pattern='^[ 0-9]+$' style='width: 64px; margin-top: -120px'/></td>
          <td ><label>Почта клиента: </label><input type='email' name ='email'   style='width: 150px; margin-top: -20px'/></td>
        </tr>
          <tr>
         <td colspan='2'><textarea name='answer' rows='6' cols='80'></textarea><br></td>
         </tr>
      </table>
        <input type='submit' name='btnanswer' value='Оформить'/>
         <input type='submit' name='delete' value='Удалить'/>
      </form><br><br>

      ");

echo("
  <h2 align = 'center'>Заказы</h2>
   <table style='margin: auto; width: 800px'>
     <tr>
        <th>Номер записи</th><th>Заказчик</th><th>Почта</th><th>Город</th><th>Телефон</th><th>Статус сообщения</th>
    </tr>");


while ($dataOrders = mysql_fetch_array($queryOrders)){

    if($dataOrders['answered'] == true){
        $checkerOrders = "ответ дан";
    }else{
        $checkerOrders = "в ожидании";
    }


    echo("
      <tr>
          <td>$dataOrders[id]</td><td>$dataOrders[name]</td><td style='width: 300px'>$dataOrders[email]</td><td>$dataOrders[city]</td><td>$dataOrders[phone]</td><td>$checkerOrders</td>
      </tr>
      ");
}
echo("</table>
      <br>
      <br>
      <form method='post' action='controller.php' enctype='multipart/form-data' align='center'>
      <table style='margin: auto'>
        <tr>
          <td><label>Номер записи: </label><input type='text' name ='num'  pattern='^[ 0-9]+$' style='width: 64px; margin-top: -120px'/></td>
          <td ><label>Почта клиента: </label><input type='email' name ='emailOrder'   style='width: 150px; margin-top: -20px'/></td>
         </tr>
      </table>
        <input type='submit' name='approve' value='Подтвердить'/>
         <input type='submit' name='del' value='Удалить'/>
      </form><br><br>

      ");

//Заявки

echo("
  <h2 align = 'center'>Заявки</h2>
   <table style='margin: auto; width: 800px'>
     <tr>
        <th>Номер записи</th><th>Заказчик</th><th>Почта</th><th>Телефон</th><th>Статус сообщения</th>
    </tr>");


while ($dataStatements = mysql_fetch_array($queryStatements)){

    if($dataStatements['answered'] == true){
        $checkerStatements = "ответ дан";
    }else{
        $checkerStatements = "в ожидании";
    }


    echo("
      <tr>
          <td>$dataStatements[id]</td><td>$dataStatements[name]</td><td style='width: 300px'>$dataStatements[email]</td><td>$dataStatements[phone]</td><td>$checkerStatements</td>
      </tr>
      ");
}
echo("</table>
      <br>
      <br>
      <form method='post' action='controller.php' enctype='multipart/form-data' align='center'>
      <table style='margin: auto'>
        <tr>
          <td><label>Номер записи: </label><input type='text' name ='numOfState'  pattern='^[ 0-9]+$' style='width: 64px; margin-top: -120px'/></td>
          <td ><label>Почта клиента: </label><input type='email' name ='emailStatement'   style='width: 150px; margin-top: -20px'/></td>
         </tr>
      </table>
        <input type='submit' name='approveState' value='Подтвердить'/>
         <input type='submit' name='delState' value='Удалить'/>
      </form><br><br>

      ");


echo("</body>
</html>");

