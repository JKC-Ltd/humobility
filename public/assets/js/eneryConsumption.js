function getRandomY() {
    return Math.floor(Math.random() * (250 - 50 + 1)) + 50;
}

const labels = [
    'December 30, 2024', 'December 31, 2024', 'January 1, 2025', 'January 2, 2025', 'January 3, 2025',
    'January 4, 2025', 'January 5, 2025', 'January 6, 2025', 'January 7, 2025', 'January 8, 2025',
    'January 9, 2025', 'January 10, 2025', 'January 11, 2025', 'January 12, 2025', 'January 13, 2025',
    'January 14, 2025', 'January 15, 2025', 'January 16, 2025', 'January 17, 2025', 'January 18, 2025',
    'January 19, 2025', 'January 20, 2025', 'January 21, 2025', 'January 22, 2025', 'January 23, 2025',
    'January 24, 2025', 'January 25, 2025', 'January 26, 2025', 'January 27, 2025', 'January 28, 2025',
    'January 29, 2025', 'January 30, 2025'
];

const dataPoints1 = labels.slice(-30).map(label => ({ label, y: getRandomY() }));
const dataPoints2 = labels.slice(-30).map(label => ({ label, y: getRandomY() }));
const dataPoints3 = labels.slice(-30).map(label => ({ label, y: getRandomY() }));
const dataPoints4 = labels.slice(-30).map(label => ({ label, y: getRandomY() }));
const dataPoints5 = labels.slice(-30).map(label => ({ label, y: getRandomY() }));
const dataPoints6 = labels.slice(-30).map(label => ({ label, y: getRandomY() }));
const dataPoints7 = labels.slice(-30).map(label => ({ label, y: getRandomY() }));
const dataPoints8 = labels.slice(-30).map(label => ({ label, y: getRandomY() }));
const dataPoints9 = labels.slice(-30).map(label => ({ label, y: getRandomY() }));

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