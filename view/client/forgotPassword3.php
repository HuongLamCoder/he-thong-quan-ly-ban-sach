<main>
    <!-- Quên mật khẩu - Đổi mật khẩu mới -->
    <div class="container forgot-pw">
        <div class="forgot-pw-content">
            <div class="forgot-pw-content-box b-shadow">
                <div class="exclamation">
                    <i class="fa-thin fa-user-unlock"></i>
                </div>
                <div class="text">
                    <h4>Đổi Mật Khẩu Mới</h4>
                    <p>Giờ bạn đã có thể thay đổi mật khẩu mới, mật khẩu được nhập từ bàn phím phải có tối thiểu 8 ký tự.</p>
                </div>
                <div class="form">
                    <form action="" class="signin-form" id="form-passwordRecovery" method="POST">
                        <div class="change-pw">
                            <i class="fa-thin fa-key"></i>
                            <input type="password" id="passwordRecovery_password" name="password" placeholder="Nhập mật khẩu mới...">
                            <span class="error errorMessage_forgotPassword_password" id="forgotPassword_error_password"></span>
                        </div>
                        <div class="change-pw">
                            <i class="fa-thin fa-key"></i>
                            <input type="password" id="passwordRecovery_confirmPassword" name="confirmPassword" placeholder="Nhập xác nhận mật khẩu mới...">
                            <span class="error errorMessage_forgotPassword_confirmPassword" id="forgotPassword_error_confirmPassword"></span>
                        </div>
                        <input type="hidden" name="action" value="submit_changePassword">
                        <button type="submit" class="btn submit-btn" id="liveToastBtn">
                            Xác nhận
                        </button>
                        <!-- toast message -->
                        <!-- <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <span><i class="fa-light fa-square-check text-success"></i></span>
                                <strong class="me-auto">Thông báo</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Đổi mật khẩu mới thành công!
                                </div>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="asset/client/js/forgotPassword3.js?v=<?php echo time(); ?>"></script>