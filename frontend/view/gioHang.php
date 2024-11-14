<?php 
    include_once "../inc/header.php";
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2">Sản phẩm</th>
                                            <th scope="col" class="qty">Số lượng</th>
                                            <th scope="col" colspan="2">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                                        <td class="book-image" scope="row">
                                                            <img src="../assets/example-book2.jpg" alt="">
                                                        </td>
                                                        <td class="book-name">
                                                            ?
                                                        </td>
                                                        <td class="quantity">
                                                            <div id="product_A_form" class="input-quantity">
                                                                <div class="input-quantity-group">
                                                                    <button class="btn-subtract" type="button">
                                                                        <i class="fa-regular fa-minus"></i>
                                                                    </button>
                                                                    <input id="product_A_qty" type="text" class="text-center item-quantity" value=1>
                                                                    <button class="btn-add" type="button">
                                                                        <i class="fa-regular fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="book-price">
                                                            <span class="price-text">
                                                                <span class="price"></span> đ
                                                            </span>
                                                        </td>
                                                        <td class="delete-book">
                                                            <button class="icon">
                                                                <i class="fa-thin fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                    </tbody>
                                    
                                </table>
                                <div class="continue-shopping">
                                    <a href="" class="nav-link">
                                        <i class="fa-light fa-arrow-turn-down-left"></i>
                                        <span>Tiếp tục mua hàng</span>
                                    </a>
                                </div>
                                <!-- <div class="empty-cart">
                                    <span><i class="fa-solid fa-cart-xmark"></i></span>
                                    <p>Hiện không có sản phẩm nào trong giỏ hàng...</p>
                                    <a class="btn" href="">Mua sắm ngay</a>
                                </div> -->
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
                                        <span class="total-text">3</span>
                                    </div>
                                    <div class="order-item total">
                                        <strong>Tổng số tiền</strong>
                                        <span class="total-text"><span class="total-money">100,000</span> đ</span>
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
