<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            <?php echo $product->name ?>
	            <small>Chỉnh sửa đường dẫn liên kết</small>
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="admin.php"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
	            <li><a href="admin.php?c=product">Sản phẩm</a></li>
	            <li><?php echo $product->name ?></li>
	            <li class="active">Chỉnh sửa đường dẫn liên kết</li>
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
			    <form role="form" method="POST" enctype="multipart/form-data" action="admin.php?c=product&a=posteditcomparetivelink&idcomparetivelink=<?php echo $comparetiveLink->id ?>&idproduct=<?php echo $product->id ?>">
			        <div class="box-body">
			        	<div class="form-group">
			                <label for="cbbCategory">Chọn nhà cung cấp</label>
			                <select class="form-control" id="cbbProvider" name="cbbProvider" required="">
			                	<?php foreach ($listProvider as $item): ?>
			                		<option value="<?php echo $item->id ?>" <?php if ($item->id == $comparetiveLink->id_provider): ?>
			                			selected=""
			                		<?php endif ?>><?php echo $item->name ?></option>
			                	<?php endforeach ?>
			                </select>
			            </div>

			            <div class="form-group">
			                <label for="txtLink">Đường dẫn liên kết</label>
			                <input type="text" class="form-control" id="txtLink" name="txtLink" value="<?php echo $comparetiveLink->link ?>" placeholder="Nhập Đường dẫn liên kết" required="">
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