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
                            <a href="{{ route('locations.create') }}">
                                <button class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i>
                                    &nbsp;Create New Location</button>
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
                                @foreach ($locations as $location)
                                    <tr>
                                        <td>{{ $location->id }}</td>
                                        <td>{{ $location->location_code }}</td>
                                        <td>{{ $location->location_name }}</td>
                                        <td>{{ $location->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                {{-- <a href="">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye"></i> View
                                                    </button>
                                                </a> --}}
                                                <a href="{{ route('locations.edit', $location->id) }}">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pen"></i> Edit
                                                    </button>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm delete-data-info"
                                                    data-name="{{ $location->location_name }}"
                                                    data-id="{{ $location->id }}" data-url="locations/destroy">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="importedScripts">
        @include('includes.datatables-scripts')
        <script src="{{ asset('assets/js/datatables.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('/assets/js/sweetalert-delete.js') }}"></script>
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                @if (session('success'))
                    Toast.fire({
                        icon: 'success',
                        title: '{{ session('success') }}'
                    });
                @endif
            });
        </script>
    </x-slot>
</x-app-layout>
