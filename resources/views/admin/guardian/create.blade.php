<div id="modalGuardian" tabindex="-1"
    class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50 backdrop-blur-sm">

    <div class="bg-gray-900 text-gray-100 p-6 rounded-xl shadow-xl w-[50%]">
        <h2 class="text-2xl font-bold mb-4">Tambah Guardian</h2>

        <form action="{{ route('admin.guardian.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="font-medium">Nama</label>
                    <input type="text" name="name"
                        class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label class="font-medium">Pekerjaan</label>
                    <input type="text" name="job"
                        class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500">
                </div>

                <div>
                    <label class="font-medium">Telepon</label>
                    <input type="text" name="phone"
                        class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500">
                </div>

                <div>
                    <label class="font-medium">Email</label>
                    <input type="email" name="email"
                        class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500">
                </div>

            </div>

            <div class="mt-4">
                <label class="font-medium">Alamat</label>
                <textarea name="address"
                    class="w-full p-2 mt-1 rounded bg-gray-800 border border-gray-700 focus:ring-blue-500"
                    rows="3"></textarea>
            </div>

            <div class="flex justify-end mt-5">
                <button type="button" id="closeGuardian"
                    class="px-4 py-2 rounded bg-gray-700 hover:bg-gray-600 mr-2">Batal</button>

                <button type="submit"
                    class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('closeGuardian').onclick = () => {
        document.getElementById('modalGuardian').classList.add('hidden');
    };
</script>
