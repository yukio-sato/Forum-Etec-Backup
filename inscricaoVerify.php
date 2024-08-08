<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="css/media/flogo.png">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/inscricao.css">

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- SCRIPT -->
    <script src="js/cpfFormat.js"></script>

    <title>Fórum Tecnológico Interdisciplinar</title>
</head>
<body>
    <div class="header">
        <a href="index.html"> <img src="css/media/voltar.png" id="back" alt="Voltar"></a>
        <img src="css/media/flogo2.jpg" id="logo" alt="Logo ETEC Adolpho Berezin" width="760px">
        <img src="css/media/empty.png" id="back">
    </div>

<?php
    // require part - tenha certeza que a pasta seja nomeada -> "src" e esteja com o PHPMailer 
    require_once ('src/PHPMailer.php');
    require_once ('src/SMTP.php');
    require_once ('src/Exception.php');

    // your info
    $userNM = $_POST['nm'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $identifier = $_POST['selectPC'];

    /*session_start();
    $_SESSION["userNM"] = $userNM;
    $_SESSION["email"] = $email;
    $_SESSION["cpf"] = $cpf;
    $_SESSION["identifier"] = $identifier;*/

    // email part
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    $mail = new PHPMailer(true); //linha de teste
    
    /*
    Para criar uma senha codificada é necessário ter a verificação de duas etapas ativado
    Após isso você deve acessar https://myaccount.google.com/apppasswords?
    Coloque qualquer nome e guarde o código
    */

    try {
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'forumtecinter@gmail.com'; // email responsavel por enviar
        $mail->Password = 'ztlb eecy tbef xpyk'; // senha codificada
        // forumtecinter@gmail.com
        // ztlb eecy tbef xpyk
        // yukioutiyamasato@gmail.com
        // kxpc wvxn krzl ntfa
        // jose.carlos.s.barbosa@gmail.com
        // pmva ospv bknx ooal
        $mail->Port = '587';
    
        $mail->setFrom('forumtecinter@gmail.com'); // repita o valor da linha $mail->Username
        $mail->addAddress($email); // email redirecionado
    
        $mail->isHTML(true);
        $mail->Subject = 'Teste de Envio de Email'; // titulo do email
        $mail->Body = '
        <h1>Olá <strong>'.$userNM.'<strong>!</h1>
        <h3>Segue abaixo o Link para o QR Code</h3>
        <hr>
        <a href="https://forumetecab-frcjhtbde8dbfed0.brazilsouth-01.azurewebsites.net/qrcode.php?nome='.$userNM.'&email='.$email.'&cpf='.$cpf.'&enter='.$identifier.'">Clique aqui!</a>
        '; // descrição
        $mail->AltBody = 'Chegou mensagem'; // texto para cegos?
    
        if ($mail->send()) {
            echo '
                <div class="content">
                <!-- INFORMAÇÕES -->
                <br>
                <br>
                <h1>Email Enviado</h1>
                <p onclick="window.location.reload();" style="border-bottom: black solid 1px;width:20%;margin: auto">Reenviar Email</p>
                </div>
            ';
        }else {
            echo '
                <div class="content">
                    <!-- INFORMAÇÕES -->
                    <br>
                    <br>
                    <h1>Ocorreu um erro inesperado</h1>
                    <p>Por favor tente novamente mais tarde.</p>
                </div>
            ';
        }
    } catch (Exception $e) {
        //echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
?>

    <div class="footer" style="margin-top: 25%;">
        <h5>Site desenvolvido pelos alunos
        <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
            3i3 - 1º Semestre - 2024
        </h5>
    </div>
</body>
</html>