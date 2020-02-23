<?php
$title = "Ứng dụng quản lý công việc cá nhân";
include 'layouts/header.php';
include 'class/database.php';

if(isset($_SESSION['users']))
    header("Location: home.php");

?>



<!-- Full Page Intro -->
<div class="view full-page-intro" style="background-image: url('img/bg3.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

        <!-- Content -->
        <div class="container">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-6 mb-4 white-text text-center text-md-left">
                    <div id="error">

                    </div>
                    <h1 class="display-4 font-weight-bold">Quản lý công việc 1 cách hiệu quả</h1>
                    <hr class="hr-light">
                    <p class="mb-4 d-none d-md-block">
                        <strong>Trong quá trình học tập , hoặc khi làm việc theo nhóm những nhóm chưa có kinh nghiệm thường bị trễ các công việc nguyên nhân chính là do không kiểm soát cũng như quản lý được công việc của mình gây ảnh hưởng tới các kết quả và mục tiêu của nhóm . Ứng dụng quản lý công việc cá nhân giúp cải thiện vấn đề đó 1 cách hiệu quả , quản lý thời gian tư duy hơn , sẽ không phải tốn thời gian suy nghĩ là sẽ phải làm gì làm gì mà chúng ta đã có sẵn danh sách các công việc liệt kê trước đó rồi.</strong>
                    </p>

                    <a target="_blank" href="#" class="btn btn-indigo btn-lg">Đăng ký ngay
                        <i class="fas fa-arrow-alt-circle-right"></i>
                    </a>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 col-xl-5 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Form -->
                            <form name="" method="POST" id="register-form">
                                <!-- Heading -->
                                <h3 class="dark-grey-text text-center">
                                    <strong>Đăng ký tài khoản:</strong>
                                </h3>
                                <hr>

                                <div class="md-form">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input type="text" id="txtUser" name="txtUser" class="form-control">
                                    <label for="txtUser">Tên đăng nhập</label>
                                    <input type="text" id="txtUser" name="txtUser" class="form-control" maxlength="15">
                                    <label for="txtUser">Tên đăng nhập (tối đa 15 ký tự)</label>
                                </div>
                                <div class="md-form">
                                    <i class="fas fa-grin-squint-tears prefix grey-text"></i>
                                    <input type="text" id="txtFullname" name="txtFullname" class="form-control">
                                    <label for="txtFullname">Họ Tên</label>
                                </div>

                                <div class="md-form">
                                    <i class="fas fa-mail-bulk prefix grey-text"></i>
                                    <input type="text" id="txtEmail" name="txtEmail" class="form-control">
                                    <label for="txtEmail">Email</label>
                                </div>
                                <div class="md-form">
                                    <i class="fas fa-key prefix grey-text"></i>
                                    <input type="text" id="txtPass" name="txtPass" class="form-control">
                                    <label for="txtPass">Mật khẩu</label>

                                </div>
                                <div class="md-form">
                                    <i class="fas fa-key prefix grey-text"></i>
                                    <input type="text" id="txtRePass" name="txtRePass" class="form-control">
                                    <label for="txtRePass">Nhập lại mật khẩu</label>

                                </div>
                                <div class="text-center">
                                    <button class="btn btn-indigo" id="btn-submit" type="submit">Đăng ký</button>
                                </div>

                            </form>
                            <!-- Form -->

                        </div>

                    </div>
                    <!--/.Card-->

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

