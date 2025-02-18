window.onload = function () {
    let sensorEnergyConsumption = [];
    let sensorEnergyConsumptionPerMeter = [{
        type: "column", //change type to bar, line, area, pie, etc
        //indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        indexLabelFontSize: 16,
        indexLabelPlacement: "outside",
        dataPoints: []
    }];


    getEnergyConsumptionAjax();

    function getEnergyConsumptionAjax() {
        $.ajax({
            url: '/getEnergyConsumption',
            type: 'GET',
            success: function (data) {
                let totalEnergyConsumption = 0;

                // Get unique dates from the data
                let uniqueDates = [...new Set(data.map(item => item.date_created))];

                uniqueDates.shift();
                const lastDateElement = uniqueDates.pop();

                data.forEach(item => {
                    totalEnergyConsumption += item.energy_difference;
                    let existingSensor = sensorEnergyConsumption.find(sensor => sensor.name === item.description);
                    if (!existingSensor) {
                        sensorEnergyConsumption.push({
                            type: "column",
                            name: item.description,
                            showInLegend: true,
                            dataPoints: uniqueDates.map(date => {
                                let dataItem = data.find(d => d.date_created === date && d.description === item.description);
                                const newDate = new Date(date);
                                const formattedDate = newDate.toLocaleDateString("en-US", {
                                    year: "numeric",
                                    month: "long",
                                    day: "numeric",
                                });
                                return { label: formattedDate + ' 9AM', y: dataItem ? dataItem.energy_difference : null };
                            })
                        });
                    }
                });

                data.forEach(item => {
                    let existingSensor = sensorEnergyConsumptionPerMeter[0].dataPoints.find(sensor => sensor.label === item.description);
                    if (!existingSensor) {
                        let dataItem = data.find(d => d.date_created === lastDateElement && d.description === item.description);
                        if (dataItem) {
                            sensorEnergyConsumptionPerMeter[0].dataPoints.push(
                                { label: item.description, y: dataItem.energy_difference }
                            );
                        }
                    }
                });

                console.log(sensorEnergyConsumptionPerMeter);

                $('#totalEneryConsumption').text(totalEnergyConsumption.toFixed(0));
                energyConsumptionAllMeters('dailyEnergyConsumptionAllMeters');
                energyConsumptionPerMeter();
            }
        });
    }

    function energyConsumptionAllMeters(consumptionType) {
        var chart = new CanvasJS.Chart(consumptionType, {
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