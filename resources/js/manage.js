$(function () {

    var btnId = $('.btn-group-toggle .focus').attr('id');
    if(btnId == 'add'){
        $('#edit').removeClass('focus');
        $('#add-form').removeClass('d-none');
        $('#edit-form').addClass('d-none');
    }else if(btnId == 'edit'){
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
        var parentId = $(this).val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post", //HTTP通信の種類
            url: '/manage/getchildren/' + parentId, //通信したいURL
            dataType: 'json'
        })
        //通信が成功したとき
        .done((res) => {
            var count = 0;
            $('#editTarget').empty();

            if(res.length === 0){
                $('#editTitle').val('');
                $('#editText').val('');
                $('#currentImage').attr('src', '');
                $('#currentImageName').val('');
                $('#editCoefficient').val('');
                $('#editParentId option').attr("selected", false);
                $('#editParentId option[value="' + parentId + '"]').prop('selected', true);
            }else{
                $(res).each(function (index, val) {
                    $('#editTarget').append('<option value="' + val.id + '">' + val.title + '</option>');
                    if (count === 0) {
                        $('#editTitle').val(val.title);
                        $('#editText').val(val.text);
                        $('#currentImage').attr('src', $(location).attr('protocol') + '//' + $(location).attr('host') + '/uploads/' + val.file_name);
                        $('#currentImageName').val(val.file_name);
                        $('#editCoefficient').val(val.coefficient);
                        $('#editParentId option').attr("selected", false);
                        $('#editParentId option[value="' + val.parent_id + '"]').prop('selected', true);
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
            url: '/manage/getchild/' + targetId, //通信したいURL
            dataType: 'json'
        })
            //通信が成功したとき
            .done((res) => {
                $('#editTitle').val(res.title);
                $('#editText').val(res.text);
                $('#currentImage').attr('src', $(location).attr('protocol') + '//' + $(location).attr('host') + '/uploads/' + res.file_name);
                $('#currentImageName').val(res.file_name);
                $('#editCoefficient').val(res.coefficient);
                $('#editParentId option').attr("selected", false);
                $('#editParentId option[value="' + res.parent_id + '"]').prop('selected', true);
            })
            //通信が失敗したとき
            .fail((error) => {
                console.log('小項目が見つかりません。');
            });
    });

    $('.children-list ol').sortable({
        update:function(event,ui){
            var count = 1;
            $(this).children('li').each(function(){
                $(this).children('.index').text(count);
                count++;
            });
        }
    });

});