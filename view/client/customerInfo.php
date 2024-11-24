   <main class="personal-page">
        <div class="container">
            <div class="row personal-page-content">
                <div class="col-3">
                    <div class="personal-menu">
                        <div class="username">
                            <i class="fa-thin fa-circle-user"></i>
                            <h5><?php print_r($_SESSION['user']['tenTK']);?></h5>
                        </div>
                        <div class="menu">
                            <div class="menu-item info-personal">
                                <a href="?page=customerInfo" class="nav-link">
                                    <i class="fa-thin fa-user"></i>
                                    <span>Thông tin cá nhân</span>
                                </a>
                            </div>
                            <div class="menu-item order-history">
                                <a href="?page=purchaseInfo" class="nav-link">
                                    <i class="fa-thin fa-newspaper"></i>
                                    <span>Lịch sử đơn hàng</span>

                                </a>
                            </div>
                            <?php print_r($_SESSION['user'])?>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="info-personal-edit b-shadow">
                        <h4>Thông Tin Cá Nhân</h4>
                        <form action="" class="info-form" id="info_form" method="POST">
                            <fieldset>
                                <label for="full-name">Họ và Tên</label>
                                <input placeholder="<?php echo $_SESSION['user']['tenTK']?>" type="text" name="fullname" id="info_fullname">
                                <span class="error errorMessage_info_fullname" id="info_error_password"></span>
                            </fieldset>
                            <fieldset>
                                <label for="email">Email</label>
                                <input placeholder="<?php echo $_SESSION['user']['email']?>" type="text" name="email" id="info_email">
                                <span class="error errorMessage_info_email" id="info_error_email"></span>
                            </fieldset>
                            <fieldset>
                                <label for="phone-number">Số điện thoại</label>
                                <input placeholder="<?php echo $_SESSION['user']['dienthoai']?>" type="text" name="phoneNumber" id="info_phoneNumber">
                                <span class="error errorMessage_info_phoneNumber" id="info_error_phoneNumber"></span>
                            </fieldset>
                            <fieldset>
                                <label for="password-current">Mật khẩu hiện tại</label>
                                <input placeholder="Nhập mật khẩu hiện tại..." type="password" name="currentPassword" id="info_currentPassword">
                                <span class="error errorMessage_info_currentPassword" id="info_error_currentPassword"></span>
                            </fieldset>
                            <fieldset>
                                <label for="password-new">Mật khẩu mới</label>
                                <input placeholder="Nhập mật khẩu mới..." type="password" name="newPassword" id="info_newPassword">
                                <span class="error errorMessage_info_newPassword" id="info_error_newPassword"></span>
                            </fieldset>
                            <fieldset>
                                <label for="password-new-repeat">Nhập lại mật khẩu</label>
                                <input placeholder="Nhập lại mật khẩu..." type="password" name="confirmNewPassword" id="info_confirmNewPassword">
                                <span class="error errorMessage_info_confirmNewPassword" id="info_error_confirmNewPassword"></span>
                            </fieldset>
                            <div class="change-pw-cb">
                                <input class="form-check-input" type="checkbox" name="changePassword" value="true" id="info_changePassword">
                                <label class="form-check-label" for="change-pw">
                                    Đổi mật khẩu
                                </label>
                            </div>
                            <div class="save-changes">
                                <input type="hidden" name="action" value="submit_changeInfo">
                                <button class="btn btnConfirm" onclick="">
                                    Lưu thay đổi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="asset/client/js/customerInfo.js?v=<?php echo time(); ?>"></script>
