<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $client->company }}
        </h2>
        <h3 class="subtitle">Edit Client</h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('clients.update', $client) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-control">
                            <label>
                                Company:
                                <input type="text" name="company" value="{{ $client->company }}">
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                VAT:
                                <input type="text" name="vat" value="{{ $client->vat }}">
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                Country:
                                <select name="country">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->code }}" {{ $client->country == $country->code ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                Post Code:
                                <input type="text" name="postal_code" value="{{ $client->postal_code }}">
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                City:
                                <input type="text" name="city" value="{{ $client->city }}">
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                street:
                                <input type="text" name="street" value="{{ $client->street }}">
                            </label>
                        </div>
                        <div class="form-control">
                            <a href="{{ route('clients.index') }}">Back</a>
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
