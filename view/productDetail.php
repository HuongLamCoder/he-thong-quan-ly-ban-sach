<?php 
    extract($book);
    extract($authors);
?>
    <main class="detail-book">
        <!-- Chi tiết sản phẩm -->
        <div class="container">
            <div class="detail-book-content b-shadow">
                <div class="book-title row">
                    <div class="image-book col-4">
                        <img src="asset/img/<?=$hinhanh?>" alt="">
                    </div>
                    <div class="title-book col-8">
                        <div class="title">
                            <h3><?=$tuasach?></h3>
                        </div>
                        <div class="price-text">
                            <span class="price"><?=number_format($giaban,0,"",".")?></span>đ
                        </div>
                        <div class="add-to-cart">
                            <button type="button" class="btn add-to-cart-btn" id="liveToastBtn">
                                <i class="fa-thin fa-cart-plus"></i>
                                <span>
                                    Thêm vào giỏ hàng
                                </span>
                            </button>
                            <!-- toast message -->
                            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <span><i class="fa-light fa-square-check text-success"></i></span>
                                    <strong class="me-auto">Thông báo</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                        Thêm sách vào giỏ hàng thành công!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="book-description">
                    <h5>Giới thiệu sách</h5>
                    <div class="book-description-content">
                        <p><?=$mota?></p>
                    </div>
                </div>
                <div class="book-details">
                    <h5>Thông tin chi tiết</h5>
                    <div class="book-details-content">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Thể loại</td>
                                    <td><span class="category"><?=$tenTL?></span></td>
                                </tr>
                                <tr>
                                    <td>Tác giả</td>
                                    <td><span class="author"><?=$tenTG?></span></td>
                                </tr>
                                <tr>
                                    <td>NXB</td>
                                    <td><span class="nxb"><?=$NXB?></span></td>
                                </tr>
                                <tr>
                                    <td>Năm xuất bản</td>
                                    <td><span class="nhaxb"><?=$namXB?></span></td>
                                </tr>
                                <tr>
                                    <td>Giá bìa</td>
                                    <td><span class="price"><?=number_format($giabia,0,"",".")?></span>đ</td>
                                </tr>
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include_once "inc/footer.php"
    ?>
