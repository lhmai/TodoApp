<?php
$title = "Thêm mới công việc";
include 'layouts/header.php';
include 'class/database.php';

if (!isset($_SESSION['users']))
    header("Location: index.php");

if($_POST){
    $tencv = $_POST['txtJob'];
    $mota = $_POST['txtDescription'];
    $trangthai = $_POST['selStatus'];
    $loai = $_POST['selType'];
    $id = $_SESSION['users']['id'];

    $dt = new Database;
    $sql = "INSERT INTO congviec (tencongviec,mota,trangthai,loaicongviec,id_user) VALUES ('{$tencv}','{$mota}','{$trangthai}','{$loai}','{$id}')";
    $dt->Run($sql);
    header("Location: home.php");
}
?>
<style>
    .btn-outline-danger>a {
        font-style: none;
        color: red;
    }
</style>
<!-- Full Page Intro -->
<div class="view full-page-intro" style="background-image: url('img/bg.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

        <!-- Content -->
        <div class="container">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-12 white-text text-center text-md-left">
                    <!-- Material form login -->
                    <div class="card">

                        <h5 class="card-header info-color white-text text-center py-4">
                            <strong>Thêm mới công việc</strong>
                        </h5>

                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0">

                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" method="POST">
                                <div class="md-form">
                                    <div id="errorUpdate">

                                    </div>
                                </div>

                                <!-- Tên Công việc -->
                                <div class="md-form">
                                    <input type="text" class="form-control" name="txtJob">
                                    <label for="txtJob">Tên Công Việc</label>
                                </div>

                                <!-- Mô Tả -->
                                <div class="md-form">
                                    <input type="text" name="txtDescription" class="form-control">
                                    <label for="txtDescription">Mô tả</label>
                                </div>

                                <select class="browser-default custom-select custom-select-lg mb-3" name="selType">
                                    <option value="" disabled selected>Chọn loại công việc</option>
                                    <option value="1">Việc nhà</option>
                                    <option value="2">Việc chỗ làm</option>
                                    <option value="3">Việc ở trường</option>
                                    <option value="4">Khác</option>
                                </select>
                                <select class="browser-default custom-select custom-select-lg mb-3" name="selStatus">
                                    <option value="" disabled selected>Chọn trạng thái</option>
                                    <option value="0">Chưa làm</option>
                                    <option value="1">Đang làm</option>
                                    <option value="2">Đã làm</option>
                                </select>
                                <div class="row">
                                    <!-- UpdateButton -->
                                    <div class="col-md-4">
                                        <button class="btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0" id="btnUpdate" type="submit">Thêm Mới</button>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="home.php"><button class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="button">Quay lại</button></a>
                                    </div>
                                </div>


                            </form>
                            <!-- Form -->

                        </div>

                    </div>
                    <!-- Material form login -->

                </div>
                <!--Grid column-->


            </div>
            <!--Grid row-->

        </div>
        <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

</div>
<!-- Full Page Intro -->


<?php include 'layouts/footer.php'; ?>