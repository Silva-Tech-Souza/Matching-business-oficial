<?php
include_once('../../model/classes/conexao.php');
include_once('../../model/classes/tbPostComent.php');
include_once('../../model/classes/tblUserClients.php');
include_once('../../model/classes/tblOperations.php');
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
/*if (isset($_SESSION['error'])) {
    error_reporting(0);
}
*/
date_default_timezone_set('America/Sao_Paulo');

if(isset($_GET['idComentario'])){
    $idComentario = $_GET['idComentario'];
}else{
    $idComentario = "";
}

$idPost = $_GET['idFeed'];
$iduser = $_SESSION["id"];

if($idComentario != "" && $_GET["texto"] == "apagar"){
    $tbPostComent = new PostComent($dbh);
    $tbPostComent->setid($idComentario);
    $tbPostComent->deletar(" WHERE id = :id");
}else if (isset($_GET["texto"]) && $_GET["texto"] != "") {
    $idFeed = $_GET["idFeed"];
    $texto = $_GET["texto"];

    $tbPostComent = new PostComent($dbh);
    $tbPostComent->setidpost($idFeed);
    $tbPostComent->setiduser($iduser);
    $tbPostComent->settexto($texto);
    $tbPostComent->cadastrar();
}


?>





<div class="col-12" style="min-height: 375px; max-height: 375px; overflow-y: auto;">
    <div class="col-12 d-flex justify-content-end align-items-end">
        <br>
        <button type="button" class="close rounded-2 border-0 bcolor-azul-escuro m-2" data-dismiss="modal" aria-label="Close" style="width: 25px; height: 25px;">
            <span aria-hidden="false" class="color-branco">x</span>
        </button>
    </div>

    <?php
    $tbPostComent1 = new PostComent($dbh);
    $tbPostComent1->setidpost($idPost);
    $resultstbPostComent = $tbPostComent1->consulta(" WHERE idpost = :idpost ORDER BY datahora DESC");

    if ($resultstbPostComent != null) {
        foreach ($resultstbPostComent as $rowfeed) {
            
            $idcommenter = $rowfeed->iduser;


            $postDateTimeC = new DateTime($rowfeed->datahora);

            // Obtenha o objeto DateTime da data e hora atual
            $currentTimeC = new DateTime();

            // Calcula a diferença entre a data e hora atual e a da postagem
            $timeDiffC = $postDateTimeC->diff($currentTimeC);

            // Formata o tempo decorrido com base nas unidades (ano, mês, dia, hora, minuto, segundo)
            if ($timeDiffC->y > 0) {
                $timeAgoC = $timeDiffC->y . " year(s) ago";
            } elseif ($timeDiffC->m > 0) {
                $timeAgoC = $timeDiffC->m . " month(s) ago";
            } elseif ($timeDiffC->d > 0) {
                $timeAgoC = $timeDiffC->d . " day(s) ago";
            } elseif ($timeDiffC->h > 0) {
                $timeAgoC = $timeDiffC->h . " hour(s) ago";
            } elseif ($timeDiffC->i > 0) {
                $timeAgoC = $timeDiffC->i . " minute(s) ago";
            } else {
                $timeAgoC = "A few seconds ago";
            }
            $userClients2 = new UserClients($dbh);

            $userClients2->setidClient($rowfeed->iduser);

            $results = $userClients2->consulta("WHERE idClient = :idClient");

            if ($results != null) {
                foreach ($results as $rowuserpost) {
                    $usernamepost = $rowuserpost->FirstName . " " . $rowuserpost->LastName;
                    $idpostoperation = $rowuserpost->CoreBusinessId;
                    $imgpostuser = $rowuserpost->PersonalUserPicturePath;
                }
            }

    ?>
            <div class="row" style=" margin-left: 0; margin-right: 0;">
                <div class="col-1 d-flex flex-column align-items-center" style="height: auto;       padding-top: 9px;  justify-content: unset;">
                    <img src="<?php if ($imgpostuser != "Avatar.png" && $imgpostuser != "") {
                                    echo "" . $imgpostuser;
                                } else {
                                    echo "assets/img/Avatar.png";
                                } ?>" alt="user" style="min-height: 41px;object-fit: cover;border: 1px solid #00000057;"  class="nav-profile-img ">
                </div>
                <div class="col-11  ">
                    <div class="row align-content-center shadow" style="margin: 3px !important; overflow-y: auto; max-height: 400px;  padding: 15px; background: white;border-radius: 7px">
                        <input class="form-control bordainput" value="" autocomplete="off" name="idproduto" type="hidden">

                        <div class="col-12 d-flex flex-column justify-content-start align-items-start" style="height: auto; ">
                            <a href="viewProfile.php?profile=<?php echo $rowfeed->iduser; ?>" class="minimenuoption">
                                <h4><?php echo $usernamepost; ?></h4>
                            </a>
                            <?php
                            $operations = new Operations($dbh);
                            $operations->setidOperation($idpostoperation);
                            $resultsoperation = $operations->consulta("WHERE FlagOperation != '0' AND idOperation = :idOperation");
                            if ($resultsoperation != null) {
                                foreach ($resultsoperation as $rowoperation) {
                                    echo $rowoperation->NmOperation;
                                }
                            }
                            ?><br>
                            <hr>
                        </div>
                        <div class="col-12" style="overflow-wrap: break-word;font-size: small;">
                            <?php echo $rowfeed->texto; ?>
                        </div>
                        <hr class="mt-2">
                        <div class="col-12 justify-content-end align-items-end" style="text-align: end;justify-content: end !important;align-items: end !important;display: block;">
                            <?php echo $timeAgoC; ?>
                            <?php if($idcommenter == $iduser){?>
                            <a href="#" class="trash-icon btnapagar"  data-comentario-id="<?php echo $rowfeed->id ;?>" style="margin-left: 10px;">
                            <i class="fas fa-trash-alt" style="font-size: medium; color: #e3171a;"></i>
                            </a>
                            <a href="#" class="trash-icon btneditar" style="margin-left: 5px; ">
                            <i class="fas fa-pencil-alt" style="font-size: medium; color: #002D4B; " ></i>
                            </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>

    <?php }
    } ?>


