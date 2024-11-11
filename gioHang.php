<?php 
    include_once "../inc/header.php";
    include_once "../model/book.php";
    extract($result);
?>
    <main>
        <!-- Giỏ hàng -->
        <div class="container cart">
            <div class="cart-content">
                <div class="cart-content-box">
                    <div class="title">
                        <h4>Giỏ Hàng Của Bạn</h4>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <div class="product-cart-box b-shadow">
                                <?php
                                    if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
                                        $i = 0; //biến dùng để lưu index của sản phẩm trong giỏ hàng
                                        echo '
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" colspan="2">Sản phẩm</th>
                                                        <th scope="col" class="qty">Số lượng</th>
                                                        <th scope="col" colspan="2">Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                        ';
                                        foreach ($_SESSION['cart'] as $item) {
                                            $tonkho = getTonKhoByID($item[0])['tonkho'];
                                            $linkdel = "index.php?page=delcart&delcart=true&index=".$i; 
                                            echo '      
                                                    <tr>
                                                        <td class="book-image" scope="row">
                                                            <img src="../uploads/uploads_product/'.$item[1].'.jpg" alt="">
                                                        </td>
                                                        <td class="book-name">
                                                            '.$item[2].'
                                                        </td>
                                                        <td class="quantity">
                                                            <div id="product_A_form" class="input-quantity">
                                                                <div class="input-quantity-group">
                                                                    <button class="btn-subtract qty-form updateQty" type="button" data-index="'.$i.'" readonly">
                                                                        <i class="fa-regular fa-minus"></i>
                                                                    </button>
                                                                    <input id="product_A_qty" type="text" class="text-center item-quantity" name="input-qty" value="'.$item[5].'" data-index="'.$i.'" min="1" max="'.$tonkho.'" readonly">
                                                                    <button class="btn-add qty-form updateQty" type="button" data-index="'.$i.'" onclick="updateQuantity(this)">
                                                                        <i class="fa-regular fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="book-price">
                                                            <span class="price-text">';
                                                                if($item[3] != $item[4])
                                                                    echo '<span class="del-price">
                                                                        <del>'.number_format($item[3], 0, ',','.').'đ'.'</del>
                                                                    </span>';
                                                                echo'<span class="price">'.number_format($item[4], 0, ',','.').'đ'.'</span>
                                                            </span>
                                                        </td>
                                                        <td class="delete-book">
                                                            <a class="btn icon" href="'.$linkdel.'">
                                                                <i class="fa-thin fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            ';
                                        }
                                        echo '                               
                                                </tbody>
                                            </table>
                                            <div class="continue-shopping">
                                                <a href="" class="nav-link">
                                                    <i class="fa-light fa-arrow-turn-down-left"></i>
                                                    <span>Tiếp tục mua hàng</span>
                                                </a>
                                            </div>
                                        ';
                                    }
                                    else {
                                        echo ' 
                                            <div class="empty-cart">
                                                <span><i class="fa-solid fa-cart-xmark"></i></span>
                                                <p>Hiện không có sản phẩm nào trong giỏ hàng...</p>
                                                <a class="btn" href="">Quay về trang chủ</a>
                                            </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="order-info-box b-shadow">
                                <div class=title>
                                    <h5>Thông Tin Đơn Hàng</h5>
                                </div>
                                <div class="info-order">
                                    <div class="order-item quantity">
                                        <strong>Số sản phẩm</strong>
                                        <span class="total-text total-qty">
                                            <?php
                                                if(isset($_SESSION['cart'])) {
                                                    echo count($_SESSION['cart']);
                                                }
                                                else {
                                                    echo 0;
                                                }
                                            ?>
                                        </span>
                                    </div>
                                    <div class="order-item total">
                                        <strong>Tổng số tiền</strong>
                                        <span class="total-text">
                                            <span class="total-money total-price">
                                                <?php 
                                                    $totalPrice = 0;
                                                    if(isset($_SESSION['cart'])) {
                                                        $i = 0;
                                                        foreach($_SESSION['cart'] as $item) {
                                                            $totalPrice += $item[4] * $item[5];
                                                        }
                                                    }
                                                    echo number_format($totalPrice, 0, ',', '.'). 'đ';

                                                ?>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="submit-purchase-btn">
                                        <button class="btn">
                                            Thanh toán
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include_once "../inc/footer.php"
    ?>
