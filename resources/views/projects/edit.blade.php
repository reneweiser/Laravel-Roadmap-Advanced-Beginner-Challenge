<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Project
        </h2>
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
                    <form action="{{ route('projects.update', $project) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-control">
                            <label>
                                Title:
                                <input type="text" name="title" value="{{ $project->title }}">
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                Description:
                                <input type="text" name="description" value="{{ $project->description }}">
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                Deadline:
                                <input type="datetime-local" name="deadline" value="{{ $project->deadline_for_date_inputs }}">
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                Assigned user:
                                <select name="user_id">
                                    @foreach ($users as $user)
                                        <option value="{{ $user['id'] }}" {{ $project->user_id == $user['id'] ? 'selected' : '' }}>{{ $user['name'] }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                Assigned client:
                                <select name="client_id">
                                    @foreach($clients as $client)
                                        <option value="{{ $client['id'] }}" {{ $project->client_id == $client['id'] ? 'selected' : '' }}>{{ $client['company'] }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                Status:
                                <select name="status_id">
                                    @foreach($status as $singleStatus)
                                        <option value="{{ $singleStatus['id'] }}" {{ $project->status_id == $singleStatus['id'] ? 'selected' : '' }}>{{ $singleStatus['name'] }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-control">
                            <a href="{{ route('projects.index') }}">Back</a>
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
