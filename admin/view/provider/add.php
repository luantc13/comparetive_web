<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            Nhà cung cấp
	            <small>Thêm</small>
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="admin.php"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
	            <li><a href="admin.php?c=provider">Nhà cung cấp</a></li>
	            <li class="active">Thêm</li>
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
			    <!-- form start -->
			    <form role="form" method="POST" enctype="multipart/form-data" action="admin.php?c=provider&a=postadd">
			        <div class="box-body">
			            <div class="form-group">
			                <label for="txtName">Tên nhà cung cấp</label>
			                <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Nhập tên nhà cung cấp" required="">
			            </div>

			            <div class="form-group">
			                <label for="txtName">Đường dẫn</label>
			                <input type="text" class="form-control" id="txtLink" name="txtLink" placeholder="Nhập đường dẫn" required="">
			            </div>

			            <div class="form-group">
			                <label for="fleImage">Hình ảnh</label>
			                <input type="file" id="fleImage" name="fleImage" required="">
			            </div>

			            <div class="form-group">
			                <label for="txtNamePattern">Mẫu lấy tên</label>
			                <textarea class="form-control" id="txtNamePattern" name="txtNamePattern" required=""></textarea>  
			            </div>

			            <div class="form-group">
			                <label for="txtPricePattern">Mẫu lấy giá</label>
			                <textarea class="form-control" id="txtPricePattern" name="txtPricePattern" required=""></textarea>
			            </div>

						<div class="form-group">
							<label>Trạng thái</label>
						    <div class="radio">
						        <label>
						        <input type="radio" name="rdoActive" id="rdoActive1" value="1" checked>
						        Hoạt động
						    	</label>
						    	&nbsp;&nbsp;&nbsp;
						    	<label>
						        <input type="radio" name="rdoActive" id="rdoActive0" value="0">
						        Không hoạt động
						        </label>
						    </div>
						</div>
			        </div>
			        <!-- /.box-body -->
			        <div class="box-footer">
			            <button type="submit" class="btn btn-primary">Thêm</button>
			        </div>
			    </form>
			</div>
			<!-- /.box -->

	    </section>
	    <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->