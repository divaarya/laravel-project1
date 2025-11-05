<x-admin.layout title="Guardian">
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-black mb-2">Daftar Wali Murid</h1>
                <p class="text-gray-600">Berikut adalah daftar wali murid beserta informasi pekerjaan dan kontak mereka.</p>
            </div>

            <!-- Tombol tambah -->
            <button id="addGuardianBtn" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg shadow">
                + Add Guardian
            </button>
        </div>

        <!-- Form tambah Guardian (disembunyikan dulu) -->
        <form id="addGuardianForm" class="hidden bg-gray-100 p-4 rounded-lg shadow mb-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="name" placeholder="Nama Guardian" class="border p-2 rounded" required>
                <input type="text" name="job" placeholder="Pekerjaan" class="border p-2 rounded">
                <input type="text" name="phone" placeholder="Telepon" class="border p-2 rounded">
                <input type="email" name="email" placeholder="Email" class="border p-2 rounded">
            </div>
            <div class="mt-4 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
                    Save
                </button>
            </div>
        </form>

        <!-- Tabel daftar guardian -->
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white text-gray-900" id="guardianTable">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Pekerjaan</th>
                        <th class="py-3 px-6 text-left">Telepon</th>
                        <th class="py-3 px-6 text-left">Email</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($guardians as $guardian)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $guardian->name }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $guardian->job ?? '-' }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $guardian->phone ?? '-' }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $guardian->email ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script -->
    <script>
        // Toggle form tambah
        document.getElementById('addGuardianBtn').addEventListener('click', function () {
            const form = document.getElementById('addGuardianForm');
            form.classList.toggle('hidden');
        });

        // Simpan data baru via AJAX
        document.getElementById('addGuardianForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const response = await fetch("{{ route('guardian.store') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });

            if (response.ok) {
                const guardian = await response.json();

                // Tambah data ke paling atas tabel
                const tbody = document.querySelector('#guardianTable tbody');
                const newRow = document.createElement('tr');
                newRow.classList.add('border-b', 'hover:bg-gray-50');
                newRow.innerHTML = `
                    <td class="py-3 px-6">New</td>
                    <td class="py-3 px-6 whitespace-nowrap">${guardian.name}</td>
                    <td class="py-3 px-6 whitespace-nowrap">${guardian.job ?? '-'}</td>
                    <td class="py-3 px-6 whitespace-nowrap">${guardian.phone ?? '-'}</td>
                    <td class="py-3 px-6 whitespace-nowrap">${guardian.email ?? '-'}</td>
                `;
                tbody.prepend(newRow);

                // Reset form & sembunyikan
                e.target.reset();
                e.target.classList.add('hidden');
            } else {
                alert("❌ Gagal menambahkan data guardian");
            }
        });
    </script>
</x-admin.layout>
