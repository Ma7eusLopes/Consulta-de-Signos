<?php

use Vtiful\Kernel\Format;
include ('header.php');

if (isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento'])) {
    $data_nascimento = DateTime::createFromFormat('Y-m-d', $_POST['data_nascimento']);
} else {
    echo "<p style='color: red;'>Data não fornecida ou inválida!</p> <a href='index.php' style='color: #0065FF;'>Voltar</a>";
    exit;
}

if (!$data_nascimento) {
    echo "<p style='color: red;'>Data é inválida</p> <a href='index.php' style='color: #0065FF;'>Voltar</a>";
    exit;
}

$signos = simplexml_load_file("signos.xml");
if ($signos === false) {
    echo "<p style='color: red;'>Erro ao carregar o arquivo XML! Verifique se o arquivo existe e está acessível.</p>";
    exit;
}

function verificar_Signo($data, $inicio, $fim) {
    $Ano = $data->format('Y');
    $data_inicio = DateTime::createFromFormat('d/m/Y', "$inicio/$Ano");
    $data_Fim = DateTime::createFromFormat('d/m/Y', "$fim/$Ano");

    if ($data_inicio > $data_Fim) {
        if ($data->format('m') == "01") {
            $data_inicio->modify('-1 year');
        } else {
            $data_Fim->modify('+1 year');
        }
    }

    return ($data >= $data_inicio && $data <= $data_Fim);
}

$signo_encontrado = null;

foreach ($signos as $signo) {
    if (verificar_Signo($data_nascimento, $signo->dataInicio, $signo->dataFim)) {
        $signo_encontrado = $signo;
        break;
    }
}

?>

<body>
    <div class="container-fluid main-container d-flex align-items-center justify-content-center" style="min-height: 80vh; background-color: #F2F2F2;">
        <div class="content-wrapper text-center p-5" style="background-color: #6A0DAD; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); max-width: 500px;">
            <?php if ($signo_encontrado): ?>
                <h1 class="text-warning mb-4" style="color: #FFC107; font-family: 'Poppins', sans-serif;">Seu signo é: <?= htmlspecialchars($signo_encontrado->signoNome) ?></h1>
                <p class="text-white mb-5" style="font-family: 'Montserrat', sans-serif;"><?= htmlspecialchars($signo_encontrado->descricao) ?></p>
            <?php else: ?>
                <p class="text-danger mb-5" style="color: #FF6347; font-size: 1.2rem;">Data inválida! Não foi possível encontrar um signo correspondente.</p>
            <?php endif; ?>
            <a href='index.php' class="btn btn-primary" style="background-color: #0065FF; color: #FFFFFF; border-radius: 5px; padding: 10px 20px; font-weight: bold; text-decoration: none;">Voltar</a>
        </div>
    </div>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F2F2F2;
        }

        .content-wrapper:hover {
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
        }

        /* Efeito hover no botão Voltar */
        .btn:hover {
            background-color: #00BFFF;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.25);
        }

        /* Estilo para o título */
        .text-warning {
            font-size: 2rem;
            font-weight: bold;
        }

        /* Estilo para o subtítulo */
        .text-white {
            font-size: 1rem;
        }
    </style>
</body>
