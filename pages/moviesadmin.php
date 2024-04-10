<?php 
    echo '<div id="movies" >
    <span class="movie">
    <img src="img/30196263872528348-thumb.jpg">
    <h4>Tên phimâ faf  dafaf affa afafaffafaf</h4>
    <h5>Thể loại</h5>
    <span class="age_movie">18+</span>
    <div class="click_change_infor_movie">Click de chinh sua</div>
</span>
<span class="movie">
    <img src="img/33735630744753025-jWYfucBwXG3ePh97bM5ReT1q65X.jpg">
    <h4>Tên phimâ faf  dafaf affa afafaffafaf</h4>
    <h5>Thể loại</h5>
    <span class="age_movie">18+</span>
    <div class="click_change_infor_movie">Click de chinh sua</div>
</span>
<span class="movie">
    <img src="img/29781412891477187-pESvdmYDwql55onKDRAMbXOZp7S.jpg">
    <h4>Tên phimâ faf  dafaf affa afafaffafaf</h4>
    <h5>Thể loại</h5>
    <span class="age_movie">18+</span>
    <div class="click_change_infor_movie">Click de chinh sua</div>
</span>
<span class="movie">
    <img src="img/gaudo-220615131816-637908958963826436.jpg">
    <h4>Tên phimâ faf  dafaf affa afafaffafaf</h4>
    <h5>Thể loại</h5>
    <span class="age_movie">13+</span>
    <div class="click_change_infor_movie">Click de chinh sua</div>
</span>
<span class="movie">
    <img src="img/logoweb_admin.png">
    <h4>Tên phimâ faf  dafaf affa afafaffafaf</h4>
    <h5>Thể loại</h5>
    <span class="age_movie">18+</span>
    <div class="click_change_infor_movie">Click de chinh sua</div>
</span>
</div>
<div id="movie_change_infor">
    <div id="show_infor_movie_old" class="show_change_movie">
    
    <img src="img/gaudo-220615131816-637908958963826436.jpg">
    <span class="show_infor_movie">
        <span class="infor_age_movie">18+</span>
        <h3 style="text-transform:uppercase;">Ten phim</h3>   
        <div class="quocgia_movie">Han Quoc</div>
        <div class="thoiluong_movie">114 phut</div>
        <div class="noidung_movie">noi dungasd hasdha shdasjkdh asjdh dhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhdhasjkhasjdhasjdhjkasdhasjkdhasjdhasjdhas</div>
        <div class="table_day_theloai">
            <div>Ngay chieu</div>
            <div>The loai</div>
            <div class="ngaychieu_movie">22/20/2023</div>
            <div class="theloai_movie">Kinh di, Trinh tham, Tam ly</div>
        </div>
        <a href="https://openai.com" class="show_trailer_movie" target="_blank">Click de xem Trailer</a>
        <div class="click_show_change_movie">
            <i class="fa-solid fa-trash"></i>
            <span id="click_show_infor_movie_new" name="show">Chinh sua phim <i class="fa-solid fa-arrow-right"></i><span>
        </div>
    </span>
    </div>
    <form>
    <div id="show_infor_movie_new" class="show_change_movie">
        <span class="show_infor_movie">
            <div id="change_picture_movie">
                <span>Thay doi anh</span>
                <input type="file" style="margin:8px 0;">
            </div>
            <div id="change_dotuoi_movie" class="change_infor_movie">
            <span>Do tuoi</span>
            <input type="text" style="margin:8px 0;" placeholder="18">
            </div>
            <div id="change_name_movie" class="change_infor_movie">
            <span>Ten phim</span>
            <input type="text" style="margin:8px 0;" placeholder="Gau do bien hinh">
            </div>
            <div id="change_quocgia_movie" class="change_infor_movie">
            <span>Quoc gia</span>
            <input type="text" style="margin:8px 0;" placeholder="Han Quoc">
            </div>
            <div id="change_thoiluong_movie" class="change_infor_movie">
            <span>Thoi luong</span>
            <input type="text" style="margin:8px 0;" placeholder="114 phut">
            </div>
            <div id="change_noidung_movie" class="change_infor_movie">
            <span>Noi dung</span>
            <input type="text" style="margin:8px 0;" placeholder="fasfsfasfafassaadfa">
            </div>
            <div id="change_ngaychieu_movie" class="change_infor_movie">
            <span>Ngay chieu</span>
            <input type="date" style="margin:8px 0;">
            </div>
            <div id="change_theloai_movie" class="change_infor_movie">
            <span>The loai</span>
            <span id="click_show_theloai" name="show" >
                <div>Click de chon the loai</div>
                <span id="show_list_theloai">
                    <label for="tamly">
                        <input type="checkbox" name="tamly">
                        <span>Tam ly</span>
                    </label>
                    <label for="tamly">
                        <input type="checkbox" name="tamly">
                        <span>Tam ly</span>
                    </label>
                    <label for="tamly">
                        <input type="checkbox" name="tamly">
                        <span>Tam ly</span>
                    </label>
                    <label for="tamly">
                        <input type="checkbox" name="tamly">
                        <span>Tam ly</span>
                    </label>
                    <label for="tamly">
                        <input type="checkbox" name="tamly">
                        <span>Tam ly</span>
                    </label>
                </span>
            <span>
            </div>
            <div id="change_trailer_movie" class="change_infor_movie">
            <span>Trailer</span>
            <input type="text" style="margin:8px 0;" placeholder="lick trailer cu">
            </div>
            <div id="btn_wrap_change_user">
                <button type="reset">Xóa tất cả</button>
                <button type="submit">Xác nhận</button>
            </div>
        </span>
    </div>
    </form>
    <span id="btn_exit"><i class="fa-solid fa-x"></i></span>
</div>
';


?>