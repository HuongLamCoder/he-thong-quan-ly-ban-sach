<main class="container pt-5">
    <!-- Page title -->
    <div class="row">
        <h1 class="page-title">QUẢN LÝ PHIẾU NHẬP SÁCH</h1>
    </div>
    <!-- ... -->
    <!-- Page control -->
    <div class="row d-flex justify-content-between">
        <div class="col">
            <div class="row flex-nowrap">
                <div class="col-auto">
                    <button class="btn btn-control open_add_form"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#grnCreateModal">
                        <i class="fa-regular fa-plus me-2"></i>
                        Thêm phiếu nhập
                    </button>
                </div>
                <div class="col-auto">
                    <div class="input-group">
                        <input type="text"
                            class="form-control"
                            placeholder="Nhập id, tên nhà cung cấp"
                            aria-label="Tìm kiếm phiếu nhập"
                            aria-describedby="search-bar">
                        <button class="btn btn-outline-custom" type="button" id="search-btn">Tìm</button>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="input-group">
                        <select id="status-select" class="form-select">
                            <option selected>Tất cả trạng thái</option>
                            <option value="1">Chưa hoàn thành</option>
                            <option value="2">Hoàn thành</option>
                            <option value="3">Bị hủy</option>
                        </select>
                    </div>
                </div>
                <div class="col-auto d-flex align-items-center flex-nowrap gap-1">
                    <label for="date-start">Từ ngày</label>
                    <input type="date" style="width: 150px;" name="date_start" id="date-start" class="form-control">
                    <label for="date-end">đến ngày</label>
                    <input type="date" style="width: 150px;" name="date_end" id="date-end" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-auto">
            <button onclick="location.reload()" type="button" class="btn btn-control">Làm mới</button>
        </div>
    </div>
    <!-- ... -->
    <!-- Table data -->
    <div class="row mt-5">
        <div class="col">
            <table class="table table-bordered text-center table-hover align-middle border-success">
                <thead class="table-header">
                    <tr>
                        <th scope="col">Mã phiếu nhập</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        echo '<input type="hidden" name="curr_page" class="curr_page" value="'.$paging->curr_page.'">';
                        for($i=$paging->start; $i<$paging->start+$paging->num_per_page && $i<$paging->total_records; $i++){
                            $grn = $result[$i];
                    ?>
                    <tr>
                        <td><?=$grn->getIdPN()?></td>
                        <td><?=$grn->getNgaytao()?></td>
                        <td><?=$grn->getNgayCapNhat()?></td>
                        <td><?=number_format($grn->getTongtien(),0,"",".");?>đ</td>
                        <td>
                            <?php
                                $trangthai = $grn->getTrangthai();
                                if($trangthai = 'cht')
                                    echo 
                                '<span class="bagde rounded-2 text-white bg-secondary p-2">Chưa hoàn thành</span>';
                                else if($trangthai = 'ht')
                                    
                            ?>
                            
                        </td>
                        <td>
                            <button class="btn fs-5 open_view_form"
                                data-bs-toggle="modal"
                                data-bs-target="#grnModal"
                                title="Xem chi tiết">
                                <i class="fa-regular fa-circle-info"></i>
                            </button>
                            <button class="btn fs-5 open_edit_form"
                                data-bs-toggle="modal"
                                data-bs-target="#grnModal"
                                title="Chỉnh sửa">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button class="btn fs-5 print_btn"
                                title="In">
                                <i class="fa-regular fa-print"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- ... -->
    <!-- Pagination -->
    <div class="row mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Trước</a>
                </li>
                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link text-dark" href="#">Sau</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- ... -->
</main>

<!-- Modal: Tạo phiếu nhập -->
<div class="modal fade"
    id="grnCreateModal"
    tabindex="-1"
    aria-labelledby="grnCreateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-success" id="grnCreateModalLabel">Tạo phiếu nhập</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="grnCreateForm">
                <div class="modal-body">
                    <div class="row mb-3 align-items-center">
                        <label for="grn-supplier-name" class="col-form-label col-sm-4 fw-bold">Tên nhà cung cấp</label>
                        <div class="col">
                            <select name="supplier_name" id="supplier-name" class="form-select">
                                <option value="" selected>Chọn nhà cung cấp</option>
                                <option value="1">Nhã Nam</option>
                                <option value="2">Cổ Nguyệt Books</option>
                                <option value="3">IPM</option>
                            </select>
                            <span class="text-message grn-supplier-name-msg"></span>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="grn-discount" class="col-form-label col-sm-4 fw-bold">Chiết khấu (%)</label>
                        <div class="col">
                            <input type="number"
                                name="grn-discount"
                                class="form-control"
                                id="grn-discount"
                                min="0"
                                max="100"
                                placeholder="Nhập phần trăm chiết khấu">
                            <span class="text-message grn-discount-msg"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="" id="submit_btn">
                    <button type="button"
                        class="btn btn-success"
                        id="saveCreateModalBtn"
                        data-bs-toggle="modal"
                        data-bs-target="#grnModal">
                        Tạo phiếu nhập
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ... -->

<!-- Modal: Thêm phiếu nhập -->
<div class="modal fade"
    tabindex="-1"
    id="grnModal"
    aria-labelledby="grnModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-success text-uppercase" id="grnModalLabel">Phiếu nhập sách</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="grnForm">
                    <div class="modal-grn-info d-flex flex-column gap-1">
                        <div class="grn-info d-flex gap-2">
                            <span class="grn-info-title">
                                Mã phiếu nhập:
                            </span>
                            <span class="grn-info-content">
                                1
                            </span>
                        </div>
                        <div class="grn-info-group d-flex">
                            <div class="grn-info-group-item d-flex flex-column gap-1 w-50">
                                <div class="grn-info d-flex gap-2 w-100 align-items-center">
                                    <span class="grn-info-title">
                                        Trạng thái:
                                    </span>
                                    <span class="grn-info-content not-edit">
                                        Chưa hoàn thành
                                    </span>
                                    <div class="edit not-view">
                                        <select name="status" id="status" class="form-select grn-status-select">
                                            <option value="1">Chưa hoàn thành</option>
                                            <option value="2">Hoàn thành</option>
                                            <option value="3">Hủy phiếu nhập</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grn-info d-flex gap-2">
                                    <span class="grn-info-title">
                                        Nhà cung cấp:
                                    </span>
                                    <span class="grn-info-content">
                                        Công ty TNHH 8 thành viên
                                    </span>
                                </div>
                                <div class="grn-info d-flex gap-2">
                                    <span class="grn-info-title">
                                        Nhân viên:
                                    </span>
                                    <span class="grn-info-content">
                                        95 - Tùng Sơn MTV
                                    </span>
                                </div>
                            </div>
                            <div class="grn-info-group-item d-flex flex-column gap-1 w-50">
                                <div class="grn-info d-flex gap-2">
                                    <span class="grn-info-title">
                                        Ngày tạo phiếu:
                                    </span>
                                    <span class="grn-info-content">
                                        01/01/2024
                                    </span>
                                </div>
                                <div class="grn-info d-flex gap-2">
                                    <span class="grn-info-title">
                                        Ngày cập nhật
                                    </span>
                                    <span class="grn-info-content">
                                        01/01/2024
                                    </span>
                                </div>
                                <div class="grn-info d-flex gap-2">
                                    <span class="grn-info-title">
                                        Chiết khấu:
                                    </span>
                                    <span class="grn-info-content">
                                        50%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="grn-info d-flex gap-2 text-danger fw-bold">
                            <span class="grn-info-title">
                                Tổng tiền:
                            </span>
                            <span class="grn-info-content">
                                8.000.000 đ
                            </span>
                        </div>
                    </div>
                    <div class="modal-grn-controls my-3">
                        <!-- Bỏ row-count thì sửa lại vị trí của nút add-row-btn sang sát lề phải -->
                        <p class="row-count">
                            Đang có <span class="fw-bold">1</span> sản phẩm trong phiếu nhập.
                        </p>
                        <button type="button" id="add-row-btn" class="btn btn-success grn-controls add-row not-view">
                            <i class="fa-regular fa-file-plus"></i>
                            Thêm dòng
                        </button>
                    </div>
                    <div class="modal-table-conent">
                        <table class="table table-bordered text-center table-hover align-middle border-success">
                            <thead class="table-header">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sách</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Đơn giá bìa</th>
                                    <th>Thành tiền</th>
                                    <th class="not-view">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="grn-row-template">
                                    <td>1</td>
                                    <td>
                                        <select name="grn_product[]" class="form-select not-view">
                                            <option selected>Chọn tựa sách</option>
                                            <option value="1">Hahaha</option>
                                        </select>
                                        <span class="view"></span>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control grn-quantity not-view" name="grn_quantity[]" min="1">
                                        <span class="view"></span>
                                    </td>
                                    <td>
                                        <!-- Dùng JS tính giá nhập (dựa vào giá bìa & chiết khấu) -->
                                        105.000 đ
                                    </td>
                                    <td>
                                        <!-- Dùng AJAX hiển thị giá bìa -->
                                        105.000 đ
                                    </td>
                                    <td>
                                        <!-- Dùng JS tính thành tiền -->
                                        105.000 đ
                                    </td>
                                    <td class="not-view">
                                        <button type="button" class="btn delete-row" title="Xóa hàng">
                                            <i class="fa-regular fa-delete-left"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <select name="grn_product[]" class="form-select not-view">
                                            <option selected>Chọn tựa sách</option>
                                            <option value="1">Hahaha</option>
                                        </select>
                                        <span class="view">Đón ánh mặt trời</span>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control grn-quantity not-view" name="grn_quantity[]" min="1">
                                        <span class="view">12</span>
                                    </td>
                                    <td>
                                        <!-- Dùng JS tính giá nhập (dựa vào giá bìa & chiết khấu) -->
                                        105.000 đ
                                    </td>
                                    <td>
                                        <!-- Dùng AJAX hiển thị giá bìa -->
                                        105.000 đ
                                    </td>
                                    <td>
                                        <!-- Dùng JS tính thành tiền -->
                                        105.000 đ
                                    </td>
                                    <td class="not-view">
                                        <button type="button" class="btn delete-row" title="Xóa hàng">
                                            <i class="fa-regular fa-delete-left"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer not-view">
                <input type="hidden" name="" id="submit_btn">
                <button type="submit" class="btn btn-success" id="saveModalBtn">Thêm phiếu nhập</button>
            </div>
        </div>
    </div>
</div>
<!-- ... -->

<!-- Link JS -->
<script src="../asset/quantri/js/GoodsReceiveNote.js"></script>