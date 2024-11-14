<?php 
    include_once "../inc/header.php";
?>
    <!-- Lịch sử đơn hàng -->
    <main class="personal-page">
        <div class="container">
            <div class="row personal-page-content">
                <div class="col-3">
                    <div class="personal-menu">
                        <div class="username">
                            <i class="fa-thin fa-circle-user"></i>
                            <h5>Username</h5>
                        </div>
                        <div class="menu">
                            <div class="menu-item info-personal">
                                <a href="" class="nav-link">
                                    <i class="fa-thin fa-user"></i>
                                    <span>Thông tin cá nhân</span>
                                </a>
                            </div>
                            <div class="menu-item order-history">
                                <a href="" class="nav-link">
                                    <i class="fa-thin fa-newspaper"></i>
                                    <span>Lịch sử đơn hàng</span>
                                </a>
                            </div>
                            <div class="menu-item change-password">
                                <a href="" class="nav-link">
                                    <i class="fa-thin fa-key"></i>
                                    <span>Thay đổi mật khẩu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="order-list-content">
                        <div class="order-filter">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Chọn loại đơn hàng</option>
                                <option value="1">Giao hàng thành công</option>
                                <option value="2">Đang chờ duyệt</option>
                                <option value="3">Từ chối hoàn trả</option>
                                <option value="4">Từ chối hoàn tiền</option>
                                <option value="5">Hoàn trả thành công</option>
                                <option value="6">Đã hủy</option>
                            </select>
                        </div>
                        <div class="row order-box b-shadow">
                            <!-- ------------------- -->
                            <!-- này là trạng thái đơn hàng  -->
                            <div class="order-status order-delivered" id="delivered">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Giao hàng thành công</h6>
                            </div>
                            <div class="order-status order-delivered" id="return-accepted" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Hoàn trả thành công</h6>
                            </div>
                            <div class="order-status order-pending" id="pending" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đang chờ duyệt</h6>
                            </div>
                            <div class="order-status order-canceled" id="canceled" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đã hủy</h6>
                            </div>
                            <div class="order-status order-canceled" id="return-denied" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn trả</h6>
                            </div>
                            <div class="order-status order-canceled" id="refund-denied" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn tiền</h6>
                            </div>
                            <!-- ------------------- -->
                            <div class="order-product-1st">
                                <div class="book-image">
                                    <img src="../assets/example-book5.jpg" alt="">
                                </div>
                                <div class="book-info">
                                    <div class="title">
                                        <p>Điện Biên Phủ - Những Trang Vàng Lịch Sử</p>
                                    </div>
                                    <div class="quantity-text">
                                        x<span class="quantity">1</span>
                                    </div>
                                    <div class="see-more">
                                        <a href="" class="nav-link">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="total-amount">
                                <strong>Thành tiền:</strong>
                                <span class="price-text"><span>159,000</span>đ</span>
                            </div>
                        </div>
                        <div class="row order-box b-shadow">
                            <!-- ------------------- -->
                            <!-- này là trạng thái đơn hàng  -->
                            <div class="order-status order-delivered" id="delivered" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Giao hàng thành công</h6>
                            </div>
                            <div class="order-status order-delivered" id="return-accepted">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Hoàn trả thành công</h6>
                            </div>
                            <div class="order-status order-pending" id="pending" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đang chờ duyệt</h6>
                            </div>
                            <div class="order-status order-canceled" id="canceled" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đã hủy</h6>
                            </div>
                            <div class="order-status order-canceled" id="return-denied" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn trả</h6>
                            </div>
                            <div class="order-status order-canceled" id="refund-denied" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn tiền</h6>
                            </div>
                            <!-- ------------------- -->
                            <div class="order-product-1st">
                                <div class="book-image">
                                    <img src="../assets/example-book5.jpg" alt="">
                                </div>
                                <div class="book-info">
                                    <div class="title">
                                        <p>Điện Biên Phủ - Những Trang Vàng Lịch Sử</p>
                                    </div>
                                    <div class="quantity-text">
                                        x<span class="quantity">1</span>
                                    </div>
                                    <div class="see-more">
                                        <a href="" class="nav-link">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="total-amount">
                                <strong>Thành tiền:</strong>
                                <span class="price-text"><span>159,000</span>đ</span>
                            </div>
                        </div>
                        <div class="row order-box b-shadow">
                            <!-- ------------------- -->
                            <!-- này là trạng thái đơn hàng  -->
                            <div class="order-status order-delivered" id="delivered" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Giao hàng thành công</h6>
                            </div>
                            <div class="order-status order-delivered" id="return-accepted" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Hoàn trả thành công</h6>
                            </div>
                            <div class="order-status order-pending" id="pending">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đang chờ duyệt</h6>
                            </div>
                            <div class="order-status order-canceled" id="canceled" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đã hủy</h6>
                            </div>
                            <div class="order-status order-canceled" id="return-denied" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn trả</h6>
                            </div>
                            <div class="order-status order-canceled" id="refund-denied" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn tiền</h6>
                            </div>
                            <!-- ------------------- -->
                            <div class="order-product-1st">
                                <div class="book-image">
                                    <img src="../assets/example-book5.jpg" alt="">
                                </div>
                                <div class="book-info">
                                    <div class="title">
                                        <p>Điện Biên Phủ - Những Trang Vàng Lịch Sử</p>
                                    </div>
                                    <div class="quantity-text">
                                        x<span class="quantity">1</span>
                                    </div>
                                    <div class="see-more">
                                        <a href="" class="nav-link">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="total-amount">
                                <strong>Thành tiền:</strong>
                                <span class="price-text"><span>159,000</span>đ</span>
                            </div>
                        </div>
                        <div class="row order-box b-shadow">
                            <!-- ------------------- -->
                            <!-- này là trạng thái đơn hàng  -->
                            <div class="order-status order-delivered" id="delivered" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Giao hàng thành công</h6>
                            </div>
                            <div class="order-status order-delivered" id="return-accepted" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Hoàn trả thành công</h6>
                            </div>
                            <div class="order-status order-pending" id="pending" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đang chờ duyệt</h6>
                            </div>
                            <div class="order-status order-canceled" id="canceled">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đã hủy</h6>
                            </div>
                            <div class="order-status order-canceled" id="return-denied" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn trả</h6>
                            </div>
                            <div class="order-status order-canceled" id="refund-denied" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn tiền</h6>
                            </div>
                            <!-- ------------------- -->
                            <div class="order-product-1st">
                                <div class="book-image">
                                    <img src="../assets/example-book5.jpg" alt="">
                                </div>
                                <div class="book-info">
                                    <div class="title">
                                        <p>Điện Biên Phủ - Những Trang Vàng Lịch Sử</p>
                                    </div>
                                    <div class="quantity-text">
                                        x<span class="quantity">1</span>
                                    </div>
                                    <div class="see-more">
                                        <a href="" class="nav-link">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="total-amount">
                                <strong>Thành tiền:</strong>
                                <span class="price-text"><span>159,000</span>đ</span>
                            </div>
                        </div>
                        <div class="row order-box b-shadow">
                            <!-- ------------------- -->
                            <!-- này là trạng thái đơn hàng  -->
                            <div class="order-status order-delivered" id="delivered" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Giao hàng thành công</h6>
                            </div>
                            <div class="order-status order-delivered" id="return-accepted" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Hoàn trả thành công</h6>
                            </div>
                            <div class="order-status order-pending" id="pending" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đang chờ duyệt</h6>
                            </div>
                            <div class="order-status order-canceled" id="canceled" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đã hủy</h6>
                            </div>
                            <div class="order-status order-canceled" id="return-denied">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn trả</h6>
                            </div>
                            <div class="order-status order-canceled" id="refund-denied" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn tiền</h6>
                            </div>
                            <!-- ------------------- -->
                            <div class="order-product-1st">
                                <div class="book-image">
                                    <img src="../assets/example-book5.jpg" alt="">
                                </div>
                                <div class="book-info">
                                    <div class="title">
                                        <p>Điện Biên Phủ - Những Trang Vàng Lịch Sử</p>
                                    </div>
                                    <div class="quantity-text">
                                        x<span class="quantity">1</span>
                                    </div>
                                    <div class="see-more">
                                        <a href="" class="nav-link">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="total-amount">
                                <strong>Thành tiền:</strong>
                                <span class="price-text"><span>159,000</span>đ</span>
                            </div>
                        </div>
                        <div class="row order-box b-shadow">
                            <!-- ------------------- -->
                            <!-- này là trạng thái đơn hàng  -->
                            <div class="order-status order-delivered" id="delivered" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Giao hàng thành công</h6>
                            </div>
                            <div class="order-status order-delivered" id="return-accepted" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Hoàn trả thành công</h6>
                            </div>
                            <div class="order-status order-pending" id="pending" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đang chờ duyệt</h6>
                            </div>
                            <div class="order-status order-canceled" id="canceled" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Đã hủy</h6>
                            </div>
                            <div class="order-status order-canceled" id="return-denied" style="display: none;">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn trả</h6>
                            </div>
                            <div class="order-status order-canceled" id="refund-denied">
                                <i class="fa-regular fa-truck"></i>
                                <h6>Từ chối hoàn tiền</h6>
                            </div>
                            <!-- ------------------- -->
                            <div class="order-product-1st">
                                <div class="book-image">
                                    <img src="../assets/example-book5.jpg" alt="">
                                </div>
                                <div class="book-info">
                                    <div class="title">
                                        <p>Điện Biên Phủ - Những Trang Vàng Lịch Sử</p>
                                    </div>
                                    <div class="quantity-text">
                                        x<span class="quantity">1</span>
                                    </div>
                                    <div class="see-more">
                                        <a href="" class="nav-link">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="total-amount">
                                <strong>Thành tiền:</strong>
                                <span class="price-text"><span>159,000</span>đ</span>
                            </div>
                        </div>
                        <div class="pagination">
                            <div class="pagination-content">
                                <a class="nav-link" href="#"><i class="fa-regular fa-chevron-left"></i></a>
                                <a class="nav-link" href="#">1</a>
                                <a class="nav-link active" href="#">2</a>
                                <a class="nav-link" href="#">3</a>
                                <a class="nav-link" href="#">4</a>
                                <a class="nav-link" href="#">5</a>
                                <a class="nav-link" href="#">6</a>
                                <a class="nav-link" href="#"><i class="fa-regular fa-chevron-right"></i></a>
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
