<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>capture lead</title>
</head>
<body>
<h1>capture lead</h1>

    <form action="capturar_lead.php" method="post">
        <label for="">
            Nome: <br>
            <input type="text" name="nome" id="" required>
        </label> <br> <br>

        <label for="">
            Sobrenome: <br>
            <input type="text" name="sobrenome" id="" required>
        </label> <br> <br>

        <label for="">
            Email: <br>
            <input type="text" name="email" id="" required>
        </label> <br> <br>

        <label for="">
            Whatsapp: <br>
            <input type="text" name="celular" id="" required>
        </label> <br> <br>

        <label for="">
            Descrição: <br>
            <textarea name="descricao" id="">

            </textarea>
        </label> <br> <br>

        <input type="hidden" name="origem" value="landing page">

        <input type="submit" value="Enviar">

    </form>

    <script defer>
        const inputSubmit = document.querySelector('input[type="submit"');
        inputSubmit.addEventListener('click', () => {
            const descricao = document.querySelector('textarea');
            if(descricao.value.trim() === '') {
                descricao.value = 'Lead não deixou nenhuma descrição...';
            }
        })
    </script>
</body>
</html>