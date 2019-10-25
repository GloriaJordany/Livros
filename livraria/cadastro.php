<?php
    require("./connect.php");

    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $paginas = $_POST['paginas'];
        $status = $_POST['status'];

        $sql = "INSERT INTO `livros` VALUES (default,'$nome','$autor','$paginas','$status')";
        if(mysqli_query($con, $sql)) {
            echo "
                <script>
                    alert('Livro cadastrado com sucesso!');
                </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyBooks</title>
    <!-- Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- MyCss -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Controle de livros<img src="./img/iconlivro.png" id="imgIcon" /> - (CADASTRO!)</a>
        </nav>
    </div><br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome</label>
                        <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Autor</label>
                        <input type="text" name="autor" class="form-control" id="exampleFormControlInput1" placeholder="Autor" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Quantidade de Páginas</label>
                        <input type="number" name="paginas" class="form-control" id="exampleFormControlInput1" placeholder="Páginas" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categoria</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1" required>
                            <option value="lido">Já lido</option>
                            <option value="pretencao">Pretenção</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Enviar" class="btn btn-outline-info form-control">
                    </div>
                </form><br>

                <a href="index.php"><img src="./img/placa.png" /> VOLTAR</a>
            </div>
        </div>
    </div>

</body>
</html>