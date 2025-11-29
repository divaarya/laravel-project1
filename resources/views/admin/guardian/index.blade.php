<x-admin.layout title="Guardian List">
    <div class="max-w-6xl mx-auto px-6 py-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-white">Daftar Guardian</h1>

            <!-- BUTTON OPEN MODAL -->
            <button onclick="openModal()"
                class="bg-green-700 hover:bg-green-800 text-white font-semibold px-5 py-2.5 rounded-lg shadow">
                + Add Guardian
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-800 shadow-lg">
            <table class="w-full text-sm text-left bg-gray-950 text-gray-100">
                <thead class="uppercase bg-gray-800 text-gray-200">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Pekerjaan</th>
                        <th class="px-6 py-3">Telp</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($guardians as $guardian)
                        <tr class="border-b border-gray-800 hover:bg-gray-900 transition">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $guardian->name }}</td>
                            <td class="px-6 py-4">{{ $guardian->job }}</td>
                            <td class="px-6 py-4">{{ $guardian->phone }}</td>
                            <td class="px-6 py-4">{{ $guardian->email }}</td>

                            <td class="px-6 py-4 text-right relative">

                                <!-- Tombol Titik Tiga -->
                                <button
                                    class="action-btn text-gray-300 hover:text-white px-2 text-lg focus:outline-none">⋮</button>

                                <!-- Dropdown -->
                                <div
                                    class="action-menu hidden absolute right-0 mt-2 w-32 bg-gray-900 border border-gray-700 text-gray-100 rounded-lg shadow-lg z-50">

                                    <!-- EDIT -->
                                    <a href="{{ route('admin.guardian.edit', $guardian->id) }}"
                                        class="block px-4 py-2 text-sm hover:bg-gray-800 rounded-t-lg">
                                        Edit
                                    </a>

                                    <!-- DELETE -->
                                    <a href="{{ route('admin.guardian.deletePage', $guardian->id) }}"
    class="block px-4 py-2 text-sm hover:bg-red-600/70 text-red-300 rounded-b-lg">
    Delete
</a>

                                        
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

  <!-- ====== MODAL ADD GUARDIAN (DARK MODE, SAMA PERSIS SUBJECT) ====== -->
<div id="modal"
    class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex justify-center items-center z-50">

    <div class="bg-gray-900 text-gray-100 w-[50%] p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Guardian</h2>

        <form method="POST" action="{{ route('admin.guardian.store') }}">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="font-medium">Nama</label>
                    <input type="text" name="name"
                        class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div>
                    <label class="font-medium">Pekerjaan</label>
                    <input type="text" name="job"
                        class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="font-medium">Telepon</label>
                    <input type="text" name="phone"
                        class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label class="font-medium">Email</label>
                    <input type="email" name="email"
                        class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>

            <div class="mt-4">
                <label class="font-medium">Alamat</label>
                <textarea name="address" rows="3"
                    class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>

            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeModal()"
                    class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600 mr-2">
                    Batal
                </button>

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>



    <!-- Script (sama dengan Subject) -->
    <script>
        // Titik Tiga Dropdown
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

        // Modal
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>

</x-admin.layout>
