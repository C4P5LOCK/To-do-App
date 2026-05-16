<x-app-layout>

    <div class="max-w-2xl mx-auto py-10">

        <h1 class="text-2xl font-bold mb-6">Edit Todo</h1>

        <form action="{{ route('todos.update', $todo) }}" method="POST">

            @csrf
            @method('PUT')

            <input
                type="text"
                name="title"
                value="{{ $todo->title }}"
                class="w-full border rounded p-3 mb-3"
            >

            <textarea
                name="description"
                class="w-full border rounded p-3 mb-3"
            >{{ $todo->description }}</textarea>

            <input
                type="date"
                name="due_date"
                value="{{ $todo->due_date }}"
                class="w-full border rounded p-3 mb-3"
            >

            <input
                type="time"
                name="due_time"
                value="{{ $todo->due_time }}"
                class="w-full border rounded p-3 mb-3"
            >

            <button class="bg-black text-white px-4 py-2 rounded">
                Update Todo
            </button>

        </form>

    </div>

</x-app-layout>