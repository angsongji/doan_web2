// Xử lý Pop up video trailer
let iconClosePopUp = document.querySelector('#icon-close-popup');
let containerPopUp = document.querySelector('.container-popup');

iconClosePopUp.addEventListener(
    "click",
    (e) => {
        containerPopUp.style.display = 'none';
    },
    false
)

let playIcon = document.querySelector('#play-icon');

playIcon.addEventListener(
    'click',
    (e) => {
        containerPopUp.style.display = 'block';
    },
    false
)

// Xử lý lịch chiếu phim 
const listDays = document.querySelector('.list-days');
const days = document.getElementsByClassName('day');
const btnLeft = document.querySelector('#btn-left');
const btnRight = document.querySelector('#btn-right');
const length = days.length;
let current = 0;

btnLeft.addEventListener(
    'click',
    (e) => {
        if (current == 0) {
            current = length - 1;
            let width = days[0].offsetWidth;
            listDays.style.transform = `translateX(${-width * current}px)`;
        } else {
            current--;
            let width = days[0].offsetWidth;
            listDays.style.transform = `translateX(${-width * current}px)`; 
        }
    }
)

btnRight.addEventListener(
    'click',
    (e) => {
        if(current == length - 1) {
            current = 0;
            let width = days[0].offsetWidth;
            listDays.style.transform = `translateX(0px)`;
        } else {
            current++;
            let width = days[0].offsetWidth;
            listDays.style.transform = `translateX(${width * -1 * current}px)`; 
        }
    }
)

// Xử lý sự kiện click vào ngày chiếu hiển thị giờ chiếu tương ứng
const day = document.querySelectorAll('.day');
const hours = document.querySelectorAll('.hour');

for(let i = 0; i < day.length; i++) {
    day[i].addEventListener(
        'click',
        (e) => {
            for(let j = 0; j < hours.length; j++) {
                if(day[i].getAttribute('ngaychieu') == hours[j].getAttribute('ngaychieu')) {
                    hours[j].style.display = 'flex';
                } else {
                    hours[j].style.display = 'none';
                }
            }
        }, 
        false
    );
}

// Xử lý sự kiện đóng menu-chon-ghe
const iconCloseMenuChonGhe = document.querySelector('#icon-close-menu-chon-ghe');
const containerPopupMenuChonGhe = document.querySelector('.container-popup-menu-chon-ghe');

iconCloseMenuChonGhe.addEventListener(
    "click",
    (e) => {
        containerPopupMenuChonGhe.style.display = "none";
    },
    false
)

// Xử lý sự kiện đóng menu-chon-nuoc
const iconCloseMenuChonNuoc = document.querySelector('#icon-close-menu-chon-nuoc');
const containerPopupMenuChonNuoc = document.querySelector('.container-pop-up-menu-chon-nuoc');

iconCloseMenuChonNuoc.addEventListener(
    "click",
    (e) => {
        containerPopupMenuChonNuoc.style.display = "none";
        for( let i = 0; i < soLuongs.length; i++) {
                let soLuongStr = soLuongs[i].textContent.trim();
                let soLuong = isNaN(soLuongStr) ? 0 : parseInt(soLuongStr); 
                soLuong = 0; 

                let tongCongStr = tongCongs.textContent.trim();
                let tongCong = isNaN(tongCongStr) ? 0 : parseInt(tongCongStr);
                tongCong = 0; 
            
                soLuongs[i].textContent = soLuong.toString();
                tongCongs.textContent = tongCong.toString();
        }
        
        containerPopupMenuChonGhe.style.display = "flex";
    },
    false
)

// Xử lý sự kiện mở menu-chon-nuoc
const btnMuaVe = document.querySelector("#btn-mua-ve");

btnMuaVe.addEventListener(
    "click",
    (e) => {
        containerPopupMenuChonNuoc.style.display = "flex";

        containerPopupMenuChonGhe.style.display = "none";
    },
    false
)

// Xử lý sự kiện mở menu-thanh-toan
const btnTiepTuc = document.querySelector("#tong-tien-bap-nuoc h4");
const containerPopupMenuThanhToan = document.querySelector('.container-pop-up-menu-thanh-toan');

btnTiepTuc.addEventListener(
    "click",
    (e) => {
        containerPopupMenuThanhToan.style.display = "flex";

        containerPopupMenuChonNuoc.style.display = "none";
    },
    false
)

// Xử lý sự kiện đóng menu-thanh-toan
const iconCloseMenuThanhToan = document.querySelector('#icon-close-menu-thanh-toan');

iconCloseMenuThanhToan.addEventListener(
    "click",
    (e) => {
        containerPopupMenuThanhToan.style.display = "none";

        containerPopupMenuChonNuoc.style.display = "flex";
    },
    false
)

