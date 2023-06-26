<section class="catalog">
    <div class="container">
        <h1 class="catalog-title">Каталог товаров</h1>
        <ul class="products-list">

            <?php
            $result = $conn->query("SELECT * FROM products");
            while ($item = $result->fetch()) {?>
                <li>
                    <a class="product-card" href="index.php?page=product&product_id=<?echo $item['id'] ?>">
                        <h3><?= $item['name'] ?></h3>
                        <p><?= $item['description'] ?></p>
                        <span class="price"><del><?= $item['price']*1.1 ?></del> <?= $item['price'] ?></span>
                        <img src="<?= $item['image_url'] ?>" width="156" height="120" alt="<?= $item['title'] ?>">
                    </a>
                </li>


            <?php }; ?>


        </ul>
    </div>
</section>