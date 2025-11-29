<x-admin.layout title="Delete Guardian">

    <div class="flex justify-center items-center min-h-screen bg-black/40 backdrop-blur-sm p-6">

        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-xl w-full max-w-md text-center relative">

            <!-- Close -->
            <a href="{{ route('admin.guardian.index') }}"
               class="absolute right-3 top-3 text-gray-400 hover:text-gray-600 dark:hover:text-white">
                ✕
            </a>

            <!-- Icon -->
            <svg class="text-gray-400 dark:text-gray-500 w-14 h-14 mb-4 mx-auto" aria-hidden="true"
                 fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"></path>
            </svg>

            <h2 class="text-xl font-bold mb-2 text-gray-800 dark:text-gray-200">
                Hapus Guardian?
            </h2>

            <p class="mb-4 text-gray-600 dark:text-gray-300">
                Apakah Anda yakin ingin menghapus <b>{{ $guardian->name }}</b>?
            </p>

            <!-- Form Delete -->
            <form method="POST" action="{{ route('admin.guardian.destroy', $guardian->id) }}">
                @csrf
                @method('DELETE')

                <div class="flex justify-center gap-4 mt-5">

                    <a href="{{ route('admin.guardian.index') }}"
                       class="py-2 px-4 text-sm font-medium text-gray-700 bg-white border border-gray-300 
                              rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 
                              dark:border-gray-500 dark:hover:bg-gray-600 transition">
                        Tidak, Batal
                    </a>

                    <button type="submit"
                            class="py-2 px-4 text-sm font-medium text-white bg-red-600 rounded-lg 
                                   hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 transition">
                        Ya, Hapus
                    </button>

                </div>
            </form>

        </div>

    </div>

</x-admin.layout>
