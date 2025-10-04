<x-layout>
    <x-slot:judul>Student</x-slot:judul>

    <div class="max-w-6xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-black mb-2">Daftar Student</h1>
        <p class="text-gray-600 mb-6">Ini adalah halaman student yang menampilkan daftar mahasiswa.</p>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white text-gray-900">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Grade</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Address</th>
                        <th class="py-3 px-6 text-left">Gender</th>
                        <th class="py-3 px-6 text-left">Birthday</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($students as $student)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->name }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->classroom->name }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->email }}</td>
                            <td class="py-3 px-6 whitespace-nowrap overflow-hidden text-ellipsis max-w-xs">
                                {{ $student->address }}
                            </td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->gender }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $student->birthday }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
