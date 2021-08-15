<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Projects
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('projects.create') }}">Create</a>
                    <table class="w-full">
                        <tr>
                            <th>Title</th>
                            <th>Deadline</th>
                            <th>User</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->deadline }}</td>
                                <td>{{ $project->user->name }}</td>
                                <td>{{ $project->client->company }}</td>
                                <td>{{ $project->status->name }}</td>
                                <td>
                                    <a href="{{ route('projects.edit', $project) }}">Edit</a>
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
