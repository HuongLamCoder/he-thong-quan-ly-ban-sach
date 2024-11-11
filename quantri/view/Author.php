    <main class="container pt-5">
        <!-- Page title -->
        <div class="row">
            <h1 class="page-title">QUẢN LÝ TÁC GIẢ</h1>
        </div>
        <!-- ... -->
        <!-- Page control -->
        <div class="row d-flex justify-content-between">
            <div class="col-auto">
                <button class="btn btn-control open_add_form" 
                        type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#authorModal"
                >
                    <i class="fa-regular fa-plus me-2"></i>
                    Thêm tác giả
                </button>
            </div>
            <div class="col">
                <div class="input-group">
                    <input type="text" 
                            class="form-control" 
                            placeholder="Nhập id, tên tác giả" 
                            aria-label="Tìm kiếm tác giả" 
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
                            <th scope="col">Mã tác giả</th>
                            <th>Tên tác giả</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $author){
                                extract($author);
                        ?>
                        <tr>
                            <td class="author_id"><?=$idTG?></td>
                            <td class ="author_name"><?=$tenTG?></td>
                            <td>
                                <?php
                                    if($trangthai)
                                        echo '<span class="bagde rounded-2 text-white bg-success p-2">Hoạt động</span>';
                                    else
                                        echo '<span class="bagde rounded-2 text-white bg-secondary p-2">Bị khóa</span>'
                                ?>
                            </td>
                            <td>
                                <button class="btn open-edit-modal fs-5 open_edit_form"
                                        data-bs-toggle="modal"
                                        data-bs-target="#authorModal"
                                >
                                    <i class="fa-regular fa-pen-to-square"></i>
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
    </div>
    <!-- ... -->

    <!-- Modal -->
    <div class="modal fade" id="authorModal" tabindex="-1" aria-labelledby="authorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-success" id="authorModalLabel">Thêm tác giả</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="authorForm">
                    <input type="hidden" name="author_id" id="author_id" value="">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="author_name" class="col-form-label col-sm-3">Tên tác giả</label>
                            <div class="col-sm-9">
                                <input type="text" name="author_name" class="form-control" id="author_name">
                                <span class="text-message author-name-msg"></span>
                            </div>
                        </div>
                        <div class="row align-items-center edit">
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
                        <button type="submit" id="saveModalBtn" class="btn btn-success">Thêm tác giả</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ... -->

    <!-- Link JS ở chỗ này nè!!! -->
    <script src="./asset/js/Author.js"></script>
</body>
</html>