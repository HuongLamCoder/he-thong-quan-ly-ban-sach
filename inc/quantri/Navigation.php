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
                <img src="../asset/quantri/img/vinabook-logo.png" alt="Vinabook" style="width: 250px;">
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
                    <?php
                        $NQ = false;
                        $TK = false;
                        $TG = false;
                        $DM = false;
                        $NCC = false;
                        $MGG = false;
                        $SP = false;
                        $DH = false;
                        $GRN = false;
                        $DT = false;
                        $NK = false;
                        $LN = false;
                        foreach($_SESSION['permission'] as $item){
                            $nhomquyen = explode('_', $item['tenCN'])[0];
                            switch($nhomquyen){
                                case 'NQ': 
                                if(!$NQ){
                                    $NQ = true;
                                echo '
                                    <li class="nav-item sidebar-item permission nhomquyen">
                                        <a href="index.php?page=role" class="nav-link text-black fs-5 align-items-center">
                                            <i class="fa-regular fa-crown me-3"></i>
                                            Quản lý nhóm quyền
                                        </a>
                                    </li>
                                ';
                                }    
                                break;
                                case 'TK':
                                if(!$TK){
                                    $TK = true;
                                    echo '
                                    <li class="nav-item sidebar-item">
                                        <a href="index.php?page=account" class="nav-link text-black fs-5 align-items-center">
                                            <i class="fa-regular fa-user me-3"></i>
                                            Quản lý tài khoản
                                        </a>
                                    </li>
                                    ';
                                }
                                break;
                                case 'TG':
                                if(!$TK){
                                    $TK = true;
                                    echo '
                                <li class="nav-item sidebar-item">
                                    <a href="index.php?page=author" class="nav-link text-black fs-5 align-items-center">
                                        <i class="fa-regular fa-at me-3"></i>
                                        Quản lý tác giả
                                    </a>
                                </li>';
                                }                                    
                                break;
                                case 'DM':
                                if(!$DM){
                                    $DM = true;
                                    echo '
                                    <li class="nav-item sidebar-item">
                                        <a href="index.php?page=category" class="nav-link text-black fs-5 align-items-center">
                                       1     <i class="fa-regular fa-list me-3"></i>
                                            Quản lý danh mục
                                        </a>
                                    </li>';
                                }                                    
                                    break;
                                case 'NCC':
                                    if(!$NCC){
                                        $NCC = true;
                                        echo '
                                    <li class="nav-item sidebar-item">
                                        <a href="index.php?page=supplier" class="nav-link text-black fs-5 align-items-center">
                                            <i class="fa-regular fa-address-book me-3"></i>
                                            Quản lý nhà cung cấp
                                        </a>
                                    </li>';
                                    }                                    
                                    break;
                                case 'MGG':
                                    if(!$MGG){
                                        $MGG = true;
                                        echo '
                                    <li class="nav-item sidebar-item">
                                        <a href="index.php?page=discount" class="nav-link text-black fs-5 align-items-center">
                                            <i class="fa-regular fa-badge-percent me-3"></i>
                                            Quản lý mã giảm giá
                                        </a>
                                    </li>';
                                    }
                                    break;
                                case 'SP':
                                    if(!$SP){
                                        $SP = true;
                                        echo '
                                    <li class="nav-item sidebar-item">
                                        <a href="index.php?page=product" class="nav-link text-black fs-5 align-items-center">
                                            <i class="fa-regular fa-books me-3"></i>
                                            Quản lý sản phẩm
                                        </a>
                                    </li>';
                                    }                                    
                                    break;
                                case 'DH':
                                    if(!$DH){
                                        $DH = true;
                                        echo '
                                    <li class="nav-item sidebar-item">
                                        <a href="index.php?page=order" class="nav-link text-black fs-5 align-items-center">
                                            <i class="fa-regular fa-boxes-stacked me-3"></i>
                                            Quản lý đơn hàng
                                        </a>
                                    </li>';
                                    }                                    
                                    break;
                                case 'GRN':
                                    if(!$GRN){
                                        $GRN = true;
                                        echo '
                                    <li class="nav-item sidebar-item">
                                        <a href="index.php?page=grn" class="nav-link text-black fs-5 align-items-center">
                                            <i class="fa-regular fa-boxes-packing me-3"></i>
                                            Quản lý phiếu nhập
                                        </a>
                                    </li>';
                                    }                                    
                                    break;
                                case 'DT':
                                    $DT = true;
                                    break;
                                case 'NK':
                                    $NK = true;
                                    break;
                                case 'LN':
                                    $LN = true;
                                    break;
                            }
                        }

                        if($DT || $NK || $LN){
                            echo'
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
                            ';
                            if($DT)
                                echo
                            '<li class="dropdown-item">
                                <a href="index.php?page=income" class="nav-link text-black fs-5 align-items-center">
                                    <i class="fa-regular fa-chart-pie-simple me-3"></i>
                                    Thống kê doanh thu
                                </a>
                            </li>';
                            if($NK)
                                echo
                            '<li class="dropdown-item">
                                <a href="index.php?page=cost" class="nav-link text-black fs-5 align-items-center">
                                    <i class="fa-regular fa-file-chart-pie me-3"></i>
                                    Thống kê nhập kho
                                </a>
                            </li>';
                            if($LN)
                                echo 
                            '<li class="dropdown-item">
                                <a href="index.php?page=profit" class="nav-link text-black fs-5 align-items-center">
                                    <i class="fa-regular fa-chart-pie-simple-circle-dollar me-3"></i>
                                    Thống kê lợi nhuận
                                </a>
                            </li>';
                            echo
                            '</ul>
                            </li>';
                        }

                        echo 
                        ' </ul>
                            </div>
                        </div>';
                    ?>
        <div class="nav justify-content-end d-flex align-items-center">
            <div class="nav-item me-3">
                <a href="#" class="nav-link text-dark">
                    <span class="account-name">
                        <i class="fa-regular fa-user-crown me-2 fs-4"></i>
                        <?php
                            $lastWord = strrchr($_SESSION['user']['tenTK'], ' ');
                            if ($lastWord !== false) $lastWord = trim($lastWord); 
                            else $lastWord = $string; 
                            echo $lastWord;
                        ?>
                    </span>
                </a>
            </div>
            <div class="nav-item">
                <div class="btn btn-outline-custom">Đăng xuất</div>
            </div>
        </div>
    </div>
    <!-- .... -->