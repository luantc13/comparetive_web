	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav">
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

	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
					<?php foreach ($slide as $item): ?>
						<!-- banner -->
						<a href="<?php echo $item->link ?>" class="banner banner-1">
							<img src="upload/slide/<?php echo $item->image ?>" alt="">
						</a>
						<!-- /banner -->
					<?php endforeach ?>
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php foreach ($banner1 as $item): ?>
					<!-- banner -->
					<div class="col-md-4 col-sm-6">
						<a class="banner banner-1" href="#">
							<img src="public/img/<?php echo $item->image ?>" alt="">
						</a>
					</div>
					<!-- /banner -->
				<?php endforeach ?>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản phẩm mới</h2>
					</div>
				</div>
				<!-- section title -->
				<?php foreach ($latestProduct as $item): ?>
					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span>Mới</span>
								</div>
								<a class="main-btn quick-view" href="index.php?c=page&a=product&id=<?php echo $item->id ?>"><i class="fa fa-search-plus"></i> So sánh</a>
								<img src="upload/product/<?php echo $item->image ?>" alt="" height="200px">
							</div>
							<div class="product-body">
								<h3 class="product-price">Giá từ: <?php echo number_format($item->price, 0, ',', '.') ?> Đ</h3>
								<h2 class="product-name"><a href="#"><?php echo $item->name ?></a></h2>
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
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php foreach ($banner2 as $item): ?>
					<!-- banner -->
					<div class="col-md-4 col-sm-6">
						<a class="banner banner-1" href="#">
							<img src="public/img/<?php echo $item->image ?>" alt="">
						</a>
					</div>
					<!-- /banner -->
				<?php endforeach ?>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Đánh giá cao</h2>
					</div>
				</div>
				<!-- section title -->
				<?php foreach ($ratingProduct as $item): ?>
					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span class="sale">Nổi bật</span>
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
		<!-- /container -->
	</div>
	<!-- /section -->