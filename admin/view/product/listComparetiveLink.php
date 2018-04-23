

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $product->name ?>
            <small>Danh sách đường dẫn so sánh</small>
            <a class="btn btn-success" href="admin.php?c=product&a=getaddcomparetivelink&id=<?php echo $product->id ?>">Thêm đường dẫn</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin.php"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
            <li><a href="admin.php?c=product">Sản phẩm</a></li>
            <li><?php echo $product->name ?></li>
            <li class="active">Danh sách đường dẫn so sánh</li>
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
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Đường dẫn so sánh</th>
                                    <th>Chỉnh sửa/Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($listComparetiveLink as $item): ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $item->name ?></td>
                                    <td><?php echo number_format($item->price, 0, ',', '.') ?> VNĐ</td>
                                    <td><img src="upload/provider/<?php echo $item->provider_image ?>"></td>
                                    <td><a href="<?php echo $item->link ?>"><?php echo $item->link ?></a></td>
                                    <td>
                                        <a class="btn btn-warning" href="admin.php?c=product&a=geteditcomparetivelink&idcomparetivelink=<?php echo $item->id ?>&idproduct=<?php echo $product->id ?>"><i class="fa fa-edit"></i> Chỉnh sửa</a>

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
                                                        Bạn có muốn xóa đường dẫn <b><?php echo $item->link ?></b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                                                        <a href="admin.php?c=product&a=deletecomparetivelink&idcomparetivelink=<?php echo $item->id ?>&idproduct=<?php echo $product->id ?>"><button type="button" class="btn btn-primary">Lưu thay đổi</button></a>
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
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Đường dẫn so sánh</th>
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

