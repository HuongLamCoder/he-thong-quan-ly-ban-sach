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
                            <span class="customer-name">Trần Kim Yến</span> (<span class="customer-number">0102030405</span>)
                        </div>
                        <div class="customer-address">
                            <span class="address">275 An Dương Vương, phưởng 3, quận 5, thành phố Hồ Chí Minh</span>
                            <span class="default">Mặc định</span>
                
                            <!-- Button trigger modal hiển thị danh sách địa chỉ của tài khoản -->
                            <button type="button" class="btn-change-address" data-bs-toggle="modal" data-bs-target="#modalListAddress">
                                Thay đổi
                            </button>

                            <!-- Modal hiển thị danh sách địa chỉ của tài khoản -->
                            <div class="modal fade" id="modalListAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Địa chỉ của tôi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="">
                                            <div class="modal-body">
                                                <div class="change-address">
                                                    <!-- hiển thị danh sách địa chỉ đã có trong tài khoản -->
                                                    <div class="change-address-info">
                                                        <div class="change-address-info-cb">
                                                            <input class="form-check-input" type="radio" name="address" id="address1" checked>
                                                            <label class="form-check-label" for="address1">
                                                                1990/313, xã Bình Hưng, huyện Bình Chánh, thành phố Hồ Chí Minh
                                                                <span class="default">Mặc định</span>
                                                            </label>
                                                        </div>
                                                        <!-- Button trigger modal hiển thị form chỉnh sửa thông tin địa chỉ
                                                             modal hiển thị ở bên dưới modal này -->
                                                        <div class="edit-address-btn">
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditAddress">
                                                                Sửa
                                                            </button>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="change-address-info">
                                                        <div class="change-address-info-cb">
                                                            <input class="form-check-input" type="radio" name="address" id="address2">
                                                            <label class="form-check-label" for="address2">
                                                                1990/313, xã Bình Hưng, huyện Bình Chánh, thành phố Hồ Chí Minh
                                                                <span class="default" style="display: none;">Mặc định</span>
                                                            </label>
                                                        </div>
                                                        <!-- Button trigger modal hiển thị form chỉnh sửa thông tin địa chỉ
                                                             modal hiển thị ở bên dưới modal này -->
                                                        <div class="edit-address-btn">
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditAddress">
                                                                Sửa
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="change-address-info">
                                                        <div class="change-address-info-cb">
                                                            <input class="form-check-input" type="radio" name="address" id="address3">
                                                            <label class="form-check-label" for="address3">
                                                                1990/313, xã Bình Hưng, huyện Bình Chánh, thành phố Hồ Chí Minh
                                                                <span class="default" style="display: none;">Mặc định</span>
                                                            </label>
                                                        </div>
                                                        <!-- Button trigger modal hiển thị form chỉnh sửa thông tin địa chỉ
                                                             modal hiển thị ở bên dưới modal này -->
                                                        <div class="edit-address-btn">
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditAddress">
                                                                Sửa
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Button trigger modal hiển thị form thêm mới thông tin địa chỉ -->
                                                    <button type="button" class="text-danger add-address-btn" data-bs-toggle="modal" data-bs-target="#modalNewAddress">
                                                        <i class="fa-regular fa-plus"></i> Thêm địa chỉ mới
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                                <!-- Khi làm chức năng cho nút xác nhận này thì mng bỏ dùm tui cái        data-bs-dismiss="modal"      nha -->
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Xác nhận</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Sửa địa chỉ -->
                            <div class="modal fade add-address-modal" id="modalEditAddress" tabindex="-1" aria-labelledby="modalEditAddressLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditAddressLabel">Sửa địa chỉ</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="">
                                            <div class="modal-body">
                                                    <!-- Form thêm địa chỉ mới -->
                                                    <div class="mb-3">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option>Tỉnh/Thành phố</option>
                                                            <option selected value="1">Thành phố Hồ Chí Mình</option>
                                                            <option value="2">Hà Nội</option>
                                                            <option value="3">Đà Nẵng</option>
                                                        </select>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option>Quận/Huyện</option>
                                                            <option selected value="1">Huyện Bình Chánh</option>
                                                            <option value="2">Quận 1</option>
                                                            <option value="3">Quận 8</option>
                                                        </select>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option>Phường/Xã</option>
                                                            <option selected value="1">Xã Bình Hưng</option>
                                                            <option value="2">Phường 12</option>
                                                            <option value="3">Phường Ăn Mày</option>
                                                        </select>
                                                        <input type="text" class="form-control" id="newAddressDetail" placeholder="Nhập địa chỉ cụ thể..." value="3990/112, ql50">
                                                        <div class="default-check">
                                                            <input class="form-check-input" type="checkbox" id="default-check-edit">
                                                            <label class="form-check-label" for="default-check-edit">Đặt làm địa chỉ mặc định</label>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary backToListAddress" data-bs-dismiss="modal">Quay lại</button>
                                                <!-- Khi làm chức năng cho nút xác nhận này thì mng bỏ dùm tui cái        data-bs-dismiss="modal"      nha -->
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Xác nhận</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal Thêm địa chỉ mới -->
                            <div class="modal fade add-address-modal" id="modalNewAddress" tabindex="-1" aria-labelledby="modalNewAddressLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalNewAddressLabel">Thêm địa chỉ mới</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="">
                                            <div class="modal-body">
                                                    <!-- Form thêm địa chỉ mới -->
                                                    <div class="mb-3">
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
                                                        <div class="default-check">
                                                            <input class="form-check-input" type="checkbox" id="default-check-add">
                                                            <label class="form-check-label" for="default-check-add">Đặt làm địa chỉ mặc định</label>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary backToListAddress" data-bs-dismiss="modal">Quay lại</button>
                                                <!-- Khi làm chức năng cho nút xác nhận này thì mng bỏ dùm tui cái        data-bs-dismiss="modal"      nha -->
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Xác nhận</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
