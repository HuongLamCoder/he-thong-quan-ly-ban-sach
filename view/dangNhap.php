<?php 
    include_once "../inc/header.php";
?>
<main>
        <!-- Đăng nhập -->
        <div class="container signin">
            <div class="signin-content">
                <div class="signin-content-box b-shadow">
                    <!-- title đăng nhập -->
                    <div class="title">
                        <span>Đăng Nhập</span>
                    </div>
                    <!-- form điền email, mật khẩu để đăng nhập -->
                    <div class="signin-box">
                        <form action="" class="signin-form">
                            <ul>
                                <li class="input-field">
                                    <strong>Email<span class="mandatory-symbol">*</span></strong>
                                    <input class="signin-input" type="text" placeholder="Nhập email...">
                                </li>
                                <li>
                                    <strong>Mật khẩu<span class="mandatory-symbol">*</span></strong>
                                    <input class="signin-input" type="password" placeholder="Nhập mật khẩu...">
                                </li>
                            </ul>
                            <div class="forgot-password">
                                <a class="nav-link" href=""><i>Quên mật khẩu?</i></a>
                            </div>
                            <div class="submit-btn">
                                <button class="btn">Đăng nhập</button>
                            </div>
                        </form>
                        <div class="signin-text">
                            <span>Chưa có tài khoản? &nbsp;	<a href="" class="nav-link">Đăng ký ngay</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include_once "../inc/footer.php"
    ?>
