<script>
var chart;
function showGraph() {
    var selectedType = document.getElementById("selectType").value;
    var from_date = document.getElementById("from_date").value;
    var to_date = document.getElementById("to_date").value;
    
    // Gửi yêu cầu AJAX để lấy dữ liệu với khoảng ngày đã chọn
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            updateChart(data[0], data[1]);
        }
    };
    
    var url = "pages/xulydoanhthu.php?type=" + encodeURIComponent(selectedType);

    if (from_date && to_date) {
        url += "&from_date=" + encodeURIComponent(from_date) + "&to_date=" + encodeURIComponent(to_date);
    }

    xhttp.open("GET", url, true);
    xhttp.send();
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
</script>

<form id="dateForm" onsubmit="showGraph(); return false;" action="javascript:void(0);">
    <select id="selectType" name="selectType">
        <option value="thongketong">Thống kê tổng</option>
        <option value="thongketheophim">Thống kê theo phim</option>
    </select>
    Từ ngày: <input type="date" id="from_date" name="from_date">
    Đến ngày: <input type="date" id="to_date" name="to_date">
    <button type="submit">Xem biểu đồ</button>
</form>
<br>
<div id="scroll-stype" style="height:60vh; width: 100%; overflow-x:auto; margin:0px; padding:0px;">
    <div id="chartContainer" ></div>
</div>