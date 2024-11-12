var altura = window.screen.height;
var largura = window.screen.width;
console.log(altura);
console.log(largura);

jQuery(document).ready(function($) {
    var tabsVerticalInner = $('#accordian');
    var selectorVerticalInner = $('#accordian').find('li').length;

    var activeItemVerticalInner = tabsVerticalInner.find('.active');
    if (activeItemVerticalInner.length > 0) {
        var activeWidthVerticalHeight = activeItemVerticalInner.innerHeight();
        var activeWidthVerticalWidth = activeItemVerticalInner.innerWidth();
        var itemPosVertical = activeItemVerticalInner.position();
        $(".selector-active").css({
            "top": itemPosVertical.top + "px",
            "left": itemPosVertical.left +"px",
            "height": activeWidthVerticalHeight + "px",
            "width": activeWidthVerticalWidth + "px"
        });
    }

    $("#accordian").on("click", "li", function(e) {
        $('#accordian ul li').removeClass("active");
        $(this).addClass('active');
        var activeWidthVerticalHeight = $(this).innerHeight();
        var activeWidthVerticalWidth = $(this).innerWidth();
        var itemPosVertical = $(this).position();

        $(".selector-active").css({
            "top": itemPosVertical.top + "px",
            "left": itemPosVertical.left + "px",
            "height": activeWidthVerticalHeight + "px",
            "width": activeWidthVerticalWidth + "px"
        });
    });
});


function observeClassChanges(selector, callback) {
    const elements = $(selector);

    elements.each((index, element) => {
        const observer = new MutationObserver(mutations => {
            mutations.forEach(mutation => {
                if (mutation.attributeName === 'class') {
                    callback();
                }
            });
        });

        observer.observe(element, { attributes: true });
    });
}

observeClassChanges('.top, .bottom', function() {
    if ($('.top, .bottom').is('.selector-active')) {
        $('#exit').removeClass('fa-circle-xmark').addClass('fa-solid fa-circle-xmark');
    } else {
        $('#exit').removeClass('fa-solid fa-circle-xmark').addClass('fa-circle-xmark');
    }
});
const exitBtn = document.getElementById("btnExit");
exitBtn.addEventListener("click", function(){
  if(exitBtn.className === 'active'){
    alert('Are you sure?');
  }
});


const btnOpen = document.getElementById('open'); // Removido o '#' 
const menuItems = document.querySelectorAll('#accordian li span');
const accordian = document.getElementById('accordian'); // Removido o '#'

btnOpen.addEventListener("click", function() {
    // Alternar a classe 'clicked' e mudar o texto do botão
    if (accordian.style.width === '50vw') {
        // Se o menu estiver aberto, fecha-o
        accordian.style.width = '74px'; // Ou ajuste para o valor padrão
        btnOpen.innerHTML = '☰'; // Simboliza o botão de abrir
        menuItems.forEach(item => {
            item.style.display = 'none'; // Oculta os itens do menu
        });
    } else {
        // Se o menu estiver fechado, abre-o
        accordian.style.width = '50vw';
        btnOpen.innerHTML = 'x'; // Simboliza o botão de fechar
        jQuery(document).ready(function($) {
            var tabsVerticalInner = $('#accordian');
            var selectorVerticalInner = $('#accordian').find('li').length;
        
            var activeItemVerticalInner = tabsVerticalInner.find('.active');
            if (activeItemVerticalInner.length > 0) {
                var activeWidthVerticalHeight = activeItemVerticalInner.innerHeight();
                var activeWidthVerticalWidth = activeItemVerticalInner.innerWidth();
                var itemPosVertical = activeItemVerticalInner.position();
                $(".selector-active").css({
                    "top": itemPosVertical.top + "px",
                    "left": itemPosVertical.left +"px",
                    "height": activeWidthVerticalHeight + "px",
                    "width": activeWidthVerticalWidth + "px"
                });
            }
        
            $("#accordian").on("click", "li", function(e) {
                $('#accordian ul li').removeClass("active");
                $(this).addClass('active');
                var activeWidthVerticalHeight = $(this).innerHeight();
                var activeWidthVerticalWidth = $(this).innerWidth();
                var itemPosVertical = $(this).position();
        
                $(".selector-active").css({
                    "top": itemPosVertical.top + "px",
                    "left": itemPosVertical.left + "px",
                    "height": activeWidthVerticalHeight + "px",
                    "width": activeWidthVerticalWidth + "px"
                });
            });
        });
        menuItems.forEach(item => {
            item.style.display = 'inline-block'; // Mostra os itens do menu
        });
    }
});

