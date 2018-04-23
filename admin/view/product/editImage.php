<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            <?php echo $product->name ?>
	            <small>Chỉnh sửa hình ảnh</small>
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="admin.php"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
	            <li><a href="admin.php?c=product">Sản phẩm</a></li>
	            <li><?php echo $product->name ?></li>
	            <li class="active">Chỉnh sửa hình ảnh</li>
	        </ol>
	    </section>
	    <!-- Main content -->
	    <section class="content container-fluid">
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
			<div class="box box-primary">
				<div class="row">					
						<?php foreach ($image as $item): ?>
							<div class="col-md-3">
								<img src="upload/product/<?php echo $item->name ?>" width="100%">
								<div class="text-center">
									<a href="admin.php?c=product&a=deleteimage&idimage=<?php echo $item->id ?>&idproduct=<?php echo $product->id ?>" class="btn btn-danger">Xóa ảnh</a>
								</div>
							</div>
						<?php endforeach ?>					
				</div>

			    <!-- form start -->
			    <form role="form" method="POST" enctype="multipart/form-data" action="admin.php?c=product&a=posteditimage&idproduct=<?php echo $product->id ?>">
			        <div class="box-body">
			            <div class="form-group">
			                <label for="fleImage">Thêm hình ảnh - Mẹo: giữ Ctrl để chọn nhiều ảnh</label>
			                <input type="file" id="fleImage[]" name="fleImage[]" multiple="">
			            </div>
			        </div>
			        <!-- /.box-body -->
			        <div class="box-footer">
			            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
			        </div>
			    </form>
			</div>
			<!-- /.box -->

	    </section>
	    <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->