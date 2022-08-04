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

$('.list-thumbs ul').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  items: 4,
  autoplay: true,
  lazyLoad: false,
  autoplaySpeed: 1000,
  autoplayHoverPause: true
});

$('.list-thumbs').owlCarousel({
  items: 4,
  nav: true,
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

