<?php

include_once('../model/classes/conexao.php');
include_once('../model/ErrorLog.php');
include_once('../model/classes/tblUserClients.php');
include_once('../model/classes/tblOperations.php');

date_default_timezone_set('America/Sao_Paulo');

$_SESSION["FlagOperation"] = 0;

$iduser = $_SESSION["id"];


$userClients = new UserClients($dbh);

$userClients->setidClient($iduser);

$results = $userClients->consulta("WHERE idClient = :idClient");

if ($results != null) {
    foreach ($results as $row) {
        $idoperation = $row->IdOperation;
        $corebusiness = $row->CoreBusinessId;
        $satBusinessId =  $row->SatBusinessId;
        $imgperfilgeral = $row->PersonalUserPicturePath;
        $imgperfil = $row->PersonalUserPicturePath;
        $imgcapa = $row->LogoPicturePath;
    }
}

$idoperation;

$operations = new Operations($dbh);
$operations->setidOperation($corebusiness);
$resultsoperation = $operations->consulta("WHERE idOperation = :idOperation");
if ($resultsoperation != null) {
    foreach ($resultsoperation as $rowbusiness) {
        $_SESSION["tipoflag"] =  $rowbusiness->FlagOperation;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Search Profile</title>
    <link rel="stylesheet" href="assets/css/geral.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/f51201541f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="assets/js/select/jquery.multiselect.css">
    <link rel="stylesheet" href="assets/css/feed.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <!--Select Multiplo-->
    <link rel="stylesheet" href="assets/css/seacher.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
</head>

<body>
    <script>
        function showcorbusiness(str) {
            document.getElementById("categorias").innerHTML = "";
            if (str == "") {
                document.getElementById("categorias").innerHTML = "";
                document.getElementById("especification").innerHTML = "";
                document.getElementById("corBusiness").innerHTML = "";

                return;
            }

            var xmlhttpespe = new XMLHttpRequest();
            xmlhttpespe.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("especification").innerHTML = this.responseText;


                    function multiSearchKeyup(inputElement) {
                        if (event.keyCode === 13) {
                            inputElement.parentNode
                                .insertBefore(createFilterItem(inputElement.value), inputElement);
                            inputElement.value = "";
                        }

                        function createFilterItem(text) {
                            const item = document.createElement("div");
                            item.setAttribute("class", "multi-search-item");
                            const span = `<span>${text}</span>`;
                            const close = `<div class="fa fa-close" onclick="this.parentNode.remove()"></div>`;
                            item.innerHTML = span + close;
                            return item;
                        }
                    }
                }
            }
            xmlhttpespe.open("GET", "widget/especification.php?q=" + str, true);
            xmlhttpespe.send();
            if (str == "") {
                document.getElementById("categorias").innerHTML = "";
                document.getElementById("especification").innerHTML = "";
                document.getElementById("corBusiness").innerHTML = "";

                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("corBusiness").innerHTML = this.responseText;

                    $('.categmulti').multiselect({
                        columns: 1,
                        search: true,
                        selectAll: true,
                        texts: {
                            placeholder: 'Select ',
                            search: 'Search',

                        },
                        maxHeight: 300,

                    });
                    var doneButtonHtml = '<button id="doneButton" class="ms-done-button stylobutoninterno">Done</button>';
                    optionsWrap.find('.no-result-message').before(doneButtonHtml);
                }
            }
            xmlhttp.open("GET", "widget/seach1.php?q=" + str, true);
            xmlhttp.send();
        }

        function showcategoria(str) {
            if (str == "") {
                document.getElementById("categorias").innerHTML = "";
                document.getElementById("corBusiness").innerHTML = "";
                document.getElementById("especification").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("categorias").innerHTML = this.responseText;
                    $('.categmulti').multiselect({
                        columns: 1,
                        search: true,
                        selectAll: true,
                        texts: {
                            placeholder: 'Select ',
                            search: 'Search',

                        },
                        maxHeight: 300,
                        selectableHeader: "<div class='custom-header'>Selectable items</div>",
                        selectionHeader: "<div class='custom-header'>Selection items</div>",
                        selectableFooter: "<div class='custom-header'>Selectable footer</div>",
                        selectionFooter: "<div class='custom-header'>Selection footer</div>"
                    });

                    var doneButtonHtml = '<button id="doneButton" class="ms-done-button stylobutoninterno">Done</button>';
                    optionsWrap.find('.no-result-message').before(doneButtonHtml);
                }
            }
            xmlhttp.open("GET", "widget/seach2.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>
    <!-- Header -->
    <?php include_once("widget/navbar.php"); ?>
    <div class="container-fluid">
        <div class="row justify-content-between telatoda ">
            <div class="col-5 text-center p-0  mb-2 imglefturl telatoda d-none d-md-block h-auto">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 text-center p-10  mb-2 arrastartela margemmnavbar">
                <div class="card px-0  pb-0 mt-3 mb-3">
                    <h2 id="heading">Create Search Profiles</h2>
                    <p>Create searches to find the right match</p>
                    <form id="msform" action="../controller/searchPageController.php" method="POST" enctype="multipart/form-data">
                        <input required type="hidden" name="idClient" value="<?php echo $iduser; ?>">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Operation</strong></li>
                            <li id="specification"><strong>Specification</strong></li>
                            <li id="personal"><strong>Country</strong></li>
                            <li id="payment"><strong>Create Name</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <br> <!-- fieldsets -->
                        <fieldset class="p-2">
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-12">

                                        <h4 class="alinharforcado">Whether you're seeking business partners, opportunities, or connections, <b>SEARCH PROFILES</b> empowers you to create tailored searches that save you time and effort. Let the system hunt down the right match, so you can focus on what truly matters.</h4><br>
                                    </div>
                                    <div class="col-12">
                                        <h2 class="fs-title">What are you looking for?</h2>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="alinharforcado">Please provide a brief description of what you are searching for. This will help us tailor the results to your needs.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-floating">
                                            <select required class="form-select border-dark inputtamanho selecttamanho selectsp1" name="corbusiness" onchange="showcorbusiness(this.value)" id="floatingSelectGrid" aria-label="Floating label select example">
                                                <option valid="">Select</option>
                                                <?php
                                                include_once('../model/classes/tblOperations.php');
                                                $operations = new Operations($dbh);
                                                $resultsoperation = $operations->consulta(" WHERE idOperation != '1'");
                                                if ($resultsoperation != null) {
                                                    foreach ($resultsoperation as $rowoperation) {
                                                ?>

                                                        <option value="<?php echo $rowoperation->idOperation; ?>"><?php echo $rowoperation->NmOperation; ?></option>
                                                <?php }
                                                } ?>

                                            </select>
                                            <label for="floatingSelectGrid">Operation:</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mgtop" id="corBusiness"></div>
                                    <div class="col-sm-12 mgtop" id="categorias"></div>
                                </div>
                            </div> <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset class="p-2">
                            <div class="form-card" id="especification">

                            </div><input required type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset class="p-2">
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="alinharforcado">Narrow down your search by selecting the country where you intend to focus your exploration. This step allows us to refine the search results to include options that are relevant to your chosen geographic area. By indicating the specific country, you enhance the precision and appropriateness of the search outcomes.</h4><br>
                                    </div>
                                    <div class="col-12">
                                        <h2 class="fs-title">In which country:</h2>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="alinharforcado">Select the country where you intend to carry out your search. This helps us narrow down options and provide information relevant to your chosen location.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-floating">

                                            <select required name="country[]" class=" form-select categmulti border-dark inputtamanho" multiple id="floatingSelectGrid" aria-label="Floating label select example">
                                                <?php
                                                include('../model/classes/tblCountry.php');

                                                $country = new Country($dbh);

                                                $resultsCountry = $country->consulta("");

                                                if ($resultsCountry != null) {
                                                    foreach ($resultsCountry as $rowCountry) { ?>
                                                        <option value="<?php echo $rowCountry->idCountry; ?>"><?php echo $rowCountry->NmCountry; ?></option>
                                                <?php  }
                                                } ?>
                                            </select>
                                            <label for="floatingSelectGrid">Country:</label>

                                        </div>
                                    </div>
                                </div>
                            </div> <input required type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset class="p-2">
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="alinharforcado">Assign a unique name to your search profile for effortless organization and quick retrieval. By giving a meaningful name to your search, you create a distinct marker that simplifies the process of locating your tailored search profiles. This step enhances your ability to efficiently manage and revisit your customized searches.</h4><br>
                                    </div>
                                    <div class="col-">
                                        <h2 class="fs-title">Name your search:</h2>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="alinharforcado"> Providing a name for your search helps you easily identify and manage your saved search profiles</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-floating mb-3">
                                            <input required type="text" name="idname" class="form-control inputstyle border-dark inputtamanho" id="floatingInput" placeholder="Leave a comment here">
                                            <label for="floatingInput">Name ID</label>
                                        </div>
                                    </div>

                                </div>
                            </div> <input type="button" name="next" class="next action-button" value="Create"   onclick="enviarFormulario()"/> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset class="p-2">
                            <div class="form-card">
                                <div class="row">

                                </div>
                                <h2 class="purple-text text-center"><strong>SUCCESSFULLY CREATED!</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        <h5 class="purple-text text-center fontsizelager">Your search profiles have been defined. The system is now actively looking for matches based on the given specifications. Thank you for using our "SEARCH PROFILES" feature. We're dedicated to helping you find the right matches efficiently and effectively. Your customized search experience is just a click away.</h5>

                                    </div>
                                    <div class="col-6 text-center">

                                    <a href="searchPage.php" name="news" class="btn action-button fontsizelager"  style="float: left">Create New</a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="listcompani.php?text=mysp"  class="btn action-button  fontsizelager" >Results</a>

                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="assets/js/select/jquery.multiselect.js"></script>
    <script>
        function enviarFormulario() {
            $.ajax({
                type: 'POST',
                url: '../controller/searchPageController.php',
                data: $('#msform').serialize(),
                success: function(response) {
                    console.log('Envio bem-sucedido', response);
                    // Faça qualquer outra coisa que você precise com a resposta
                },
                error: function(error) {
                    console.error('Erro no envio', error);
                    // Lide com erros aqui
                }
            });
        }
        var doneButtonHtml = '<button id="doneButton" class="ms-done-button stylobutoninterno">Done</button>';
        optionsWrap.find('.no-result-message').before(doneButtonHtml);
        document.getElementById('doneButton').addEventListener('click', function() {
            var element = document.getElementById('ms-list');
            var element2 = document.getElementById('ms-list-2');
            var element3 = document.getElementById('ms-list-3');
            var element4 = document.getElementById('ms-list-4');
            var element5 = document.getElementById('ms-list-5');
            var element6 = document.getElementById('ms-list-6');

            element.classList.remove('ms-active');
            element2.classList.remove('ms-active');
            element3.classList.remove('ms-active');
            element4.classList.remove('ms-active');
            element5.classList.remove('ms-active');
            element6.classList.remove('ms-active');
        });

        function multiSearchKeyup(inputElement) {
            if (event.keyCode === 13) {
                inputElement.parentNode
                    .insertBefore(createFilterItem(inputElement.value), inputElement);
                inputElement.value = "";
                updateprodutohiden();
            }

            function createFilterItem(text) {

                const item = document.createElement("div");
                item.setAttribute("class", "multi-search-item");
                const span = `<span  class='produto-box'>${text}</span>`;
                const close = `<div class="fa fa-close" onclick="this.parentNode.remove()"><span class='close'>&times;</span></div>`;
                item.innerHTML = span + close;

                return item;
            }

            function updateprodutohiden() {
                var keywords = $(".produto-box").map(function() {
                    return $(this).text().trim();
                }).get().join(",");

                $("#keywords-hiddens").val(keywords);
            }
        }
        $(document).ready(function() {
            $(".keyword-input").on("keydown", function(event) {
                if (event.keyCode === 32) { // Tecla de espaço
                    event.preventDefault();
                    var keyword = $(this).val().trim();

                    if (keyword !== "") {
                        var keywordBox = $("<span class='keyword-box'>" + keyword + "<span class='close'>&times;</span></span>");
                        var keywordContainer = $(this).siblings(".keyword-container");
                        keywordContainer.append(keywordBox);

                        $(this).val(""); // Limpar o campo de entrada
                        updateHiddenKeywords();
                    }
                }
            });

            // Remover palavra-chave ao clicar no "x" (fechar)
            $("#divKeywords").on("click", ".close", function() {
                $(this).parent().remove();
                updateHiddenKeywords();
            });

            function updateHiddenKeywords() {
                var keywords = $(".keyword-box").map(function() {
                    return $(this).text().trim();
                }).get().join(",");

                $("#keywords-hidden").val(keywords);
            }
        });


        $(document).ready(function() {
            $('.categmulti').multiselect({
                selectableHeader: "<div class='custom-header'>Selectable items</div>",
                selectionHeader: "<div class='custom-header'>Selection items</div>",
                selectableFooter: "<div class='custom-header'>Selectable footer</div>",
                selectionFooter: "<div class='custom-header'>Selection footer</div>",
                columns: 1,
                search: true,
                selectAll: true,
                texts: {
                    placeholder: 'Select States',
                    search: 'Search States',
                    selectableHeader: "<div class='custom-header'>Selectable items</div>",
                    selectionHeader: "<div class='custom-header'>Selection items</div>",
                    selectableFooter: "<div class='custom-header'>Selectable footer</div>",
                    selectionFooter: "<div class='custom-header'>Selection footer</div>"
                },
                maxHeight: 300,

            });

            function updateConfirmButtonState() {
                var selectedOptions = $('.categmulti').val();
                var confirmButton = $('.categmulti').next('.btn-group').find('#confirm-button');

                if (selectedOptions && selectedOptions.length > 0) {
                    confirmButton.prop('disabled', false);
                } else {
                    confirmButton.prop('disabled', true);
                }
            }

            // Handle confirm button click event
            $(document).on('click', '#confirm-button', function() {
                var selectedOptions = $('.categmulti').val();

                if (selectedOptions && selectedOptions.length > 0) {
                    // Perform your confirmation action here
                    console.log('Selected options:', selectedOptions);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function() {

                var inputField = $(this).parent().find('.inputtamanho');
                var dataano = $(this).parent().find('.dataano');
                var selectsp1 = $(this).parent().find('.selectsp1');
                var selectsp2 = $(this).parent().find('.selectsp2');
                var selectsp3 = $(this).parent().find('.selectsp3');
                console.log(dataano.val());
               
        var sp1Value = Array.isArray(selectsp1.val()) ? selectsp1.val().length : selectsp1.val() ? 1 : 0;
        var sp2Value = Array.isArray(selectsp2.val()) ? selectsp2.val().length : selectsp2.val() ? 1 : 0;
        var sp3Value = Array.isArray(selectsp3.val()) ? selectsp3.val().length : selectsp3.val() ? 1 : 0;
        
        if (inputField.val() === '' || inputField.val() === null || sp1Value === 0 || sp2Value === 0 || sp3Value === 0 || selectsp1.val() == 'Select' || selectsp2.val() == 'Select' || selectsp3.val() == 'Select') {
            if(dataano.val() == ""){
                alert("Fill in the field before waiting.");
            return;
            }
            
        }


                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })

        });
       
        /* Set the width of the sidebar to 250px (show it) */
        function openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
        }

        /* Set the width of the sidebar to 0 (hide it) */
        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }


    


        const notifyMenu = document.querySelector('.notify-menu');
        const notifications = notifyMenu.querySelectorAll('.notification');
        let notifyCounter = 8;

        function deleteNotification(event) {
            event.preventDefault();
            const notificationParent = event.currentTarget.parentNode;
            if (notificationParent) {
                notificationParent.remove();
                notifyCounter--;
                notifyMenu.dataset.notifyMenu = `Notification ${notifyCounter}`;
                updateEmptyBoxDisplay();
            }
        }

        notifications.forEach((notification) => {
            notification.addEventListener('click', deleteNotification);
        });

        const emptyBox = document.querySelector('.empty-box');

        function updateEmptyBoxDisplay() {
            if (notifyCounter === 0) {
                emptyBox.style.display = 'block';
            } else {
                emptyBox.style.display = 'none';
            }
        }

        updateEmptyBoxDisplay();
        // Carousel Script



        function redirectToAnotherPage() {
            var form = document.getElementById('formularionome');
            var textValue = form.querySelector('[name="text"]').value;

            // Redireciona para listcompani.php com o parâmetro GET "text"
            window.location.href = 'listcompani.php?text=' + encodeURIComponent(textValue);
        }


        $(document).ready(function() {
            // Ao clicar em um link de produto
            $('.hero-image-container').click(function() {
                // Obtenha o ID do produto associado ao link clicado
                var idProduto = $(this).data('id');
                console.log(idProduto);
                // Use o ID do produto para fazer uma requisição AJAX para buscar os dados do produto no servidor
                $.ajax({
                    type: 'GET',
                    url: 'modal/getproduto.php', // Substitua pelo caminho correto
                    data: {
                        idProduto: idProduto
                    },
                    success: function(data) {
                        // Preencha o conteúdo do modal com as informações do produto
                        $('#modalEditarProduto .modal-content').html(data);
                    },
                    error: function() {
                        alert('Ocorreu um erro ao carregar os dados do produto.');
                    }
                });

                // Abra o modal correspondente
                $('#modalEditarProduto').fadeIn();
            });;

            // Feche o modal ao clicar fora dele ou no botão de fechar
            $('.modal').click(function(event) {
                if ($(event.target).hasClass('modal')) {
                    $(this).fadeOut();
                }
            });
        });

        document.getElementById('doneButton').addEventListener('click', function() {
            var element = document.getElementById('ms-list');
            var element2 = document.getElementById('ms-list-2');
            var element3 = document.getElementById('ms-list-3');
            var element4 = document.getElementById('ms-list-4');
            var element5 = document.getElementById('ms-list-5');
            var element6 = document.getElementById('ms-list-6');

            element.classList.remove('ms-active');
            element2.classList.remove('ms-active');
            element3.classList.remove('ms-active');
            element4.classList.remove('ms-active');
            element5.classList.remove('ms-active');
            element6.classList.remove('ms-active');
        });
        
         function updateNotificationCount() {
            var xmlhttpnf = new XMLHttpRequest();
            xmlhttpnf.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    var badgeElement = document.getElementById('notificationCount');
                    var responseHtml = this.responseText.trim(); // Remove espaços em branco extras

                    if (responseHtml != "" || responseHtml != undefined) {
                        console.log("response");
                        badgeElement.innerHTML = responseHtml; // Insere o HTML retornado pelo PHP
                        responseHtml = '';
                    } else {
                        console.log("response NULL");
                        badgeElement.innerHTML = ''; // Limpa o conteúdo do elemento
                    }
                } else {
                    var badgeElement = document.getElementById('notificationCount');
                    badgeElement.innerHTML = '';
                    responseHtml = '';
                }
            };
            xmlhttpnf.open("GET", "widget/atualizar_notificacoes.php", true);
            xmlhttpnf.send();
        }
        updateNotificationCount()
        setInterval(updateNotificationCount, 6000);
    </script>
</body>

</html>