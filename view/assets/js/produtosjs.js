window.onload = function() {

    //// SLIDER
    var slider1 = document.getElementsByClassName("sliderBlock_items");
    var slides1 = document.getElementsByClassName("sliderBlockitemsitemPhoto");
    var next1 = document.getElementsByClassName("sliderBlockcontrolsarrowForward")[0];
    var previous1 = document.getElementsByClassName("sliderBlockcontrolsarrowBackward")[0];
    var items1 = document.getElementsByClassName("sliderBlock_positionControls")[0];
    var currentSlideItem1 = document.getElementsByClassName("sliderBlock_positionControls__paginatorItem");

    var currentSlide1 = 0;
    var slideInterval1 = setInterval(nextSlide, 5000); /// Delay time of slides

    function nextSlide() {
        goToSlide(currentSlide1 + 1);
    }

    function previousSlide() {
        goToSlide(currentSlide1 - 1);
    }


    function goToSlide(n) {
        slides1[currentSlide1].className = 'sliderBlockitemsitemPhoto';
        items1.children[currentSlide1].className = 'sliderBlock_positionControls__paginatorItem';
        currentSlide1 = (n + slides1.length) % slides1.length;
        slides1[currentSlide1].className = 'sliderBlockitemsitemPhoto sliderBlock_items__showing';
        items1.children[currentSlide1].className = 'sliderBlock_positionControls__paginatorItem sliderBlock_positionControls__active';
    }


    next1.onclick = function() {
        nextSlide();
    };
    previous1.onclick = function() {
        previousSlide();
    };


    function goToSlideAfterPushTheMiniBlock() {
        for (var i = 0; i < currentSlideItem1.length; i++) {
            currentSlideItem1[i].onclick = function(i) {
                var index1 = Array.prototype.indexOf.call(currentSlideItem1, this);
                goToSlide(index1);
            }
        }
    }

    goToSlideAfterPushTheMiniBlock();


    /////////////////////////////////////////////////////////

    ///// Specification Field


    var buttonFullSpecification1 = document.getElementsByClassName("block_specification")[0];
    var buttonSpecification1 = document.getElementsByClassName("block_specification__specificationShow")[0];
    var buttonInformation1 = document.getElementsByClassName("block_specification__informationShow")[0];

    var blockCharacteristiic1 = document.querySelector(".block_descriptionCharacteristic");
    var activeCharacteristic1 = document.querySelector(".block_descriptionCharacteristic__active");


    buttonFullSpecification1.onclick = function() {

        console.log("OK");


        buttonSpecification1.classList.toggle("hide");
        buttonInformation1.classList.toggle("hide");


        blockCharacteristiic1.classList.toggle("block_descriptionCharacteristic__active");


    };


    /////  QUANTITY ITEMS

    var up1 = document.getElementsByClassName('block_quantity__up')[0],
        down1 = document.getElementsByClassName('block_quantity__down')[0],
        input1 = document.getElementsByClassName('block_quantity__number')[0];

    function getValue() {
        return parseInt(input1.value);
    }

    up1.onclick = function(event) {
        input1.value = getValue() + 1;
    };
    down1.onclick = function(event) {
        if (input1.value <= 1) {
            return 1;
        } else {
            input1.value = getValue() - 1;
        }

    }


};