</div>


<div class=" col-12 " style="background: #dddddd; box-shadow: 1px -10px 8px rgb(0 0 0 / 20%);">
    <div class="row align-content-center "><div class="card-body shadow d-flex flex-column rounded-4 ">
        <form action="../controller/homeController.php" method="POST" enctype="multipart/form-data">
            <div class="row" style="margin: 2px;padding: 8px;">
                <div class="col-md-10">
                    <textarea name="txtcom" class="form-control input-new-post" rows="1" placeholder="Write a post..." id="textareaC" maxlength="500" style="
    background: #dddddd;
"></textarea>
                </div>
                <div class="col-md-2 ">
                    <div class="row justify-content-end mt-auto">
                        <input class="insertpost btn btn-primary pl-4 pr-4 no-border p-3 post-btn-confirm btnpostado" type="button"  data-dismiss="modal" name="postcomment" value="Post">
                    </div>
                </div>
            </div>

        </form>
    </div></div>
    
</div>


<script>
    $(document).ready(function() {
        // Ao clicar em um link de produto
        $('.btnpostado').click(function() {
            // Obtenha o ID do produto associado ao link clicado
            var textArea = document.getElementById("textareaC");
            
            // Obtém o texto dentro do textarea usando a propriedade "value"
            var texto = textArea.value;
            // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
            $.ajax({
                type: 'GET',
                url: 'widget/visualizarComent.php', // Substitua pelo caminho correto
                data: {
                    idFeed: <?php echo $idPost; ?>,
                    texto: texto
                },
                success: function(data) {
                    // Preencha o conteúdo do modal com as informações do produto
                    $('#modalEditarProduto .modal-content').html(data);
                    verificarNovosPosts();
                },
                error: function() {
                    alert('Ocorreu um erro ao carregar os dados do comentrios.');
                }
            });


        });;
            
            
        $('.btnapagar').click(function() {
            var idComentario = $(this).data('comentario-id'); 
            var texto = "apagar";
            $.ajax({
                type: 'GET',
                url: 'widget/visualizarComent.php', // Substitua pelo caminho correto
                data: {
                    idFeed: <?php echo $idPost; ?>,
                    texto: texto,
                    idComentario: idComentario 
                },
                success: function(data) {
                    // Preencha o conteúdo do modal com as informações do produto
                    $('#modalEditarProduto .modal-content').html(data);
                    verificarNovosPosts();
                },
                error: function() {
                    alert('Ocorreu um erro ao carregar os dados do comentrios.');
                }
            });
        });

    });

    function verificarNovosPosts() {
            if (!loading2) {
                loading2 = true; // Marca que uma requisição está em andamento

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("divFeedUpdate").innerHTML = this.responseText;
                        loading2 = false; // Marca que a requisição foi concluída
                        console.log("================================");
                        $(document).ready(function() {
                            // Ao clicar em um link de produto
                            $('.btnCommnet').click(function() {
                                // Obtenha o ID do produto associado ao link clicado
                                var idFeedsc = $(this).data('id');
                                console.log("clique");
                                console.log(idFeedsc);
                                // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
                                $.ajax({
                                    type: 'GET',
                                    url: 'widget/visualizarComent.php', // Substitua pelo caminho correto
                                    data: {
                                        idFeed: idFeedsc
                                    },
                                    success: function(data) {
                                        // Preencha o conteúdo do modal com as informações do produto
                                        console.log("Success");
                                        $('#modalEditarProduto .modal-content').html(data);
                                    },
                                    error: function() {
                                        alert('Ocorreu um erro ao carregar os dados do produto.');
                                    }
                                });

                                // Abra o modal correspondente
                                $('#modalEditarProduto').fadeIn();
                            });

                            // Feche o modal ao clicar fora dele ou no botão de fechar
                            $('.modal').click(function(event) {
                                if ($(event.target).hasClass('modal')) {
                                    $(this).fadeOut();
                                }
                            });
                        });
                    }
                }
                xmlhttp.open("GET", "widget/atualizarFeednovo.php", true);
                xmlhttp.send();
            }
        }
</script>

