<x-app-layout>
    <x-slot name="importedLinks">
        @include('includes.datatables-links')
    </x-slot>
    <x-slot name="pageTitle">
        Locations
    </x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="left w-50">
                            <h3 class="card-title">Location List</h3>
                        </div>
                        <div class="right w-50 text-right">
                            <a href="/locations/create">
                                <button class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> &nbsp;Create New Location</button>   
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="defaultTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Location Code</th>
                                    <th>Location Name</th>
                                    <th>Last Update</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet Explorer 4.0</td>
                                    <td>Win 95+</td>
                                    <td>Win 95+</td>
                                    <td><div class="btn-group">
                                        <a href="">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye"></i> View
                                            </button>
                                        </a>
                                        <button class="btn btn-default btn-sm">
                                            <i class="fa fa-pen"></i> Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </div></td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td>Win 95+</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye"></i> View
                                                </button>
                                            </a>
                                            <button class="btn btn-default btn-sm">
                                                <i class="fa fa-pen"></i> Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Location Code</th>
                                    <th>Location Name</th>
                                    <th>Last Update</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="importedScripts">
        @include('includes.datatables-scripts')
        <script src="{{ asset('assets/js/datatables.js') }}"></script>
    </x-slot>
</x-app-layout>
