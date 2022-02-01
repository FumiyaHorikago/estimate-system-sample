$(function () {
  //大項目プレフィックス設定
  var parents = [
    'format',
    'living',
    'dining',
    'amount',
    'tatami',
    'type',
    'closet',
  ];

  $('.radio').on('click', function () {
    var prefix = $(this).attr('name');
    var title = $(this).parent('strong').text();

    $('.' + prefix + ' .child-title').text(title);
  });

  //部屋数選択時の項目増減
  $('input[name="amount"]').on('click', function () {
    var eleId = $(this).attr('id');
    var childId = eleId.replace('child', '');
    var total = $('.amount-item').length;
    var amount = '';
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });
    $.ajax({
      type: "post", //HTTP通信の種類
      url: '/management/getchild/' + childId, //通信したいURL
      dataType: 'json'
    })
      //通信が成功したとき
      .done((res) => {
        amount = res.title.replace('部屋', '');
        for (var i = 1; i <= total; i++) {
          if (i <= amount) {
            $('.variable' + i).removeClass('hide');
            $('.variable-input-' + i).prop('disabled', false);
          } else {

            $('.variable' + i).addClass('hide');
            $('.variable-input-' + i).prop('disabled', true);
          }
        }
      })
      //通信が失敗したとき
      .fail((error) => {
        alert('!ERROR!')
      });
  });


  //金額算出ボタンクリック時
  $("#run").on("click", function () {
    $('.odometer').css({'margin-bottom':'0'});
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
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });
    $.ajax({
      type: "post", //HTTP通信の種類
      url: '/child/choice', //通信したいURL
      data: { 'json': jsonId },
      dataType: 'json'
    })
      //通信が成功したとき
      .done((res) => {
        var count = res.length;
        var parents = $('.title').length;
        var subtitle = $('.subtitle:visible').length;
        var deg = count - (parents - 3) - subtitle;
        var coefficients = [];
        if (deg < 0) {
          alert('選択されていない項目があります。');
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
        setTimeout(function(){
          $('.odometer').css({'margin-bottom':'1px'});
        },2000);
        $('#chooseData').append('<input type="hidden" name="price" value="' + price + '" class="send_data">');
      })
      //通信が失敗したとき
      .fail((error) => {
        console.log(error);
      });
  });

  $('#send').on('click', function () {
    var dataLen = $('.send_data').length;
    var pLen = parents.length;
    if (dataLen < pLen) {
      alert('項目を選択し、「金額を算出」ボタンより見積額を算出してください。');
      return false;
    }

  });

  var slider1 = new Swiper('.slider1', {
    effect: 'slide',
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  var slider2 = new Swiper('.slider2', {
    effect: 'slide',
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  var slider3 = new Swiper('.slider3', {
    effect: 'slide',
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  var slider4 = new Swiper('.slider4', {
    effect: 'slide',
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
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
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    slider6_[i] = new Swiper('.slider6-' + i, {
      effect: 'slide',
      spaceBetween: 10,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    slider7_[i] = new Swiper('.slider7-' + i, {
      effect: 'slide',
      spaceBetween: 10,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  }

});


$(function () {
  // 置換の対象とするclass属性。
  var $elem = $('.js-image-switch');
  // 置換の対象とするsrc属性の末尾の文字列。
  var sp = '_sp.';
  var pc = '_pc.';
  // 画像を切り替えるウィンドウサイズ。
  var replaceWidth = 768;

  function imageSwitch() {
    // ウィンドウサイズを取得する。
    var windowWidth = parseInt(window.innerWidth);

    // ページ内にあるすべての`.js-image-switch`に適応される。
    $elem.each(function () {
      var $this = $(this);
      // ウィンドウサイズが768px以上であれば_spを_pcに置換する。
      if (windowWidth >= replaceWidth) {
        $this.attr('src', $this.attr('src').replace(sp, pc));

        // ウィンドウサイズが768px未満であれば_pcを_spに置換する。
      } else {
        $this.attr('src', $this.attr('src').replace(pc, sp));
      }
    });
  }
  imageSwitch();

  // 動的なリサイズは操作後0.2秒経ってから処理を実行する。
  var resizeTimer;
  $(window).on('resize', function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      imageSwitch();
    }, 200);
  });
});