    <!-- Content -->
    <main class="container pt-5">
        <!-- Page title -->
        <div class="row">
            <h1 class="page-title">QUẢN LÝ NHÀ CUNG CẤP</h1>
        </div>
        <!-- ... -->
        <!-- Page control -->
        <div class="row d-flex justify-content-between">
            <div class="col-auto">
                <button class="btn btn-control open_add_form" 
                        type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#supplierModal"
                >
                    <i class="fa-regular fa-plus me-2"></i>
                    Thêm nhà cung cấp
                </button>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <input type="text" 
                                    class="form-control" 
                                    placeholder="Nhập id, tên nhà cung cấp" 
                                    aria-label="Tìm kiếm nhà cung cấp" 
                                    aria-describedby="search-bar"
                            >
                            <button class="btn btn-outline-custom" type="button" id="search-btn">Tìm</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <select id="status-select" class="form-select">
                                <option selected>Tất cả trạng thái</option>
                                <option value="0">Bị khóa</option>
                                <option value="1">Đang hoạt động</option>
                            </select> 
                        </div>
                    </div>
                    <div class="col-auto align-items-center">
                        <span class="me-2">Tên nhà cung cấp</span>
                        <button class="btn btn-control">
                            <i class="fa-regular fa-arrow-down-a-z"></i>
                        </button>
                        <button class="btn btn-control">
                            <i class="fa-regular fa-arrow-up-z-a"></i>
                        </button>
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
                            <th scope="col">Mã nhà cung cấp</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nhã Nam</td>
                            <td>nhanam.book@gmail.com</td>
                            <td>0123456789</td>
                            <td>
                                <span class="bagde rounded-2 text-white bg-success p-2">Hoạt động</span>
                            </td>
                            <td>
                                <button class="btn fs-5 open_view_form" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#supplierModal"
                                >
                                    <i class="fa-regular fa-circle-info"></i>
                                </button>
                                <button class="btn fs-5 open_edit_form"
                                        data-bs-toggle="modal"
                                        data-bs-target="#supplierModal"
                                >
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Văn học</td>
                            <td>vanhoc.book@gmail.com</td>
                            <td>0123456789</td>
                            <td>
                                <span class="bagde rounded-2 text-white bg-secondary p-2">Bị khóa</span>
                            </td>
                            <td>
                                <button class="btn fs-5 open_view_form" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#supplierModal"
                                >
                                    <i class="fa-regular fa-circle-info"></i>
                                </button>
                                <button class="btn fs-5 open_edit_form"
                                        data-bs-toggle="modal"
                                        data-bs-target="#supplierModal"
                                >
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Tuổi trẻ</td>
                            <td>tuoitre.book@gmail.com</td>
                            <td>0123456789</td>
                            <td>
                                <span class="bagde rounded-2 text-white bg-success p-2">Hoạt động</span>
                            </td>
                            <td>
                                <button class="btn fs-5 open_view_form" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#supplierModal"
                                >
                                    <i class="fa-regular fa-circle-info"></i>
                                </button>
                                <button class="btn fs-5 open_edit_form"
                                        data-bs-toggle="modal"
                                        data-bs-target="#supplierModal"
                                >
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Cổ Nguyệt</td>
                            <td>conguyetbooks@gmail.com</td>
                            <td>0123456789</td>
                            <td>
                                <span class="bagde rounded-2 text-white bg-secondary p-2">Bị khóa</span>
                            </td>
                            <td>
                                <button class="btn fs-5 open_view_form" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#supplierModal"
                                >
                                    <i class="fa-regular fa-circle-info"></i>
                                </button>
                                <button class="btn fs-5 open_edit_form"
                                        data-bs-toggle="modal"
                                        data-bs-target="#supplierModal"
                                >
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>IPM</td>
                            <td>ipm.book@gmail.com</td>
                            <td>0123456789</td>
                            <td>
                                <span class="bagde rounded-2 text-white bg-success p-2">Hoạt động</span>
                            </td>
                            <td>
                                <button class="btn fs-5 open_view_form" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#supplierModal"
                                >
                                    <i class="fa-regular fa-circle-info"></i>
                                </button>
                                <button class="btn fs-5 open_edit_form"
                                        data-bs-toggle="modal"
                                        data-bs-target="#supplierModal"
                                >
                                    <i class="fa-regular fa-pen-to-square"></i>
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
    </ma>
    <!-- ... -->

    <!-- Modal -->
    <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-success" id="supplierModalLabel">Thêm nhà cung cấp</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="supplierForm">
                    <input type="hidden" name="supplier_id" id="supplier_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="supplier-name" class="form-label">Tên nhà cung cấp</label>
                            <input type="text" name="supplier-name" id="supplier-name" class="form-control" placeholder="Nhập tên nhà cung cấp">
                            <span class="text-message supplier-name-msg"></span>
                        </div>
                        <div class="mb-3">
                            <label for="supplier-email" class="form-label">Email</label>
                            <input type="email" name="supplier-email" id="supplier-email" class="form-control" placeholder="Nhập địa chỉ email">
                            <span class="text-message supplier-email-msg"></span>
                        </div>
                        <div class="mb-3">
                            <label for="supplier-phone" class="form-label">Số điện thoại</label>
                            <input type="tel" name="supplier-phone" id="supplier-phone" class="form-control" placeholder="Nhập số điện thoại">
                            <span class="text-message supplier-phone-msg"></span>
                        </div>
                        <div class="mb-3">
                            <label for="supplier-address" class="form-label">Địa chỉ</label>
                            <input type="text" name="supplier-address" id="supplier-address" class="form-control" placeholder="Nhập số nhà, tên đường">
                            <span class="text-message supplier-address-msg"></span>
                        </div>
                        <div class="row mb-3 not-view">
                            <div class="col-md-4">
                                <label for="supplier-city" class="form-label">Tỉnh/thành</label>
                                <select name="supplier-city" id="supplier-city" class="form-select">
                                    <option selected>Chọn tỉnh/thành</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="2">Hồ Chí Minh</option>
                                    <option value="3">Đà Nẵng</option>
                                    <option value="4">Hải Phòng</option>
                                    <option value="5">Cần Thơ</option>
                                </select>
                                <span class="text-message supplier-province-msg"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="supplier-district" class="form-label">Quận/huyện</label>
                                <select name="supplier-district" id="supplier-district" class="form-select">
                                    <option selected>Chọn quận/huyện</option>
                                    <option value="1">Ba Đình</option>
                                    <option value="2">Hoàn Kiếm</option>
                                    <option value="3">Hai Bà Trưng</option>
                                    <option value="4">Đống Đa</option>
                                    <option value="5">Cầu Giấy</option>
                                </select>
                                <span class="text-message supplier-district-msg"></span>
                            </div>
                            <div class="col-md-4">
                                <label for="supplier-ward" class="form-label">Phường/xã</label>
                                <select name="supplier-ward" id="supplier-ward" class="form-select">
                                    <option selected>Chọn phường/xã</option>
                                    <option value="1">Phường 1</option>
                                    <option value="2">Phường 2</option>
                                    <option value="3">Phường 3</option>
                                    <option value="4">Phường 4</option>
                                    <option value="5">Phường 5</option>
                                </select>
                                <span class="text-message supplier-ward-msg"></span>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center edit">
                            <label class="col-form-label col-sm-3">Trạng thái</label>
                            <div class="col form-check form-switch ps-5">
                                <input  type="checkbox" 
                                        name="status" 
                                        id="status" 
                                        class="form-check-input" 
                                        role="switch" 
                                        checked
                                        onchange="document.getElementById('switch-label').textContent = this.checked ? 'Đang hoạt động' : 'Bị khóa';"
                                >
                                <label for="status" class="form-check-label" id="switch-label">Đang hoạt động</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="" id="submit_btn">
                        <button type="submit" class="btn btn-success" id="saveModalBtn">Thêm nhà cung cấp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ... -->

    <!-- Link JS ở chỗ này nè!!! -->
    <script src="./asset/js/Supplier.js"></script>
</body>
</html>