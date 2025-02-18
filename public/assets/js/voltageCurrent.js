window.onload = function () {



    function getActivePowerProfile(activePowerProfileDataId, activePowerProfileChart) {
        let chart = null;
        setTimeout(function () {
            chart = new CanvasJS.Chart(activePowerProfileDataId, activePowerProfileChart);
            chart.render();


            function toogleDataSeries(e) {
                if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }, 800);
    }

    $('.nav-link').on('click', function () {
        let activePowerProfileDataId = $(this).data('id');

        $.ajax({
            url: '/getActivePowerProfile',
            type: 'GET',
            data: {
                sensor_id: $(this).data('key')
            },
            success: function (data) {

                let activePowerProfile = [];

                data.forEach(item => {
                    let existingSensor = activePowerProfile.find(sensor => sensor.name === item.description);
                    if (existingSensor) {
                        existingSensor.dataPoints.push({ label: item.datetime_created, y: item.real_power });
                    } else {
                        activePowerProfile.push({
                            type: "line",
                            name: `${item.description}`,
                            showInLegend: true,
                            markerSize: 0,
                            dataPoints: [{ label: item.datetime_created, y: item.real_power }]
                        });
                    }
                });

                console.log(activePowerProfile);

                let activePowerProfileChart = {
                    animationEnabled: true,
                    theme: "light2",
                    zoomEnabled: true,
                    title: {
                        text: data[0].description,
                    },
                    axisX: {
                        labelAngle: -90,
                        margin: 30,
                        labelFontSize: 12,
                        interval: 1,
                        // intervalType: "month",
                    },
                    // axisX: {
                    //     valueFormatString: "MMM YYYY"
                    // },
                    // axisY2: {
                    //     title: "Median List Price",
                    //     prefix: "$",
                    //     suffix: "K"
                    // },
                    toolTip: {
                        shared: true
                    },
                    legend: {
                        cursor: "pointer",
                        verticalAlign: "top",
                        horizontalAlign: "center",
                        dockInsidePlotArea: true,
                        // itemclick: toogleDataSeries
                    },
                    data: activePowerProfile
                };

                getActivePowerProfile(activePowerProfileDataId, activePowerProfileChart)
            }
        });



    });
}