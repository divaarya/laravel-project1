<x-admin.layout title="Tambah Subject">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Tambah Subject</h1>

        <form method="POST" action="{{ route('admin.subject.store') }}">
            @csrf

            <div class="mb-3">
                <label class="block font-medium">Nama Mata Pelajaran</label>
                <input type="text" name="name" class="border p-2 w-full rounded" required>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Deskripsi</label>
                <input type="text" name="description" class="border p-2 w-full rounded">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Nama Guru</label>
                <input type="text" name="teacher_name" class="border p-2 w-full rounded">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Telepon</label>
                <input type="text" name="phone" class="border p-2 w-full rounded">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Alamat</label>
                <input type="text" name="address" class="border p-2 w-full rounded">
            </div>

            <div class="flex justify-end mt-4">
                <a href="{{ route('admin.subject.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-admin.layout>
