<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('clients.create') }}">Create</a>
                    <table class="w-full">
                        <tr>
                            <th>Company</th>
                            <th>VAT</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->company }}</td>
                                <td>{{ $client->vat }}</td>
                                <td>{{ $client->address }}</td>
                                <td>
                                    <a href="#">Edit</a>
                                    <a href="#">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
