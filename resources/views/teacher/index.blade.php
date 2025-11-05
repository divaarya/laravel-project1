<x-admin.layout title="Teacher">
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h1 class="text-3xl font-bold text-black mb-2">Daftar Guru</h1>
                <p class="text-gray-600">
                    Berikut adalah daftar guru beserta mata pelajaran yang mereka ajarkan.
                </p>
            </div>

            {{-- Tombol Add Teacher --}}
            <button id="addTeacherBtn"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + Add Teacher
            </button>
        </div>

        {{-- Form Tambah Teacher (muncul saat klik tombol Add) --}}
        <div id="addTeacherForm" class="hidden mb-6 bg-gray-100 p-4 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-3">Tambah Guru</h2>

            <form id="teacherForm">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-1">Nama Guru</label>
                        <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Mata Pelajaran</label>
                        <input type="text" name="subject" class="w-full border rounded px-3 py-2" required>
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
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                        Save
                    </button>
                    <button type="button" id="cancelBtn"
                        class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition">
                        Cancel
                    </button>
                </div>
            </form>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto rounded-lg shadow">
            <table id="teacherTable" class="min-w-full bg-white text-gray-900">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama Guru</th>
                        <th class="py-3 px-6 text-left">Mata Pelajaran</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Telepon</th>
                        <th class="py-3 px-6 text-left">Alamat</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($teachers as $teacher)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6">{{ $teacher->name }}</td>
                            <td class="py-3 px-6">{{ $teacher->subject->name ?? '-' }}</td>
                            <td class="py-3 px-6">{{ $teacher->email ?? '-' }}</td>
                            <td class="py-3 px-6">{{ $teacher->phone ?? '-' }}</td>
                            <td class="py-3 px-6">{{ $teacher->address ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Script --}}
    <script>
        const addBtn = document.getElementById('addTeacherBtn');
        const formSection = document.getElementById('addTeacherForm');
        const cancelBtn = document.getElementById('cancelBtn');
        const form = document.getElementById('teacherForm');
        const table = document.getElementById('teacherTable').querySelector('tbody');

        addBtn.addEventListener('click', () => formSection.classList.toggle('hidden'));
        cancelBtn.addEventListener('click', () => formSection.classList.add('hidden'));

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);

            const response = await fetch("{{ route('teacher.store') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            });

            if (!response.ok) {
                alert("Failed to add teacher");
                return;
            }

            const teacher = await response.json();

            // Tambah ke tabel paling atas
            const newRow = document.createElement('tr');
            newRow.classList.add('border-b', 'hover:bg-gray-50');
            newRow.innerHTML = `
                <td class="py-3 px-6">NEW</td>
                <td class="py-3 px-6">${teacher.name}</td>
                <td class="py-3 px-6">${teacher.subject ?? '-'}</td>
                <td class="py-3 px-6">${teacher.email ?? '-'}</td>
                <td class="py-3 px-6">${teacher.phone ?? '-'}</td>
                <td class="py-3 px-6">${teacher.address ?? '-'}</td>
            `;
            table.prepend(newRow);

            form.reset();
            formSection.classList.add('hidden');
        });
    </script>
</x-admin.layout>
