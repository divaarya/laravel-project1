<x-admin.layout title="Tambah Classroom">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">

        <h1 class="text-2xl font-bold mb-4">Tambah Classroom</h1>

        <form action="{{ route('admin.classroom.store') }}" method="POST">
            @csrf

            <div class="grid gap-4">

                <div>
                    <label class="block text-gray-700 mb-1">Nama Classroom</label>
                    <input type="text" name="name"
                        class="w-full border rounded px-3 py-2" required>
                </div>

            </div>

            <div class="mt-4 flex gap-2">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Save
                </button>

                <a href="{{ route('admin.classroom.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</x-admin.layout>
