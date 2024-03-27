<div class="wrapper">
    <div class="left-side">
        <div class="left-side__wrapper">
            <div class="display-status">
                <span><i class="fa-solid fa-user"></i></span>
                <span>Thông tin tài khoản</span>
            </div>
            <div class="background-avatar">
                <div class="avatar">
                    <div class="anhr"></div>
                </div>
            </div>
            <div class="user-name">
                <h1>VoAnhTuan</h1>
            </div>
            <div class="option__wrapper">
                <button class="option-item information_user">
                    <span><i class="fa-solid fa-user"></i></span>
                    <span>Thông tin tài khoản</span>
                </button>

                <button class="option-item change_password">
                    <span><i class="fa-solid fa-lock"></i></span>
                    <span>Đổi mật khẩu</span>
                </button>
            </div>
        </div>
    </div>
    <div class="right-side">
    <?php 
    // basename($_SERVER['PHP_SELF']) === 'informationUser.php'
    if(isset($_GET['id'])&&$_GET['id']==='pass'){
        include "update_pass_user.php";
    }else{
        include "update_user.php";
    }
    ?>
    </div>
</div>
<script>
    document.querySelector(".information_user").addEventListener("click",()=>{
        window.location.href = "informationUser.php";
    });
    document.querySelector(".change_password").addEventListener("click",()=>{
        window.location.href = "informationUser.php?id=pass";
    });
</script>