<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_bootstrap/css/bootstrap.css">
    <script src="js/jquery-3.6.3.js"></script>
    <title>Formulario</title>
</head>
<body style="height: 100vh;display: flex; align-items: center;">
   <div class="container">
    
   <?php
        if(isset($_POST['nome']) != ''){
            $nm = $_POST['nome'];
            //die(json_encode($nm));
            echo $nm;
        }
        //die(json_encode($_POST));
        echo 'teste';
    ?>
   

    <h4>Formulario</h4>

    <form id="form" action="" method="post">
        <div class="row">
            <div class="col">
            <input type="text" class="form-control" name="primeiro" id="primeiro" placeholder="Primeiro name" aria-label="First name">
            </div>
            <div class="col">
            <input type="text" class="form-control" name="segundo" id="segundo" placeholder="Segundo name" aria-label="Last name">
            </div>
            <div class="col">
                <input id="acao" class="btn btn-primary" value="Enviar">
            </div>
        </div>
   </form>
   </div>

 

<script>
    var res;
    $("#acao").click((e)=>{
        e.preventDefault();
        let dados = {nome: $('#primeiro').val(),
                     sobrenome: $('#segundo').val()}
        $.post("index.php",dados,function(result,status){
            console.log(result);
            console.log(status);
        })
    })


</script>
<script src="_bootstrap/js/popper.min.js"></script>
<script src="_bootstrap/js/bootstrap.min.js"></script>
</body>
</html>