<?php 
    include_once "inc/header.php";
?>
    <main class="search-book">
        <!-- Tìm kiếm sản phẩm -->
        <div class="container">
            <div class="searching-book-content">
                <!-- bộ lọc -->
                <div class="filter">
                    <div class="category-filter">
                        <div class="dropdown">
                            <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-thin fa-bars"></i>
                            </button>
                            <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="?page=search&category=bestseller">Sách bán chạy</a>
                                    </li>
                                <?php
                                    foreach($category as $item){
                                ?>
                                    <li>
                                        <a class="dropdown-item" href="?page=search&category=<?=$item['tenTL']?>&idTL=<?=$item['idTL']?>"><?=$item['tenTL']?></a>
                                    </li>
                                <?php
                                    }
                                ?>
                            </ul>
                          </div>
                    </div>
                    <div class="price-filter">
                        <h6>Khoảng giá:</h6>
                        <form>
                            <input type="text" name="" id="">
                            <span><i class="fa-thin fa-minus"></i></span>
                            <input type="text" name="" id="">
                            <button>Tìm kiếm</button>
                        </form>
                    </div>
                </div>
                <div class="searching-book-box b-shadow">
                    <!-- kết quả tìm kiếm -->
                    <div class="searching-result-text">
                        KẾT QUẢ TÌM KIẾM: 
                        <span class="searching-text text-primary"> 
                            <span class="searching-keyword">kinh tế</span>
                        </span>
                    </div>
                    <!-- sắp xếp -->
                    <div class="sort">
                        <div class="price-sort">
                            <h6>Giá</h6>
                            <form action="">
                                <button><i class="fa-solid fa-up"></i></button>
                                <button><i class="fa-solid fa-down"></i></button>
                            </form>
                        </div>
                        <div class="sales-sort">
                            <h6>Lượt bán</h6>
                            <form action="">
                                <button><i class="fa-solid fa-up"></i></button>
                                <button><i class="fa-solid fa-down"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- danh sách sách sau khi tìm kiếm -->
                    <div class="searching-result-books">
                        <div class="book-list">
                            <ul>
                        <?php 
                            //chia mang result thanh tung trang
                            $num_per_page = 2; //total records each page
                            $curr_page = getPage();
                            $start = ($curr_page-1)*$num_per_page; //start divide for this page
                            $total_records = count($result);
                            echo '<input type="hidden" name="curr_page" class="curr_page" value="'.$curr_page.'">';

                            $keys = array_keys($result);
                            for($i=$start; $i<$start+$num_per_page && $i<$total_records; $i++){
                                extract($result[$keys[$i]]);
                        ?>
                                <li class="book-card">
                                    <a href="" class="nav-link">
                                        <div class="image-book">
                                            <img src="asset/img/<?=$hinhanh?>" alt="">
                                        </div>
                                        <div class="info-book">
                                            <span class="title"><?=$tuasach?></span>
                                            <span class="units-sold-text"><span class="units-sold"><?=$luotban?></span> lượt bán</span>
                                            <span class="price-text"> <span class="price"><?=number_format($giaban,0,"",".")?></span> đ</span> 
                                        </div>
                                    </a>
                                </li>
                        <?php
                            }
                        ?> 
                            </ul>
                        </div>
                    </div>
                    <!-- phân trang -->
                    <div class="pagination">
                        <div class="pagination-content">
                        <?php           
                            $total_pages = ceil($total_records/$num_per_page);

                            if($curr_page>1)
                                echo '<a href="?page=search'.$pageTitle.'&index='.($curr_page-1).'"><i class="fa-regular fa-chevron-left"></i></a>';
                            else echo '<a href="?page=search'.$pageTitle.'&index=1"><i class="fa-regular fa-chevron-left"></i></a>';

                            for($i=1; $i<=$total_pages; $i++){
                                if($curr_page==$i)
                                    echo '<a href="?page=search'.$pageTitle.'&index='.$i.'" class="active">'.$i.'</a>';
                                else echo '<a href="?page=search'.$pageTitle.'&index='.$i.'">'.$i.'</a>';
                            }

                            if($curr_page<$total_pages)
                                echo '<a href="?page=search'.$pageTitle.'&index='.($curr_page+1).'"><i class="fa-regular fa-chevron-right"></i></a>';
                            else echo '<a href="?page=search'.$pageTitle.'&index='.$total_pages.'"><i class="fa-regular fa-chevron-right"></i></a>';
                        ?>
                            <!-- <a class="nav-link" href="#"><i class="fa-regular fa-chevron-left"></i></a>
                            <a class="nav-link" href="#">1</a>
                            <a class="nav-link active" href="#">2</a>
                            <a class="nav-link" href="#">3</a>
                            <a class="nav-link" href="#">4</a>
                            <a class="nav-link" href="#">5</a>
                            <a class="nav-link" href="#">6</a>
                            <a class="nav-link" href="#"><i class="fa-regular fa-chevron-right"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include_once "inc/footer.php"
    ?>
