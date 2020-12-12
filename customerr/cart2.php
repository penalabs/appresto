<?php
session_start();
if (isset($_SESSION['cart2'])) {
    foreach ($_SESSION['cart2'] as $cart_item) {
        // echo $pid=$cart_item['id_menu'].'<br>';
        // echo $cart_item['id_menu'];
        // echo $cart_item['harga'];

    }
}
echo json_encode($_SESSION['cart2']);
?>
