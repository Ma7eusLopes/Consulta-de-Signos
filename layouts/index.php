<?php include("C:/xampp/htdocs/Projet/layouts/header.php"); ?>
<body>
    <div class="container-fluid main-container d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #F2F2F2;">
        <div class="content-wrapper text-center p-5" style="background-color: #6A0DAD; border-radius: 15px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); max-width: 400px;">
            <h1 class="title mb-3" style="color: #FFC107; font-family: 'Poppins', sans-serif;">Brabo dos Signos</h1>
            <p class="subtitle text-white mb-4" style="font-family: 'Montserrat', sans-serif;">O que seu signo diz sobre seu futuro?</p>

            <form id="signo-form" method="POST" action="show_zodiac_sign.php">
                <div class="form-group">
                    <label for="data_nascimento" class="form-label" style="color: #FFC107;">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" style="border-radius: 5px; border: 1px solid #FFC107;" required>
                </div>
                <button type="submit" class="btn mt-4 w-100" style="background-color: #0065FF; color: #FFFFFF; border-radius: 5px; font-weight: bold; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);">Enviar</button>
            </form>

            <footer class="footer mt-5">
                <p class="text-muted" style="font-size: 0.9rem;">Desenvolvido por: Mateus Lopes</p>
            </footer>
        </div>
    </div>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .content-wrapper:hover {
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
        }

        /* Efeito hover no botão */
        .btn:hover {
            background-color: #00BFFF;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.25);
        }

        /* Estilo para o título */
        .title {
            color: #FFC107;
            font-size: 2rem;
            font-weight: bold;
        }

        /* Estilo para o subtítulo */
        .subtitle {
            color: #FFFFFF;
            font-size: 1rem;
        }

        /* Estilo para o formulário */
        .form-group label {
            font-weight: bold;
        }

        .form-control:focus {
            border-color: #0065FF;
            box-shadow: 0 0 5px rgba(0, 101, 255, 0.5);
        }
    </style>
</body>
