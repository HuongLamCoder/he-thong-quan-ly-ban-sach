    <main class="homepage">
        <div class="container">
            <div class="row homepage-content">
                <!-- Cột bên trái gồm: danh mục sách, best seller -->
                <div class="col-3">
                    <!-- Danh mục sách -->
                    <div class="category">
                        <div class="category-box">
                            <ul>
                                <p>Danh mục</p>
                                <?php
                                    foreach($categories as $item){
                                        extract($item);
                                ?>
                                    <li>
                                        <a href="?page=search&category=<?=$tenTL?>&idTL=<?=$idTL?>" class="nav-link"><?=$tenTL?></a>
                                    </li>
                                <?php  
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Danh sách sách best seller -->
                    <div class="best-seller">
                        <div class="best-seller-box">
                            <ul>
                                <p>Best Seller</p>
                                <?php
                                    if($bestSellers!=null){
                                    foreach($bestSellers as $item){
                                        extract($item);
                                ?>
                                    <li>
                                        <a href="?page=productDetail&idSach=<?=$idSach?>" class="nav-link book-card">
                                            <div class="image-book">
                                                <img src="asset/client/img/<?=$hinhanh?>" alt="">
                                            </div>
                                            <div class="info-book">
                                                <span class="book-title">
                                                    <?=$tuasach?>
                                                </span>
                                                <span class="units-sold-text"><span class="units-sold"><?=$luotban?></span> lượt bán</span>
                                                <span class="price-text"> <span class="price"><?=number_format($giaban,0,"",".")?></span> đ</span> 
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                    }
                                ?>
                            </ul>
                            <div class="see-more">
                                <a href="?page=search&category=bestseller" class="nav-link">Xem thêm</a>
                            </div>
                            <?php
                                } else echo '<li>Không có sản phẩm</li>';
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Cột bên phải gồm: banner, hiển thị sách theo danh mục -->
                <div class="col-9">
                    <!-- banner -->
                    <div class="banner b-shadow">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                    $i = 1;
                                    foreach($bestSellers as $item){
                                        extract($item);
                                        if(strlen($mota) > 450) $mota = substr($mota, 0, 450) . '...';
                                        if($i++ == 1 ){
                                ?>
                                    <div class="carousel-item active">
                                <?php
                                        }
                                        else{
                                ?>
                                    <div class="carousel-item">   
                                <?php
                                        }
                                ?>
                                        <div class="banner-content">
                                            <div class="image-book">
                                                <img src="asset/client/img/<?=$hinhanh?>" class="d-block" alt="...">
                                            </div>
                                            <div class="info-book">
                                                <div class="title">
                                                    <h4><?=$tuasach?></h4>
                                                </div>
                                                <div class="description">
                                                    <p><?=$mota?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    
                                    }
                                ?>
                              
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <?php                  
                    foreach($categories as $item){
                        extract($item);
                    ?>
                    <div class="category-book">
                        <div class="title">
                            <h3>
                                <?=$tenTL?>
                            </h3>
                        </div>
                        <div class="category-book-box b-shadow">
                            <div class="category-book-content">
                    <?php
                        $books = getBooksByCategory($idTL);
                        if($books!=null){ 
                        foreach($books as $book){
                            extract($book);
                    ?>
                                <div class="book-card">
                                    <a href="" class="nav-link">
                                        <div class="image-book">
                                            <img src="asset/client/img/<?=$hinhanh?>" alt="">
                                        </div>
                                        <div class="info-book">
                                            <div class="title">
                                                <h6><?=$tuasach?></h6>
                                            </div>
                                            <div class="units-sold-text"><span class="units-sold"><?=$luotban?></span> lượt bán</div>
                                            <div class="price-text"> <span class="price"><?=number_format($giaban,0,"",".");?></span> đ</div> 
                                        </div>
                                    </a>
                                </div>
                    <?php
                        }
                    ?>
                            </div>
                            <div class="see-more">
                                <a href="?page=search&category=<?=$tenTL?>&idTL=<?=$idTL?>" class="btn nav-link">Xem thêm</a>
                            </div>
                            <?php
                                } else echo '<div>Không có sản phẩm</div>';
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
