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

        @foreach ($todos as $todo)

            <div class="border p-4 rounded mb-3">

                <h2 class="font-bold text-lg">
                    {{ $todo->title }}
                </h2>

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

            </div>

        @endforeach

    </div>

</x-app-layout>