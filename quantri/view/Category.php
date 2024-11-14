<main class="container pt-5">
        <!-- 2. -->
        <!-- Page title -->
        <div class="row">
            <h1 class="page-title">QUẢN LÝ DANH MỤC</h1>
        </div>
        <!-- ... -->
        <!-- Page control -->
        <div class="row d-flex justify-content-between">
            <div class="col-auto">
                <button class="btn btn-control open_add_form" 
                        type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#categoryModal"
                >
                    <i class="fa-regular fa-plus me-2"></i>
                    Thêm danh mục
                </button>
            </div> 
            <div class="col">
                <form action="index.php" method="GET" id="search">
                    <input type="hidden" name="page" value="searchCategory">
                    <div class="input-group">
                        <input type="text" 
                                class="form-control" 
                                placeholder="Nhập id, tên danh mục" 
                                aria-label="Tìm kiếm danh mục" 
                                aria-describedby="search-bar"
                                name="tukhoa"
                                id="search-input"
                        >
                        <button class="btn btn-outline-custom" type="submit" id="search-btn">Tìm</button>
                    </div>
                    <input type="hidden" name="action" value="tim-kiem">
                </form>
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
                            <th scope="col">Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //chia mang result thanh tung trang
                        $num_per_page = 5; //total records each page
                        $curr_page = getPage();
                        $start = ($curr_page-1)*$num_per_page; //start divide for this page
                        $total_records = count($result);
                        echo '<input type="hidden" name="curr_page" class="curr_page" value="'.$curr_page.'">';

                        $keys = array_keys($result);
                        for($i=$start; $i<$start+$num_per_page && $i<$total_records; $i++){
                            extract($result[$keys[$i]]);
                        ?>
                        <tr>
                            <td class="category_id"><?=$idTL?></td>
                            <td class ="category_name"><?=$tenTL?></td>
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
                                        data-bs-target="#categoryModal"
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
                <?php
                    $total_pages = ceil($total_records/$num_per_page);
                    echo '<li class="page-item disabled">';
                    if($curr_page>1) 
                    echo '<a class="page-link" href="index.php?page='.$pageTitle.'&index='.($curr_page-1).'">Trước</a>';
                    else 
                    echo '<a class="page-link" href="index.php?page='.$pageTitle.'&index=1">Trước</a>';
                    echo '</li>';
                    for($i=1; $i<=$total_pages; $i++){
                        echo '<li class="page-item">';
                        if($curr_page==$i)
                            echo '<a class="page-link active" href="index.php?page='.$pageTitle.'&index='.$i.'">'.$i;
                        else echo '<a class="page-link" href="index.php?page='.$pageTitle.'&index='.$i.'">'.$i;
                        echo '</a></li>';
                    }
                    echo '<li class="page-item">';
                    if($curr_page<$total_pages)
                        echo '<a class="page-link text-dark" href="index.php?page='.$pageTitle.'&index='.($curr_page+1).'">Sau</a>';
                    else echo '<a class="page-link text-dark" href="index.php?page='.$pageTitle.'&index='.$total_pages.'">Sau</a>';
                    echo '</li>';
                ?>
                </ul>
              </nav>
        </div>
        <!-- ... -->
    </main>
    <!-- ... -->
    <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-success" id="categoryModalLabel">Thêm danh mục</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="categoryForm">
                    <input type="hidden" name="category_id" id="category_id" value=" " >
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="category-name" class="col-form-label col-sm-4">Tên danh mục</label>
                            <div class="col">
                                <input type="text" name="category_name" class="form-control" id="category_name">
                                <span class="text-message category-name-msg"></span>
                            </div>
                        </div>  
                        <div class="row mb-3 align-items-center edit">  
                            <label class="col-form-label col-sm-4">Trạng thái</label>
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
                        <button type="submit" id="saveModalBtn" class="btn btn-success">Thêm danh mục</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ... -->
    <!-- Link JS ở chỗ này nè!!! -->
    <script src="./asset/js/Category.js"></script>
</body>
</html>