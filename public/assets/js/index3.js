$(function () {
	"use strict";

	// chart1
	var options = {
		series: [{
			name: 'Revenue',
			data: [4, 3, 0, 9, 2, 19, 0, 9, 12, 7, 25, 0]
		}],
		chart: {
			foreColor: '#9a9797',
			type: 'area',
			height: 380,
			zoom: {
				enabled: false
			},
			toolbar: {
				show: false
			},
			dropShadow: {
				enabled: false,
				top: 3,
				left: 14,
				blur: 4,
				opacity: 0.10,
			}
		},
		stroke: {
			width: 4,
			curve: 'smooth'
		},
		xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		},
		dataLabels: {
			enabled: false
		},
		fill: {
			type: 'gradient',
			gradient: {
				shade: 'light',
				gradientToColors: ['#C33232'],
				shadeIntensity: 1,
				type: 'vertical',
				opacityFrom: 0.8,
				opacityTo: 0.3,
				//stops: [0, 100, 100, 100]
			},
		},
		colors: ["#C33232"],
		yaxis: {
		  labels: {
			formatter: function (value) {
			  return 'ZMW ' + value;
			}
		  },
		},
		markers: {
			size: 4,
			colors: ["#C33232"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7,
			}
		},
		grid: {
		   show: true,
		   borderColor: '#ededed',
		   strokeDashArray: 4,
		}
	};
	var chart = new ApexCharts(document.querySelector("#chart1"), options);
	chart.render();


});
