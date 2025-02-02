<x-app-layout>
    <x-slot name="pageTitle">
        {{ isset($sensor_model) ? 'Edit Sensor Model' : 'Create Sensor Model' }}
    </x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <form method="POST"
                    action="{{ isset($sensor_model) ? route('sensorModels.update', $sensor_model->id) : route('sensorModels.store') }}">
                    @csrf
                    @if (isset($sensor_model))
                        @method('PUT')
                    @endif
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sensorModel">Sensor Model</label>
                                        <input type="text" class="form-control" id="sensorModel"
                                            name="sensor_model"
                                            value="{{ isset($sensor_model) ? $sensor_model->sensor_model : '' }}"
                                            placeholder="Sensor Model" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="sensorBrand">Sensor Brand</label>
                                        <input type="text" class="form-control" id="sensorBrand"
                                            name="sensor_brand"
                                            value="{{ isset($sensor_model) ? $sensor_model->sensor_brand : '' }}"
                                            placeholder="Sensor Brand" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url()->previous() }}"><button type="button"
                                    class="btn btn-danger">Cancel</button></a>
                            <button type="submit"
                                class="btn btn-primary">{{ isset($sensor_model) ? 'Update' : 'Create' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
