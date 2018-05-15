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
				<li><a href="index.php?c=page&a=category&id=<?php echo $currentCategory->id ?>"><?php echo $currentCategory->name ?></a></li>
				<li><a href="index.php?c=page&a=productrange&id=<?php echo $currentProductRange->id ?>"><?php echo $currentProductRange->name ?></a></li>
				<li class="active"><?php echo $product->name ?></li>
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
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<?php foreach ($imageProduct as $item): ?>
								<div class="product-view">
									<img src="upload/product/<?php echo $item->name ?>" alt="">
								</div>
							<?php endforeach ?>
						</div>
						<div id="product-view">
							<?php foreach ($imageProduct as $item): ?>
								<div class="product-view">
									<img src="upload/product/<?php echo $item->name ?>" alt="">
								</div>
							<?php endforeach ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<div class="product-label">
							</div>
							<h2 class="product-name"><?php echo $product->name ?></h2>
							<h3 class="product-price">Giá chỉ từ: <?php echo number_format($product->price, 0, ',', '.') ?> Đ</h3>
							<div>
								<div class="product-rating">
									<?php for ($i = 0; $i < round($product->rating); $i++): ?>
										<i class="fa fa-star"></i>
									<?php endfor ?>
									<?php for ($i = 0; $i < (5 - round($product->rating)); $i++): ?>
										<i class="fa fa-star-o empty"></i>
									<?php endfor ?>
								</div>
							</div>
							<table class="table table-responsive">
								<?php foreach ($comparetiveLink as $item): ?>
									<tr>
										<td><img src="upload/provider/<?php echo $item->pv_image ?>" width="150px"></td>
										<td><?php echo $item->name ?></td>
										<td style="color: red;"><?php echo number_format($item->price, 0, ',', '.') ?></td>
										<td width="130px"><a class="primary-btn" href="<?php echo $item->link ?>">Tói nơi bán</a></td>
									</tr>
								<?php endforeach ?>
							</table>
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Đánh giá</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												<?php foreach ($pagedReview as $item): ?>
													<div class="single-review">
														<div class="review-heading">
															<div><a href="#"><i class="fa fa-user-o"></i> <?php echo $item->name ?></a></div>
															<div><a href="#"><i class="fa fa-clock-o"></i> <?php echo $item->created_at ?></a></div>
															<div class="review-rating pull-right">
																<?php for ($i = 0; $i < round($item->rating); $i++): ?>
																	<i class="fa fa-star"></i>
																<?php endfor ?>
																<?php for ($i = 0; $i < (5 - round($item->rating)); $i++): ?>
																	<i class="fa fa-star-o empty"></i>
																<?php endfor ?>
															</div>
														</div>
														<div class="review-body">
															<p><?php echo nl2br($item->content) ?></p>
														</div>
													</div>
												<?php endforeach ?>
												<?php echo $paginationHTML; ?>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Viết đánh giá</h4>
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
											<p>Địa chỉ email của bạn sẽ không được công khai.</p>
											<form class="review-form" method="POST" action="index.php?c=page&a=postReview&id=<?php echo $product->id ?>">
												<div class="form-group">
													<input class="input" type="text" id="txtName" name="txtName" placeholder="Nhập họ tên" required="" />
												</div>
												<div class="form-group">
													<input class="input" type="email" id="txtEmail" name="txtEmail" placeholder="Nhập email" required="" />
												</div>
												<div class="form-group">
													<textarea class="input" id="txtContent" name="txtContent" placeholder="Nhập đánh giá" required=""></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Đánh giá: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rdoRating" value="5" required="" /><label for="star5"></label>
															<input type="radio" id="star4" name="rdoRating" value="4" required="" /><label for="star4"></label>
															<input type="radio" id="star3" name="rdoRating" value="3" required="" /><label for="star3"></label>
															<input type="radio" id="star2" name="rdoRating" value="2" required="" /><label for="star2"></label>
															<input type="radio" id="star1" name="rdoRating" value="1" required="" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn">Đánh giá</button>
											</form>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
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
						<h2 class="title">Sản phẩm tương tụ</h2>
					</div>
				</div>
				<!-- section title -->
				<?php foreach ($relatedProduct as $item): ?>
					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
									<div class="product-label">
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