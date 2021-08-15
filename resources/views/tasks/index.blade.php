<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tasks
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="w-full">
                        <tr>
                            <th>Name</th>
                            <th>Project</th>
                            <th></th>
                        </tr>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->project->title }}</td>
                                <td>
                                    @if ($task->is_complete)
                                        <form action="{{ route('task-completions.destroy', $task) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Reopen</button>
                                        </form>
                                    @else
                                        <form action="{{ route('task-completions.update', $task) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit">Complete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
