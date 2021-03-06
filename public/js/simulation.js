/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/simulation.js":
/*!************************************!*\
  !*** ./resources/js/simulation.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  //????????????????????????????????????
  var parents = ['format', 'living', 'dining', 'amount', 'tatami', 'type', 'closet'];
  $('.radio').on('click', function () {
    var prefix = $(this).attr('name');
    var title = $(this).parent('strong').text();
    $('.' + prefix + ' .child-title').text(title);
  }); //?????????????????????????????????

  $('input[name="amount"]').on('click', function () {
    var eleId = $(this).attr('id');
    var childId = eleId.replace('child', '');
    var total = $('.amount-item').length;
    var amount = '';
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });
    $.ajax({
      type: "post",
      //HTTP???????????????
      url: '/management/getchild/' + childId,
      //???????????????URL
      dataType: 'json'
    }) //???????????????????????????
    .done(function (res) {
      amount = res.title.replace('??????', '');

      for (var i = 1; i <= total; i++) {
        if (i <= amount) {
          $('.variable' + i).removeClass('hide');
          $('.variable-input-' + i).prop('disabled', false);
        } else {
          $('.variable' + i).addClass('hide');
          $('.variable-input-' + i).prop('disabled', true);
        }
      }
    }) //???????????????????????????
    .fail(function (error) {
      alert('!ERROR!');
    });
  }); //????????????????????????????????????

  $("#run").on("click", function () {
    $('.odometer').css({
      'margin-bottom': '0'
    });
    var choiceId = [];
    var formatId = [];
    var total = $('.amount-item').length;
    $("input:checked").each(function (index, element) {
      choiceId.push(element.id);
    });
    $(choiceId).each(function (index, element) {
      var id = element.replace('child', '');

      for (var i = 1; i <= total; i++) {
        var branch = '-' + i;
        id = id.replace(branch, '');
      }

      formatId.push(id);
    });
    var sendId = [];
    sendId.push(formatId);
    var jsonId = JSON.stringify(sendId);
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });
    $.ajax({
      type: "post",
      //HTTP???????????????
      url: '/child/choice',
      //???????????????URL
      data: {
        'json': jsonId
      },
      dataType: 'json'
    }) //???????????????????????????
    .done(function (res) {
      var count = res.length;
      var parents = $('.title').length;
      var subtitle = $('.subtitle:visible').length;
      var deg = count - (parents - 3) - subtitle;
      var coefficients = [];

      if (deg < 0) {
        alert('????????????????????????????????????????????????');
        return false;
      }

      $('#chooseData').html('');

      for (var i = 0; i < count; i++) {
        coefficients.push(Number(res[i].coefficient));

        if (subtitle > 3) {
          if (res[i].prefix === 'tatami' || res[i].prefix === 'type' || res[i].prefix === 'closet') {
            $('#chooseData').append('<input type="hidden" name="' + res[i].prefix + '[]" value="' + res[i].title + '" class="send_data">');
          } else {
            $('#chooseData').append('<input type="hidden" name="' + res[i].prefix + '" value="' + res[i].title + '" class="send_data">');
          }
        } else {
          $('#chooseData').append('<input type="hidden" name="' + res[i].prefix + '" value="' + res[i].title + '" class="send_data">');
        }
      }

      var price = $('#price-basic').val();
      $(coefficients).each(function (index, element) {
        price *= element;
      });
      price = Math.round(Number(price));
      $('.odometer').html(price);
      setTimeout(function () {
        $('.odometer').css({
          'margin-bottom': '1px'
        });
      }, 2000);
      $('#chooseData').append('<input type="hidden" name="price" value="' + price + '" class="send_data">');
    }) //???????????????????????????
    .fail(function (error) {
      console.log(error);
    });
  });
  $('#send').on('click', function () {
    var dataLen = $('.send_data').length;
    var pLen = parents.length;

    if (dataLen < pLen) {
      alert('????????????????????????How Much ???????????????????????????????????????????????????????????');
      return false;
    }
  });
  var slider1 = new Swiper('.slider1', {
    effect: 'slide',
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  });
  var slider2 = new Swiper('.slider2', {
    effect: 'slide',
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  });
  var slider3 = new Swiper('.slider3', {
    effect: 'slide',
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  });
  var slider4 = new Swiper('.slider4', {
    effect: 'slide',
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  });
  var amountNum = $('#amount-num').val();

  for (var i = 1; i <= amountNum; i++) {
    var slider5_ = {};
    var slider6_ = {};
    var slider7_ = {};
    slider5_[i] = new Swiper('.slider5-' + i, {
      effect: 'slide',
      spaceBetween: 10,
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      }
    });
    slider6_[i] = new Swiper('.slider6-' + i, {
      effect: 'slide',
      spaceBetween: 10,
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      }
    });
    slider7_[i] = new Swiper('.slider7-' + i, {
      effect: 'slide',
      spaceBetween: 10,
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      }
    });
  }
});
$(function () {
  // ????????????????????????class?????????
  var $elem = $('.js-image-switch'); // ????????????????????????src??????????????????????????????

  var sp = '_sp.';
  var pc = '_pc.'; // ???????????????????????????????????????????????????

  var replaceWidth = 768;

  function imageSwitch() {
    // ??????????????????????????????????????????
    var windowWidth = parseInt(window.innerWidth); // ?????????????????????????????????`.js-image-switch`?????????????????????

    $elem.each(function () {
      var $this = $(this); // ???????????????????????????768px??????????????????_sp???_pc??????????????????

      if (windowWidth >= replaceWidth) {
        $this.attr('src', $this.attr('src').replace(sp, pc)); // ???????????????????????????768px??????????????????_pc???_sp??????????????????
      } else {
        $this.attr('src', $this.attr('src').replace(pc, sp));
      }
    });
  }

  imageSwitch(); // ?????????????????????????????????0.2??????????????????????????????????????????

  var resizeTimer;
  $(window).on('resize', function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      imageSwitch();
    }, 200);
  });
});

/***/ }),

/***/ 3:
/*!******************************************!*\
  !*** multi ./resources/js/simulation.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/estimate-system/resources/js/simulation.js */"./resources/js/simulation.js");


/***/ })

/******/ });