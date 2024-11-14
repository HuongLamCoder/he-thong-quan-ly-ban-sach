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
                            <div class="order-info">
                                <div class="order-id">
                                    <strong>Mã đơn hàng: </strong><span class="id">20</span>
                                </div>
                                <div class="order-timestamp">
                                    <strong>Thời gian đặt hàng: </strong><span class="timestamp">21-09-2024 21:39:49</span>
                                </div>
                                <div class="order-payment-method">
                                    <strong>Phương thức thanh toán: </strong> 
                                    <span class="payment-method"> Tiền mặt (COD)</span> 
                                    <span style="display: none;" class="payment-method"> Chuyển khoản</span> 
                                </div>
                            </div>
                            <div class="order-cust-info">
                                <strong class="title"><i class="fa-solid fa-location-dot"></i> Thông tin nhận hàng</strong>
                                <div class="cust-name">
                                    <span>Trần Kim Yến</span>
                                </div>
                                <div class="cust-phone">
                                    <span>0102030405</span>
                                </div>
                                <div class="cust-address">
                                    <span>275 An Dương Vương, phường 3, quận 5, thành phố Hồ Chí Minh</span>
                                </div>
                            </div>
                            <div class="order-product-list">
                                <div class="order-product">
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
                                        <div class="price-text">
                                            <span>159,000</span>đ
                                        </div>
                                    </div>
                                </div>
                                <div class="order-product">
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
                                        <div class="price-text">
                                            <span>159,000</span>đ
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="total-amount">
                                <strong>Thành tiền:</strong>
                                <span class="price-text"><span>159,000</span>đ</span>
                            </div>

                            <!-- Nút yêu cầu hoàn trả hàng -->
                            <div class="btn-end">
                                <a href="" class="btn return-request">Yêu cầu hoàn trả</a>
                            </div>

                            <!-- Nút hủy đơn hàng -->
                            <div class="btn-end" style="display: none;">
                                <button type="button" class="btn canceled-order" data-bs-toggle="modal" data-bs-target="#canceledOrder">Hủy đơn hàng</button>

                                <!-- Modal -->
                                <div class="modal fade" id="canceledOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thông báo</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn hủy đơn hàng không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Không</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="liveToastBtn">Có</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                        <span><i class="fa-light fa-square-check text-success"></i></span>
                                            <strong class="me-auto">Thông báo</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                        <div class="toast-body">
                                            Hủy đơn hàng thành công!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nút lý do từ chối hoàn trả hàng -->
                            <div class="btn-end" style="display: none;">
                                <button type="button" class="btn canceled-order" data-bs-toggle="modal" data-bs-target="#orderDeninedReturn">Lý do</button>

                                <!-- Modal -->
                                <div class="modal fade" id="orderDeninedReturn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Lý do từ chối hoàn trả hàng</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Chúng tôi thích!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Đóng</button>
                                                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="liveToastBtn">Có</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nút lý do từ chối hoàn tiền -->
                            <div class="btn-end" style="display: none;">
                                <button type="button" class="btn canceled-order" data-bs-toggle="modal" data-bs-target="#orderDeninedRefund">Lý do</button>

                                <!-- Modal -->
                                <div class="modal fade" id="orderDeninedRefund" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Lý do từ chối hoàn tiền</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Xi cà que.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Đóng</button>
                                                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="liveToastBtn">Có</button> -->
                                            </div>
                                        </div>
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
