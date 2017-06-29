 
<div class="swiper-container swiper-container-h banner" style="max-height:300px;">
<div class="swiper-wrapper">
<div class="swiper-slide eaton">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
    <img src="images/slider/eaton.png" style="    float: right;  margin-right: 30px;"> 
    </div>


     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  ">
          <img src="images/slider/siempre.png" style="    margin-top: 5%;     margin-top: 5%;
    float: left;
    margin-right: 30px;"> 
          

    </div>
 </div>
<div class="swiper-pagination swiper-pagination-h"></div>
</div>
</div>
<script src="../dist/js/swiper.min.js"></script>
 
<script>
    var swiperH = new Swiper('.swiper-container-h', {
        pagination: '.swiper-pagination-h',
        paginationClickable: true,
        spaceBetween: 50
    });
    var swiperV = new Swiper('.swiper-container-v', {
        pagination: '.swiper-pagination-v',
        paginationClickable: true,
        direction: 'vertical',
        spaceBetween: 50
    });
    </script>