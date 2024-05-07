<script>
$(document).ready(function(){
    var chart;

    showDefaultGraph();

    function showDefaultGraph() {
        $.ajax({
            url: "pages/xulydoanhthu.php?type=thongketong",
            type: "GET",
            dataType: "json",
            success: function(data) {
                updateChart(data[0], data[1]);
            }
        });
    }

    function showGraph() {
        var selectedType = $("#selectType").val();
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();

        var url = "pages/xulydoanhthu.php?type=" + encodeURIComponent(selectedType);

        if (from_date && to_date) {
            url += "&from_date=" + encodeURIComponent(from_date) + "&to_date=" + encodeURIComponent(to_date);
        }

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function(data) {
                updateChart(data[0], data[1]);
            }
        });
    }

    function updateChart(data1, data2) {
        if (chart) {
            chart.destroy(); 
        }
        chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Thống kê"
            },
            dataPointWidth: 25,
            dataSpacing: 5,
            axisY: {
                includeZero: true,
                title: "Số lượng"
            },
            axisY2: {
                title: "Doanh thu (đ)",
                prefix: "đ"
            },
            legend: {
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            creditText: "", 
            data: [{
                type: "column",
                name: "Số vé",
                yValueFormatString: "#0.##",
                showInLegend: true,
                dataPoints: data1,
            }, {
                type: "column",
                name: "Doanh thu",
                yValueFormatString: "#0.##đ",
                axisYType: "secondary",
                showInLegend: true,
                dataPoints: data2,
            }]
        });
        chart.render();

        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart.render();
        }
    }

    $("#dateForm").submit(function() {
        showGraph();
        return false;
    });
});
</script>

<form id="dateForm">
    <select id="selectType" name="selectType">
        <option value="thongketong">Thống kê tổng</option>
        <option value="thongketheophim">Thống kê theo phim</option>
        <option value="theloai">Thể loại</option>
        <option value="vebanchay">Phim bán chạy</option>
    </select>
    Từ ngày: <input type="date" id="from_date" name="from_date">
    Đến ngày: <input type="date" id="to_date" name="to_date">
    <button type="submit">Xem biểu đồ</button>
</form>
<br>
<div id="scroll-stype" style="height:60vh; width: 100%; overflow-x:auto; margin:0px; padding:0px;">
    <div id="chartContainer" ></div>
</div>
</html>
