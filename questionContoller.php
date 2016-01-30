<?php
include('connectToDb.php');
require ('phpmailer/PHPMailerAutoload.php');

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$answered = false;
$btn = $_POST['send'];

$mailEmail = htmlspecialchars($_REQUEST['email']);
$mailName = htmlspecialchars($_REQUEST['name']);
$mailComment = htmlspecialchars($_REQUEST['comment']);
$message = "<b>Комментарий:  <b>".$mailName.' <br></br> <b>
Его почта: '.$mailEmail.'
<br>Комментарий: '.$mailComment.'<br>
<a href= http://уничтожьменя.рф/answerController.php>Ссылка на контроллер </a>';



if(isset($btn)){

 $query = mysql_query("insert into questions(name, email, answered, question) values ('$name', '$email', '$answered', '$comment')");

    $mailer = new PHPMailer;

    $mailer->isSMTP();

    $mailer->Host = 'smtp.mail.ru';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'pashebor@mail.ru';//Логин
    $mailer->Password =  'ltvmzyjd90';//пароль
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = '465';
    $mailer->CharSet = 'UTF-8';



    $mailer->From = 'pashebor@mail.ru';
    $mailer->FromName = 'Wreck This Journal';
    $mailer->addAddress('pashebor@gmail.com', 'Уничтожь меня');
    $mailer->addAddress('chaser-vampire@rambler.ru', 'Уничтожь меня');
    $mailer->addAddress('wreckthisjournal@mail.ru', 'Уничтожь меня');
    $mailer->isHtml(true);
    $mailer->Subject = 'Комментарий';
    $mailer->Body = $message;

    if($query && $mailer->send()){
        echo("<!DOCTYPE html>
<html>
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />
<meta name='viewport' content='width=device-width, initial-scale=0.4'/>
<head>
    <title>Wreck This Journal</title>
    <link rel='shortcut icon' href='img/ks.jpeg' />
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='css/start.css'>
    <link rel='stylesheet' href='css/hover.css'>
    <link rel='stylesheet' href='css/review.css'>
    <link rel='stylesheet' href='css/animations.css'>

    <script src='js/jquery-1.11.3.js'></script>
    <!--Появление-->
    <script>
        $(window).scroll(function() {
            $('#review').each(function(){
                var imagePos = $(this).offset().top;

                var topOfWindow = $(window).scrollTop();
                if (imagePos < topOfWindow+400) {
                    $(this).addClass('fadeIn');
                }
            });
});
</script>
      <style>
body{
    max-width: 1024px;
              min-width: 480px;
              background-color: #000000;
          }
          input:focus{
    outline: none;
}


          @font-face {
    font-family: Moom;
              src: url(fonts/Moonchild_Normal.ttf);
          }

          @font-face {
    font-family: RisBold;
              src: url(fonts/TkachenkoSketch4F-Bold.otf);
          }

          @font-face {
    font-family: Etude;
              src: url(fonts/Etude.ttf);
          }
          @font-face {
    font-family: Firenight;
              src: url(fonts/Firenight-Regular.otf);
          }
          @font-face {
    font-family: BeerMoney;
              src: url(fonts/beer_money.ttf);
          }

          a{
    color: #000000;
    text-decoration: none;
          }
      </style>
            </head>

<body>
    <div class='answerCircle' style='margin-top: 150px'>

        <p style='font-family: Firenight; font-size: 20pt; color: #DA4040; text-align: center' class='floating'>Отзыв отправлен</p>
        <p style='font-family: Firenight; font-size: 13pt; color: #000000 '>Большое спасибо за ваш отзыв,
            он будет опубликован на сайте после проверки администратова в ближайшее время:))))</p>

    </div>
    <div class='exclamationMark'>
        <p class='tossing'>!</p>
    </div>
    <div style='margin-top: -550px; margin-left: 620px'>
        <a href='reviews.php'> <p style='font-family: Firenight; font-size: 17pt; color: #000000; '><span style='color: red; font-size: 25pt' class='closeWind'><b>X</b></span>закрыть</p></a>
    </div>
</body>
</html>");
    }
    exit;
}else{
    echo("'status':'error'");
    exit;
}