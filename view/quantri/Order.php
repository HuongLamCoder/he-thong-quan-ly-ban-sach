<main class="container pt-5">
    <!-- Page title -->
    <div class="row">
        <h1 class="page-title">QUẢN LÝ ĐƠN HÀNG</h1>
    </div>
    <!-- ... -->
    <!-- Page control -->
    <div class="row d-flex justify-content-between">
        <div class="col">
            <div class="row">
                <div class="col-4">
                    <div class="input-group">
                        <input type="text"
                            class="form-control"
                            placeholder="Nhập id, tên khách hàng"
                            aria-label="Tìm kiếm đơn hàng"
                            aria-describedby="search-bar">
                        <button class="btn btn-outline-custom" type="button" id="search-btn">Tìm</button>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="input-group">
                        <select id="status-select" class="form-select">
                            <option selected>Tất cả trạng thái</option>
                            <option value="1">Chờ duyệt</option>
                            <option value="2">Đang vận chuyển</option>
                            <option value="3">Hoàn thành</option>
                            <option value="4">Hủy bởi khách hàng</option>
                            <option value="5">Hủy bởi người bán</option>
                            <option value="6">Trả hàng hoàn tiền</option>
                        </select>
                    </div>
                </div>
                <div class="col-auto d-flex align-items-center flex-nowrap gap-2">
                    <label for="date-start">Từ ngày</label>
                    <input type="date" style="width: 200px;" name="date_start" id="date-start" class="form-control">
                    <label for="date-end">đến ngày</label>
                    <input type="date" style="width: 200px;" name="date_end" id="date-end" class="form-control">
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
                        <th scope="col">Mã đơn hàng</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $orders = $result['paging'];
                        echo '<input type="hidden" name="curr_page" class="curr_page" value="'.$paging->curr_page.'">';
                        for($i=$paging->start; $i<$paging->start+$paging->num_per_page && $i<$paging->total_records; $i++){
                            $order = $orders[$i];
                    ?>
                    <tr>
                        <td class="order_id"><?=$order->getIdDH()?></td>
                        <td><?=$order->getNgaytao()?></td>
                        <td><?=$order->getNgaycapnhat()?></td>
                        <td><?=number_format($order->getTongtien(),0,"",".");?>đ</td>
                        <td>
                            <?php
                                $trangthai = $order->getTenTT();
                            if($trangthai == "Chờ duyệt")
                                echo '<span class="bagde rounded-2 text-white bg-secondary p-2">Chờ duyệt</span>';
                            else if($trangthai == "Hủy bởi khách hàng")
                                echo '';
                            else if($trangthai == "Đang giao")
                                echo '<span class="bagde rounded-2 text-white bg-primary p-2">Đang giao</span>';
                            else if($trangthai == "Đã giao")
                                echo '<span class="bagde rounded-2 text-white bg-success p-2">Đã giao</span>';
                            else if($trangthai == "Hủy bởi khách hàng")
                                echo '<span class="bagde rounded-2 text-white bg-danger p-2">Hủy bởi khách hàng</span>';
                            else echo '<span class="bagde rounded-2 text-white bg-danger p-2">Hủy bởi người bán</span>';
                            ?>
                            
                        </td>
                        <td>
                            <button class="btn fs-5 open_view_form"
                                data-bs-toggle="modal"
                                data-bs-target="#orderModal"
                                title="Xem chi tiết">
                                <i class="fa-regular fa-circle-info"></i>
                            </button>
                            <?php
                                if($trangthai == "Chờ duyệt" || $trangthai == "Đang giao"){
                            ?>
                            <button class="btn fs-5 open_edit_form"
                                data-bs-toggle="modal"
                                data-bs-target="#orderModal"
                                title="Chỉnh sửa">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <?php
                                }
                            ?>
                            <button class="btn fs-5 print_btn"
                                title="In">
                                <i class="fa-regular fa-print"></i>
                            </button>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- ... -->
    <!-- Pagination -->
    <div class="row mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                <?php
                    echo $pagingButton;
                ?>
                </ul>
              </nav>
        </div>
    <!-- ... -->

</main>

<!-- MODAL -->
<div class="modal fade"
    id="orderModal"
    tabindex="-1"
    aria-labelledby="orderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-success text-uppercase" id="orderModalLabel">Chi tiết đơn hàng</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="orderForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 modal-body-left px-3" style="max-height: 450px; overflow-y:auto;">
                            <table class="table table-stripped text-center table-hover align-middle border-success">
                                <thead class="table-header">
                                    <tr>
                                        <th scope="col">Mã sách</th>
                                        <th>Tên sách</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="col-6 modal-body-right px-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Mã đơn hàng</span>
                                    <span class="detail-value text-end w-50" id="idDH"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Tên khách hàng</span>
                                    <span class="detail-value text-end w-50" id="khachhang"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Số điện thoại</span>
                                    <span class="detail-value text-end w-50" id="dienthoai"></span>
                                </li>
                                <li class="list-group-item d-flex flex-column">
                                    <span class="fw-bold">Địa chỉ giao</span>
                                    <textarea disabled class="detail-value w-100 rounded-2 mt-2 text-dark" rows="2" id="diachi"></textarea>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Ngày tạo đơn</span>
                                    <span class="detail-value text-end w-60" id="ngaytao"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Ngày cập nhật</span>
                                    <span class="detail-value text-end w-50" id="ngaycapnhat"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Phí ship</span>
                                    <span class="detail-value text-end w-50" id="phiship"></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Tổng tiền</span>
                                    <span class="detail-value text-end w-50" id="tongtien"></span>
                                </li>
                                <li class="list-group-item not-edit d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Trạng thái</span>
                                    <span class="detail-value text-end w-50" id="trangthai"></span>
                                </li>
                                <li class="list-group-item edit d-flex justify-content-between align-items-center">
                                    <label for="status-select" class="fw-bold">Trạng thái</label>
                                    <select name="status-select" id="status-select" class="border-success form-select align-content-end detail-value w-50">
                                    </select>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Nhân viên cập nhật</span>
                                    <!-- Ko có thì để trống -->
                                    <span class="detail-value text-end w-50" id="nhanvien"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer edit">
                    <input type="hidden" name="" id="submit_btn">
                    <button type="submit" class="btn btn-success" id="saveModalBtn">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ... -->
 
<!-- Link JS -->
<script src="../asset/quantri/js/Order.js"></script>