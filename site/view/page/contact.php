	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Hãng sản xuất <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<?php foreach ($menu as $item): ?>
							<li class="dropdown side-dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?php echo $item->name ?> <i class="fa fa-angle-right"></i></a>
								<div class="custom-menu">
									<div class="row">
										<div class="col-md-4">
											<ul class="list-links">
												<?php 
												$productRangeMenu = explode(',', $item->product_range);

												foreach ($productRangeMenu as $pr) {
													list($id, $name, $slug) = explode('||', $pr);
													echo '<li><a href="index.php?c=page&a=productrange&id='.$id.'&slug='.$slug.'">'.$name.'</a></li>';
												}
												?>
												<li><a href="index.php?c=page&a=category&id=<?php echo $item->id ?>&slug=<?php echo $item->slug ?>"><b>Xem tất cả</b></a></li>
											</ul>
											<hr class="hidden-md hidden-lg">
										</div>
									</div>
									<div class="row hidden-sm hidden-xs">
										<div class="col-md-12">
											<hr>
											<a class="banner banner-1" href="#">
												<img src="./img/banner05.jpg" alt="">
												<div class="banner-caption text-center">
													<h2 class="white-color">NEW COLLECTION</h2>
													<h3 class="white-color font-weak">HOT DEAL</h3>
												</div>
											</a>
										</div>
									</div>
								</div>
							</li>
						<?php endforeach ?>
							
						<li><a href="#">Xem tất cả</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="index.php?c=page&a=about">Giới thiệu</a></li>
						<li><a href="index.php?c=page&a=contact">Liên hệ</a></li>
						<li><a href="index.php?c=page&a=delivery">Giao & Nhận</a></li>
						<li><a href="index.php?c=page&a=faq">FAQ</a></li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Trang chủ</a></li>
				<li class="active">Liên hệ</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3><i class="fa fa-info-circle"></i> Thông tin liên hệ</h3>
						    
	                <div class="break"></div>
				   	<h4><i class= "fa fa-home"></i> Địa chỉ: <small>KTX Khu B ĐHQG Tp. HCM, Đông Hòa, Dĩ An, Bình Dương </small></h4>

	                <h4><i class="fa fa-envelope"></i> Email : <small>luantc13@gmail.com</small></h4>

	                <h4><i class="fa fa-phone"></i> Điện thoại: <small>0123456789</small></h4>



	                <br><br>
	                <h3><i class="fa fa-globe"></i> Bản đồ</h3>
	                <div class="break"></div><br>
	                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.073873347653!2d106.78043601473475!3d10.881985892249995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d89aad780e49%3A0x54542761d4c22175!2sKTX+Khu+B%2C+%C4%90HQG!5e0!3m2!1svi!2s!4v1515146144525" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
					
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->