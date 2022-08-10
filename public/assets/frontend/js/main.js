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

jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
  input = spinner.find('input[type="number"]'),
  btnUp = spinner.find('.quantity-up'),
  btnDown = spinner.find('.quantity-down'),
  min = input.attr('min'),
  max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});