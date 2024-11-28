$(document).ready(function () {
    const chartSelectBox = document.getElementById('chart-select');
    const ctx = document.getElementById('myChart');

    let myChart = null;
    renderLineChart();

    chartSelectBox.addEventListener('change', function (e) {
        e.preventDefault();
        const selectedValue = parseInt(chartSelectBox.value);
        if (myChart) {
            myChart.destroy();
        }
        switch (selectedValue) {
            case 1:
                renderLineChart();
                break;
            case 2:
                renderHorizontalBarChart(action = 'getTop10BestSellingBooks');
                break;
            case 3:
                renderHorizontalBarChart(action = 'getTop10LoyalCustomers');
                break;
            case 4:
                renderStackedBarChart();
                break;
            default:
                toast({
                    title: 'Thất bại',
                    message: 'Lựa chọn không hợp lệ',
                    type: 'error'
                });
                break;
        }
    });

    function renderLineChart() {
        $.ajax({
            url: '../controller/quantri/ChartController.php',
            type: 'POST',
            data: {
                action: 'getRCP'
            },
            dataType: 'json',
            success: function (result) {
                let data = {
                    labels: result.months,
                    datasets: [
                        {
                            label: 'Doanh thu',
                            data: result.revenues,
                            fill: true,
                            borderColor: 'rgb(102, 153, 255)',
                            backgroundColor: 'rgba(102, 153, 255, 0.1)',
                            tension: 0.3
                        },
                        {
                            label: 'Chi phí',
                            data: result.costs,
                            fill: true,
                            borderColor: 'rgb(253, 138, 138)',
                            backgroundColor: 'rgba(253, 138, 138, 0.1)',
                            tension: 0.3
                        },
                        {
                            label: 'Lợi nhuận',
                            data: result.profits,
                            fill: true,
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.1)',
                            tension: 0.3
                        },

                    ]
                }

                let config = {
                    type: 'line',
                    data: data,
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tháng',
                                    font: {
                                        weight: 'bold',
                                        size: 16,
                                        family: 'Lexend, sans-serif',
                                    },
                                    padding: { top: 20 }
                                },
                                ticks: {
                                    font: {
                                        family: 'Lexend',
                                        size: 14,
                                    }
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: '(đơn vị: đồng)',
                                    font: {
                                        weight: 'bold',
                                        size: 16,
                                        family: 'Lexend, sans-serif',
                                    },
                                    padding: { bottom: 20 }
                                },
                                ticks: {
                                    font: {
                                        family: 'Lexend',
                                        size: 14,
                                    },
                                    callback: function (value) {
                                        let yValue = this.getLabelForValue(value);
                                        return yValue.replaceAll(',', '.');
                                    }
                                }
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'THỐNG KÊ DOANH THU, CHI PHÍ VÀ LỢI NHUẬN NĂM ' + new Date().getFullYear(),
                                font: {
                                    weight: 'bold',
                                    size: 20,
                                    family: 'Lexend, sans-serif',
                                }
                            },
                            legend: {
                                labels: {
                                    font: {
                                        family: 'Lexend',
                                        size: 16,
                                    }
                                }
                            }
                        }
                    }
                }

                myChart = new Chart(ctx, config);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function renderHorizontalBarChart(action) {
        $.ajax({
            url: '../controller/quantri/ChartController.php',
            type: 'POST',
            data: {
                action: action
            },
            dataType: 'json',
            success: function (result) {
                let data = {
                    labels: result.yAxis,
                    datasets: [
                        {
                            label: action === "getTop10LoyalCustomers" ? 'Tổng tiền đã mua' : 'Số lượng',
                            data: result.xAxis,
                            fill: true,
                            borderColor: result.borderColors,
                            backgroundColor: result.backgroundColors,
                            borderRadius: 10
                        },

                    ]
                }
                let config = {
                    type: 'bar',
                    data: data,
                    options: {
                        indexAxis: 'y',
                        elements: {
                            bar: {
                                borderWidth: 2,
                            }
                        },
                        responsive: true,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: action === "getTop10LoyalCustomers" ? 'Tổng tiền (đồng)' : 'Số lượng (quyển)',
                                    font: {
                                        weight: 'bold',
                                        size: 16,
                                        family: 'Lexend, sans-serif',
                                    },
                                    padding: { top: 20 }
                                },
                                ticks: {
                                    font: {
                                        family: 'Lexend',
                                        size: 14,
                                    },
                                    callback: function (value) {
                                        let xValue = this.getLabelForValue(value);
                                        return xValue.replaceAll(',', '.');
                                    }
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: action === "getTop10LoyalCustomers" ? 'Tên khách hàng' : 'Tên sách',
                                    font: {
                                        weight: 'bold',
                                        size: 16,
                                        family: 'Lexend, sans-serif',
                                    },
                                    padding: { bottom: 20 }
                                },
                                ticks: {
                                    font: {
                                        family: 'Lexend',
                                        size: 14,
                                    },
                                    minRotation: 45
                                }
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: action === "getTop10LoyalCustomers" ? 'TOP 10 KHÁCH HÀNG CHI TIÊU NHIỀU NHẤT' : 'TOP 10 SÁCH BÁN CHẠY NHẤT',
                                font: {
                                    weight: 'bold',
                                    size: 20,
                                    family: 'Lexend, sans-serif',
                                }
                            },
                            legend: {
                                display: false
                            }
                        }
                    }
                }

                myChart = new Chart(ctx, config);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function renderStackedBarChart() {
        $.ajax({
            url: '../controller/quantri/ChartController.php',
            type: 'POST',
            data: {
                action: 'getBookQuantityByCategory'
            },
            dataType: 'json',
            success: function (result) {
                console.log(result);
                let datasetArr = [];
                for (let [key, value] of Object.entries(result.categories)) {
                    datasetArr.push({
                        label: key,
                        data: value,
                        borderColor: result.borderColors[key],
                        backgroundColor: result.backgroundColors[key],
                        borderWidth: 2,
                    });
                }
                let data = {
                    labels: result.months,
                    datasets: datasetArr,
                }
                let option = {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Tháng',
                                font: {
                                    weight: 'bold',
                                    size: 16,
                                    family: 'Lexend, sans-serif'
                                },
                                padding: { top: 20 }
                            },
                            stacked: true
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Số lượng (quyển)',
                                font: {
                                    weight: 'bold',
                                    size: 16,
                                    family: 'Lexend, sans-serif'
                                },
                                padding: { bottom: 20 }
                            },
                            stacked: true
                        }
                    },
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'THỐNG KÊ SỐ SÁCH BÁN ĐƯỢC THEO THỂ LOẠI TRONG NĂM ' + new Date().getFullYear(),
                            font: {
                                weight: 'bold',
                                size: 20,
                                family: 'Lexend, sans-serif'
                            }
                        },
                        legend: {
                            labels: {
                                font: {
                                    family: 'Lexend',
                                    size: 16,
                                }
                            }
                        }
                    }
                }
                let config = {
                    type: 'bar',
                    data: data,
                    options: option
                };
                myChart = new Chart(ctx, config);
            },
            error: function (error) {
                console.log(error);
            }
        })
    }
});