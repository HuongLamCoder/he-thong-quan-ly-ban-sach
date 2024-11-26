    <main class="detail-book">
        <!-- Chi tiết sản phẩm -->
        <div class="container">
            <div class="detail-book-content b-shadow">
                <div class="book-title row">
                    <?php 
                        $book = $result['book'];
                    ?>
                    <div class="image-book col-4">
                        <img src="asset/uploads/<?=$book->getHinhanh()?>" alt="">
                    </div>
                    <div class="title-book col-8">
                        <div class="title">
                            <h3><?=$book->getTuasach()?></h3>
                        </div>
                        <div class="price-text">
                            <span class="price"><?=number_format($book->getGiaban(),0,"",".")?></span>đ
                        </div>
                        <div class="add-to-cart">
                            <button data-id="<?= $book->getIdSach() ?>" type="button" class="btn add-to-cart-btn <?= $book->getTonkho() === 0 ? 'cannot-click bg-danger border-danger' : '' ?>">
                                <i class="fa-thin fa-<?= $book->getTonkho() === 0 ? 'ban' : 'cart-plus' ?>"></i>
                                <span>
                                    <?= $book->getTonkho() === 0 ? 'Hết hàng' : 'Thêm vào giỏ hàng' ?>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="book-description">
                    <h5>Giới thiệu sách</h5>
                    <div class="book-description-content">
                        <p><?=$book->getMoTa()?></p>
                    </div>
                </div>
                <div class="book-details">
                            <?php 
                                $category = $result['category'];
                                $author = $result['author'];
                            ?>
                    <h5>Thông tin chi tiết</h5>
                    <div class="book-details-content">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Thể loại</td>
                                    <td><span class="category"><?=$category->getTenTL()?></span></td>
                                </tr>
                                <tr>
                                    <?php
                                    $authorNames = [];
                                    foreach ($author as $tg) {
                                        $authorNames[] = $tg['tenTG'];
                                    }
                                    $authorList = implode(', ', $authorNames);
                                    ?>
                                    <td>Tác giả</td>
                                    <td><span class="author"><?= htmlspecialchars($authorList) ?></span></td>
                                </tr>
                                <tr>
                                    <td>NXB</td>
                                    <td><span class="nxb"><?=$book->getNXB()?></span></td>
                                </tr>
                                <tr>
                                    <td>Năm xuất bản</td>
                                    <td><span class="nhaxb"><?=$book->getNamXB()?></span></td>
                                </tr>
                                <tr>
                                    <td>Giá bìa</td>
                                    <td><span class="price"><?=number_format($book->getGiabia(),0,"",".")?></span>đ</td>
                                </tr>
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

<script src="asset/client/js/Cart.js"></script>