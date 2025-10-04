<x-layout :judul="'Guardian'">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Guardian</h1>
        
        <table class="table-auto border-collapse border border-gray-300 w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">Job</th>
                    <th class="border border-gray-300 px-4 py-2">Phone</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guardians as $guardian)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $guardian->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $guardian->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $guardian->job }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $guardian->phone }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $guardian->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
