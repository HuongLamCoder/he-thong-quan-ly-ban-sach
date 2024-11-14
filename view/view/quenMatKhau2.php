<?php 
    include_once "../inc/header.php";
?>
    <main>
        <!-- Quên mật khẩu - Nhập mã xác nhận đã được gửi qua email -->
        <div class="container forgot-pw">
            <div class="forgot-pw-content">
                <div class="forgot-pw-content-box b-shadow">
                    <div class="exclamation">
                        <i class="fa-thin fa-circle-exclamation"></i>
                    </div>
                    <div class="text">
                        <h4>Quên Mật Khẩu</h4>
                        <p>Vui lòng nhập mã xác nhận đã được gửi qua email của bạn.</p>
                    </div>
                    <div class="form">
                        <form action="">
                            <div class="input-email">
                                <i class="fa-thin fa-envelope"></i>
                                <input type="text" placeholder="Nhập mã xác nhận...">
                            </div>
                            <button class="btn submit-btn">
                                Xác nhận
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include_once "../inc/footer.php"
    ?>
