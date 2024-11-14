<?php 
    include_once "../inc/header.php";
?>
    <main class="personal-page">
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
                <div class="col-9">
                    <div class="info-personal-edit b-shadow">
                        <h4>Thông Tin Cá Nhân</h4>
                        <form action="">
                            <fieldset>
                                <label for="full-name">Họ và Tên</label>
                                <input placeholder="Nhập họ và tên..." type="text" name="" id="full-name">  
                            </fieldset>
                            <fieldset>
                                <label for="full-name">Email</label>
                                <input placeholder="Nhập email..." type="text" name="" id="full-name">
                            </fieldset>
                            <fieldset>
                                <label for="full-name">Số điện thoại</label>
                                <input placeholder="Nhập số điện thoại..." type="text" name="" id="full-name">
                            </fieldset>
                            <div class="save-changes">
                                <button class="btn">
                                    Lưu thay đổi
                                </button>
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
