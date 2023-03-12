(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
	
	var donutChart = function(){
		var options = {
			series: [25, 45],
			colors:['#ff7a00','#21b830'],
			chart: {
				width: 220,
				height: 220,
				type: 'donut',
				sparkline: {
					enabled: true,
				},
				
			},
			plotOptions: {
				pie: {
					customScale: 1,
					donut: {
						size: '70%'
						
					}
				}
			},
			dataLabels: {
				enabled: false
			},
			responsive: [{
				breakpoint: 1300,
				options: {
					chart: {
						width: 120,
						height: 120
					},
				}
			}],
			legend: {
				show: false
			}
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
	}
	
	var donutChart2 = function(){
		var options = {
			series: [75, 25],
			colors:['#ff7a00',  '#21b830'],
			chart: {
				width: 220,
				height: 220,
				type: 'donut',
				sparkline: {
					enabled: true,
				},
				
			},
			plotOptions: {
				pie: {
					customScale: 1,
					donut: {
						size: '70%'
						
					}
				}
			},
			dataLabels: {
				enabled: false
			},
			responsive: [{
				breakpoint: 1300,
				options: {
					chart: {
						width: 120,
						height: 120
					},
				}
			}],
			legend: {
				show: false
			}
        };
        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
	}
	
	var donutChart3 = function(){
		var options = {
			series: [25, 35, 45 , 25, 35],
			colors:['#ff7a00', '#2130b8', '#21b830', '#f7284a', '#17d1dc'],
			chart: {
				width: 220,
				height: 220,
				type: 'donut',
				sparkline: {
					enabled: true,
				},
				
			},
			plotOptions: {
				pie: {
					customScale: 1,
					donut: {
						size: '70%'
						
					}
				}
			},
			dataLabels: {
				enabled: false
			},
			responsive: [{
				breakpoint: 1300,
				options: {
					chart: {
						width: 120,
						height: 120
					},
				}
			}],
			legend: {
				show: false
			}
        };
        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();
	}
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			
			load:function(){
				
				donutChart();
				donutChart2();
				donutChart3();
				
			},
			
			resize:function(){
			}
		}
	
	}();

	jQuery(document).ready(function(){
	});
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

	jQuery(window).on('resize',function(){
		
		
	});     

})(jQuery);