

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dòng sản phẩm
            <small>Danh sách</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin.php"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
            <li><a href="admin.php?c=productrange">Dòng sản phẩm</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?php
                    if (isset($_SESSION['success'])) {
                        foreach ($_SESSION['success'] as $item) {
                    ?>
                        <div class="alert alert-success">
                            <?php echo $item ?>
                        </div> 
                    <?php
                        }
                        unset($_SESSION['success']);
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['error'])) {
                        foreach ($_SESSION['error'] as $item) {
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $item ?>
                        </div> 
                    <?php
                        }
                        unset($_SESSION['error']);
                    }
                    ?>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên dòng</th>
                                    <th>Tên hãng</th>
                                    <th>Trạng thái</th>
                                    <th>Chỉnh sửa/Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1  ?>
                                <?php foreach ($list as $item): ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $item->name ?></td>
                                    <td><?php echo $item->ct_name ?></td>
                                    <td>
                                        <?php if ($item->active == 1): ?>
                                            <!-- Button trigger modal -->
                                            <button class="btn btn-success" data-toggle="modal" data-target="#changeactive-<?php echo $item->id ?>">
                                            Hoạt động
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="changeactive-<?php echo $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Yêu cầu xác nhận</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            Bạn có muốn thay đổi trạng thái của dòng sản phẩm có tên <b><?php echo $item->name ?></b>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                                                            <a href="admin.php?c=productrange&a=changeactive&id=<?php echo $item->id ?>"><button type="button" class="btn btn-primary">Lưu thay đổi</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                              <!-- Button trigger modal -->
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#changeactive-<?php echo $item->id ?>">
                                            Không hoạt động
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="changeactive-<?php echo $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Yêu cầu xác nhận</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            Bạn có muốn thay đổi trạng thái của dòng sản phẩm có tên <b><?php echo $item->name ?></b>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                                                            <a href="admin.php?c=productrange&a=changeactive&id=<?php echo $item->id ?>"><button type="button" class="btn btn-primary">Lưu thay đổi</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif ?>
                                      </td>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="admin.php?c=productrange&a=getedit&id=<?php echo $item->id ?>"><i class="fa fa-edit"></i> Chỉnh sửa</a>

                                        <!-- Button trigger modal -->
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete-<?php echo $item->id ?>"><i class="fa fa-times">
                                        Xóa
                                        </i></button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete-<?php echo $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Yêu cầu xác nhận</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có muốn xóa dòng <b><?php echo $item->name ?></b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                                                        <a href="admin.php?c=productrange&a=delete&id=<?php echo $item->id ?>"><button type="button" class="btn btn-primary">Lưu thay đổi</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                                <?php endforeach ?>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Tên dòng</th>
                                    <th>Tên hãng</th>
                                    <th>Chỉnh sửa/Xóa</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