// || Xử lý sự kiện lấy dữ liệu cho vé đã mua
let phongChieuThanhToan;
let soGheDaChonThanhToan;
let thoiGianChieuThanhToan;
let ngayChieuThanhToan;
let thucPhamDaChon = [];
let tongCongThucPhamThanhToan;

function showThongTinVeDaMua() {
    document.querySelector('#thoi-gian-chieu-thanh-toan_tg').textContent = document.querySelector('#tieu-de-phim time').textContent;
    document.querySelector('#ngay-chieu-thanh-toan_nc').textContent = document.querySelector('#tieu-de-phim date').textContent;
    document.querySelector('#phong-chieu-thanh-toan_pc').textContent = phongChieuThanhToan;
    document.querySelector('#ghe-thanh-toan_ghe').textContent = document.querySelector('#so-ghe-da-chon').textContent;
    document.querySelector('#so-tien-thanh-toan_sotien').textContent = document.querySelector('#tam-tinh').textContent;
}

// || Xử lý sự kiện ngày chiếu, thời gian chiếu, phòng chiếu, ghế đã chọn, thực phẩm đã chọn, vé 
// Xử lý sự kiện hiển thị ghế theo mã phòng chiếu bằng async
function showGhe(MAPM, MAPHONGCHIEU) {
    return new Promise((resolve, reject) => {
        if (MAPHONGCHIEU === "") {
            document.getElementById("row-ghe").innerHTML = "";
            reject("MAPHONGCHIEU is empty");
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("row-ghe").innerHTML = this.responseText;
                    resolve("Data loaded successfully");
                }
            };
            xmlhttp.open("GET", "./pages/xu-ly-chon-phong.php?MAPM=" + MAPM + "&&MAPHONGCHIEU=" + MAPHONGCHIEU, true);
            xmlhttp.send();
        }
    });
}   

function clickChonGhe() {
    return new Promise((resolve, reject) => {
        // Xu ly su kien ghe don
        let gheDons = document.querySelectorAll('.ghe-don div');
        let lengthGheDons = gheDons.length;
        let choNgoi = document.getElementById('so-ghe-da-chon');
        let tamTinhs = document.getElementById('tam-tinh');

        gheDons.forEach((ghe) => {
            ghe.addEventListener(
                'click', 
                (e) => {
                    if (!e.target.classList.contains('daMua')) {
                        e.target.classList.toggle('daChon');
                        if (e.target.classList.contains('daChon')) {
                            choNgoi.textContent += e.target.textContent + " ";

                            let giaGheStr = ghe.getAttribute('price').trim();
                            let giaGhe = isNaN(giaGheStr) ? 0 : parseInt(giaGheStr);
                            
                            let tamTinhStr = tamTinhs.textContent.trim();
                            let tamTinh = isNaN(tamTinhStr) ? 0 : parseInt(tamTinhStr);
                            tamTinh += giaGhe; 
                            
                            tamTinhs.textContent = tamTinh.toString();
                        } else {
                            choNgoi.textContent = choNgoi.textContent.replace(e.target.textContent, '');

                            let giaGheStr = ghe.getAttribute('price').trim();
                            let giaGhe = isNaN(giaGheStr) ? 0 : parseInt(giaGheStr);
                            
                            let tamTinhStr = tamTinhs.textContent.trim();
                            let tamTinh = isNaN(tamTinhStr) ? 0 : parseInt(tamTinhStr);
                            tamTinh -= giaGhe; 
                            
                            tamTinhs.textContent = tamTinh.toString();
                        }
                    }
                });
        });

        // Xu ly su kien ghe doi
        let gheDois = document.querySelectorAll('.ghe-doi div');
        let lengthGheDois = gheDois.length;

        gheDois.forEach((ghe) => {
            ghe.addEventListener(
                'click', 
                (e) => {
                    if (!e.target.classList.contains('daMua')) {
                        e.target.classList.toggle('daChon');
                        if (e.target.classList.contains('daChon')) {
                            choNgoi.textContent += e.target.textContent;

                            let giaGheStr = ghe.getAttribute('price').trim();
                            let giaGhe = isNaN(giaGheStr) ? 0 : parseInt(giaGheStr);
                            
                            let tamTinhStr = tamTinhs.textContent.trim();
                            let tamTinh = isNaN(tamTinhStr) ? 0 : parseInt(tamTinhStr);
                            tamTinh += giaGhe; 
                            
                            tamTinhs.textContent = tamTinh.toString();
                        } else {
                            choNgoi.textContent = choNgoi.textContent.replace(e.target.textContent, '');

                            let giaGheStr = ghe.getAttribute('price').trim();
                            let giaGhe = isNaN(giaGheStr) ? 0 : parseInt(giaGheStr);
                            
                            let tamTinhStr = tamTinhs.textContent.trim();
                            let tamTinh = isNaN(tamTinhStr) ? 0 : parseInt(tamTinhStr);
                            tamTinh -= giaGhe; 
                            
                            tamTinhs.textContent = tamTinh.toString();
                        }
                    }
                });
        });
    });
}

