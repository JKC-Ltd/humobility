<x-app-layout>
    <x-slot name="pageTitle">
        Create Gateways
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
                                        <label>Location</label>
                                        <select class="form-control select2bs4" style="width: 100%;">
                                            <option selected="selected">Alabama</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="customerCode">Customer Code</label>
                                        <input type="text" class="form-control" id="customerCode"
                                            placeholder="Customer Code">
                                    </div>
                                    <div class="form-group">
                                        <label for="gateway">Gateway</label>
                                        <input type="text" class="form-control" id="gateway" placeholder="Gateway">
                                    </div>
                                    <div class="form-group">
                                        <label for="gatewayCode">Gateway Code</label>
                                        <input type="text" class="form-control" id="gatewayCode"
                                            placeholder="Gateway Code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description"
                                            placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ url()->previous() }}"><button type="submit"
                                class="btn btn-danger">Cancel</button></a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="importedScripts">
        <script>
            $(function() {
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
            })
        </script>
    </x-slot>
</x-app-layout>
