<main>
    <!-- Quên mật khẩu - Nhập mã xác nhận đã được gửi qua email -->
    <div class="container forgot-pw">
        <div class="forgot-pw-content">
            <div class="forgot-pw-content-box b-shadow">
                <div class="exclamation">
                    <i class="fa-thin fa-circle-exclamation"></i>
                </div>
                <div class="text">
                    <h4>Chúng tôi cần xác thực email của bạn</h4>
                    <p>Vui lòng nhập mã xác nhận đã được gửi qua email của bạn.</p>
                </div>
                <div class="form">
                    <form action="" class="signin-form" id="form-OTPInput" method="POST">
                        <div class="input-email">
                            <i class="fa-thin fa-envelope"></i>
                            <input type="text" id="forgotPassword_OTP" name="OTP" placeholder="Nhập mã xác nhận...">
                            <span class="error errorMessage_forgotPassword_OTP" id="forgotPassword_error_OTP"></span>
                        </div>
                        <input type="hidden" name="action" value="submit_OTP">
                        <button class="btn submit-btn">
                            Xác nhận
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="asset/client/js/signUp_OTP.js?v=<?php echo time(); ?>"></script>