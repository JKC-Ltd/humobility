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
                    htmlContent += `
                    <div class="form-group row">
                        <label for=${parameter} class="col-sm-5 col-form-label">${parameter.replace(/_/g, " ").toUpperCase()}</label>
                        <div class="col-sm-7">
                        <input type="text" id=${parameter} name="sensor_reg_address[]" class="form-control" />
                        </div>
                    </div>
                    
                    `;
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
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: "/sensorModels/store",
                        type: "POST",
                        data: {
                            data: { sensor_reg_address: sensorRegAddress },
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

$(document).ready(function () {
    var path = window.location.pathname;

    if (path.includes("/edit")) {
        var pathParts = path.split("/");
        var index = pathParts.indexOf("sensorModels");
        var nextParameter = pathParts[index + 1];

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/getSensorModel/" + nextParameter,
            type: "GET",
            dataType: "json",
            success: function (response) {
                console.log(response);
                var countRegister = response.sensor_reg_address.split(",").length;
                var sensorTypeId = response.sensor_type_id;
                var sensor_reg_address_list = response.sensor_reg_address.replace(/'/g, '').split(',');
                console.log(response.sensor_reg_address);

                if (sensorTypeId) {
                    $.ajax({
                        url: "/getSensorType/" + sensorTypeId,
                        method: "GET",
                        success: function (response) {
                            var sensorTypeParameter =
                                response.sensor_type_parameter;
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
                                    '"value="' + sensor_reg_address_list[parameters.indexOf(parameter)] +
                                    '" class="form-control" />';
                                htmlContent += "</div>";
                            });

                            $("#sensor-reg-address").html(htmlContent);
                        },
                        error: function () {
                            alert("Error fetching sensor data.");
                        },
                    });
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
        });
    }
});
