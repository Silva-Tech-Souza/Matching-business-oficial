<?php
session_start();
header("Access-Control-Allow-Origin: *");
include('../../../conexao/conexao.php');
date_default_timezone_set('America/Sao_Paulo');
error_reporting(0);
$idPost = $_GET['idFeed'];
$iduser = $_SESSION["id"];


if ($_GET["texto"] != "") {
    $idFeed = $_GET["idFeed"];
    $texto = $_GET["texto"];

    $sqlinsertpost = "INSERT INTO tbpostcoment (idpost, texto, iduser) VALUES (:idpost, :texto, :iduser)";
    $queryinsertpost = $dbh->prepare($sqlinsertpost);
    $queryinsertpost->bindParam(':idpost', $idFeed, PDO::PARAM_INT);
    $queryinsertpost->bindParam(':texto', $texto, PDO::PARAM_STR);
    $queryinsertpost->bindParam(':iduser', $iduser, PDO::PARAM_INT);
    $queryinsertpost->execute();
}


?>





<div class="col-12" style="min-height: 400px; max-height: 400px; overflow-y: auto;">
    <?php $sqlComment = "SELECT * from tbpostcoment WHERE idpost = :idpost ORDER BY datahora DESC";
    $queryComment = $dbh->prepare($sqlComment);
    $queryComment->bindParam(':idpost', $idPost, PDO::PARAM_INT);

    $queryComment->execute();
    $resultsComment = $queryComment->fetchAll(PDO::FETCH_OBJ);
    if ($queryComment->rowCount() > 0) {
        foreach ($resultsComment as $rowfeed) {

            $postDateTimeC = new DateTime($rowfeed->datahora);

            // Obtenha o objeto DateTime da data e hora atual
            $currentTimeC = new DateTime();

            // Calcula a diferença entre a data e hora atual e a da postagem
            $timeDiffC = $postDateTimeC->diff($currentTimeC);

            // Formata o tempo decorrido com base nas unidades (ano, mês, dia, hora, minuto, segundo)
            if ($timeDiffC->y > 0) {
                $timeAgoC = $timeDiffC->y . " ano(s) atrás";
            } elseif ($timeDiffC->m > 0) {
                $timeAgoC = $timeDiffC->m . " mês(es) atrás";
            } elseif ($timeDiffC->d > 0) {
                $timeAgoC = $timeDiffC->d . " dia(s) atrás";
            } elseif ($timeDiffC->h > 0) {
                $timeAgoC = $timeDiffC->h . " hora(s) atrás";
            } elseif ($timeDiffC->i > 0) {
                $timeAgoC = $timeDiffC->i . " minuto(s) atrás";
            } else {
                $timeAgoC = "Alguns segundos atrás";
            }

            $sqluserpost = "SELECT * from tblUserClients WHERE idClient = :idClient";
            $queryuserpost = $dbh->prepare($sqluserpost);
            $queryuserpost->bindParam(':idClient', $rowfeed->iduser, PDO::PARAM_INT);
            $queryuserpost->execute();
            $resultsuserpost = $queryuserpost->fetchAll(PDO::FETCH_OBJ);
            if ($queryuserpost->rowCount() > 0) {
                foreach ($resultsuserpost as $rowuserpost) {
                    $usernamepost = $rowuserpost->FirstName . " " . $rowuserpost->LastName;
                    $idpostoperation = $rowuserpost->CoreBusinessId;
                    $imgpostuser = $rowuserpost->PersonalUserPicturePath;
                }
            }

    ?>
            <div class="row align-content-center shadow" style="margin: 3px !important; overflow-y: auto; max-height: 400px;  padding: 15px;">
                <input class="form-control bordainput" value="" autocomplete="off" name="idproduto" type="hidden">



                <div class="col-1 d-flex flex-column justify-content-center align-items-center" style="height: auto;">

                    <img src="<?php if ($imgpostuser != "Avatar.png" && $imgpostuser != "") {
                                    echo "../" . $imgpostuser;
                                } else {
                                    echo "../../../assets/img/Avatar.png";
                                } ?>" alt="user" class="nav-profile-img ">


                </div>
                <div class="col-2 d-flex flex-column justify-content-center align-items-center" style="height: auto;">

                    <h4><?php echo $usernamepost; ?></h4>
                    <?php

                    $sqlOperationpost = "SELECT * from tblOperations WHERE FlagOperation != '0' AND idOperation = :idOperation";
                    $queryOperationpost = $dbh->prepare($sqlOperationpost);
                    $queryOperationpost->bindParam(':idOperation', $idpostoperation, PDO::PARAM_INT);
                    $queryOperationpost->execute();
                    $resultsOperationpost = $queryOperationpost->fetchAll(PDO::FETCH_OBJ);
                    if ($queryOperationpost->rowCount() > 0) {
                        foreach ($resultsOperationpost as $rowOperationpost) {
                            echo $rowOperationpost->NmOperation;
                        }
                    }
                    ?>





                </div>
                <div class="col-8" style="overflow-wrap: break-word;">

                    <?php echo $rowfeed->texto; ?>




                </div>
                <div class="col-1" style="">
                    <?php echo $timeAgoC; ?>
                </div>





            </div>
    <?php }
    } ?>


</div>


<div class="row align-content-center " style="margin: 3px !important;">
    <div class="col-10 d-flex flex-column justify-content-center align-items-center" style="height: auto;">

        <textarea name="txtcom" class="form-control" rows="1" placeholder="Write a post..." id="textareaC" style="background-color: #EAEAEA;" maxlength="250"></textarea>


    </div>

    <div class="col-2 d-flex flex-column justify-content-center align-items-center">

        <button class="btn btn-primary pl-4 pr-4 no-border p-3 btnpostado" style="border: 0px; font-size: 10px; width: 60px;" name="postcomment"><i class="bi bi-cursor-fill" style="font-size: 1.5rem; color: #fff;"></i></button>


    </div>



</div>


<script>
    $(document).ready(function() {
        // Ao clicar em um link de produto
        $('.btnpostado').click(function() {
            // Obtenha o ID do produto associado ao link clicado
            var textArea = document.getElementById("textareaC");
            console.log(" <?php echo $idPost; ?>");
            // Obtém o texto dentro do textarea usando a propriedade "value"
            var texto = textArea.value;
            // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
            $.ajax({
                type: 'GET',
                url: 'visualizarComent.php', // Substitua pelo caminho correto
                data: {
                    idFeed: <?php echo $idPost; ?>,
                    texto: texto
                },
                success: function(data) {
                    // Preencha o conteúdo do modal com as informações do produto
                    $('#modalEditarProduto .modal-content').html(data);
                },
                error: function() {
                    alert('Ocorreu um erro ao carregar os dados do produto.');
                }
            });


        });;


    });
</script>