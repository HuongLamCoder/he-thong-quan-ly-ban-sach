    <!-- Content -->
    <main class="container pt-5">
        <!-- Page title -->
        <div class="row">
            <h1 class="page-title">THỐNG KÊ DOANH THU</h1>
        </div>
        <!-- ... -->
        <!-- Page control -->
        <form class="form-controller mb-4">
            <input type="hidden" id="type-of-report" value="income">
            <div class="row mb-3">
                <div class="col-auto">
                    <div class="row">
                        <label for="time" class="col-form-label col-auto">Xem báo cáo theo: </label>
                        <div class="col-auto">
                            <select class="form-select" name="time" id="time">
                                <option value="month">Tháng</option>
                                <option value="year">Năm</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row">
                        <label for="select-time" class="col-form-label col-auto">Chọn thời gian: </label>
                        <div class="col-auto" id="select-time">
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- ... -->

        <!-- Table -->
        <div id="tk-container">
            <!-- Rendered by javascript -->
        </div>
    </main>
    <!-- ... -->

    <!-- Link JS -->
    <script src="../asset/quantri/js/Report.js"></script>
</body>
</html>