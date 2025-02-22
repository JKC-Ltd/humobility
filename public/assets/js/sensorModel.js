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
            },
            error: function () {
                alert("Error fetching sensor data.");
            },
        });
    }
});
