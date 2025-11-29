<x-admin.layout title="Tambah Guru">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Tambah Guru</h1>

        <form action="{{ route('teacher.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-1">Nama Guru</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">Mata Pelajaran</label>
                    <select name="subject_id" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">Telepon</label>
                    <input type="text" name="phone" class="w-full border rounded px-3 py-2">
                </div>
                <div class="col-span-2">
                    <label class="block text-gray-700 mb-1">Alamat</label>
                    <input type="text" name="address" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            <div class="mt-4 flex gap-2">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Save
                </button>
                <a href="{{ route('teacher.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin.layout>
