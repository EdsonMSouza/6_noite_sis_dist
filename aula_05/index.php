<!DOCTYPE html>

<head>
    <meta charset"UTF-8">
    </meta>
    <title>Exemplo de Chatbot</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="chatbox">
            <div class="header">
                <h4>ChatBot Tecnologia</h4><br>
                <p>Faça uma pergunta do tipo: linux, php, dns, etc...</p>
            </div>
            <div class="body" id="chatbot">
                <div class="scroller"></div>
            </div>
            <form class="chat" method="post" autocomplete="off">
                <div>
                    <input type="text" name="chat" placeholder="Mensagem...">
                </div>
                <div>
                    <input type="submit" value="Perguntar" id="btn">
                </div>
            </form>
        </div>
    </div>
    <script src="app.js"></script>
</body>

</html>