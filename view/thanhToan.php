<?php 
    include_once "../inc/header.php";
?>
    <main>
        <!-- Thanh toán -->
        <div class="container paying">
            <div class="paying-content">
                <div class="title">
                    <h4>Thanh Toán</h4>
                </div>
                <div class="delivery-info-box b-shadow">
                    <div class="title">
                        <i class="fa-solid fa-location-dot"></i>
                        <h5>Địa chỉ nhận hàng</h5>
                    </div>
                    <div class="customer-info-delivery">
                        <div class="info">
                            <span class="customer-name">Trần Kim Yến</span>
                        </div>
                        <div class="customer-address">
                            <form action="">
                                <div>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Tỉnh/Thành phố</option>
                                        <option value="1">Thành phố Hồ Chí Mình</option>
                                        <option value="2">Hà Nội</option>
                                        <option value="3">Đà Nẵng</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Quận/Huyện</option>
                                        <option value="1">Huyện Bình Chánh</option>
                                        <option value="2">Quận 1</option>
                                        <option value="3">Quận 8</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Phường/Xã</option>
                                        <option value="1">Xã Bình Hưng</option>
                                        <option value="2">Phường 12</option>
                                        <option value="3">Phường Ăn Mày</option>
                                    </select>
                                    <input type="text" class="form-control" id="newAddressDetail" placeholder="Nhập địa chỉ cụ thể...">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="product-paying row">
                    <div class="col-9">
                        <div class="product-list-box b-shadow">
                            <div class="title">
                                <h5>Sản phẩm</h5>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="book-image">
                                            <img src="../assets/example-book5.jpg" alt="">
                                        </td>
                                        <td class="book-title">
                                            Điện Biên Phủ - Những Trang Vàng Lịch Sử 
                                        </td>
                                        <td class="book-quantity">
                                            <div class="book-quantity-text">
                                                x<span class="quantity">1</span>
                                            </div>
                                        </td>
                                        <td class="book-price">
                                            <div class="book-price-text">
                                                <span class="price">159,000</span>đ
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="book-image">
                                            <img src="../assets/example-book5.jpg" alt="">
                                        </td>
                                        <td class="book-title">
                                            Điện Biên Phủ - Những Trang Vàng Lịch Sử 
                                        </td>
                                        <td class="book-quantity">
                                            <div class="book-quantity-text">
                                                x<span class="quantity">1</span>
                                            </div>
                                        </td>
                                        <td class="book-price">
                                            <div class="book-price-text">
                                                <span class="price">159,000</span>đ
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="book-image">
                                            <img src="../assets/example-book5.jpg" alt="">
                                        </td>
                                        <td class="book-title">
                                            Điện Biên Phủ - Những Trang Vàng Lịch Sử 
                                        </td>
                                        <td class="book-quantity">
                                            <div class="book-quantity-text">
                                                x<span class="quantity">1</span>
                                            </div>
                                        </td>
                                        <td class="book-price">
                                            <div class="book-price-text">
                                                <span class="price">159,000</span>đ
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="payment-method-box b-shadow">
                            <h5>Phương thức thanh toán</h5>
                            <form action="">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment-method" id="banking">
                                    <label class="form-check-label" for="banking">
                                        Chuyển khoản
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment-method" id="cod" checked>
                                    <label class="form-check-label" for="cod">
                                        Thanh toán bằng tiền mặt (COD)
                                    </label>
                                </div>
                                <div class="paying-btn">
                                    <button class="btn">Thanh toán</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include_once "../inc/footer.php"
    ?>
