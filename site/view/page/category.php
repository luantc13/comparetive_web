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
							
						<li><a href="index.php?c=page&a=allproduct">Xem tất cả</a></li>
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
				<li class="active"><?php echo $currentCategory->name ?></li>
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
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Lọc theo giá (triệu VNĐ)</h3>
						<div id="price-slider"></div>
						<button id="btnFilter" class="primary-btn pull-right">Lọc</button>
						<div class="clearfix"></div>
					</div>
					<!-- aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Dòng sản phẩm</h3>
						<ul class="list-links">
							<li class="active"><a>Tất cả</a></li>
							<?php foreach ($productRange as $item): ?>
								<li><a href="index.php?c=page&a=productrange&id=<?php echo $item->id ?>&slug=<?php echo $item->slug ?>"><?php echo $item->name ?></a></li>
							<?php endforeach ?>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Sản phẩm mới</h3>
						<?php foreach ($latestProduct as $item): ?>
							<!-- widget product -->
							<div class="product product-widget">
								<div class="product-thumb">
									<img src="upload/product/<?php echo $item->image ?>" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price"><?php echo number_format($item->price, 0, ',', '.') ?> VNĐ</h3>
									<h2 class="product-name"><a href="index.php?c=page&a=product&id=<?php echo $item->id ?>"><?php echo $item->name ?></a></h2>
									<div class="product-rating pull-left">
										<?php for ($i = 0; $i < round($item->rating); $i++): ?>
											<i class="fa fa-star"></i>
										<?php endfor ?>
										<?php for ($i = 0; $i < (5 - round($item->rating)); $i++): ?>
											<i class="fa fa-star-o empty"></i>
										<?php endfor ?>
									</div>
								</div>
							</div>
							<!-- /widget product -->
						<?php endforeach ?>
					</div>
					<!-- /aside widget -->
					
				</div>
				<!-- /ASIDE -->

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a class="active"><i class="fa fa-th-large"></i></a>
								<a><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sắp xếp:</span>
								<select class="input sort">
									<option <?php if ($sort == 'latest') echo 'selected' ?> value="latest">Mới nhất</option>
									<option <?php if ($sort == 'oldest') echo 'selected' ?> value="oldest">Cũ nhất</option>
									<option <?php if ($sort == 'price-asc') echo 'selected' ?> value="price-asc">Giá tăng dần</option>
									<option <?php if ($sort == 'price-desc') echo 'selected' ?> value="price-desc">Giá giảm dần</option>
									<option <?php if ($sort == 'rating') echo 'selected' ?> value="rating">Đánh giá cao</option>
								</select>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Hiện thị:</span>
								<select class="input show-product">
									<option <?php if ($show == 9) echo 'selected' ?> value="9">9</option>
									<option <?php if ($show == 18) echo 'selected' ?> value="18">18</option>
									<option <?php if ($show == 27) echo 'selected' ?> value="27">27</option>
								</select>
							</div>
							<?php echo $paginationHTML; ?>
							
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<?php foreach ($pagedProduct as $item): ?>
								<!-- Product Single -->
								<div class="col-md-4 col-sm-6 col-xs-6">
									<div class="product product-single">
										<div class="product-thumb">
											<div class="product-label">
											</div>
											<a class="main-btn quick-view" href="index.php?c=page&a=product&id=<?php echo $item->id ?>"><i class="fa fa-search-plus"></i> So sánh</a>
											<img src="upload/product/<?php echo $item->image ?>" alt="" height="200px">
										</div>
										<div class="product-body">
											<h3 class="product-price">Giá từ: <?php echo number_format($item->price, 0, ',', '.') ?> Đ</h3>
											<h2 class="product-name"><a href="index.php?c=page&a=product&id=<?php echo $item->id ?>"><?php echo $item->name ?></a></h2>
											<div class="product-rating pull-left">
												<?php for ($i = 0; $i < round($item->rating); $i++): ?>
													<i class="fa fa-star"></i>
												<?php endfor ?>
												<?php for ($i = 0; $i < (5 - round($item->rating)); $i++): ?>
													<i class="fa fa-star-o empty"></i>
												<?php endfor ?>
											</div>
										</div>
									</div>
								</div>
								<!-- /Product Single -->
							<?php endforeach ?>
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a class="active"><i class="fa fa-th-large"></i></a>
								<a><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sắp xếp:</span>
								<select class="input sort">
									<option <?php if ($sort == 'latest') echo 'selected' ?> value="latest">Mới nhất</option>
									<option <?php if ($sort == 'oldest') echo 'selected' ?> value="oldest">Cũ nhất</option>
									<option <?php if ($sort == 'price-asc') echo 'selected' ?> value="price-asc">Giá tăng dần</option>
									<option <?php if ($sort == 'price-desc') echo 'selected' ?> value="price-desc">Giá giảm dần</option>
									<option <?php if ($sort == 'rating') echo 'selected' ?> value="rating">Đánh giá cao</option>
								</select>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Hiện thị:</span>
								<select class="input show-product">
									<option <?php if ($show == 9) echo 'selected' ?> value="9">9</option>
									<option <?php if ($show == 18) echo 'selected' ?> value="18">18</option>
									<option <?php if ($show == 27) echo 'selected' ?> value="27">27</option>
								</select>
							</div>
							<?php echo $paginationHTML; ?>
						</div>
					</div>
					<!-- /store top filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->