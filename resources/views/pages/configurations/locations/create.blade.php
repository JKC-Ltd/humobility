<x-app-layout>
    <x-slot name="pageTitle">
        {{ isset($location) ? 'Edit Location' : 'Create Location' }}
    </x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ isset($location) ? route('locations.update', $location->id) : route('locations.store') }}">
                    @csrf
                    @if(isset($location))
                        @method('PUT')
                    @endif
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="locationCode">Location Code</label>
                                        <input type="text" class="form-control" id="locationCode"
                                            name="location_code" value="{{ isset($location) ? $location->location_code : '' }}" placeholder="Location Code" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="locationName">Location Name</label>
                                        <input type="text" class="form-control" id="locationName"
                                            name="location_name" value="{{ isset($location) ? $location->location_name : '' }}" placeholder="Location Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ url()->previous() }}"><button type="button"
                                    class="btn btn-danger">Cancel</button></a>
                            <button type="submit" class="btn btn-primary">{{ isset($location) ? 'Update' : 'Create' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
