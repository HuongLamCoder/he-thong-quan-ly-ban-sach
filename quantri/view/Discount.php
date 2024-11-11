    <main class="container pt-5">
        <!-- Page title -->
        <div class="row">
            <h1 class="page-title">QUẢN LÝ MÃ GIẢM GIÁ</h1>
        </div>
        <!-- ... -->
        <!-- Page control -->
        <div class="row d-flex justify-content-between">
            <div class="col-auto">
                <button class="btn btn-control open_add_form" 
                        type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#discountModal"
                >
                    <i class="fa-regular fa-plus me-2"></i>
                    Thêm mã giảm giá
                </button>
            </div>
            <div class="col">
                <div class="input-group">
                    <input type="text" 
                            class="form-control" 
                            placeholder="Nhập id, phần trăm giảm giá" 
                            aria-label="Tìm kiếm mã giảm giá" 
                            aria-describedby="search-bar"
                    >
                    <button class="btn btn-outline-custom" type="button" id="search-btn">Tìm</button>
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
                            <th scope="col">Mã mã giảm giá</th>
                            <th>Phần trăm giảm</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>10</td>
                            <td>12/10/2024</td>
                            <td>13/10/2024</td>
                            <td>
                                <span class="bagde rounded-2 text-white bg-success p-2">Hoạt động</span>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>15</td>
                            <td>25/10/2024</td>
                            <td>26/10/2024</td>
                            <td>
                                <span class="bagde rounded-2 text-white bg-danger p-2">Bị hủy</span>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>20</td>
                            <td>11/10/2024</td>
                            <td>12/10/2024</td>
                            <td>
                                <span class="bagde rounded-2 text-white bg-secondary p-2">Hết hạn</span>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>25</td>
                            <td>12/12/2024</td>
                            <td>13/12/2024</td>
                            <td>
                                <span class="bagde rounded-2 text-white bg-primary p-2">Chưa diễn ra</span>
                            </td>
                            <td>
                                <button class="btn fs-5 open_edit_form"
                                        data-bs-toggle="modal"
                                        data-bs-target="#discountModal"
                                >
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <button class="btn fs-5">
                                    <i class="fa-regular fa-trash"></i>
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
    <!-- ... -->

    <!-- Modal -->
    <div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-success" id="discountModalLabel">Thêm mã giảm giá</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="discountForm">
                    <input type="hidden" name="discount_id" id="discount_id">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="discount-percent" class="col-form-label col-sm-4">Phần trăm giảm</label>
                            <div class="col">
                                <input type="number" min="1" max="100" name="discount-percent" class="form-control" id="discount-percent">
                                <span class="text-message discount-percent-msg"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="discount-date-start" class="col-form-label col-sm-4">Ngày bắt đầu</label>
                            <div class="col">
                                <input type="date" name="discount-date-start" class="form-control" id="discount-date-start">
                                <span class="text-message discount-date-start-msg"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="discount-date-end" class="col-form-label col-sm-4">Ngày kết thúc</label>
                            <div class="col">
                                <input type="date" name="discount-date-end" class="form-control" id="discount-date-end">
                                <span class="text-message discount-date-end-msg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="" id="submit_btn">
                        <button type="submit" id="saveModalBtn" class="btn btn-success">Thêm mã giảm giá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ... -->

    <!-- Link JS ở chỗ này nè!!! -->
    <script src="./asset/js/Discount.js"></script>
</body>
</html>