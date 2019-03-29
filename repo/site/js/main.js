import Copyright from './copy.js'
require ('./style/style.less');

class Init {
  constructor() {
    this._init();
  }

  _init() {
    let $copy = new Copyright();
    let $slider = new Slider();
    let $cart = new Cart();
    let $buy = new Buy();
    let $feed = new Feedback('feedback.json');

    $('.proceed,.checkout').on('click', () => {
      location.href = 'checkout.html';
    });
    $('.to-cart').on('click', () => {
      location.href = 'shopping_cart.html';
    });

  }
}

let init = new Init();