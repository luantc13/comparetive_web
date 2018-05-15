<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="index.php">
		            <img src="public/img/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Hãng sản xuất</h3>
						<ul class="list-links">
							<?php foreach ($category as $item): ?>
								<li><a href="index.php?c=page&a=category&id=<?php echo $item->id ?>&slug=<?php echo $item->slug ?>"><?php echo $item->name ?></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Dịch vụ</h3>
						<ul class="list-links">
							<li><a href="index.php?c=page&a=about">Giới thiệu</a></li>
							<li><a href="index.php?c=page&a=contact">Liên hệ</a></li>
							<li><a href="index.php?c=page&a=delivery">Giao & nhận</a></li>
							<li><a href="index.php?c=page&a=faq">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Nhận thông báo</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Nhập Email">
							</div>
							<button class="primary-btn">Nhận thông báo</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/slick.min.js"></script>
	<script src="public/js/nouislider.min.js"></script>
	<script src="public/js/jquery.zoom.min.js"></script>
	<script src="public/js/main.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			<?php 
	    	if ($action == 'allproduct' || $action == 'category' || $action == 'productRange' || $action == 'search') {
	    		echo '$(".pagination").addClass("store-pages");';
			    echo '$(".pagination").removeClass("pagination")';
	    	}
	    	?>

	    	<?php 
	    	if ($action == 'product') {
	    		echo '$(".pagination").addClass("reviews-pages");';
			    echo '$(".pagination").removeClass("pagination")';
	    	}
	    	?>
				
	    	<?php
	    	if (isset($min) && isset($max)) {
	    		$min /= 1000000;
	    		$max /= 1000000;
	    		echo "$('.noUi-handle-lower').attr('aria-valuetext', ".$min.");";
	    		echo "$('.noUi-handle-upper').attr('aria-valuetext', ".$max.");";
	    	}
	    	?>
			
		    $('#btnFilter').click(function () {
		    	min = $('.noUi-handle-lower').attr('aria-valuetext')*1000000;
		    	max = $('.noUi-handle-upper').attr('aria-valuetext')*1000000;
		    	sort = $('.sort').val();
		    	show = $('.show-product').val();

		    	currentUrl = window.location.pathname + '?c=page&a=<?php echo $action ?>&min=' + min + '&max=' + max + '&sort=' + sort + '&show=' + show;

		    	<?php 
		    	if ($action == 'category' || $action == 'productRange') {
		    		echo "currentUrl = currentUrl + '&id=".$id."' + '&slug=".$slug."'";
		    	}
		    	?>

		    	<?php 
		    	if ($action == 'search') {
		    		echo "currentUrl = currentUrl + '&txtKeyword=".$keyword."' + '&cbbCategory=".$idCategory."'";
		    	}
		    	?>

		    	window.location.href = currentUrl;
		    });

		    $('.sort').change(function () {
		    	min = $('.noUi-handle-lower').attr('aria-valuetext')*1000000;
		    	max = $('.noUi-handle-upper').attr('aria-valuetext')*1000000;
		    	sort = $(this).val();
		    	show = $('.show-product').val();

		    	currentUrl = window.location.pathname + '?c=page&a=<?php echo $action ?>&min=' + min + '&max=' + max + '&sort=' + sort + '&show=' + show;

		    	<?php 
		    	if ($action == 'category' || $action == 'productRange') {
		    		echo "currentUrl = currentUrl + '&id=".$id."' + '&slug=".$slug."'";
		    	}
		    	?>

		    	<?php 
		    	if ($action == 'search') {
		    		echo "currentUrl = currentUrl + '&txtKeyword=".$keyword."' + '&cbbCategory=".$idCategory."'";
		    	}
		    	?>

		    	window.location.href = currentUrl;
		    });

		    $('.show-product').change(function () {
		    	min = $('.noUi-handle-lower').attr('aria-valuetext')*1000000;
		    	max = $('.noUi-handle-upper').attr('aria-valuetext')*1000000;
		    	sort = $('.sort').val();
		    	show = $(this).val();

		    	currentUrl = window.location.pathname + '?c=page&a=<?php echo $action ?>&min=' + min + '&max=' + max + '&sort=' + sort + '&show=' + show;

		    	<?php 
		    	if ($action == 'category' || $action == 'productRange') {
		    		echo "currentUrl = currentUrl + '&id=".$id."' + '&slug=".$slug."'";
		    	}
		    	?>

		    	<?php 
		    	if ($action == 'search') {
		    		echo "currentUrl = currentUrl + '&txtKeyword=".$keyword."' + '&cbbCategory=".$idCategory."'";
		    	}
		    	?>

		    	window.location.href = currentUrl;
		    });
		});
	</script>
</body>

</html>