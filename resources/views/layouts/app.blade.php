<!DOCTYPE html>
<html>
<head>
    <title>Todo Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <div class="w-64 bg-black text-white min-h-screen p-5">

        <h2 class="text-xl font-bold mb-6">Todos App</h2>

        <ul class="space-y-4">
            <li><a href="#">Create Todo</a></li>
            <li><a href="/todos">All Todos</a></li>
            <li><a href="/todos?filter=completed">Completed</a></li>
            <li><a href="/todos?filter=pending">Pending</a></li>

        </ul>

    </div>

    <!-- MAIN CONTENT -->
    <div class="flex-1 p-8">

        <div class="flex justify-between mb-6">

            <h1 class="text-2xl font-bold">
                @yield('title')
            </h1>

            <form method="POST" action="/logout">
                @csrf
                <button class="text-red-500">Logout</button>
            </form>

        </div>

        @yield('content')

    </div>

</div>

</body>
</html>