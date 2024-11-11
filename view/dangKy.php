<?php 
    include_once "../inc/header.php";
?>
    <main>
        <!-- Đăng nhập -->
        <div class="container signup">
            <div class="signin-content">
                <div class="signin-content-box b-shadow">
                    <!-- title đăng ký -->
                    <div class="title">
                        <span>Đăng Ký</span>
                    </div>
                    <!-- form điền thông tin tạo tài khoản -->
                    <div class="signin-box">
                        <form action="" class="signin-form">
                            <ul>
                                <li class="input-field">
                                    <strong>Họ và tên<span class="mandatory-symbol">*</span></strong>
                                    <input class="signin-input" type="text" placeholder="Nhập họ và tên...">
                                </li>
                                <li class="input-field">
                                    <strong>Email<span class="mandatory-symbol">*</span></strong>
                                    <input class="signin-input" type="email" placeholder="Nhập email...">
                                </li>
                                <li class="input-field">
                                    <strong>Số điện thoại<span class="mandatory-symbol">*</span></strong>
                                    <input class="signin-input" type="text" placeholder="Nhập số điện thoại...">
                                </li>
                                <li class="input-field">
                                    <strong>Mật khẩu<span class="mandatory-symbol">*</span></strong>
                                    <input class="signin-input" type="password" placeholder="Nhập mật khẩu...">
                                </li>
                                <li class="input-field">
                                    <strong>Xác nhận mật khẩu<span class="mandatory-symbol">*</span></strong>
                                    <input class="signin-input" type="password" placeholder="Nhập xác nhận mật khẩu...">
                                </li>

                            </ul>
                            <div class="submit-btn">
                                <button class="btn">Đăng ký</button>
                            </div>
                        </form>
                        <div class="signin-text">
                            <span>Đã có tài khoản? &nbsp;	<a href="" class="nav-link">Đăng nhập ngay</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include_once "../inc/footer.php"
    ?>
