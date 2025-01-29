<x-app-layout>
    <x-slot name="pageTitle">
        Create Location
    </x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="locationCode">Location Code</label>
                                        <input type="text" class="form-control" id="locationCode" placeholder="Location Code">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="locationName">Location Name</label>
                                        <input type="text" class="form-control" id="locationName" placeholder="Location Name">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ url()->previous() }}"><button type="submit" class="btn btn-danger">Cancel</button></a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>