<?php 
    include_once "../inc/header.php";
?>
    <main class="personal-page">
        <!-- Đổi trả hàng -->
        <div class="container changePassword">
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
                <!-- 
                * Cho hiển thị tất cả các sản phẩm trong danh sách hóa đơn
                
                Sau đó để khách hàng chọn số lượng sản phẩm muốn trả
                (ban đầu số lượng khi hiển thị = 0 )
                
                Sản phẩm nào có số lượng = 0 có nghĩa là sản phẩm đó
                ko được hoàn trả
                
                Còn những sản phẩm có số lượng từ 1 trở lên sẽ là sản
                phẩm và số lượng mà khách hàng muốn hoàn trả
                
                Số lượng sản phẩm hoàn trả vượt quá số lượng khách mua
                => thông báo 
                -->
                <div class="col-9">
                    <div class="return-order-box b-shadow">
                        <h4>Hoàn Trả Hàng</h4>
                        <form action="">
                            <div class="return-product-list">
                                <div class="return-product">
                                    <div class="book-image">
                                        <img src="../assets/example-book5.jpg" alt="">
                                    </div>
                                    <div class="book-info">
                                        <div class="title">
                                            <strong>Điện Biên Phủ - Những Trang Vàng Lịch Sử</strong>
                                        </div>
                                        <div class="quantity">
                                            <div id="product_A_form" class="input-quantity">
                                                <div class="input-quantity-group">
                                                    <button class="re-btn-subtract" type="button">
                                                        <i class="fa-regular fa-minus"></i>
                                                    </button>
                                                    <input id="product_A_qty" type="text" class="text-center item-return-quantity" value=0>
                                                    <button class="re-btn-add" type="button">
                                                        <i class="fa-regular fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-text">
                                            <span class="price">200,000</span>đ
                                        </div>
                                    </div>
                                </div>
                                <div class="return-product">
                                    <div class="book-image">
                                        <img src="../assets/example-book5.jpg" alt="">
                                    </div>
                                    <div class="book-info">
                                        <div class="title">
                                            <strong>Điện Biên Phủ - Những Trang Vàng Lịch Sử</strong>
                                        </div>
                                        <div class="quantity">
                                            <div id="product_A_form" class="input-quantity">
                                                <div class="input-quantity-group">
                                                    <button class="re-btn-subtract" type="button">
                                                        <i class="fa-regular fa-minus"></i>
                                                    </button>
                                                    <input id="product_A_qty" type="text" class="text-center item-return-quantity" value=0>
                                                    <button class="re-btn-add" type="button">
                                                        <i class="fa-regular fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-text">
                                            <span class="price">200,000</span>đ
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="return-reason-el">
                                <strong>Lý do hoàn trả</strong>
                                <div class="return-reason">
                                    <select name="" id="" class="form-select">
                                        <option value="" selected>Chọn lý do</option>
                                        <option value="">Không cần lý do</option>
                                        <option value="">Thích thì trả</option>
                                        <option value="">búm xi la bum</option>
                                        <option value="">siuuuuuuuuuuu</option>                            </select>
                                </div>
                            </div>
                            <div class="specific-reason">
                                <textarea class="form-control" name="" id="" placeholder="Nhập lý do cụ thể ở đây. Hãy 'Thêm hình ảnh/video' chỉ rõ lỗi sản phẩm."></textarea>
                            </div>
                            <div class="upload-video">
                                <label for="">File, Video minh chứng:</label>
                                <input type="file" class="form-control">
                            </div>
                            <div class="return-money-receive-info">
                                <div class="banking-number">
                                    <label for="banking-number-input">Số tài khoản Ngân hàng</label>
                                    <input type="text" class="form-control" id="banking-number-input" placeholder="Nhập số tài khoản Ngân hàng...">                        
                                </div>
                                <div class="bank-selection">
                                    <label for="bank-selection-opt">Chọn Ngân hàng: </label>
                                    <select name="" id="bank-selection-opt" class="form-select">
                                        <option value="" selected >Chọn ngân hàng</option>
                                        <option value="">Vietinbank</option>
                                        <option value="">Vietcombank</option>
                                        <option value="">Sacombank</option>
                                    </select>
                                </div>
                            </div>
                            <div class="submit-return-product-btn">
                                <button class="btn">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include_once "../inc/footer.php"
    ?>
