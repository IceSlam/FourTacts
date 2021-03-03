
function quantityProducts(){
    let quantityArrowMinus = document.querySelector(".minus-btn");
    let quantityArrowPlus = document.querySelector(".plus-btn");
    let quantityNum = document.querySelector(".quantity-num");

    function quantityPlus() {
        quantityNum.value = +quantityNum.value + 1;
    }
    function quantityMinus() {
        if (+quantityNum.value > 1) {
            quantityNum.value = +quantityNum.value - 1;
        }
    }

    quantityArrowPlus.addEventListener('click', quantityPlus);
    quantityArrowMinus.addEventListener('click', quantityMinus);
}

quantityProducts();
