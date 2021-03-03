// Select
$('.slct').click(function(){
    /* Заносим выпадающий список в переменную */
    var dropBlock = $(this).parent().find('.drop');

    let selectIcon = document.querySelectorAll('.select span');
    let selects = document.querySelectorAll('.select .slct');

    /* Делаем проверку: Если выпадающий блок скрыт то делаем его видимым*/
    if( dropBlock.is(':hidden') ) {
        dropBlock.slideDown();

        /* Выделяем ссылку открывающую select */
        $(this).addClass('active');



        for(let i = 0; i<selects.length; i++){
            if(selects[i].classList.contains('active'))
                selectIcon[i].classList.add('active-icon');
            else
                selectIcon[i].classList.remove('active-icon');
        }


        /* Работаем с событием клика по элементам выпадающего списка */
        $('.drop').find('li').click(function(){

            /* Заносим в переменную HTML код элемента
            списка по которому кликнули */
            var selectResult = $(this).html();

            /* Находим наш скрытый инпут и передаем в него
            значение из переменной selectResult */
            $(this).parent().parent().find('input').val(selectResult);

            /* Передаем значение переменной selectResult в ссылку которая
            открывает наш выпадающий список и удаляем активность */
            $(this).parent().parent().find('.slct').removeClass('active').html(selectResult);

            /* Скрываем выпадающий блок */
            dropBlock.slideUp();
        });

        /* Продолжаем проверку: Если выпадающий блок не скрыт то скрываем его */
    } else {
        $(this).removeClass('active');
        dropBlock.slideUp();

        for(let i = 0; i<selects.length; i++){
            if(selects[i].classList.contains('active'))
                selectIcon[i].classList.add('active-icon');
            else
                selectIcon[i].classList.remove('active-icon');
        }

    }

    /* Предотвращаем обычное поведение ссылки при клике */
    return false;
});