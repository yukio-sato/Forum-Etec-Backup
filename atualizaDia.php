<!DOCTYPE html>
<html lang="pt-BR">

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

    <title>Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <!-- CABEÇALHO -->
    <div class="header">
        <img src="css/media/empty.png" id="back">
        <img src="css/media/flogo2.jpg" id="logo" alt="Logo ETEC Adolpho Berezin" width="760px">
        <img src="css/media/empty.png" id="back">
    </div>
    <div class="content">
        <!-- INFORMAÇÕES -->
        <br>
        <br>
        <h1>QR Code Escaneado</h1>
        <?php
            require "conexao.php";

            $userCPF = $_GET['cpf'];

            $sqlChecker = "SELECT * FROM tb_pessoa WHERE cpf_pessoa = '".$userCPF."';";
            $resultCheck = $conn->query($sqlChecker);

            $sql = "UPDATE tb_pessoa SET dia_pessoa = dia_pessoa + 1 WHERE cpf_pessoa = '".$userCPF."' and dia_pessoa < 3;";

            if ($conn->query($sql) === true){
                echo '<script>window.location.href = "atualizado.html"</script>';
            }
            else{
                echo "<p>Houve um erro em atualizar o dia.<p>";
            }
        ?>
    </div>

    <div class="footer" style="margin-top: 25%;">
        <h5>Site desenvolvido pelos alunos
            <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
            3i3 - 1º Semestre - 2024
        </h5>
    </div>
</body>


</html>