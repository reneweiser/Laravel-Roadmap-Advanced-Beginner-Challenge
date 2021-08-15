<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Task
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
                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf
                        <div class="form-control">
                            <label>
                                Name:
                                <input type="text" name="company" value="{{ old('company') }}">
                            </label>
                        </div>
                        <div class="form-control">
                            <label>
                                Description:
                                <textarea name="description" rows="5">{{ old('description') }}</textarea>
                            </label>
                        </div>
                        <div class="form-control">
                            <a href="{{ route('clients.index') }}">Back</a>
                            <button type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
