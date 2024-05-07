
let quantityClickBtnChangeDayLichchieu = 0;
function changeDay(i) {
    let lichchieu_wrap = document.querySelector("#lichchieuphim_daytime ul");
    switch (i.getAttribute('name')) {
        case "btn_left":
            document.querySelectorAll("#lichchieuphim_daytime ul li")[Math.abs(-quantityClickBtnChangeDayLichchieu)].setAttribute('id', "");
            quantityClickBtnChangeDayLichchieu++;
            document.querySelectorAll("#lichchieuphim_daytime ul li")[Math.abs(-quantityClickBtnChangeDayLichchieu)].setAttribute('id', "lichchieuphim_selected");
            lichchieu_wrap.style = 'transform:  translateX(calc(' + quantityClickBtnChangeDayLichchieu + '* 72px));';
            if (quantityClickBtnChangeDayLichchieu == 0)
                document.getElementsByClassName('lichchieuphim_header_btn ')[0].style = "display:none;";
            else
                document.getElementsByClassName('lichchieuphim_header_btn ')[1].style = "display:flex;";
            break;
        default:
            document.getElementsByClassName('lichchieuphim_header_btn ')[0].style = "display:flex;";
            // console.log(document.querySelectorAll("#lichchieuphim_daytime ul li")[Math.abs(-quantityClickBtnChangeDayLichchieu)]);
            document.querySelectorAll("#lichchieuphim_daytime ul li")[Math.abs(-quantityClickBtnChangeDayLichchieu)].setAttribute('id', "");
            quantityClickBtnChangeDayLichchieu--;
            document.querySelectorAll("#lichchieuphim_daytime ul li")[Math.abs(-quantityClickBtnChangeDayLichchieu)].setAttribute('id', "lichchieuphim_selected");
            lichchieu_wrap.style = 'transform:  translateX(calc(' + quantityClickBtnChangeDayLichchieu + '* 72px));';
            if (quantityClickBtnChangeDayLichchieu == -5)
                document.getElementsByClassName('lichchieuphim_header_btn ')[1].style = "display:none;";
            else
                document.getElementsByClassName('lichchieuphim_header_btn ')[1].style = "display:flex;";
            break;
    }
}

// user 

$('#users_wrap').ready(function () {
    $('.user > i.fa-pen-to-square').each(function () {
        $(this).on('click', function () {
            let keywork = $(this).attr('name');
            $.ajax({
                url: './pages/usersadmin.php',
                type: 'GET',
                data: { USERNAME: keywork },
                success: function (result) {
                    $("#content").html(result);
                    $('#unclick_behind_this_screen').css('display', 'block');
                    $('#users_wrap_change').css('display', 'grid');

                    $('#users_wrap_change #btn_exit').on('click', function () {
                        $('#unclick_behind_this_screen').css('display', 'none');
                        $('#users_wrap_change').css({ 'display': 'none' });
                    }),
                        $.ajax({
                            url: './js/admin.js',
                            success: function (result) {

                            },
                            error: function (xhr, status, error) {
                                // Xử lý lỗi nếu có
                            }
                        });
                    $('#btnDelAll').on('click',function(){
                        $('input[name="hoten"]').val('');
                        $('input[name="email"]').val('');
                    })

                },
                error: function (xhr, status, error) {
                    console.error("AJAX request failed:", status, error);
                }
            });
        });
    });
    $('.user i.fa-trash').each(function(){
        $(this).on('click', function(){
            let keywork = $(this).attr('name');
            $.ajax({
                url:'./pages/usersadmin.php',
                type: 'GET',
                data: {userdel: keywork},
                success: function(result){
                    $("#content").html(result);
                    $.ajax({
                        url: './js/admin.js',
                        success: function (result) {

                        },
                        error: function (xhr, status, error) {
                            // Xử lý lỗi nếu có
                        }
                    });
                }
            })
        })
    })
});



$(document).ready(function () {
    // Hàm kiểm tra nếu trang có tham số 'error' trong URL
    function checkErrorParam() {
        var urlParams = new URLSearchParams(window.location.search);
        return urlParams.has('error');
    }

    // Nếu trang có tham số 'error' thì hiển thị form thêm tài khoản
    if (checkErrorParam()) {
        $("#account__box").css('display', 'block');
        $('#unclick_behind_this_screen').css('display', 'block');
    }

    // Bắt sự kiện click vào nút thêm tài khoản
    $("#acount__add").on('click', function () {
        $("#account__box").css('display', 'block');
        $('#unclick_behind_this_screen').css('display', 'block');
    });

    // Bắt sự kiện click vào biểu tượng đóng form
    $("#account__icon").on('click', function () {
        $("#account__box").css('display', 'none');
        $('#unclick_behind_this_screen').css('display', 'none');
        window.location.href = 'http://localhost/doan_web2/admin.php?page=usersadmin';
    });
});



//end user


