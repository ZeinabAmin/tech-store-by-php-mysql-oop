<?php include("inc/header.php"); ?>

<?php

use TechStore\Classes\Models\Product;

$productObject = new Product();

if ($request->getHas('id')) {
	$id = $request->get('id');
} else {
	$id = 1;
}

$categoryId = $categoryObject->selectId($id);

$products = $productObject->selectWhere("cat_id = $id", "id, name, img, price");

?>

<!-- Home -->

<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= URL; ?>assets/images/shop_background.jpg"></div>
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center">
		<h2 class="home_title">
			<?php
			if (!empty($categoryId['name'])) :
				echo $categoryId['name'];
			else :
				echo "Not Category found";
			endif;
			?>
		</h2>
	</div>
</div>

<!-- Shop -->

<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">

				<!-- Shop Sidebar -->
				<div class="shop_sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">Categories</div>
						<ul class="sidebar_categories">
							<?php foreach ($categorys as $category) : ?>
								<li><a href="category.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
							<?php endforeach; ?>
							<!-- <li><a href="#">Computers & Laptops</a></li>
								<li><a href="#">Accessories</a></li> -->
						</ul>
					</div>

				</div>

			</div>

			<div class="col-lg-9">

				<!-- Shop Content -->

				<div class="shop_content">

					<div class="product_grid">
						<div class="product_grid_border"></div>

						<!-- Product Item -->
						<?php foreach ($products as $product) : ?>
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?= URL ?>uploads/<?= $product['img'] ?>" alt=""></div>
								<div class="product_content">
									<div class="product_price">$<?= $product['price'] ?></div>
									<div class="product_name">
										<div><a href="product.php?id=<?= $product['id'] ?>" tabindex="0"><?= $product['name'] ?></a></div>
									</div>

								</div>
							</div>

					</div>
				<?php endforeach; ?>
				</div>

			</div>

		</div>
	</div>
</div>
</div>

<?php require_once("inc/footer.php"); ?>
