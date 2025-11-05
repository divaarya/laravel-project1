<x-admin.layout title="Student">
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-black mb-2">Daftar Student</h1>
                <p class="text-gray-600">Berikut adalah daftar siswa beserta kelas dan data kontak mereka.</p>
            </div>

            <!-- Tombol tambah -->
            <button id="addStudentBtn" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg shadow">
                + Add Student
            </button>
        </div>

        <!-- Form tambah Student -->
        <form id="addStudentForm" class="hidden bg-gray-100 p-4 rounded-lg shadow mb-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="name" placeholder="Nama Siswa" class="border p-2 rounded" required>
                <input type="text" name="email" placeholder="Email" class="border p-2 rounded" required>
                <input type="text" name="address" placeholder="Alamat" class="border p-2 rounded">
                <input type="text" name="gender" placeholder="Jenis Kelamin" class="border p-2 rounded">
                <input type="date" name="birthday" placeholder="Tanggal Lahir" class="border p-2 rounded">
                <input type="number" name="classroom_id" placeholder="ID Kelas" class="border p-2 rounded" required>
            </div>
            <div class="mt-4 flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
                    Save
                </button>
            </div>
        </form>

        <!-- Tabel daftar Student -->
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white text-gray-900" id="studentTable">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Kelas</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Alamat</th>
                        <th class="py-3 px-6 text-left">Gender</th>
                        <th class="py-3 px-6 text-left">Birthday</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($students as $student)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->name }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->classroom->name ?? '-' }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->email }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->address }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->gender }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->birthday }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Toggle form tambah
        document.getElementById('addStudentBtn').addEventListener('click', function () {
            const form = document.getElementById('addStudentForm');
            form.classList.toggle('hidden');
        });

        // Simpan data via AJAX
        document.getElementById('addStudentForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const response = await fetch("{{ route('student.store') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });

            if (response.ok) {
                const student = await response.json();

                const tbody = document.querySelector('#studentTable tbody');
                const newRow = document.createElement('tr');
                newRow.classList.add('border-b', 'hover:bg-gray-50');
                newRow.innerHTML = `
                    <td class="py-3 px-6">New</td>
                    <td class="py-3 px-6 whitespace-nowrap">${student.name}</td>
                    <td class="py-3 px-6 whitespace-nowrap">${student.classroom_id ?? '-'}</td>
                    <td class="py-3 px-6 whitespace-nowrap">${student.email}</td>
                    <td class="py-3 px-6 whitespace-nowrap">${student.address ?? '-'}</td>
                    <td class="py-3 px-6 whitespace-nowrap">${student.gender ?? '-'}</td>
                    <td class="py-3 px-6 whitespace-nowrap">${student.birthday ?? '-'}</td>
                `;
                tbody.prepend(newRow);

                e.target.reset();
                e.target.classList.add('hidden');
            } else {
                alert("❌ Gagal menambahkan data student");
            }
        });
    </script>
</x-admin.layout>
