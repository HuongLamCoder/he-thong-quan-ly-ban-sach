<?php 
    include_once "../inc/header.php";
?>
    <main>
        <!-- Xác thực email -->
        <div class="container verification">
            <div class="verification-content">
                <div class="verification-content-box b-shadow">
                    <div class="logo">
                        <img src="../assets/vinabook-logo.png" alt="">
                    </div>
                    <div class="text">
                        <h4>Nhập mã xác nhận</h4>
                        <p>Mã xác nhận đã được gửi đến email <span class="email">example@gmail.com</span>. Bạn vui lòng kiểm tra hộp thư từ email và nhập mã xác nhận vào ô bên dưới</p>
                    </div>
                    <div class="form">
                        <form action="">
                            <input type="text" placeholder="Nhập mã xác nhận...">
                            <button type="button" class="btn submit-btn" id="liveToastBtn">
                                Xác nhận
                            </button>
                            <!-- toast message -->
                            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <span><i class="fa-light fa-square-check text-success"></i></span>
                                    <strong class="me-auto">Thông báo</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                        Xác thực email thành công!
                                    </div>
                                </div>
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
