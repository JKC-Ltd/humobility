window.onload = function () {


    getEnergyConsumption('dailyEnergyConsumption');
    getEnergyConsumption('monthlyEnergyConsumption');

    function getEnergyConsumption($consumptionType) {
        // Daily Energy Consumption
        var chart = new CanvasJS.Chart($consumptionType, {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Daily Energy Consumption - SIIX EMS: All Meters",
                fontSize: 20,
                margin: 30
            },
            axisY: {
                title: "Energy (kWh)",
                titlePadding: {
                    top: 1,
                    bottom: 15,
                },
                titleFontSize: 15,
                // includeZero: true
                labelFontSize: 12
            },
            axisX: {
                labelAngle: -90,
                margin: 30,
                labelFontSize: 12,
                interval: 1,
                intervalType: "month",
            },
            legend: {
                cursor: "pointer",
                horizontalAlign: "center",
                itemclick: toggleDataSeries,
                fontSize: 15
            },
            // rangeSelector: {
            //     height: 100,
            //     buttons: {
            //         label: "1Month",
            //         range: 1,
            //         rangeType: "month"
            //     },
            // },
            data: [{
                type: "column",
                name: "Test1",
                // indexLabel: "{y}",
                // yValueFormatString: "$#0.##",
                showInLegend: true,
                dataPoints: dataPoints1
            }, {
                type: "column",
                name: "test2",
                // indexLabel: "{y}",
                // yValueFormatString: "$#0.##",
                showInLegend: true,
                dataPoints: dataPoints2
            }, {
                type: "column",
                name: "test3",
                // indexLabel: "{y}",
                // yValueFormatString: "$#0.##",
                showInLegend: true,
                dataPoints: dataPoints3
            }, {
                type: "column",
                name: "test4",
                // indexLabel: "{y}",
                // yValueFormatString: "$#0.##",
                showInLegend: true,
                dataPoints: dataPoints4
            }, {
                type: "column",
                name: "test5",
                // indexLabel: "{y}",
                // yValueFormatString: "$#0.##",
                showInLegend: true,
                dataPoints: dataPoints5
            }, {
                type: "column",
                name: "test6",
                // indexLabel: "{y}",
                // yValueFormatString: "$#0.##",
                showInLegend: true,
                dataPoints: dataPoints6
            }, {
                type: "column",
                name: "test7",
                // indexLabel: "{y}",
                // yValueFormatString: "$#0.##",
                showInLegend: true,
                dataPoints: dataPoints7
            }, {
                type: "column",
                name: "test8",
                // indexLabel: "{y}",
                // yValueFormatString: "$#0.##",
                showInLegend: true,
                dataPoints: dataPoints8
            }, {
                type: "column",
                name: "test9",
                // indexLabel: "{y}",
                // yValueFormatString: "$#0.##",
                showInLegend: true,
                dataPoints: dataPoints9
            }]
        });
        chart.render();
    }


    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }
}