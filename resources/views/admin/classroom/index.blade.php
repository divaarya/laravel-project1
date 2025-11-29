<x-admin.layout title="Classroom List">
    <div class="max-w-6xl mx-auto px-6 py-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-white">Daftar Classroom</h1>

            <button id="openAddModal"
                class="bg-green-700 hover:bg-green-800 text-white font-semibold px-5 py-2.5 rounded-lg shadow transition">
                + Add Classroom
            </button>
        </div>

        <p class="text-gray-300 mb-6">Berikut daftar ruang kelas.</p>

        @if (session('success'))
            <div class="bg-green-700/30 text-green-200 border border-green-600 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-800 shadow-lg">
            <table class="w-full text-sm text-left bg-gray-950 text-gray-100">
                <thead class="uppercase bg-gray-800 text-gray-200">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($classrooms as $c)
                        <tr class="border-b border-gray-800 hover:bg-gray-900 transition">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $c->name }}</td>

                            <td class="px-6 py-4 text-right relative">
                                <button class="action-btn text-gray-300 hover:text-white px-2 text-xl focus:outline-none">⋮</button>

                                <div
                                    class="action-menu hidden absolute right-0 mt-2 w-32 bg-gray-900 border border-gray-700 text-gray-100 rounded-lg shadow-lg z-50">
                                    <a href="{{ route('admin.classroom.edit', $c->id) }}"
                                        class="block px-4 py-2 text-sm hover:bg-gray-800 rounded-t-lg">
                                        Edit
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-400">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <div id="addModal"
        class="fixed inset-0 hidden bg-gray-900/70 backdrop-blur-sm flex justify-center items-center z-50 transition">

        <div class="bg-gray-900 text-gray-100 rounded-xl shadow-2xl w-full max-w-2xl p-6 relative border border-gray-700">

            <button id="closeAddModal"
                class="absolute top-3 right-3 text-gray-400 hover:text-white text-2xl font-bold">&times;</button>

            <h2 class="text-xl font-bold mb-6 text-center text-white">Tambah Classroom</h2>

            <form method="POST" action="{{ route('admin.classroom.store') }}">
                @csrf

                <div class="grid gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-300">Nama Classroom</label>
                        <input type="text" name="name"
                            class="w-full bg-gray-950 border border-gray-700 rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:outline-none"
                            required>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="button" id="closeAddModalBtn"
                        class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-4 py-2 rounded-lg mr-2">
                        Batal
                    </button>

                    <button type="submit"
                        class="bg-green-700 hover:bg-green-800 text-white font-semibold px-4 py-2 rounded-lg">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        const openBtn = document.getElementById('openAddModal');
        const modal = document.getElementById('addModal');
        const closeBtns = [
            document.getElementById('closeAddModal'),
            document.getElementById('closeAddModalBtn')
        ];

        openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
        closeBtns.forEach(btn => btn.addEventListener('click', () => modal.classList.add('hidden')));

        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.stopPropagation();

                document.querySelectorAll('.action-menu').forEach(menu => {
                    if (menu !== this.nextElementSibling) menu.classList.add('hidden');
                });

                this.nextElementSibling.classList.toggle('hidden');
            });
        });

        window.addEventListener('click', () => {
            document.querySelectorAll('.action-menu').forEach(menu => menu.classList.add('hidden'));
        });
    </script>

</x-admin.layout>
