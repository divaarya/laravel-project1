<x-layout>
    <x-slot:judul>Guardian</x-slot:judul>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-black mb-2">Daftar Wali Murid</h1>
        <p class="text-gray-600 mb-6">
            Berikut adalah daftar wali murid beserta informasi pekerjaan dan kontak mereka.
        </p>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white text-gray-900">
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
</x-layout>
