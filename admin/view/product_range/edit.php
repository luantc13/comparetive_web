<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <h1>
	            Dòng sản phẩm
	            <small>Sửa</small>
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="admin.php"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
	            <li><a href="admin.php?c=product_range">Dòng sản phẩm</a></li>
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
			    <form role="form" method="POST" enctype="multipart/form-data" action="admin.php?c=productrange&a=postedit&id=<?php echo $productRange->id ?>">
			        <div class="box-body">
			        	<div class="form-group">
			                <label for="cbbCategory">Chọn hãng sản xuất</label>
			                <select class="form-control" id="cbbCategory" name="cbbCategory" required="">
			                	<?php foreach ($category as $item): ?>
			                		<option value="<?php echo $item->id ?>" <?php if ($item->id == $productRange->id_category): ?>
			                			selected=""
			                		<?php endif ?>><?php echo $item->name ?></option>
			                	<?php endforeach ?>
			                </select>
			            </div>

			            <div class="form-group">
			                <label for="txtName">Tên dòng</label>
			                <input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $productRange->name ?>" placeholder="Nhập tên dòng" required="">
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