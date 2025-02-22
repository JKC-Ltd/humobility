$("#sensor_type").on("change", function () {
    var sensorTypeId = $(this).val();
    
    if (sensorTypeId) {
        $.ajax({
            url: "/getSensorType/" + sensorTypeId,
            method: "GET",
            success: function (response) {
                var sensorTypeParameter = response.sensor_type_parameter;
                var parameters = sensorTypeParameter.split(",");

                var htmlContent = "";

                parameters.forEach(function (parameter) {
                    htmlContent += '<div class="form-group">';
                    htmlContent +=
                        '<label for="' +
                        parameter +
                        '">' +
                        parameter.replace(/_/g, " ").toUpperCase() +
                        "</label>";
                    htmlContent +=
                        '<input type="text" id="' +
                        parameter +
                        '" class="form-control" />';
                    htmlContent += "</div>";
                });

                $("#sensor-reg-address").html(htmlContent);

                $("#btnSubmit").click(function () {
                    var values = [];

                    parameters.forEach(function (parameter) {
                        var inputVal = $("#" + parameter).val();
                        values.push(inputVal);
                    });

                    var sensorRegAddress = values.join(",");

                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        url: "/sensorModels/store",
                        type: "POST",
                        data: {
                            data: {sensor_reg_address: sensorRegAddress},
                        },
                        success: function (response) {
                            console.log("Data saved successfully!");
                        },
                        error: function () {
                            console.log("Error saving data.");
                        },
                    });
                });
            },
            error: function () {
                alert("Error fetching sensor data.");
            },
        });
    }
});
