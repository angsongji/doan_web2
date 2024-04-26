<?php 
    require_once('./database/connectDatabase.php');
    $conn = new connectDatabase();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .box1 button{
            float: right;
        }
        #btnPhongChieu, #btnLoaiGhe {
        border: 2px solid black;
        }
        .h6 {
            text-align: center;
            color: red;
        }
        .box2 button {
            float:left;
            padding: 0.5%;
            margin: 1%;
        }
        .content {
            display: none;
        }
        .active-content {
            display: block;
        }
        .btn-primary {
            margin-top: 2%;
        }
        #btnLoaiGhe.active {
            background-color: #79B791;
        }
        .themLoaiGhe {
            margin-top: 12%;
        }
        #content {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container">
        
        <div class="box2">
            <button class="btn" id="btnPhongChieu" style="background-color: #79B791;">Phòng Chiếu</button>
            <button class="btn" id="btnLoaiGhe">Loại Ghế</button>
        </div>
        <div id="contentLoaiGhe" class="content">
            <div class="box1">
                <button class="btn btn-primary themLoaiGhe" data-toggle="modal" data-target="#addLoaiGheModal">Thêm</button>
            </div>
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Mã Loại Ghế</th>
                            <th>Tên Loại Ghế</th>
                            <th>Giá</th>
                            <th>Cập Nhật</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM loaighe";
                            $result = $conn->executeQuery($query);
                            if(!$result) {
                                echo 'failed';
                            } else {
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['MALOAIGHE']; ?></td>
                                        <td><?php echo $row['TENLOAIGHE']; ?></td>
                                        <td><?php echo $row['PRICE']; ?></td>
                                        <td><button class="btn btn-success" onclick="openEditLoaiGheForm('<?php echo $row['MALOAIGHE']; ?>', '<?php echo $row['TENLOAIGHE']; ?>', '<?php echo $row['PRICE']; ?>')">Cập Nhật</button></td>
                                        <td><a href="./pages/deletePhongChieu.php?sid=<?php echo $row['MALOAIGHE']; ?>" class="btn btn-danger">Xóa</a></td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>

                <!-- Form thêm loại ghế -->
                <form action="./pages/insertPhongChieu.php" method="post">
                    <div class="modal fade" id="addLoaiGheModal" tabindex="-1" role="dialog" aria-labelledby="addLoaiGheModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm Loại Ghế</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                                <div class="form-group">
                                    <label for="maloaighe">Mã Loại Ghế</label>
                                    <input type="text" name="maloaighe" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tenloaighe">Tên Loại Ghế</label>
                                    <input type="text" name="tenloaighe" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <input type="submit" class="btn btn-success" name="them_loaighe" value="Lưu">
                        </div>
                        </div>
                    </div>
                    </div>
                        </div>
                </form>

                <!-- Form sửa loại ghế -->
                <form action="./pages/updatePhongChieu.php" method="post">
                    <div class="modal fade" id="editLoaiGheModal" tabindex="-1" role="dialog" aria-labelledby="editLoaiGheModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sửa Loại Ghế</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="edit_maloaighe">Mã Loại Ghế</label>
                                        <input type="text" id="edit_maloaighe" name="edit_maloaighe" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_tenloaighe">Tên Loại Ghế</label>
                                        <input type="text" id="edit_tenloaighe" name="edit_tenloaighe" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_price">Giá</label>
                                        <input type="text" id="edit_price" name="edit_price" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <input type="submit" class="btn btn-success" name="sua_phongchieu" value="Cập Nhật">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    <div class="container">
        <div id="contentPhongChieu" class="content active-content">
        <div class ="box1">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Thêm</button>
        </div>
            <table class="table table-hover table-bordered table-striped">
                <thread>
                    <tr>
                        <th>Mã Phòng Chiếu</th>
                        <th>Tên Phòng Chiếu</th>
                        <th>Số Ghế</th>
                        <th>Trạng Thái</th>
                        <th>Cập Nhật</th>
                        <th>Xóa</th>
                    </tr>
                </thread>
                <tbody>
                <?php 
                    $query = "SELECT * FROM phongchieu";
                    $result = $conn->executeQuery($query);
                    if(!$result) {
                        echo 'failed';
                    } else {
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['MAPHONGCHIEU']; ?></td>
                                <td><?php echo $row['TENPHONGCHIEU']; ?></td>
                                <td><?php echo $row['SOGHE']; ?></td>
                                <td><?php echo $row['TRANGTHAI']; ?></td>
                                <td><button class="btn btn-success" onclick="openEditForm('<?php echo $row['MAPHONGCHIEU']; ?>', '<?php echo $row['TENPHONGCHIEU']; ?>', '<?php echo $row['SOGHE']; ?>', '<?php echo $row['TRANGTHAI']; ?>')">Cập Nhật</button></td>
                                <td><a href="./pages/deletePhongChieu.php?id=<?php echo $row['MAPHONGCHIEU']; ?>" class="btn btn-danger">Xóa</a></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                </tbody>
            </table>
        <?php 
            if(isset($_GET['message'])) {
                echo "<h6>".$_GET['message']."</h6>";
            }
        ?>

        
        <form action="./pages/insertPhongChieu.php" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Phòng Chiếu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="maphongchieu">Mã Phòng Chiếu</label>
                            <input type="text" name="maphongchieu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tenphongchieu">Tên Phòng Chiếu</label>
                            <input type="text" name="tenphongchieu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="soghe">Số Ghế</label>
                            <input type="text" name="soghe" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="trangthai">Trạng Thái</label>
                            <input type="checkbox" name="trangthai" class="form-control">
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <input type="submit" class="btn btn-success" name="them_phongchieu" value="Lưu">
                </div>
                </div>
            </div>
            </div>
        </div>
        </form>

        <!-- form sua -->
        
        <form action="./pages/updatePhongChieu.php" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa Phòng Chiếu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_maphongchieu">Mã Phòng Chiếu</label>
                            <input type="text" id="edit_maphongchieu" name="edit_maphongchieu" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="edit_tenphongchieu">Tên Phòng Chiếu</label>
                            <input type="text" id="edit_tenphongchieu" name="edit_tenphongchieu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="edit_soghe">Số Ghế</label>
                            <input type="text" id="edit_soghe" name="edit_soghe" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="edit_trangthai">Trạng Thái</label>
                            <input type="checkbox" id="edit_trangthai" name="edit_trangthai" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <input type="submit" class="btn btn-success" name="sua_phongchieu" value="Lưu">
                    </div>
                </div>
            </div>
        </div>
    </form>
        </div>
        
<script>
    function openEditForm(id, tenPhongChieu, soGhe, trangThai) {
        document.getElementById("edit_maphongchieu").value = id;
        document.getElementById("edit_tenphongchieu").value = tenPhongChieu;
        document.getElementById("edit_soghe").value = soGhe;
        document.getElementById("edit_trangthai").checked = trangThai == '1';
        $('#editModal').modal('show');
    }

    function openEditLoaiGheForm(id, tenLoaiGhe, price) {
        document.getElementById("edit_maloaighe").value = id;
        document.getElementById("edit_tenloaighe").value = tenLoaiGhe;
        document.getElementById("edit_price").value = price;
        $('#editLoaiGheModal').modal('show');
    }
    
    $(document).ready(function() {
            $("#btnPhongChieu").click(function() {
                $(this).css("background-color", "#79B791");
                $("#btnLoaiGhe").removeClass("active").css("background-color", "");
                $("#contentPhongChieu").addClass("active-content");
                $("#contentLoaiGhe").removeClass("active-content");
            });

            $("#btnLoaiGhe").click(function() {
                $(this).addClass("active").css("background-color", "#79B791");
                $("#btnPhongChieu").removeClass("active").css("background-color", "");
                $("#contentLoaiGhe").addClass("active-content");
                $("#contentPhongChieu").removeClass("active-content");
            });

            $("#contentPhongChieu").addClass("active-content");
        });
</script>

</body>
</html>