<!--Main layout-->
<main>
    <div class="container">


        <!--Modal: modalSocial-->
        <div class="modal fade" id="modalSocial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog cascading-modal" role="document">

                <!--Content-->
                <div class="modal-content">

                    <!--Header-->
                    <div class="modal-header light-blue darken-3 white-text">
                        <h4 class="title"><i class="fas fa-users"></i> Đăng nhập người dùng </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <!--Body-->
                    <div class="modal-body mb-0 text-center">
                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0">
                            <div id="errorLogin">

                            </div>
                            <!-- Form -->


                            <!-- Email -->

                            <div class="md-form">
                                <input type="text" id="logUser" class="form-control">
                                <label for="logUser">Tên tài khoản</label>
                            </div>

                            <!-- Password -->
                            <div class="md-form">
                                <input type="password" id="logPass" class="form-control">
                                <label for="logPass">Mật khẩu</label>
                            </div>


                            <!-- Sign in button -->
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" id="ButtonLogin">Đăng nhập</button>


                            <!-- Form -->

                        </div>
                    </div>

                </div>
                <!--/.Content-->

            </div>
        </div>
        <!--Modal: modalSocial-->
        <hr class="my-5">

        <!--Section: Main features & Quick Start-->
        <section>

            <h3 class="h3 text-center mb-5">Thông tin ứng dụng</h3>

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-lg-6 col-md-12 px-4">

                    <!--First row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fas fa-code fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">PHP</h5>
                            <p class="grey-text">Ứng dụng sử dụng ngôn ngữ lập trình PHP làm nền tảng backend chính.</p>
                        </div>
                    </div>
                    <!--/First row-->

                    <div style="height:30px"></div>

                    <!--Second row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fas fa-eye fa-2x blue-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Bootstrap</h5>
                            <p class="grey-text">Phía giao diện , bootstrap là sự lựa chọn được ưa chuộng nhất
                            </p>
                        </div>
                    </div>
                    <!--/Second row-->

                    <div style="height:30px"></div>



                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12">
                    <!--Third row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fas fa-database fa-2x cyan-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">MySQL</h5>
                            <p class="grey-text">Hệ quản trị CSDL MySQL ứng dụng sử dụng được tích hợp sẵn đi kèm với PHP</p>
                        </div>
                    </div>
                    <!--/Third row-->
                </div>
                <!--/Grid column-->

            </div>
            <!--/Grid row-->

        </section>
        <!--Section: Main features & Quick Start-->



        <hr class="mb-5">

        <!--Section: More-->
        <section>

            <h2 class="my-5 h3 text-center">Lý do App quản lý công việc ra đời ???</h2>

            <!--First row-->
            <div class="row features-small mt-5 wow fadeIn">

                <!--Grid column-->
                <div class="col-xl-4 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fab fa-firefox fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2 pl-3">
                            <h5 class="feature-title font-bold mb-1">Tránh làm thiếu công việc</h5>
                            <p class="grey-text mt-2">Nếu như dùng não để nhớ các công việc trong 1 ngày thì khả năng quên sẽ rất cao , nếu như mình có 1 danh sách công việc thì sẽ cải thiện được vấn đề đó.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-4 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-level-up-alt fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Tăng động lực</h5>
                            <p class="grey-text mt-2">nhìn vào danh sách và biết được những công việc mình đã làm được trong suốt 1 thời gian nào đó sẽ là cái động lực về tinh thần rẩt lớn .
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-4 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fas fa-comments fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Làm chủ thời gian</h5>
                            <p class="grey-text mt-2">sẽ tập trung theo các công việc được lên lịch sẵn , sẽ không phải dư thừa thời gian suy nghĩ sẽ làm gì làm gì tiếp theo .
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->


            </div>
            <!--/First row-->

        </section>
        <!--Section: More-->

    </div>
</main>
<!--Main layout-->


<?php include 'layouts/footer.php'; ?>
<!-- Script -->
<script>
    $('#register-form').submit(function() {
        event.preventDefault();
        DangKy();
    });

    $('#ButtonLogin').click(function() {
        let user = $('#logUser').val();
        let pass = $('#logPass').val();
        DangNhap(user, pass);
    })

    function DangNhap(user, pass) {

        let dataString = "logUser=" + user + "&logPass=" + pass;

        $.ajax({
            type: 'POST',
            url: 'ajax/Login.php',
            data: dataString,
            success: function(data) {
                if (data == "ErrorLogin")
                    $('#errorLogin').html(AlertFail("Tài khoản hoặc mật khẩu không hợp lệ"));

                if (data == "Success") {
                    $('#errorLogin').html(AlertSuccess("Đăng nhập thành công"));
                    setTimeout(function() {
                        window.location.href = "home.php";
                    }, 1000);
                    console.log('loginSuccess');
                }
            }
        });
    }

    function DangKy() {
        let data = $("#register-form").serialize();
        $.ajax({
            type: 'POST',
            url: 'ajax/Register.php',
            data: data,
            success: function(data) {
                if (data == "ErrorUserAlready")
                    $('#error').html(AlertFail("Tài khoản đã tồn tại"));

                if (data == "ErrorPassNotMatch")
                    $('#error').html(AlertFail("Mật khẩu không khớp"));

                if (data == "ErrorNullData")
                    $('#error').html(AlertFail("Vui lòng nhập đầy đủ dữ liệu"));

                if (data == "Success") {
                    $('#error').html(AlertSuccess("Đăng ký tài khoản thành công"));
                    setTimeout(function() {
                        $('#error').html('');
                        DangNhap($('#txtUser').val(),$('#txtPass').val());
                    }, 1000);
                }

            }

        });
    }
</script>
