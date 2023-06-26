<section class="message">
    <div class="container">
        <p class="message">
            <?php
            if ($msg) {
                echo($msg);
            }
            if ($_SESSION['msg']) {
                echo($_SESSION['msg']);
                $_SESSION['msg'] = null;
            }
            ?>
        </p>

    </div>
</section>