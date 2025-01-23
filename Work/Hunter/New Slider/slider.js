      $(document).ready(function(){
          $('.new-slider-wrapper').slick({
            slidesToShow:3,
            dots: true,
            appendDots: $('.markers'),
            responsive: [
      {
        breakpoint: 1144,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          
        }
      },
              {
        breakpoint: 951,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          
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
    ],
    appendArrows: 'true',
          });
  
          // function resize() {
          //   if ($(window).width() < 900) {
          //     $('.hp-custom-products').addClass('hp-products-carousel');
          //   }
          // }
  
      })
        $(".prev-btn").click(function () {
		$(".new-slider-wrapper").slick("slickPrev");
	});

	$(".next-btn").click(function () {
		$(".new-slider-wrapper").slick("slickNext");
	});
