<x-admin.layout title="Student List">
    <div class="max-w-6xl mx-auto px-6 py-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-white">Daftar Student</h1>

            <button onclick="openModal()"
                class="bg-green-700 hover:bg-green-800 text-white font-semibold px-5 py-2.5 rounded-lg shadow">
                + Add Student
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-800 shadow-lg">
            <table class="w-full text-sm text-left bg-gray-950 text-gray-100">
                <thead class="uppercase bg-gray-800 text-gray-200">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">JK</th>
                        <th class="px-6 py-3">Kelas</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Alamat</th>
                        <th class="px-6 py-3">Tanggal Lahir</th>    
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($students as $student)
                        <tr class="border-b border-gray-800 hover:bg-gray-900 transition">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $student->name }}</td>
                            <td class="px-6 py-4">{{ $student->gender }}</td>
                            <td class="px-6 py-4">{{ $student->classroom->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $student->email ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $student->address ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $student->birthday ?? '-' }}</td>

                            <td class="px-6 py-4 text-right relative">
                                <button class="action-btn text-gray-300 hover:text-white px-2 text-lg">⋮</button>

                                <div
                                    class="action-menu hidden absolute right-0 mt-2 w-32 bg-gray-900 border border-gray-700 text-gray-100 rounded-lg shadow-lg z-50">

                                    <a href="{{ route('admin.student.edit', $student->id) }}"
                                        class="block px-4 py-2 text-sm hover:bg-gray-800">
                                        Edit
                                    </a>

                                    <a href="{{ route('admin.student.deletePage', $student->id) }}"
                                        class="block px-4 py-2 text-sm hover:bg-red-600/70 text-red-300">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add Student -->
    <div id="modal"
        class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex justify-center items-center z-50">

        <div class="bg-gray-900 text-gray-100 w-[50%] p-6 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Tambah Student</h2>

            <form method="POST" action="{{ route('admin.student.store') }}">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="font-medium">Nama</label>
                        <input type="text" name="name"
                            class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500"
                            required>
                    </div>

                    <div>
                        <label class="font-medium">Jenis Kelamin</label>
                        <select name="gender"
                            class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700"
                            required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="font-medium">Kelas</label>
                        <select name="classroom_id"
                            class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700">
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="font-medium">Email</label>
                        <input type="email" name="email"
                            class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700">
                    </div>

                    <div class="col-span-2">
                        <label class="font-medium">Alamat</label>
                        <input type="text" name="address"
                            class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700">
                </div>

                <div>
                    <label class="font-medium">Tanggal Lahir</label>
                    <input type="date" name="birthday"
                        class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700">
                </div>

                <div class="flex justify-end mt-6">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-700 text-white px-4 py-2 rounded-lg mr-2">
                        Batal
                    </button>

                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
        // Dropdown
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                document.querySelectorAll('.action-menu').forEach(m => {
                    if (m !== this.nextElementSibling) m.classList.add('hidden');
                });
                this.nextElementSibling.classList.toggle('hidden');
            });
        });

        window.addEventListener('click', () => {
            document.querySelectorAll('.action-menu').forEach(m => m.classList.add('hidden'));
        });

        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>

</x-admin.layout>
