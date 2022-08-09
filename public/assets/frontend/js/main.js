$('.list--item__slide').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  items: 1,
  autoplay: true,
  lazyLoad: true,
  autoplaySpeed: 1000,
  autoplayHoverPause: true
});

$('.list-similar').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  items: 4,
  autoplay: true,
  lazyLoad: true,
  autoplaySpeed: 1000,
  autoplayHoverPause: true,
  responsive: {
    0:{
      items: 1,
    },

    480:{
      items: 1,
    },
    640:{
      items: 2,
    },
    991:{
      items: 3,
    },

    1199:{
      items: 4,
    }
  }
});

$('.list-thumbs').owlCarousel({
  items: 4,
  nav: false,
  dots: false,
  autoplay: true,
  loop: true,
  responsive: {
    0:{
      items: 4,
    },

    480:{
      items: 4,
    },
    640:{
      items: 4,
    },
    991:{
      items: 4,
    },

    1199:{
      items: 4,
    }
  }
});

$('.fancybox').fancybox();
$(".item-zoom").ezPlus();
