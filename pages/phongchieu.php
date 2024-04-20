


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #phongchieu-btn, #loaighe-btn {
            font-size: 20px;
            padding: 1% 2%; 
            background-color: white;
            color: black;
            cursor: pointer; 
            transition: background-color 0.3s;
            margin: 3% 0% 1% 2%;
        }

        #phongchieu-btn:hover, #loaighe-btn:hover {
            background-color: #79B791;
        }
        
        #editForm {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            padding: 2%;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 1;
        }

        #editForm2 {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            padding: 2%;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 1;
            width: 24%;
}

        .data-row {
            display: flex;
            flex-direction: row;
            border: 1px solid #ccc; 
            padding: 2%;
            box-sizing: border-box;
            width: 100%;
            background-Color: white;
        }


        .property {
            width: 100%;
            padding: 2%;
            /* text-align: center; */
            box-sizing: border-box;
            background-color: white;
        }

        .row {
            display: block;
        }
        .row.active{
            display: block;
        }

    </style>
</head>
<body>
    <button id="phongchieu-btn">Phòng Chiếu</button>
    <button id="loaighe-btn">Loại Ghế</button>
    <div id="result" class="data-container"></div>
        


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchData('phongchieu'); 
        });
        document.getElementById('phongchieu-btn').addEventListener('click', function() {
            fetchData('phongchieu');
        });

        document.getElementById('loaighe-btn').addEventListener('click', function () {
            fetchData('loaighe');

        });

        function fetchData(dataType) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(xhr.readyState === XMLHttpRequest.DONE) {
                    if(xhr.status === 200) {
                        document.getElementById('result').innerHTML = xhr.responseText;
                    } else {
                        document.getElementById('result').innerHTML = "Không thể truy cập dữ liệu. Mã lỗi: " + xhr.status;
                    }
                }
            };
            xhr.open('GET', './pages/giaodienphongchieu.php?dataType=' + dataType, true);
            xhr.send();
        }

        document.getElementById('phongchieu-btn').addEventListener('click', function() {
        buttonPhongChieu.style.backgroundColor = "#79B791";
        buttonLoaiGhe.style.backgroundColor = "";
        });

        var buttonLoaiGhe = document.getElementById('loaighe-btn');
        var buttonPhongChieu = document.getElementById('phongchieu-btn');
        var editForm2 = document.getElementById('editForm2');
        var editForm = document.getElementById('editForm');


        buttonLoaiGhe.addEventListener('click', function() {
            buttonLoaiGhe.style.backgroundColor = "#79B791";
            buttonPhongChieu.style.backgroundColor = "";

            editForm2.style.display = 'block';
            editForm.style.display = 'none';
        });


        function showEditFormPhongChieu(rowId) {
            document.getElementById('editForm').style.display = 'block';
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(xhr.readyState === XMLHttpRequest.DONE) {
                    if(xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        document.getElementById('maphongchieu').value = data.MAPHONGCHIEU;
                        document.getElementById('tenphongchieu').value = data.TENPHONGCHIEU;
                        document.getElementById('soghe').value = data.SOGHE;
                        document.getElementById('trangthai').checked = data.TRANGTHAI == 1;
                    } else {
                        console.error('Có lỗi khi tải dữ liệu phòng chiếu');
                    }
                }
            };
            xhr.open('GET', './pages/giaodienphongchieu.php?rowId=' + rowId, true);
            xhr.send();
        }


        function showEditFormLoaiGhe() {
            document.getElementById('editForm2').style.display = 'block';
            document.getElementById('maloaighe').value = "";
            document.getElementById('tenloaighe').value = "";
            document.getElementById('price').value = "";
        }
        
        function hideEditForm() {
            document.getElementById('editForm').style.display = 'none';
        }

        function hideEditForm2() {
            document.getElementById('editForm2').style.display = 'none';
        }

        document.getElementById('editDataForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            fetch('./pages/giaodienphongchieu.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if(!response.ok) {
                    throw new Error('Có lỗi xảy ra khi cập nhật dữ liệu');
                }
                return response.text();
            })
            .then(data => {
                alert(data);
                hideEditForm();
            })
            .catch(error => {
                consolo.error('Lỗi: ', error);
            });
        });
    document.addEventListener('DOMContentLoaded', function() {
            showEditFormPhongChieu(); 
        });

    function showEditFormPhongChieu() {
        document.getElementById('editForm').style.display = 'block';
        document.getElementById('editForm2').style.display = 'none';
    }

    
    </script>
</body>
</html>

