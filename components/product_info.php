<section class="item">
    <?php
    $conn = new mysqli("localhost", "root", "", "base");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['product_id'];
    $result = $conn->query("SELECT * FROM products WHERE id=".$id);

    if ($result && $result->num_rows > 0) {
        $item = $result->fetch_assoc();
    }
    ?>
    <div class="container">
        <h1 class="item-title"><?= $item['name'] ?></h1>
        <img src="<?= $item['image_url'] ?>" width="510" height="392" alt="<?= $item['name'] ?>">
        <p class="price"><del><?= $item['price']*1.1 ?></del> <?= $item['price'] ?></p>
        <p><?= $item['description'] ?></p>
    </div>
</section>