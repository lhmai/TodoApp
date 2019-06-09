<?php
$title = "Thông tin cá nhân";
include 'layouts/header.php';
include 'class/database.php';

if (!isset($_SESSION['users']))
    header("Location: index.php");
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
                            <strong>Cập nhật thông tin cá nhân</strong>
                        </h5>

                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0">

                            <!-- Form -->
                            <form class="text-center" style="color: #757575;">
                                <div class="md-form">
                                    <div id="errorUpdate">

                                    </div>
                                </div>

                                <!-- FullName -->
                                <div class="md-form">
                                    <input type="text" id="txtFullName" class="form-control" value="<?php echo $_SESSION['users']['fullname']; ?>">
                                    <label for="txtFullName">Họ Tên</label>
                                </div>

                                <!-- Email -->
                                <div class="md-form">
                                    <input type="email" id="txtEmail" class="form-control" value="<?php echo $_SESSION['users']['email']; ?>">
                                    <label for="txtEmail">Email</label>
                                </div>

                                <!-- Old Password -->
                                <div class="md-form">
                                    <input type="password" id="txtOldPass" class="form-control" placeholder="Vui lòng điền nếu bạn muốn đổi mật khẩu">
                                    <label for="txtOldPass">Mật khẩu cũ</label>
                                </div>

                                <!-- New Password -->
                                <div class="md-form">
                                    <input type="password" id="txtNewPass" class="form-control">
                                    <label for="txtNewPass">Mật khẩu mới</label>
                                </div>
                                <div class="row">
                                    <!-- UpdateButton -->
                                    <div class="col-md-4">
                                        <button class="btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0" id="btnUpdate" type="button">Cập nhật</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-outline-primary btn-rounded btn-block my-4 waves-effect z-depth-0" id="btnChangePass" type="button">Thay đổi mật khẩu</button>
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
<script>
    $('#btnUpdate').click(function() {
        let fullname = $('#txtFullName').val();
        let email = $('#txtEmail').val()
        let dataString = "fullname=" + fullname + "&email=" + email;
        $.ajax({
            type: 'POST',
            url: 'ajax/UpdateProfile.php',
            data: dataString,
            success: function(data) {
                if (data == "ErrorDataNull")
                    $('#errorUpdate').html(AlertFail("Vui lòng nhập đầy đủ thông tin"));

                if (data == "Success") {
                    $('#errorUpdate').html(AlertSuccess("Cập nhật thông tin thành công"));
                    console.log('UpdateSuccess');
                }
            }
        });
    })

    $('#btnChangePass').click(function() {
        let password = $('#txtOldPass').val();
        let repass = $('#txtNewPass').val()
        let dataString = "password=" + password + "&repass=" + repass;
        $.ajax({
            type: 'POST',
            url: 'ajax/ChangePassword.php',
            data: dataString,
            success: function(data) {
                if (data == "ErrorDataNull")
                    $('#errorUpdate').html(AlertFail("Vui lòng nhập đầy đủ thông tin"));

                if (data == "ErrorPassword")
                    $('#errorUpdate').html(AlertFail("Mật khẩu cũ không hợp lệ"));
                if (data == "Success") {
                    $('#errorUpdate').html(AlertSuccess("Thay đổi mật khẩu thành công"));
                    console.log('UpdateSuccess');
                }
            }
        });
    })
</script>