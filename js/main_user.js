document.querySelector('.information_user').addEventListener('click', () => {
    document.querySelector('.display-status').innerHTML = `
        <span><i class="fa-solid fa-user"></i></span>
        <span>Thông tin tài khoản</span>
    `
    document.querySelector('.right-side__wrapper').innerHTML = `
                <div class="right-info__item">
                    <label class="right-info__item-name">Tên tài khoản</label>
                    <input type="text" class="right-info__item-input readonly" value="VoAnhTuan" readonly>
                </div>
                <div class="right-info__item">
                    <label for="Tên của bạn" class="right-info__item-name">Tên của bạn</label>
                    <input type="text" class="right-info__item-input" id="Tên của bạn">
                </div>
                <div class="right-info__item">
                    <label for="Địa chỉ email" class="right-info__item-name">Địa chỉ email</label>
                    <input type="text" class="right-info__item-input" id="Địa chỉ email">
                </div>
                <div class="right-info__item">
                    <label for="Số điện thoại" class="right-info__item-name">Số điện thoại</label>
                    <input type="text" class="right-info__item-input" id="Số điện thoại">
                </div>
                <div class="right-info__item">
                    <label for="Địa chỉ" class="right-info__item-name">Địa chỉ</label>
                    <input type="text" class="right-info__item-input" id="Địa chỉ">
                </div>

    `
});
document.querySelector('.change_password').addEventListener('click', () => {
    document.querySelector('.display-status').innerHTML = `
        <span><i class="fa-solid fa-lock"></i></span>
        <span>Đổi mật khẩu</span>
    `
    document.querySelector('.right-side__wrapper').innerHTML = `
    <div class="right-info__item">
    <label for="Mật khẩu hiện tại" class="right-info__item-name">Mật khẩu hiện tại</label>
    <input type="text" class="right-info__item-input" id="Mật khẩu hiện tại">
</div>
<div class="right-info__item">
    <label for="Mật khẩu mới" class="right-info__item-name">Mật khẩu mới</label>
    <input type="text" class="right-info__item-input" id="Mật khẩu mới">
</div>
<div class="right-info__item">
    <label for="Nhập lại mật khẩu" class="right-info__item-name">Nhập lại mật khẩu</label>
    <input type="text" class="right-info__item-input" id="Nhập lại mật khẩu">
</div>
    `
});