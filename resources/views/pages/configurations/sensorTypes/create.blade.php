<x-app-layout>
    <x-slot name="pageTitle">
        {{ isset($sensorType) ? 'Edit Sensor Type' : 'Create Sensor Type' }}
    </x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <form method="POST"
                    action="{{ isset($sensorType) ? route('sensorTypes.update', $sensorType->id) : route('sensorTypes.store') }}">
                    @csrf
                    @if (isset($sensorType))
                        @method('PUT')
                    @endif
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description">{{ isset($sensorType) ? $sensorType->description : '' }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="sensorTypeCode">Sensory Type Code</label>
                                        <input type="text" class="form-control" id="sensorTypeCode"
                                            name="sensor_type_code"
                                            value="{{ isset($sensorType) ? $sensorType->sensor_type_code : '' }}"
                                            placeholder="Sensor Type Code" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="sensorTypeParameter">Sensor Type Parameter</label>
                                        <input type="text" class="form-control" id="sensorTypeParameter"
                                            name="sensor_type_parameter"
                                            value="{{ isset($sensorType) ? $sensorType->sensor_type_parameter : '' }}"
                                            placeholder="Sensor Type Parameter" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url()->previous() }}"><button type="button"
                                    class="btn btn-danger">Cancel</button></a>
                            <button type="submit"
                                class="btn btn-primary">{{ isset($sensorType) ? 'Update' : 'Submit' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
