<?php
    require("./connect.php");
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
            <a class="navbar-brand" href="#">Controle de livros<img src="./img/iconlivro.png" id="imgIcon" /> - (LIDOS!)</a>
        </nav>
    </div><br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="teste">
                    <form method="post">
                        <input type="text" name="busca" placeholder="Nome"><button class="btn" type="submit"><img src="./img/lupa.png" id="lupaimg"></button>
                    </form>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead align="center">
                        <th>#</th>
                        <th>Nome</th>
                        <th>Autor</th>
                        <th>Páginas</th>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['del'])) {
                                $sql = "DELETE FROM `livros` WHERE id = ".$_GET['del'].";";
                                if(mysqli_query($con, $sql)) {
                                    echo "
                                        <script>
                                            alert('Livro deletado!');
                                        </script>
                                    ";
                                }
                            }
 
                            if(isset($_POST['busca'])){
                                $busca = $_POST['busca'];
                                $sql = "SELECT * FROM `livros` WHERE `status` = 'lido' AND nome LIKE '%".$busca."%';";    
                            } else {
                                $sql = "SELECT * FROM `livros` WHERE `status` = 'lido';";                            
                            }
                    
                            $query = mysqli_query($con, $sql);		
						    while ($registro = mysqli_fetch_row($query)) {
                                echo '
                                <tr align="center">
                                    <td>'.$registro[0].'</td>
                                    <td>'.$registro[1].'</td>
                                    <td>'.$registro[2].'</td>
                                    <td>'.$registro[3].'</td>
                                    <td><a href="?del='.$registro[0].'" style="color:red">Deletar<a></td>
                                </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>

                <br><br><a href="index.php"><img src="./img/placa.png" /> VOLTAR</a>
            </div>
        </div>
    </div>
    
</body>
</html>