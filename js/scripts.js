$=jQuery.noConflict();

$(document).ready(function(){
    $('.text-informacio').css('opacity',0);
    $('.foto-perfil').css('opacity',0);
    $('.estudis-contenidor').css('opacity',0);
    $('.feina-contenidor').css('opacity',0);
    $('.coneixaments').css('opacity',0);
    $('.feina-projectes').css('opacity',0);
    $('.aptituds').css('opacity',0);
    $('.text-informacio').waypoint(function(){
        $('.text-informacio').addClass('animated fadeInLeft delay-4s slower');
    },{ offset: '80%' });
    $('.foto-perfil').waypoint(function(){
        $('.foto-perfil').addClass('animated fadeInRight delay-4s slower');
    },{ offset: '80%' });
    $('.estudis-contenidor').waypoint(function(){
        $('.estudis-contenidor').addClass('animated fadeInDown delay-4s slower');
    },{ offset: '50%' });
    $('.feina-contenidor').waypoint(function(){
        $('.feina-contenidor').addClass('animated lightSpeedIn delay-4s slower');
    },{ offset: '50%' });
    $('.coneixaments').waypoint(function(){
        $('.coneixaments').addClass('animated bounceIn');
    },{ offset: '50%' });
    $('.feina-projectes').waypoint(function(){
        $('.feina-projectes').addClass('animated lightSpeedIn delay-4s slower');
    },{ offset: '50%' });
    $('.aptituds').waypoint(function(){
        $('.aptituds').addClass('animated fadeInLeft');
    },{ offset: '100%' });


    //Animacions Cercle
    $('.casella-skills .progress').hover(function(){
        $(this).addClass('animated shake');
    }, function(){
        $(this).removeClass('animated shake');
    });
});

$(".mobile-menu").on("click",function(){
    $(".menu-sitio").toggle();
});

var windowWith = 768;

$(window).resize(function(){
    if($(document).width()>=windowWith){
        $(".menu-sitio").show();
        console.log("Finestra més gran de 768")
    }
    else{
        $('.menu-sitio').hide();
    }
});

//Smooth Scroll NAtiu sobre Elemnts del DOM

var base_url = window.location.origin;

var host = window.location.host;

var pathArray = window.location.pathname.split( '/' );

var homeUrl=base_url + '/' + pathArray[1];

$(document).ready(anclesSmooth());

function anclesSmooth(){
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
    
            if(document.querySelector(this.getAttribute('href'))!=null){
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                 });
            }else{        
                tornarPantalla($(this).attr('href'));
            }
            
            
           
        });
    });
}

function tornarPantalla(ancla){
    window.location.replace(homeUrl+'/'+ancla);
    anclesSmooth();
}