$(".chucnangcon_wrap").find(".chucnangcon_Phim").ready(function () {
    $(".chucnangcon_Phim").on('click', function () {
        let luachon = $(this).attr("name");
        let url_link = '';
        switch ($(".chucnang_wrap").attr('name')) {
            case "chucnangPhim":
                url_link = './pages/chucnangPhim.php';
                break;
            case "chucnangLichchieuphim":
                url_link = './pages/chucnangLichchieuphim.php';
                break;
        }
        $.ajax({

            url: url_link,
            type: "GET",
            data: { pagecon: luachon },
            success: function (response) {
                $("#content").html(response); // Thay đổi nội dung của #content
                $.ajax({
                    url: "./js/admin.js",
                    success: function (response) {
                        // Xử lý dữ liệu từ yêu cầu AJAX thứ hai
                    },
                    error: function (xhr, status, error) {
                        // Xử lý lỗi nếu có
                    }
                });
            }
        });
    });
});


//movie
$('#movies').find('.movie').ready(function () {
    $('.movie').on('mouseenter', function () {
        $(this).find('.click_change_infor_movie').css({
            'display': 'flex',
        });
    });
    $('.movie').on('mouseleave', function () {
        $(this).find('.click_change_infor_movie').css('display', 'none');
    });
    $('.movie').on('click', function () {
        let maphim = $(this).attr('name');

        $.ajax({
            url: "./pages/chucnangPhim.php",
            type: "GET",
            data: { MAPM: maphim },
            success: function (response) {
                $("#content").html(response); // Thay đổi nội dung của #content
                $('#unclick_behind_this_screen').css('display', 'block');
                $.ajax({
                    url: "./js/admin.js",
                    success: function (response) {
                        // Xử lý dữ liệu từ yêu cầu AJAX thứ hai
                    },
                    error: function (xhr, status, error) {
                        // Xử lý lỗi nếu có
                    }
                });
            }
        });
    });
    $('#movie_change_infor').ready(function () {

        // $('#movie_change_infor').css('display','flex');
        $('#movie_change_infor').find('#btn_exit').on('click', function () {
            $('#unclick_behind_this_screen').css('display', 'none');
            $('#movie_change_infor').css('display', 'none');
        });
    });


    $('#movie_change_infor').find('#click_show_infor_movie_new').ready(function () {
        $('#movie_change_infor').find('#click_show_infor_movie_new').on('click', function () {
            let status = $('#movie_change_infor').find('#click_show_infor_movie_new').attr('name');
            switch (status) {
                case "show":

                    $('#movie_change_infor').find('#click_show_infor_movie_new').html('<i class="fa-solid fa-arrow-left" style="margin-right:10px;"></i>Quay lại');
                    $('#movie_change_infor').find('#show_infor_movie_new').css('display', 'block');
                    $('#movie_change_infor').find('#click_show_infor_movie_new').attr('name', 'hide');
                    break;
                case "hide":

                    $('#movie_change_infor').find('#click_show_infor_movie_new').html('Chỉnh sửa phim<i class="fa-solid fa-arrow-right"></i>');
                    $('#movie_change_infor').find('#show_infor_movie_new').css('display', 'none');
                    $('#movie_change_infor').find('#click_show_infor_movie_new').attr('name', 'show');
                    break;
            }
        });
    });
});
$('#show_infor_movie_new').find('#click_show_theloai').ready(function () {
    $('#show_infor_movie_new').find('#click_show_theloai').on('click', function () {
        let status = $('#show_infor_movie_new').find('#click_show_theloai').attr('name');
        switch (status) {
            case "show":
                $('#click_show_theloai').html('Click để ẩn thể loại');
                $('#show_list_theloai').css('display', 'block');
                $('#click_show_theloai').attr('name', 'hide');
                break;
            case "hide":
                $('#click_show_theloai').html('Click để chọn thể loại');
                $('#show_list_theloai').css('display', 'none');
                $('#click_show_theloai').attr('name', 'show');
                break;
        }
    });
});


$('.lichchieuphim_phim').ready(function () {
    $('.lichchieuphim_phim').find('.edit_suatchieu').on('click', function () {
        $('#change_lichchieuphim_phim').ready(function () {
            $('#unclick_behind_this_screen').css('display', 'block');
            $('#change_lichchieuphim_phim').css('display', 'flex');
            $('.lichchieuphim_lichchieu').on('click', function () {
                $('#hide_choose_new_suatchieu').css('display', 'none');
                $('#div_choose_new_suatchieu').ready(function () {
                    $('#div_choose_new_suatchieu').css('display', 'grid');
                });
            });
            $('#exit_edit_suatchieu').on('click', function () {
                $('#hide_choose_new_suatchieu').css('display', 'block');
                $('#div_choose_new_suatchieu').css('display', 'none');
                $('#unclick_behind_this_screen').css('display', 'none');
                $('#change_lichchieuphim_phim').css('display', 'none');
            });
        });
    });
});

// ticket-history
$('#history_ticket_wrap').ready(function () {
    $('.icon-show').on('click', function () {
        let keywork = $(this).attr('name');
        $.ajax({
            url: './pages/lsdatveadmin.php',
            type: 'GET',
            data: { MAVE: keywork },
            success: function (result) {
                $('#content').html(result);
                $('#unclick_behind_this_screen').css('display', 'block');
                $('#ticket-history').css('display', 'block');
                $('#icon-close').on('click', function () {
                    $('#unclick_behind_this_screen').css('display', 'none');
                    $('#ticket-history').css('display', 'none');
                });
                $.ajax({
                    url: "./js/admin.js",
                    success: function (result) {

                    },
                    error: function (xhr, status, error) {
                        // Xử lý lỗi nếu có
                    }
                });
            }
        });
    });
});


// end ticket-history



