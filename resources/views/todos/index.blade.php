<x-app-layout>

    <div class="max-w-3xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">My Todos</h1>

        <form action="{{ route('todos.store') }}" method="POST" class="mb-6">
            @csrf

            <input
                type="text"
                name="title"
                placeholder="Enter todo title"
                class="w-full border rounded p-3 mb-3"
            >

            <textarea
                name="description"
                placeholder="Description"
                class="w-full border rounded p-3 mb-3"
            ></textarea>

            <input
                 type="date"
                 name="due_date"
                class="w-full border rounded p-3 mb-3">

            <input
                  type="time"
                    name="due_time"
                    class="w-full border rounded p-3 mb-3">
            <button class="bg-black text-white px-4 py-2 rounded">
                Add Todo
            </button>
        </form>

        //Todo CARD
        @foreach ($todos as $todo)

    <div class="border p-4 rounded mb-3 bg-white shadow-sm">

        <div class="flex justify-between items-center mb-2">

            <h2 class="font-bold text-lg">

                @if($todo->is_completed)
                    <span class="line-through text-gray-400">
                        {{ $todo->title }}
                    </span>
                @else
                    {{ $todo->title }}
                @endif

            </h2>

            @if($todo->is_completed)

                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                    Completed
                </span>

            @else

                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">
                    Pending
                </span>

            @endif

        </div>

        <p class="text-gray-600">
            {{ $todo->description }}
        </p>

        @if($todo->due_date)

            <p class="text-sm text-gray-500 mt-2">
                Due:
                {{ $todo->due_date }}

                @if($todo->due_time)
                    at {{ $todo->due_time }}
                @endif
            </p>

        @endif

        <form
            action="{{ route('todos.toggle', $todo) }}"
            method="POST"
            class="mt-4"
        >
            @csrf
            @method('PATCH')

            <button class="bg-black text-white px-3 py-2 rounded text-sm">

                @if($todo->is_completed)
                    Mark as Pending
                @else
                    Mark as Completed
                @endif

            </button>

        </form>

        <a href="{{ route('todos.edit', $todo) }}"
   class="text-blue-600 text-sm mr-3">
   Edit
</a>

        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')

    <button type="submit"
        onclick="return confirm('Are you sure you want to delete this todo?')"
        class="text-red-600 text-sm">
        Delete
    </button>
</form>

    </div>

@endforeach
    

</x-app-layout>