<link rel="stylesheet" href="<?php echo base_url('/public').'/css/sales.css'?>">

<h2>GRAPHS & CHARTS</h2>
<hr>
<div class="line_chart">
	<div class="line_chart_2">
		<h3>Average daily sales</h3>
		<canvas id="average_daily" width="200" height="200"></canvas>
	</div>

</div>
<div class="mt-3"></div>
<hr>

<div style="display: flex; flex-wrap: wrap;">
	<div class="pie_chart">
		<h3>best selling products (quantity)</h3>
		<canvas id="cake_popularity" width="200" height="200"></canvas>
	</div>
	<div class="pie_income_chart">
		<h3>best selling products (income)</h3>
		<canvas id="cake_income" width="200" height="200"></canvas>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="<?php echo base_url('/public').'/js/sales.statistics.js'?>"></script>
