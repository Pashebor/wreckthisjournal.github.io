<?php
include('connectToDb.php');

//отзывы
$shit = $_POST['shit'];
$answer = $_POST['answer'];
$btnAnswer = $_POST['btnanswer'];
$btnDelete = $_POST['delete'];
//заказы
$num = $_POST['num'];
$approve = $_POST['approve'];
$del = $_POST['del'];
//заявки
$numOfState = $_POST['numOfState'];
$approveState = $_POST['approveState'];
$delState = $_POST['delState'];

 $answered = true;

if(isset($btnAnswer)){

    require ('phpmailer/PHPMailerAutoload.php');
    require_once('classes/Review.php');



    $table = "questions";

    $approveReview = new Review();
    $approveReview -> setTable($table);
    $approveReview -> setId($shit);
    $approveReview -> setAnswer($answer);
    $approveReview -> setAnswered($answered);
    $approveReview -> approve();

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
    $mailer->addAddress($_POST['email'], 'Уничтожь меня');
    $mailer->isHtml(true);
    $mailer->Subject = 'Отклик на отзыв';
    $mailer->Body = '<p>Ваш отзыв опубликован на сайте!</p><a href="http://уничтожьменя.рф/reviews.php"><b>ССЫЛКА</b></a>';

    if($btnAnswer && $mailer->send()){
        echo("OK");
        echo "<HTML><HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='0; URL=answerController.php'>
          </HEAD></HTML>";
        exit;
    }

    exit;
}

if(isset($btnDelete)){
    require_once('classes/Delete.php');
    $table = "questions";

    $deleteReview = new Delete();
    $deleteReview -> setId($shit);
    $deleteReview -> setTable($table);
    $deleteReview -> delete();



    if($btnDelete){
        echo("DELETE OK");
        echo "<HTML><HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='0; URL=answerController.php'>
          </HEAD></HTML>";
        exit;
    }
    exit;
}
//Заказы
if(isset($approve)){
    require ('phpmailer/PHPMailerAutoload.php');
    require_once('classes/Approve.php');
    $table = "orders";

    $approveOrders = new Approve();
    $approveOrders -> setTable($table);
    $approveOrders -> setAnswered($answered);
    $approveOrders -> setId($num);
    $approveOrders -> approve();

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
    $mailer->addAddress($_POST['emailOrder'], 'Уничтожь меня');
    $mailer->isHtml(true);
    $mailer->Subject = 'Отклик на заказ';
    $mailer->Body = '<p>Ваш заказ принят, мы скоро с вами свяжемся</p>';


    if($approve && $mailer->send()){
        echo("OK");
        echo "<HTML><HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='0; URL=answerController.php'>
          </HEAD></HTML>";
        exit;
    }
    exit;
}

if(isset($del)){
    require_once('classes/Delete.php');
    $table = "orders";

    $deleteOrders = new Delete();
    $deleteOrders -> setTable($table);
    $deleteOrders -> setId($num);
    $deleteOrders -> delete();

    if($del){
        echo("DELETE OK");
        echo "<HTML><HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='0; URL=answerController.php'>
          </HEAD></HTML>";
        exit;
    }
    exit;
}

//Заявки

if(isset($approveState)){
    require ('phpmailer/PHPMailerAutoload.php');
    require_once('classes/Approve.php');

    $table = "statements";

    $approveTableStatements = new Approve();
    $approveTableStatements -> setId($numOfState);
    $approveTableStatements -> setTable($table);
    $approveTableStatements -> setAnswered($answered);
    $approveTableStatements ->approve();

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
    $mailer->addAddress($_POST['emailStatement'], 'Уничтожь меня');
    $mailer->isHtml(true);
    $mailer->Subject = 'Отклик на Вашу заявку';
    $mailer->Body = '<p>Ваш закаявка принята, мы скоро с вами свяжемся</p>';


    if($approveState && $mailer->send()){
        echo("OK");
        echo "<HTML><HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='0; URL=answerController.php'>
          </HEAD></HTML>";
        exit;
    }
    exit;
}


if(isset($delState)){
    require_once('classes/Delete.php');

    $table = "statements";
    $deletTableStatements = new Delete();
    $deletTableStatements->setId($numOfState);
    $deletTableStatements->setTable($table);
    $deletTableStatements->delete();




    if($delState){
        echo("DELETE OK");
        echo "<HTML><HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='0; URL=answerController.php'>
          </HEAD></HTML>";
        exit;
    }
    exit;
}
else{
    echo("'status':'error'");
    exit;
}