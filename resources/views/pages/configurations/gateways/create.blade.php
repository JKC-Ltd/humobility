<x-app-layout>
    <x-slot name="pageTitle">
        {{ isset($gateway) ? 'Edit Gateways' : 'Create Gateways' }}
    </x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <form
                        action="{{ isset($gateway) ? route('gateways.update', $gateway->id) : route('gateways.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($gateway))
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <select
                                            class="form-control select2bs4 @error('location_id') input-error @enderror"
                                            name="location_id" style="width: 100%;">
                                            <option value="" selected disabled>SELECT LOCATION</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ isset($gateway) ? ($location->id == $gateway->location_id ? 'selected' : '')  : '' }}>
                                                    {{ $location->location_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('location_id')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="customerCode">Customer Code</label>
                                        <input type="text" name="customer_code" class="form-control @error('customer_code') input-error @enderror"
                                            id="customerCode" placeholder="Customer Code"
                                            value="{{ isset($gateway) ? $gateway->customer_code : '' }}">
                                        @error('customer_code')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gateway">Gateway</label>
                                        <input type="text" name="gateway" class="form-control @error('gateway') input-error @enderror" id="gateway"
                                            placeholder="Gateway"
                                            value="{{ isset($gateway) ? $gateway->gateway : '' }}">
                                        @error('gateway')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gatewayCode">Gateway Code</label>
                                        <input type="text" name="gateway_code"
                                            class="form-control @error('gateway_code') input-error @enderror"
                                            id="gatewayCode" placeholder="Gateway Code"
                                            value="{{ isset($gateway) ? $gateway->gateway_code : '' }}">
                                        @error('gateway_code')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control @error('description') input-error @enderror" name="description" id="description" placeholder="Description">{{ isset($gateway) ? $gateway->description : '' }}</textarea>
                                        @error('description')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('gateways.index') }}">
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </a>
                            <button type="submit"
                                class="btn btn-primary">{{ isset($gateway) ? 'Update' : 'Create' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="importedScripts">
        <script>
            $(document).ready(function() {
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
                @if ($errors->has('location_id'))
                    $('.select2bs4').next('.select2').addClass('input-error');
                @endif
            });
        </script>
    </x-slot>
</x-app-layout>
