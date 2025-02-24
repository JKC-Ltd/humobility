$(document).ready(function () {
    var sensorModelId = $("#sensor-reg-address").data("sensor-model");
    if (sensorModelId) {
        var sensorTypeId = "";
        loadSensorModel(sensorModelId, sensorTypeId);
        $("#sensor_type").on("change", function () {
            sensorTypeId = $(this).val();
            if (sensorTypeId) {
                loadSensorModel(sensorModelId, sensorTypeId);
            } 
        });
    } 
    
});

// $("#sensor_type").on("change", function () {
//     var sensorTypeId = $(this).val();
//     var sensorRegAddress
//     var test = loadSensorModel(sensorModelId);
//     console.log(test);
//     var sensorRegAddressValue = sensorRegAddress || [];

//     if (sensorTypeId) {

//         loadSensorParameters(sensorTypeId, sensorRegAddressValue);
//     } 
// });

function loadSensorModel(sensorModelId, sensorTypeId){
    $.ajax({
        url: "/getSensorModel/" + sensorModelId,
        method: "GET",
        success: function (response) {
            console.log(sensorTypeId);
            var sensorRegAddress = response.sensor_model.sensor_reg_address;
            var sensorTypeId = sensorTypeId || response.sensor_type.id;    
            loadSensorParameters(sensorTypeId, sensorRegAddress);
        },
        error: function () {
            alert("Error fetching sensor data.");
        },
    });
}
// $("#sensor_type").on("change", function () {
//     var sensorTypeId = $(this).val();
//     var sensorRegAddressValue = $('input[name="sensor_reg_address[]"]').val();
//     if (sensorTypeId) {
//         // loadSensorParameters(sensorTypeId, existingSensorRegAddresses);
        
//         loadSensorParameters(sensorTypeId, sensorRegAddressValue);
//     }
// });

function loadSensorParameters(sensorTypeId, sensorRegAddress) {
    $.ajax({
        url: "/getSensorType/" + sensorTypeId,
        method: "GET",
        success: function (response) {
            var parameters = response.sensor_type_parameter.split(",");
            var regAddress = (sensorRegAddress && sensorRegAddress.length > 0) ? sensorRegAddress.split(",") : [];

            var htmlContent = "";

            parameters.forEach(function (parameter, index) {
                var value = regAddress[index] || '';
                htmlContent += `
                <div class="form-group row">
                    <label for=${parameter} class="col-sm-5 col-form-label">${parameter.replace(/_/g, " ").toUpperCase()}</label>
                    <div class="col-sm-7">
                    <input type="text" id=${parameter} name="sensor_reg_address[]" class="form-control" value="${value}"/>
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
