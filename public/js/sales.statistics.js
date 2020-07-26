function Genconfig(type = "line", options = {}, data = [], labels = []) {
	return {
		type: type,
		data: {
			labels: labels,
			datasets: data,
		},
		options: options,
	};
}

var line_chart = document.getElementById("average_daily").getContext("2d");
var pie_chart = document.getElementById("cake_popularity").getContext("2d");
var pie_chart_income = document.getElementById("cake_income").getContext("2d");

///SET_COLORS
window.backgroundColor = [
	"rgba(255, 99, 132, 0.2)",
	"rgba(54, 162, 235, 0.2)",
	"rgba(255, 206, 86, 0.2)",

	"rgba(255, 87, 51, 0.2)",
	"rgba(51, 255, 172, 0.2)",
	"rgba(51, 150, 255, 0.2)",
	"rgba(246, 138, 49, 0.2 )",
	"rgba(46, 49, 108, 0.2)",
];

window.borderColor = [
	"rgba(255, 99, 132, 1)",
	"rgba(54, 162, 235, 1)",
	"rgba(255, 206, 86, 1)",

	"rgba(255, 87, 51,  1)",
	"rgba(51, 255, 172, 1)",
	"rgba(51, 150, 255, 1)",
	"rgba(246, 138, 49, 1 )",
	"rgba(46, 49, 108,  1)",
];

let avg_date = [];
let avg_total = [];

document.addEventListener("DOMContentLoaded", async () => {
	await setConfigLine();
	await setConfigPie();
	await setConfigPieIncome();
});

setOptionsLine = () => {
	let options = {
		responsive: true,
		title: {
			display: true,
			text: "Average daily",
		},
		tooltips: {
			mode: "index",
			intersect: false,
		},
		hover: {
			mode: "nearest",
			intersect: true,
		},
		scales: {
			x: {
				display: true,
				scaleLabel: {
					display: true,
					labelString: "Date",
				},
			},
			y: {
				display: true,
				scaleLabel: {
					display: true,
					labelString: "Price",
				},
			},
		},
	};

	return options;
};

setConfigLine = async () => {
	let response = await fetch("/sales/average", {
		headers: {
			"Content-Type": "application/json",
		},
	});

	let responseJSON = await response.json();

	avg_date = responseJSON.avg_date;
	avg_total = responseJSON.avg_total;

	let labels = [];
	let data_avg_date = [];
	let data_avg_total = [];

	avg_date.map((value) => {
		data_avg_date.push(value.Average_income_date);
		data_avg_total.push(avg_total[0].Average_income_total);
		labels.push(value.created_at);
	});

	let dataset = [
		{
			label: "Average daily sales ($)",
			data: data_avg_date,
			backgroundColor: window.backgroundColor.slice(1, 2),
			borderColor: window.borderColor.slice(1, 2),
			borderWidth: 2.5,
		},
		{
			label: "Average historical ($)",
			data: data_avg_total,
			backgroundColor: window.backgroundColor.slice(2, 3),
			borderColor: window.borderColor.slice(2, 3),
			borderWidth: 2.5,
		},
	];

	let LineChart_Config = Genconfig("line", setOptionsLine(), dataset, labels);
	window.Line = new Chart(line_chart, LineChart_Config);
};

setConfigPie = async () => {
	let response = await fetch("/sales/selling", {
		headers: {
			"Content-Type": "application/json",
		},
	});

	let responseJSON = await response.json();
	let best_selling = responseJSON.best_selling;

	let best_selling_labels = [];
	let best_selling_data = [];

	best_selling.map((value) => {
		best_selling_labels.push(value.name_type);
		best_selling_data.push(value.total_units);
	});

	let dataset = [
		{
			label: "best selling products (quantity)",
			data: best_selling_data,
			backgroundColor: window.backgroundColor.slice(0, best_selling.length),
			borderColor: window.borderColor.slice(0, best_selling.length),
		},
	];

	let PieChart_Config = Genconfig(
		"pie",
		setOptionsPie(),
		dataset,
		best_selling_labels
	);
	window.PieChart = new Chart(pie_chart, PieChart_Config);

	/*let PieChart = new Config(
		"pie",
		setOptionsPie(),
		dataset,
		best_selling_labels
	);
	window.PieChart = new Chart(pie_chart, PieChart.get());*/
};

setOptionsPie = () => {
	let options = {
		responsive: true,
		title: {
			display: true,
			text: "best selling products (quantity)",
		},
	};

	return options;
};

setConfigPieIncome = async () => {
	let response = await fetch("/sales/selling_income", {
		headers: {
			"Content-Type": "application/json",
		},
	});

	let responseJSON = await response.json();
	let best_selling_income = responseJSON.best_selling_income;

	let best_selling_labels = [];
	let best_selling_data = [];

	best_selling_income.map((value) => {
		best_selling_labels.push(`($) ${value.name_type}`);
		best_selling_data.push(value.total);
	});

	let dataset = [
		{
			label: "best selling products (Income)",
			data: best_selling_data,
			backgroundColor: window.backgroundColor.slice(
				0,
				best_selling_income.length
			),
			borderColor: window.borderColor.slice(0, best_selling_income.length),
		},
	];

	let PieChartIncome = Genconfig(
		"pie",
		setOptionsPieIncome(),
		dataset,
		best_selling_labels
	);
	window.PieChartIncome = new Chart(pie_chart_income, PieChartIncome);

	/*let PieChartIncome = new Config(
		"pie",
		setOptionsPieIncome(),
		dataset,
		best_selling_labels
	);
	window.PieChartIncome = new Chart(pie_chart_income, PieChartIncome.get());*/
};

setOptionsPieIncome = () => {
	let options = {
		responsive: true,
		title: {
			display: true,
			text: "Best selling (Income)",
		},
	};

	return options;
};
