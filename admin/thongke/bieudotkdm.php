<section class="box d">
<script src="https://www.gstatic.com/charts/loader.js"></script>
<div
id="myChart" style="width:100%; max-width:800px; height:500px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng'],
  <?php foreach($listtkdm as $row): ?>
    ['<?php echo $row['danhmuc'] ?>',<?php echo $row['countsp'] ?>],
    <?php endforeach ?>
  
 
]);

// Set Options
const options = {
  title:'Biểu đồ theo danh mục sản phẩm'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>
</section>