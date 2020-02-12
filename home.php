<?php
$title = "Trang chính";
include 'layouts/header.php';
include 'class/database.php';

if (!isset($_SESSION['users']))
    header("Location: index.php");
$object = new Database;
$sql = "SELECT * from congviec where trangthai = 0 and id_user = {$_SESSION['users']['id']}";
$object->Select($sql);

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
                                <li class="nav-item">
                                    <a href="addjob.php"><button class="btn btn-success btn-sm" id="btnAddNew" type="button">Thêm công việc</button></a>
                                </li>
                            </ul>
                            <div class="tab-content black-text" id="myTabContent">
                                <div class="tab-pane fade show active " id="task" role="tabpanel" aria-labelledby="chualam-task">
                                    <table id="TabTo" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Tên Công Việc</th>
                                                <th>Mô tả</th>
                                                <th>Loại công việc</th>
                                                <th>Thời gian tạo</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="doing" role="tabpanel" aria-labelledby="danglam-task">
                                    <table id="TabDo" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Tên Công Việc</th>
                                                <th>Mô tả</th>
                                                <th>Loại công việc</th>
                                                <th>Thời gian tạo</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="dalam-task">
                                    <table id="TabDone" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Tên Công Việc</th>
                                                <th>Mô tả</th>
                                                <th>Loại công việc</th>
                                                <th>Thời gian tạo</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
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

<script>
    $(document).ready(function() {
        $('#TabTo').DataTable({
            "lengthChange": false,
            "ajax": 'json/ToTask.php',
            "language": {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                }
            },
            "columns": [{
                    data: 'tencongviec'
                },
                {
                    data: 'mota'
                },
                {
                    data: 'loaicongviec',
                    render: function(data, type, row, meta) {
                        let stringReturn = "";
                        if (data == 1) stringReturn = "<h5><span class='badge badge-info'>Việc Nhà</span></h5>";
                        if (data == 2) stringReturn = "<h5><span class='badge badge-success'>Việc Chỗ làm</span></h5>";
                        if (data == 3) stringReturn = "<h5><span class='badge badge-danger'>Việc ở trường</span></h5>";
                        if (data == 4) stringReturn = "<h5><span class='badge badge-warning'>Việc Khác</span></h5>";
                        return stringReturn;
                    }
                },
                {
                    data: 'thoigiantao'
                }, {
                    data: 'id',
                    render: function(data) {
                        let stringReturn = '<a href="edit.php?id=' + data + '"><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></a><a href="delete.php?id=' + data + '"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button></a>';
                        return stringReturn;
                    }
                }
            ]
        });

        $('#TabDo').DataTable({
            "lengthChange": false,
            "ajax": 'json/DoingTask.php',
            "language": {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                }
            },
            "columns": [{
                    data: 'tencongviec'
                },
                {
                    data: 'mota'
                },
                {
                    data: 'loaicongviec',
                    render: function(data, type, row, meta) {
                        let stringReturn = "";
                        if (data == 1) stringReturn = "<h5><span class='badge badge-info'>Việc Nhà</span></h5>";
                        if (data == 2) stringReturn = "<h5><span class='badge badge-success'>Việc Chỗ làm</span></h5>";
                        if (data == 3) stringReturn = "<h5><span class='badge badge-danger'>Việc ở trường</span></h5>";
                        if (data == 4) stringReturn = "<h5><span class='badge badge-warning'>Việc Khác</span></h5>";
                        return stringReturn;
                    }
                },
                {
                    data: 'thoigiantao'
                }, {
                    data: 'id',
                    render: function(data) {
                        let stringReturn = '<a href="edit.php?id=' + data + '"><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></a><a href="delete.php?id=' + data + '"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button></a>';
                        return stringReturn;
                    }
                }
            ]
        });

        $('#TabDone').DataTable({
            "lengthChange": false,
            "ajax": 'json/DoneTask.php',
            "language": {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                }
            },
            "columns": [{
                    data: 'tencongviec'
                },
                {
                    data: 'mota'
                },
                {
                    data: 'loaicongviec',
                    render: function(data, type, row, meta) {
                        let stringReturn = "";
                        if (data == 1) stringReturn = "<h5><span class='badge badge-info'>Việc Nhà</span></h5>";
                        if (data == 2) stringReturn = "<h5><span class='badge badge-success'>Việc Chỗ làm</span></h5>";
                        if (data == 3) stringReturn = "<h5><span class='badge badge-danger'>Việc ở trường</span></h5>";
                        if (data == 4) stringReturn = "<h5><span class='badge badge-warning'>Việc Khác</span></h5>";
                        return stringReturn;
                    }
                },
                {
                    data: 'thoigiantao'
                }, {
                    data: 'id',
                    render: function(data) {
                        let stringReturn = '<a href="edit.php?id=' + data + '"><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button></a><a href="delete.php?id=' + data + '"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button></a>';
                        return stringReturn;
                    }
                }
            ]
        });

    });
</script>
