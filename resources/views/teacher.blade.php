<x-layout>
    <x-slot:judul>Daftar Guru</x-slot:judul>

    <div class="max-w-6xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-black mb-2">Daftar Guru</h1>
        <p class="text-gray-600 mb-6">ini adalah daftar guru beserta mata pelajaran yang mereka ajarkan.</p>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white text-gray-900">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Guru</th>
                        <th class="py-3 px-6 text-left">Mata Pelajaran</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Telepon</th>
                        <th class="py-3 px-6 text-left">Alamat</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $teacher->name }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">
                                {{ $teacher->subject->name ?? '-' }}
                            </td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $teacher->email }}</td>
                            <td class="py-3 px-6 whitespace-nowrap">{{ $teacher->phone }}</td>
                            <td class="py-3 px-6 whitespace-nowrap overflow-hidden text-ellipsis max-w-xs">
                                {{ $teacher->address }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
