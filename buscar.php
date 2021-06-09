<?php

$bebida = $_POST['search'];
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Result</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="App/views/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="py-3 text-center">
        <img class="d-block mx-auto mb-2"
             src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Eucalyp-Deus_Cocktail.png/600px-Eucalyp-Deus_Cocktail.png"
             alt="" width="72" height="72">
        <h2>Information about your drink</h2>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <h1 class="display-4 text-success"></h1>
                <div class="d-flex align-itens-center" id="loading" ></div>

                <strong id="idIngredient"></strong>
                </br>
                <h6 id="abv"></h6>
                <h5 id ="titulo_descricao"></h5>
                <p id="description"></p>
                <p id=""></p>
                <a id ="botao" href="index.php" class="btn btn-secondary btn-lg mt-5 text-white" >Back</a>

            </div>
        </div>

    </div>
</div>
</body>

<script>

    var variavel = window.location.href;
    let teste = "<?php echo $bebida;?>";
    console.log(teste);
    const loading =document.getElementById('loading');
    loading.classList.add('lds-dual-ring');
    $.ajax({
        url:  'conection.php',
        type: "POST",
        data: {
            search: "<?php echo $bebida;?>"
        },
        dataType: 'json',
        success: function (response) {

            setTimeout(function (){
                let result = response.ingredients[0];
                console.log(result);

                document.getElementById('idIngredient').innerText=result.strIngredient;
                document.getElementById('abv').innerText='Alcohol content : '+result.strABV+'%';

                document.getElementById('titulo_descricao').innerText='Description';
                document.getElementById('description').innerText=result.strDescription;
                loading.classList.remove('lds-dual-ring');

            },2000)
        }

    })

</script>

</html>





