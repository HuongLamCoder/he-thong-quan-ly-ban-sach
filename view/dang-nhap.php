<?php 
    include "../inc/header.php";
?>
    <!-- Content -->
    <main class="container login-page">
        <div class="form-container p-4">
            <h2 class="form-title mb-3">ĐĂNG NHẬP</h2>
            <form action="" id="login-form">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="">
                    <label for="email">Email*</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="password" class="form-control" id="password" placeholder="">
                    <label for="password">Password*</label>
                </div>
                <div class="forgot-password mb-3">
                    <a href="#" class="forgot-password-link">Quên mật khẩu</a>
                </div>
                <div class="row">
                    <button type="submit" class="btn col-12 btn-success text-white">Đăng nhập</button>
                </div>
            </form>
        </div>
    </main>