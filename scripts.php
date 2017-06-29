
<script src="js/jquery.min.js"> </script>   

<script type="text/javascript" src="assets/js/jquery.lazy-master/jquery.lazy.min.js"></script>


 <script type="text/javascript" src="assets/js/jquery.lazy-master/plugins/jquery.lazy.av.min.js"></script>


<script type="text/javascript">
    
$(function() {
        $('.lazy').lazy({
            delay: 3000,
            effect: 'fadeIn'
        });
    
    });
    
    
    
    
  </script>





    
  




<script type="text/javascript">
    function enviar(form) {
        form.action = form_action;
    }
</script>




   
 




     <script>
$(document).ready(function(){
    
    $.getScript("https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit")
// Obtener estados
$.ajax({
type: "POST",
url: "assets/procesar-estados.php",
data: { estados : "Mexico" } 
}).done(function(data){
$("#jmr_contacto_estado").html(data);
});
// Obtener municipios
$("#jmr_contacto_estado").change(function(){
var estado = $("#jmr_contacto_estado option:selected").val();
$.ajax({
type: "POST",
url: "assets/procesar-municipios.php",
data: { municipios : estado } 
}).done(function(data){
$("#jmr_contacto_municipio").html(data);
});
});
    
    
    
    
    
    
    
    
    $('li.logeo').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(200);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(200);
});
    
    $(".hvr-grow-shadow").hover(function(){
        $(this).children().css("opacity", "0");
        }, function(){
        $(this).children().css("opacity", "1");
    });
	
	$(".search-trigger").click(function(e) {
		$(".search-overly-mask").toggleClass('search-overly-mask close').toggleClass('search-overly-mask open');
	
	});
	$(".search-close").click(function(e) {
		$(".search-overly-mask").toggleClass('search-overly-mask close').toggleClass('search-overly-mask open');
	
	});
});
</script>
	
    
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        
        
        
     
      $(document).ready(function ()
{
     if(sessionStorage["PopupShown"] != 'yes'){ 
          $('#modalAds').modal('show');
            $('#modalAds').removeClass('hide');
      
           sessionStorage["PopupShown"] = 'yes';
     }
});  
        
        
        
        
        
        
        
        
    
        
    </script>

    <script src="assets/js/jquery.cycle2.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/jquery.parallax-1.1.js"></script>
    <script type="text/javascript" src="assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="assets/plugins/icheck-1.x/icheck.min.js"></script>
    <script src="assets/js/grids.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="js/select2/4.0.0/js/select2.min.js"></script>
    <script src="assets/js/bootstrap.touchspin.js"></script>
    <script src="assets/js/home.js"></script>
    <script src="assets/js/script.js"></script>

    <script type="text/javascript">
        $(function() {
            var $oe_menu = $('#oe_menu');
            var $oe_menu_items = $oe_menu.children('li');
            var $oe_overlay = $('#oe_overlay');

            $oe_menu_items.bind('mouseenter', function() {
                var $this = $(this);
                $this.addClass('slided selected');
                $this.children('div').css('z-index', '9999').stop(true, true).slideDown(200, function() {
                    $oe_menu_items.not('.slided').children('div').hide();
                    $this.removeClass('slided');
                });
            }).bind('mouseleave', function() {
                var $this = $(this);
                $this.removeClass('selected').children('div').css('z-index', '1');
            });

            $oe_menu.bind('mouseenter', function() {
                var $this = $(this);
                $oe_overlay.stop(true, true).fadeTo(200, 0.6);
                $this.addClass('hovered');
            }).bind('mouseleave', function() {
                var $this = $(this);
                $this.removeClass('hovered');
                $oe_overlay.stop(true, true).fadeTo(200, 0);
                $oe_menu_items.children('div').hide();
            })
        });

    </script>




    <script type="text/javascript">
        $(document).ready(function() {

        
            
            $(".accesoMe").hide();
            $(".melogin").show();

            $('.melogin').hover(function() {
                $(".accesoMe").slideToggle();
            });
           
            
            
        });

    </script>



    <script src="js/classie.js"></script>
    <script src="js/mlpushmenu.js"></script>
    <script>
        new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'));

    </script>


<script src="js/particles.js"></script>
<script src="js/app.js"></script>


<script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97229195-1', 'auto');
  ga('send', 'pageview');

</script>
    
    

  <script src="assets/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
    
               
      
      $('.autoplay').slick({
  slidesToShow: 10,
  slidesToScroll: 10,
  autoplay: true,
  autoplaySpeed: 2000,
          responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 6,
        infinite: true,
        dots: true
      }
    },
   
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    }
   
  ]

});
      
         $('.eventosCarrusel').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]

      
    });
      
       });
  </script>
    
    


    <script src="js/classie.js"></script>
    <script>
        (function() {
            // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
            if (!String.prototype.trim) {
                (function() {
                    // Make sure we trim BOM and NBSP
                    var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                    String.prototype.trim = function() {
                        return this.replace(rtrim, '');
                    };
                })();
            }

            [].slice.call(document.querySelectorAll('input.input__field')).forEach(function(inputEl) {
                // in case the input is already filled..
                if (inputEl.value.trim() !== '') {
                    classie.add(inputEl.parentNode, 'input--filled');
                }

                // events:
                inputEl.addEventListener('focus', onInputFocus);
                inputEl.addEventListener('blur', onInputBlur);
            });

            function onInputFocus(ev) {
                classie.add(ev.target.parentNode, 'input--filled');
            }

            function onInputBlur(ev) {
                if (ev.target.value.trim() === '') {
                    classie.remove(ev.target.parentNode, 'input--filled');
                }
            }
        })();

    </script>


<script type="text/javascript">
$(window).load(function() {
	$('#preloader').fadeOut('slow');
	$('body').css({'overflow':'visible'});
})
</script>