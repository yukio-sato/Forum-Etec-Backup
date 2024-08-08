<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="css/media/flogo.png">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/qrcode.css">

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    
    <!-- SCRIPT -->
    <script src="js/qrDownLoad.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js"></script>

    <title>Fórum Tecnológico Interdisciplinar</title>
</head>

<body>
    <!-- CABEÇALHO -->
    <div class="header">
        <a href="index.html"> <img src="css/media/voltar.png" id="back" alt="Voltar"></a>
        <img src="css/media/flogo2.jpg" id="logo" alt="Logo ETEC Adolpho Berezin" width="760px">
        <img src="css/media/empty.png" id="back">
    </div>

    <div class="container">
        <!-- INFORMAÇÕES -->
        <p>Inscrição conluída, esse é seu Codigo QR de acesso ao evento <br>Tenha-o em mãos na portaria!</p>

        <div id="RedBox">
            <?php
                /*
                Para que consiga conectar com o banco de dados, você pode utilizar o Xampp control ou utilizar um serviço Azure.
                O serviço Azure é um pouco mais complicado devido a questão que não é 100% gratis, onde toda vez que seu banco está
                ligado ele gasta o seus créditos, desta maneira, para testes, não esqueça de desliga-lo após o uso.
                Nota: é recomendado utilizar Xampp localmente e após ter certeza do site em sí, utilize azure.
                Motivo por utilizar Microsoft Azure: normalmente o azure possui compatibilidade com PHP, caso encontre algum serviço que
                também possui compatibilidade e saiba utilizar, não hesite.

                Caso esteja utilizando azure:
                 1- Após fazer a parte chata de receber créditos, você deve começar com o "MySQL Flexible" ou como demonstrado "Azure Database for MySQL Flexible Server".
                 2- Clique em Criar.
                 3- Em Assinatura -> Grupo de Recursos, crie um novo grupo, ou utilize um já existente para o Forum (provavelmente você terá que criar).
                 4- Insira o nome do Servidor (qualquer um desde que lembre).
                 5- Região coloque "Brazil South".
                 6- Versão MySQL: a mais antiga disponivel (8.0 atualmente no dia que escrevi).
                 7- Zona de Disponibilidade: Nenhuma preferência.
                 8- Não Ative alta disponibilidade (a não ser que queira perder seus créditos de maneira rápida)
                 9- Método de autenticação: MySQL somente autenticação
                10- Nome do usuário do administrador: forumetec (nome que define o username do MySQL)
                11- Senha: f0rum3t3cab! (senha do banco de dados)
                12- Clique em Avançar
                13- Regras de Firewall -> Permitir o acesso público de qualquer serviço do Azure de dentro do Azure para esse servidor, deixe ativado
                14- Adicione o endereço de IP do cliente atual
                15- Adicione 0.0.0.0 - 255.255.255.255
                16- Clique em Revisar e Criar
                17- Clique em Criar e espere
                18- Após isso demonstrará o seu banco de dados abaixo, clique para ver o banco de dados
                19- Vai em configuração -> conectar
                20- Utilize as informações do detalhes da conexão
                21- Por via das dúvidas, após isso vai em Paramêtros de Segurança
                22- Ache o "require_secure_transport" e deixe em OFF

                Aplicativo Web (onde vai ficar a sua página no azure)
                 1- Procure por Aplicativo da mesma maneira que o MySQL Flexible
                 2- Clique em Criar
                 3- Utilize o mesmo Grupo de Recursos utilizado no MySQL Flexible
                 4- Coloque o Nome
                 5- Em "Pilha de runtime" coloque a ultima versão de PHP (8.3 atualmente enquanto escrevo)
                 6- Região: Brazil South
                 7- Avança até "Implantação"
                 8- Ative "Implantação Contínua"
                 9- Conecte seu Github e coloque seu repósitio que deseja estar na internet
                    Organização: (Você mesmo)
                    Repositório: Selecione na qual é o forum
                    Branch: Main (Normalmente caso você não tenha realizado algum passo diferente no github)
                10- Avança até "Revisar e Criar"
                11- Clique em "Criar" e espere.
                12- Aparece a Web abaixo e clique.
                13- Em visão geral seu link é do "Domínio Padrão"
                */

                require "conexao.php";

                $nome = $_GET['nome'];
                $userEmail = $_GET['email'];
                $userCPF = $_GET['cpf'];
                $identificador = $_GET['enter'];
    
                $userInfo = "";
                
                $sql = "INSERT INTO tb_pessoa
                VALUES ('".$userCPF."','".$nome."','".$userEmail."','".$identificador."',0,1)"; // o 1 é fk da tb mude
    
                $sqlChecker = "SELECT * FROM tb_pessoa WHERE cpf_pessoa = '".$userCPF."';";
                $resultCheck = $conn->query($sqlChecker);
                if ($resultCheck->num_rows <= 0){
                    $result = $conn->query($sql);
                }
                $userInfo = "https://forumetecab-frcjhtbde8dbfed0.brazilsouth-01.azurewebsites.net/qrCodeEscaneado.php?cpf='.$userCPF.'";
                //$userInfo = "Nome: ".$nome." | Email: ".$userEmail." | CPF: ".$userCPF." | Entrar como: ".$identificador;
                echo '<img src="https://api.qrserver.com/v1/create-qr-code/?data='.$userInfo.'&size=100%x100%" id="code">';
            ?>
            <script>
                async function down(){
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF();
                                
                    /* other method to generate a qr code with jspdf api
                    const qrCodeCanvas = document.createElement('canvas');
                    await QRCode.toCanvas(qrCodeCanvas, "https://api.qrserver.com/v1/create-qr-code/?data=${teste}&size=100x100");
                    const qrCodeDataUrl = qrCodeCanvas.toDataURL('image/png');
                    */
                    <?php
                    if ($_SESSION['userNM']){
                        echo "
                        pdf.addImage(`https://api.qrserver.com/v1/create-qr-code/?data=$userInfo&size=100x100`, 'PNG', 5, 5, 50, 50);
                        pdf.text(`Nome: ".$_SESSION["userNM"]."`, 60, 20); // text on pdf
                        "; // the qr code itself
                    }
                    ?>    
                                
                    pdf.save('qrcode.pdf'); // download in your device
                }
            </script>
            <button id="Dwld" class="Btn3" onclick="down()">Baixar QrCode</button>
        </div>
    </div>

    <div id="RedBox2">
        <div class="info-local">
            <img src="css/media/localw.png" id="local" alt="">
            <h5>ETEC Adolpho Berezin</h5>
        </div>
        <div class="info-local">
            <img src="css/media/place.png" id="local" alt="">
            <h5>Av. Monteiro Lobato, nº 8000<br>Bal. Jussara, Mongaguá</h5>
        </div>
    </div>
</div>

    <div class="footer">
        <p>Site desenvolvido pelos alunos
            <br><a href="https://github.com/niButera">Nicolas</a> e <a href="https://github.com/yukio-sato">Yukio</a>
            3i3 -
            1º Semestre - 2024
        </p>
    </div>
</body>