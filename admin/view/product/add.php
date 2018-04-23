<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            Sản phẩm
	            <small>Thêm</small>
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="admin.php"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
	            <li><a href="admin.php?c=product">Sản phẩm</a></li>
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
			    <form role="form" method="POST" enctype="multipart/form-data" action="admin.php?c=product&a=postadd">
			        <div class="box-body">
			        	<div class="form-group">
			                <label for="cbbCategory">Chọn hãng sản xuất</label>
			                <select class="form-control" id="cbbCategory" name="cbbCategory" required="">
			                	<?php foreach ($category as $item): ?>
			                		<option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
			                	<?php endforeach ?>
			                </select>
			            </div>

			            <div class="form-group">
			                <label for="cbbCategory">Chọn dòng sản phẩm</label>
			                <select class="form-control" id="cbbProductRange" name="cbbProductRange" required="">
			                	<?php foreach ($productRange as $item): ?>
			                		<option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
			                	<?php endforeach ?>
			                </select>
			            </div>

			            <div class="form-group">
			                <label for="txtName">Tên sản phẩm</label>
			                <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Nhập tên sản phẩm" required="">
			            </div>

			            <div class="form-group" id="divImage">
			                <label for="fleImage[]">Hình ảnh - Mẹo: giữ Ctrl để chọn nhiều ảnh</label>
			                <input type="file" id="fleImage[]" name="fleImage[]" multiple="" required="">
			            </div>

			            <div class="col-md-12" id="comparetive-link">
			            	<h3>Đường dẫn so sánh</h3>
			            	<div class="form-group">
				                <label for="cbbProvider[]">Chọn nhà cung cấp</label>
				                <select class="form-control" id="cbbProvider[]" name="cbbProvider[]" required="">
				                	<?php foreach ($provider as $item): ?>
				                		<option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
				                	<?php endforeach ?>
				                </select>
				            </div>

				            <div class="form-group">
				                <label for="txtLink[]">Đường dẫn</label>
				                <input type="text" class="form-control" id="txtLink[]" name="txtLink[]" placeholder="Nhập đường dẫn" required="">
				            </div>
			            </div>
			            <button type="button" class="btn btn-primary" id="btn-add-comparetive-link">Thêm đường dẫn so sánh</button>

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