<x-app-layout>
    <x-slot name="pageTitle">
        {{ isset($sensorModel) ? 'Edit Sensor Model' : 'Create Sensor Model' }}
    </x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <form method="POST"
                    action="{{ isset($sensorModel) ? route('sensorModels.update', $sensorModel->id) : route('sensorModels.store') }}">
                    @csrf
                    @if (isset($sensorModel))
                        @method('PUT')
                    @endif
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sensorModel">Sensor Model</label>
                                        <input type="text" class="form-control" id="sensorModel" name="sensor_model"
                                            value="{{ isset($sensorModel) ? $sensorModel->sensor_model : old('sensor_model') }}"
                                            placeholder="Sensor Model" required>
                                        @error('sensor_model')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sensorBrand">Sensor Brand</label>
                                        <input type="text" class="form-control" id="sensorBrand" name="sensor_brand"
                                            value="{{ isset($sensorModel) ? $sensorModel->sensor_brand : old('sensor_brand') }}"
                                            placeholder="Sensor Brand" required>
                                        @error('sensor_brand')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('sensorModels.index') }}"><button type="button"
                                    class="btn btn-danger">Cancel</button></a>
                            <button type="submit"
                                class="btn btn-primary">{{ isset($sensorModel) ? 'Update' : 'Create' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
