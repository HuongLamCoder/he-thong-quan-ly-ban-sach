<?php 
    include "Header.php";
?>
    <!-- Navigation bar -->
    <div class="navbar bg-white shadow-lg p-3">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="offcanvas" 
                    data-bs-target="#sidebar"
                    aria-controls="sidebar"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="#" class="navbar-brand ms-3">
                <img src="../asset/img/vinabook-logo.png" alt="Vinabook" style="width: 250px;">
            </a>
        </div>
        <!-- Sidebar -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebar-label">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title fw-bold fs-3" id="sidebar-label">DANH MỤC QUẢN LÝ</h4>
                <button class="btn-close" data-bs-dismiss="offcanvas" aria-label="close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <li class="nav-item sidebar-item">
                        <a href="#" class="nav-link text-black fs-5 align-items-center">
                            <i class="fa-regular fa-crown me-3"></i>
                            Quản lý nhóm quyền
                        </a>
                    </li>
                    <li class="nav-item sidebar-item">
                        <a href="#" class="nav-link text-black fs-5 align-items-center">
                            <i class="fa-regular fa-user me-3"></i>
                            Quản lý tài khoản
                        </a>
                    </li>
                    <li class="nav-item sidebar-item">
                        <a href="#" class="nav-link text-black fs-5 align-items-center">
                            <i class="fa-regular fa-at me-3"></i>
                            Quản lý tác giả
                        </a>
                    </li>
                    <li class="nav-item sidebar-item">
                        <a href="#" class="nav-link text-black fs-5 align-items-center">
                            <i class="fa-regular fa-list me-3"></i>
                            Quản lý danh mục
                        </a>
                    </li>
                    <li class="nav-item sidebar-item">
                        <a href="#" class="nav-link text-black fs-5 align-items-center">
                            <i class="fa-regular fa-address-book me-3"></i>
                            Quản lý nhà cung cấp
                        </a>
                    </li>
                    <li class="nav-item sidebar-item">
                        <a href="#" class="nav-link text-black fs-5 align-items-center">
                            <i class="fa-regular fa-badge-percent me-3"></i>
                            Quản lý mã giảm giá
                        </a>
                    </li>
                    <li class="nav-item sidebar-item">
                        <a href="#" class="nav-link text-black fs-5 align-items-center">
                            <i class="fa-regular fa-books me-3"></i>
                            Quản lý sản phẩm
                        </a>
                    </li>
                    <li class="nav-item sidebar-item">
                        <a href="#" class="nav-link text-black fs-5 align-items-center">
                            <i class="fa-regular fa-boxes-stacked me-3"></i>
                            Quản lý đơn hàng
                        </a>
                    </li>
                    <li class="nav-item sidebar-item">
                        <a href="#" class="nav-link text-black fs-5 align-items-center">
                            <i class="fa-regular fa-boxes-packing me-3"></i>
                            Quản lý phiếu nhập
                        </a>
                    </li>
                    <!-- Sidebar Dropdown menu -->
                    <li class="nav-item sidebar-item dropdown">
                        <a  href="#" 
                            class="nav-link text-black fs-5 align-items-center dropdown-toggle" 
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="fa-regular fa-chart-pie"></i>
                            Thống kê
                        </a>
                        <ul class="dropdown-menu border-0 w-100">
                            <li class="dropdown-item">
                                <a href="#" class="nav-link text-black fs-5 align-items-center">
                                    <i class="fa-regular fa-chart-pie-simple me-3"></i>
                                    Thống kê doanh thu
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#" class="nav-link text-black fs-5 align-items-center">
                                    <i class="fa-regular fa-file-chart-pie me-3"></i>
                                    Thống kê nhập kho
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#" class="nav-link text-black fs-5 align-items-center">
                                    <i class="fa-regular fa-chart-pie-simple-circle-dollar me-3"></i>
                                    Thống kê lợi nhuận
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- ... -->
                </ul>
            </div>
        </div>
        <!-- ... -->
        <div class="nav justify-content-end d-flex align-items-center">
            <div class="nav-item me-3">
                <a href="#" class="nav-link text-dark">
                    <!-- <i  class="fa-solid fa-circle-user" 
                        style="color: #087b44; font-size: 40px;"
                    >
                    </i>
                    <span class="badge rounded-pill position-absolute text-white fw-semibold start-50 bottom-0 translate-middle-x" 
                        style="max-width: 80px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; background-color: #087b44;"
                    >
                        Hương
                    </span> -->
                    <span class="account-name">
                        <i class="fa-regular fa-user-crown me-2 fs-4"></i>
                        HuongLamCoder
                    </span>
                </a>
            </div>
            <div class="nav-item">
                <div class="btn btn-outline-custom">Đăng xuất</div>
            </div>
        </div>
    </div>
    <!-- .... -->