<?php
$title = "Sửa công việc";
include 'layouts/header.php';
include 'class/database.php';

if (!isset($_SESSION['users']))
    header("Location: index.php");

$idJobs = $_GET['id'];
$dt = new Database;
$check = "SELECT * from congviec where id = '{$idJobs}' and id_user = '{$_SESSION['users']['id']}'";
$dt->Select($check);
$data = $dt->Fetch();
$resultCheck = $dt->dbCount();

if ($resultCheck < 1) {
    header("Location: index.php");
}

if ($_POST) {
    $tencv = $_POST['txtJob'];
    $mota = $_POST['txtDescription'];
    $trangthai = $_POST['selStatus'];
    $loai = $_POST['selType'];
    $id = $_SESSION['users']['id'];

    $dt = new Database;
    $sql = "UPDATE congviec SET tencongviec = '{$tencv}' , mota = '{$mota}' , trangthai = '{$trangthai}' , loaicongviec = '{$loai}' where id = '{$idJobs}'";
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
                            <strong>Sửa công việc</strong>
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
                                    <input type="text" class="form-control" name="txtJob" value="<?php echo $data['tencongviec']; ?>">
                                    <label for="txtJob">Tên Công Việc</label>
                                </div>

                                <!-- Mô Tả -->
                                <div class="md-form">
                                    <input type="text" name="txtDescription" class="form-control" value="<?php echo $data['mota']; ?>">
                                    <label for="txtDescription">Mô tả</label>
                                </div>

                                <select class="browser-default custom-select custom-select-lg mb-3" name="selType">
                                    <option value="1" <?php
                                                        if ($data['loaicongviec'] == 1) echo "selected";
                                                        ?>>Việc nhà</option>
                                    <option value="2" <?php
                                                        if ($data['loaicongviec'] == 2) echo "selected";
                                                        ?>>Việc chỗ làm</option>
                                    <option value="3" <?php
                                                        if ($data['loaicongviec'] == 3) echo "selected";
                                                        ?>>Việc ở trường</option>
                                    <option value="4" <?php
                                                        if ($data['loaicongviec'] == 4) echo "selected";
                                                        ?>>Khác</option>
                                </select>
                                <select class="browser-default custom-select custom-select-lg mb-3" name="selStatus">
                                    <option value="" disabled selected>Chọn trạng thái</option>
                                    <option value="0" <?php
                                                        if ($data['trangthai'] == 0) echo "selected";
                                                        ?>>Chưa làm</option>
                                    <option value="1" <?php
                                                        if ($data['trangthai'] == 1) echo "selected";
                                                        ?>>Đang làm</option>
                                    <option value="2" <?php
                                                        if ($data['trangthai'] == 2) echo "selected";
                                                        ?>>Đã làm</option>
                                </select>
                                <div class="row">
                                    <!-- UpdateButton -->
                                    <div class="col-md-4">
                                        <button class="btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0" id="btnUpdate" type="submit">Cập Nhật</button>
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