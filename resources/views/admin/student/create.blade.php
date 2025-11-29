<!-- <x-admin.layout title="Tambah Student">

    <div class="max-w-2xl mx-auto bg-gray-900 text-gray-100 p-6 mt-10 rounded-xl shadow-lg">

        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Student</h2>

        <form method="POST" action="{{ route('admin.student.store') }}">
            @csrf

            <div class="grid gap-4 sm:grid-cols-2">

                <div>
                    <label class="block text-sm font-medium mb-1">Nama</label>
                    <input type="text" name="name"
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg p-2"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Jenis Kelamin</label>
                    <select name="gender"
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg p-2">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Kelas</label>
                    <select name="classroom_id"
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg p-2">
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg p-2">
                </div>
        

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium mb-1">Alamat</label>
                    <input type="text" name="address"
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg p-2">

            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Lahir</label>
                <input type="date" name="birthday"
                    class="w-full bg-gray-950 border border-gray-700 rounded-lg p-2">
            </div>

            <div class="flex justify-end mt-6">
                <a href="{{ route('admin.student.index') }}"
                    class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-lg mr-2">
                    Batal
                </a>

                <button type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg">
                    Simpan
                </button>
            </div>

        </form>
    </div>

</x-admin.layout> -->
