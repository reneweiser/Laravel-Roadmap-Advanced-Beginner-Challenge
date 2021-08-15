<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->title }}
        </h2>
        <h3 class="subtitle">Project</h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{ $project->description }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h4>Tasks</h4>

                    @if ($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="form-control">
                            <label>
                                New task:
                                <input type="text" name="name">
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                Description:
                                <textarea name="description" rows="5"></textarea>
                            </label>
                        </div>
                        <button type="submit">Add</button>
                    </form>

                    @foreach ($project->tasks as $task)
                        <div class="flex justify-between">
                            <div>{{ $task->name }}</div>
                            <div class="flex">
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

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
