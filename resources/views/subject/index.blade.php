<x-admin.layout title="subject">
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-black">Daftar Subject</h1>
            <button id="addSubjectBtn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add Subject
            </button>
        </div>

        <p class="text-gray-600 mb-6">Ini adalah daftar mata pelajaran beserta guru pengajarnya.</p>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white text-gray-900" id="subjectTable">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Mata Pelajaran</th>
                        <th class="py-3 px-6 text-left">Deskripsi</th>
                        <th class="py-3 px-6 text-left">Guru</th>
                        <th class="py-3 px-6 text-left">Telepon</th>
                        <th class="py-3 px-6 text-left">Alamat</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subjects as $subject)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6">{{ $subject->name }}</td>
                            <td class="py-3 px-6">{{ $subject->description ?? '-' }}</td>
                            <td class="py-3 px-6">{{ $subject->teacher_name ?? '-' }}</td>
                            <td class="py-3 px-6">{{ $subject->phone ?? '-' }}</td>
                            <td class="py-3 px-6">{{ $subject->address ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal tambah Subject --}}
    <div id="addSubjectModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Tambah Subject</h2>
            <form id="addSubjectForm">
                <input type="text" name="name" placeholder="Nama Mata Pelajaran" class="border p-2 w-full mb-2" required>
                <input type="text" name="description" placeholder="Deskripsi" class="border p-2 w-full mb-2">
                <input type="text" name="teacher_name" placeholder="Nama Guru" class="border p-2 w-full mb-2">
                <input type="text" name="phone" placeholder="Telepon" class="border p-2 w-full mb-2">
                <input type="text" name="address" placeholder="Alamat" class="border p-2 w-full mb-4">

                <div class="flex justify-end gap-2">
                    <button type="button" id="closeModal" class="bg-gray-400 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('addSubjectModal');
        const addBtn = document.getElementById('addSubjectBtn');
        const closeBtn = document.getElementById('closeModal');
        const form = document.getElementById('addSubjectForm');
        const table = document.getElementById('subjectTable').querySelector('tbody');

        addBtn.addEventListener('click', () => modal.classList.remove('hidden'));
        closeBtn.addEventListener('click', () => modal.classList.add('hidden'));

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const data = new FormData(form);
            const res = await fetch('{{ route('subject.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: data
            });

            if (res.ok) {
                const subject = await res.json();
                const row = `
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-6">#</td>
                        <td class="py-3 px-6">${subject.name}</td>
                        <td class="py-3 px-6">${subject.description ?? '-'}</td>
                        <td class="py-3 px-6">${subject.teacher_name ?? '-'}</td>
                        <td class="py-3 px-6">${subject.phone ?? '-'}</td>
                        <td class="py-3 px-6">${subject.address ?? '-'}</td>
                    </tr>`;
                table.insertAdjacentHTML('afterbegin', row);
                modal.classList.add('hidden');
                form.reset();
            } else {
                alert('Gagal menambah subject');
            }
        });
    </script>
</x-admin.layout>