const xuLySuKienHienThiGhe = async (MAPM, MAPHONGCHIEU) => {
    try {
        const showGhePromise = showGhe(MAPM, MAPHONGCHIEU);
        console.log("showGhe: ", await showGhePromise);
        const clickChonGhePromise = clickChonGhe();
        console.log("clickChonGhe: ", await clickChonGhePromise);
    } catch (error) {
        console.log(error);
    }
}

// Xử lý sự kiện mở menu-chon-ghe
function guiThongTinDenXuLyHienThiPhongChieu(maphim, masuatchieu) {
    return new Promise((resolve, reject) => {
        if (masuatchieu === "") {
            reject("MASUATCHIEU is empty");
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("chon-phong").innerHTML = this.responseText;
                    console.log(this.responseText);
                    resolve("guiThongTinDenXuLyHienThiPhongChieu successfully");
                }
            };
            xmlhttp.open("GET", "./pages/xu-ly-hien-thi-phong-chieu.php?MAPM=" + maphim + "&&MASC=" + masuatchieu, true);
            xmlhttp.send();
        }
    });
}   

function hienThiMenuChonGhe() {
    return new Promise((resolve, reject) => {
        // Hiển thị giao diện menu chọn ghế
        containerPopupMenuChonGhe.style.display = "flex";
        // Xử lý sự kiện click vào phòng chiếu hiển thị ghế
        const chonPhong = document.querySelectorAll('.phong');
        for(let i = 0; i < chonPhong.length; i++) {
            let MAPM = chonPhong[i].getAttribute('maphim');
            let MAPHONGCHIEU = chonPhong[i].getAttribute('maphongchieu');

            chonPhong[i].addEventListener(
                'click',
                () => { 
                    xuLySuKienHienThiGhe(MAPM, MAPHONGCHIEU);
                    phongChieuThanhToan = chonPhong[i].getAttribute('tenphong');
                    document.querySelector('#so-ghe-da-chon').textContent = "";
                    document.querySelector('#tam-tinh').textContent = 0;
                },
                false
            );
        }

        let btnTiepTucThanhToan = document.querySelector('#tong-tien-bap-nuoc h4');
        btnTiepTucThanhToan.addEventListener(
            'click',
            (e) => {
                showThongTinVeDaMua();
            },
            false
        )
        resolve("Menu displayed successfully");
    });
}   

function hienThiTieuDePhimTrongMenuChonGhe(tenphim, maphim, masuatchieu) {
    return new Promise((resolve, reject) => {
        if (masuatchieu === "") {
            reject("MASUATCHIEU is empty");
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("tieu-de-phim").innerHTML = this.responseText;
                    resolve("Hien Thi Tieu De Phim successfully");
                }
            };
            xmlhttp.open("GET", "./pages/xu-ly-hien-thi-phong-chieu.php?TENPHIM=" + tenphim + "&&MASC=" + masuatchieu, true);
            xmlhttp.send();
        }
    });
}

const xuLySuKienHienThiMenuChonGhe = async (tenphim, maphim, masuatchieu) => {
    try {
        const guiThongTinDenXuLyHienThiPhongChieuPromise = guiThongTinDenXuLyHienThiPhongChieu(maphim, masuatchieu);
        console.log(await guiThongTinDenXuLyHienThiPhongChieuPromise);

        const hienThiTieuDePhimTrongMenuChonGhePromise = hienThiTieuDePhimTrongMenuChonGhe(tenphim, maphim, masuatchieu);
        console.log(await hienThiTieuDePhimTrongMenuChonGhePromise);

        const hienThiMenuChonGhePromise = hienThiMenuChonGhe();
        console.log(await hienThiMenuChonGhePromise);
    } catch (error) {
        console.log(error);
    }
}

// Xử lý sự kiện click vào thời gian chiếu 
const hour = document.querySelectorAll(".hour");
for(let i = 0; i < hour.length; i++) {
    hour[i].addEventListener(
        "click",
        (e) => {
            xuLySuKienHienThiMenuChonGhe(
                hour[i].getAttribute('tenphim'), 
                hour[i].getAttribute('maphim'), 
                hour[i].getAttribute('masuatchieu'));
        },
        false
    )
}
