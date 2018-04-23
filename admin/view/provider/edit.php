<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            Nhà cung cấp
	            <small>Sửa</small>
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="admin.php"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
	            <li><a href="admin.php?c=provider">Nhà cung cấp</a></li>
	            <li class="active">Sửa</li>
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
			    <form role="form" method="POST" enctype="multipart/form-data" action="admin.php?c=provider&a=postedit&id=<?php echo $provider->id ?>">
			        <div class="box-body">
			            <div class="form-group">
			                <label for="txtName">Tên nhà cung cấp</label>
			                <input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $provider->name ?>" placeholder="Nhập tên nhà cung cấp" required="">
			            </div>

			            <div class="form-group">
			                <label for="txtLink">Đường dẫn</label>
			                <input type="text" class="form-control" id="txtLink" name="txtLink" value="<?php echo $provider->link ?>" placeholder="Nhập đường dẫn" required="">
			            </div>

			            <div class="form-group">
			                <label for="fleImage">Hình ảnh</label>
			                <input type="file" id="fleImage" name="fleImage">
			                <img src="upload/provider/<?php echo $provider->image ?>" width="250px">
			            </div>
						
						<div class="form-group">
			                <label for="txtNamePattern">Mẫu lấy tên</label>
			                <textarea class="form-control" id="txtNamePattern" name="txtNamePattern" required=""><?php echo $provider->name_pattern ?></textarea> 
			            </div>

			            <div class="form-group">
			                <label for="txtPricePattern">Mẫu lấy giá</label>
			                <textarea class="form-control" id="txtPricePattern" name="txtPricePattern" required=""><?php echo $provider->price_pattern ?></textarea>
			            </div>

						<div class="form-group">
							<label>Trạng thái</label>
						    <div class="radio">
						        <label>
						        <input type="radio" name="rdoActive" id="rdoActive1" value="1" <?php if ($provider->active == 1) echo 'checked' ?>>
						        Hoạt động
						    	</label>
						    	&nbsp;&nbsp;&nbsp;
						    	<label>
						        <input type="radio" name="rdoActive" id="rdoActive0" value="0"  <?php if ($provider->active == 0) echo 'checked' ?>>
						        Không hoạt động
						        </label>
						    </div>
						</div>


			        </div>
			        <!-- /.box-body -->
			        <div class="box-footer">
			            <button type="submit" class="btn btn-primary">Sửa</button>
			        </div>
			    </form>
			</div>
			<!-- /.box -->

	    </section>
	    <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->