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
    }

    // 小項目の追加、編集切り替えボタン
    $('#add').on('click', function () {
        $('#edit').removeClass('focus');
        $('#add-form').removeClass('d-none');
        $('#edit-form').addClass('d-none');
    });
    $('#edit').on('click', function () {
        $('#add').removeClass('focus');
        $('#edit-form').removeClass('d-none');
        $('#add-form').addClass('d-none');
    });


    // 小項目編集の親項目選択時のAjax処理
    $('#editParent').on('change', function () {
        var parentPre = $(this).val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post", //HTTP通信の種類
            url: '/management/getchildren/' + parentPre, //通信したいURL
            dataType: 'json'
        })
            //通信が成功したとき
            .done((res) => {
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
                    })
                }

            })
            //通信が失敗したとき
            .fail((error) => {

            });
    });

    // 小項目編集の小項目選択時のAjax処理
    $('#editTarget').on('change', function () {
        var targetId = $(this).val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post", //HTTP通信の種類
            url: '/management/getchild/' + targetId, //通信したいURL
            dataType: 'json'
        })
            //通信が成功したとき
            .done((res) => {
                $('#editTitle').val(res.title);
                $('#editText').val(res.text);
                $('#currentImage').attr('src', $(location).attr('protocol') + '//' + $(location).attr('host') + '/uploads/' + res.file_name);
                $('#currentImageName').val(res.file_name);
                $('#editCoefficient').val(res.coefficient);
                $('#editParentPrefix option').attr("selected", false);
                $('#editParentPrefix option[value="' + res.prefix + '"]').prop('selected', true);
            })
            //通信が失敗したとき
            .fail((error) => {
                console.log('小項目が見つかりません。');
            });
    });

    $('.children-list ol').sortable({
        update: function (event, ui) {
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
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                type: "post", //HTTP通信の種類
                url: '/management/child/order/', //通信したいURL
                data: { 'json': idJson },
                dataType: 'json'
            })
                //通信が成功したとき
                .done((res) => {

                    var now = new Date();
                    var yy = now.getFullYear();
                    var mm = now.getMonth() + 1;
                    var dd = now.getDate();
                    var h = now.getHours();
                    var m = now.getMinutes();
                    var s = now.getSeconds();

                    $('#true').removeClass('d-none').text(yy+'/'+mm+'/'+dd+' '+h+':'+m+':'+s+' 並び順を更新しました。');
                })
                //通信が失敗したとき
                .fail((error) => {
                    console.log(error);
                    alert('正常に更新できませんでした。')
                });
        }
    });

});