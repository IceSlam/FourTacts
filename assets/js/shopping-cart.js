
function quantityProducts(){

    let quantityArrowMinus = document.getElementsByClassName("minus-btn");
    let quantityArrowPlus = document.getElementsByClassName("plus-btn");
    let quantityNum = document.getElementsByClassName("quantity-num");

    function quantityPlus(){
        for(let i = 0; i<quantityArrowPlus.length; i++){
            quantityArrowPlus[i].addEventListener('click', ()=>{
                quantityNum[i].value = +quantityNum[i].value + 1;
            })
        }
    }

    function quantityMinus(){
        for(let i = 0; i<quantityArrowMinus.length; i++){
            quantityArrowMinus[i].addEventListener('click', ()=>{
                if (+quantityNum[i].value > 1) {
                    quantityNum[i].value = +quantityNum[i].value - 1;
                }
            })
        }
    }

    quantityPlus();
    quantityMinus();
}
quantityProducts();
