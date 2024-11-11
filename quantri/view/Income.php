    <!-- Content -->
    <main class="container pt-5">
        <!-- Page title -->
        <div class="row">
            <h1 class="page-title">THỐNG KÊ DOANH THU</h1>
        </div>
        <!-- ... -->
        <!-- Page control -->
        <form action="" class="form-controller mb-4">
            <input type="hidden" name="report" value="doanhthu">
            <div class="row mb-3">
                <div class="col-auto">
                    <div class="row">
                        <label for="time" class="col-form-label col-auto">Xem báo cáo theo: </label>
                        <div class="col-auto">
                            <select class="form-select" name="time" id="time">
                                <option value="thang">Tháng</option>
                                <option value="nam">Năm</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row">
                        <label for="time" class="col-form-label col-auto">Chọn thời gian: </label>
                        <div class="col-auto">
                            <select class="form-select" name="time" id="time">
                                <option value="2024-1">Tháng 1/2024</option>
                                <option value="2024-2">Tháng 2/2024</option>
                                <option value="2024-3">Tháng 3/2024</option>
                                <option value="2024-4">Tháng 4/2024</option>
                                <option value="2024-5">Tháng 5/2024</option>
                                <option value="2024-6">Tháng 6/2024</option>
                                <option value="2024-7">Tháng 7/2024</option>
                                <option value="2024-8">Tháng 8/2024</option>
                                <option value="2024-9">Tháng 9/2024</option>
                                <option value="2024-10">Tháng 10/2024</option>
                                <option value="2024-11">Tháng 11/2024</option>
                                <option value="2024-12">Tháng 12/2024</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">
                        <i class="fa-regular fa-eye"></i>
                        Xem báo cáo
                    </button>
                </div>
            </div>
        </form>
        <!-- ... -->

        <!-- Table -->
        <div id="tk-container">
            <table class="table table-bordered border-dark tk-table text-center">
                <tr class="table-title bg-success text-white">
                    <th>Tuần thứ</th>
                    <th>Từ ngày</th>
                    <th>Đến ngày</th>
                    <th>
                        Số đơn hàng
                        <br>
                        <span class="fst-italic">(đơn)</span>
                    </th>
                    <th>
                        Số sản phẩm đã bán
                        <br>
                        <span class="fst-italic">(cuốn)</span>
                    </th>
                    <th>Doanh thu</th>
                </tr>
                <tr class="table-data">
                    <td>1</td>
                    <td>01-01-2024</td>
                    <td>07-01-2024</td>
                    <td>10</td>
                    <td>10</td>
                    <td>3.000.000 VNĐ</td>
                </tr>
                <tr class="table-data">
                    <td>2</td>
                    <td>08-01-2024</td>
                    <td>14-01-2024</td>
                    <td>10</td>
                    <td>10</td>
                    <td>3.000.000 VNĐ</td>
                </tr>
                <tr class="table-data">
                    <td>3</td>
                    <td>15-01-2024</td>
                    <td>21-01-2024</td>
                    <td>10</td>
                    <td>10</td>
                    <td>3.000.000 VNĐ</td>
                </tr>
                <tr class="table-data">
                    <td>4</td>
                    <td>22-01-2024</td>
                    <td>28-01-2024</td>
                    <td>10</td>
                    <td>10</td>
                    <td>3.000.000 VNĐ</td>
                </tr>
                <tr class="table-data">
                    <td>5</td>
                    <td>29-01-2024</td>
                    <td>31-01-2024</td>
                    <td>10</td>
                    <td>10</td>
                    <td>3.000.000 VNĐ</td>
                </tr>
                <tr class="table-data sum-row">
                    <td colspan="3" class="bg-success text-white fw-bold">TỔNG</td>
                    <td>50</td>
                    <td>50</td>
                    <td>15.000.000 VNĐ</td>
                </tr>
            </table>
            <p class="numberInWords mb-5 text-end fst-italic">
                <span class="numberInWords-title fw-bold">Viết bằng chữ: </span>
                <span class="numberInWords-content">Mười lăm triệu đồng</span>
            </p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success tk-button" id="in-tk">
                    <i class="fa-regular fa-print me-2"></i>
                    In thống kê
                </button>
            </div>
        </div>
    </main>
    <!-- ... -->
</body>
</html>