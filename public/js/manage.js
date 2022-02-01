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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/manage.js":
/*!********************************!*\
  !*** ./resources/js/manage.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  var btnId = $('.btn-group-toggle .focus').attr('id');

  if (btnId == 'add') {
    $('#edit').removeClass('focus');
    $('#add-form').removeClass('d-none');
    $('#edit-form').addClass('d-none');
  } else if (btnId == 'edit') {
    $('#add').removeClass('focus');
    $('#edit-form').removeClass('d-none');
    $('#add-form').addClass('d-none');
  } // 小項目の追加、編集切り替えボタン


  $('#add').on('click', function () {
    $('#edit').removeClass('focus');
    $('#add-form').removeClass('d-none');
    $('#edit-form').addClass('d-none');
  });
  $('#edit').on('click', function () {
    $('#add').removeClass('focus');
    $('#edit-form').removeClass('d-none');
    $('#add-form').addClass('d-none');
  }); // 小項目編集の親項目選択時のAjax処理

  $('#editParent').on('change', function () {
    var parentPre = $(this).val();
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });
    $.ajax({
      type: "post",
      //HTTP通信の種類
      url: '/management/getchildren/' + parentPre,
      //通信したいURL
      dataType: 'json'
    }) //通信が成功したとき
    .done(function (res) {
      var count = 0;
      $('#editTarget').empty();

      if (res.length === 0) {
        $('#editTitle').val('');
        $('#editText').val('');
        $('#currentImage').attr('src', '');
        $('#currentImageName').val('');
        $('#editCoefficient').val('');
        $('#editParentPrefix option').attr("selected", false);
        $('#editParentPrefix option[value="' + parentPre + '"]').prop('selected', true);
      } else {
        $(res).each(function (index, val) {
          $('#editTarget').append('<option value="' + val.id + '">' + val.title + '</option>');

          if (count === 0) {
            $('#editTitle').val(val.title);
            $('#editText').val(val.text);
            $('#currentImage').attr('src', $(location).attr('protocol') + '//' + $(location).attr('host') + '/uploads/' + val.file_name);
            $('#currentImageName').val(val.file_name);
            $('#editCoefficient').val(val.coefficient);
            $('#editParentPrefix option').attr("selected", false);
            $('#editParentPrefix option[value="' + val.prefix + '"]').prop('selected', true);
          }

          count++;
        });
      }
    }) //通信が失敗したとき
    .fail(function (error) {});
  }); // 小項目編集の小項目選択時のAjax処理

  $('#editTarget').on('change', function () {
    var targetId = $(this).val();
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });
    $.ajax({
      type: "post",
      //HTTP通信の種類
      url: '/management/getchild/' + targetId,
      //通信したいURL
      dataType: 'json'
    }) //通信が成功したとき
    .done(function (res) {
      $('#editTitle').val(res.title);
      $('#editText').val(res.text);
      $('#currentImage').attr('src', $(location).attr('protocol') + '//' + $(location).attr('host') + '/uploads/' + res.file_name);
      $('#currentImageName').val(res.file_name);
      $('#editCoefficient').val(res.coefficient);
      $('#editParentPrefix option').attr("selected", false);
      $('#editParentPrefix option[value="' + res.prefix + '"]').prop('selected', true);
    }) //通信が失敗したとき
    .fail(function (error) {
      console.log('小項目が見つかりません。');
    });
  });
  $('.children-list ol').sortable({
    update: function update(event, ui) {
      var count = 1;
      $(this).children('li').each(function () {
        $(this).children('.index').text(count);
        count++;
      });
      var idArray = [];
      $('.child_id').each(function (index, element) {
        idArray.push($(element).val());
      });
      var idJson = JSON.stringify(idArray);
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
      });
      $.ajax({
        type: "post",
        //HTTP通信の種類
        url: '/management/child/order/',
        //通信したいURL
        data: {
          'json': idJson
        },
        dataType: 'json'
      }) //通信が成功したとき
      .done(function (res) {
        var now = new Date();
        var yy = now.getFullYear();
        var mm = now.getMonth() + 1;
        var dd = now.getDate();
        var h = now.getHours();
        var m = now.getMinutes();
        var s = now.getSeconds();
        $('#true').removeClass('d-none').text(yy + '/' + mm + '/' + dd + ' ' + h + ':' + m + ':' + s + ' 並び順を更新しました。');
      }) //通信が失敗したとき
      .fail(function (error) {
        console.log(error);
        alert('正常に更新できませんでした。');
      });
    }
  });
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/manage.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/estimate-system-sample/resources/js/manage.js */"./resources/js/manage.js");


/***/ })

/******/ });