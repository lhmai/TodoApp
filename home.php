<?php
$title = "Trang chính";
include 'layouts/header.php';

if (!isset($_SESSION['users']))
    header("Location: index.php");
?>
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
                    <!-- Card -->
                    <div class="card">
                        <!-- Card content -->
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="chualam-task" data-toggle="tab" href="#task" role="tab" aria-controls="task" aria-selected="true">Chưa làm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="danglam-task" data-toggle="tab" href="#doing" role="tab" aria-controls="doing" aria-selected="false">Đang tiến hành</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="dalam-task" data-toggle="tab" href="#done" role="tab" aria-controls="done" aria-selected="false">Đã hoàn thành</a>
                                </li>
                            </ul>
                            <div class="tab-content black-text" id="myTabContent">
                                <div class="tab-pane fade show active " id="task" role="tabpanel" aria-labelledby="chualam-task">
                                    Công việc chưa làm
                                </div>
                                <div class="tab-pane fade" id="doing" role="tabpanel" aria-labelledby="danglam-task">
                                    Công việc đang làm
                                </div>
                                <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="dalam-task">
                                    Công việc đã làm
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Card -->

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