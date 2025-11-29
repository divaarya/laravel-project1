<x-admin.layout title="Edit Teacher">

    <div class="flex justify-center items-center min-h-screen bg-black/40 backdrop-blur-sm p-6">

        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-xl w-full max-w-2xl relative">

            <a href="{{ route('admin.teacher.index') }}"
               class="absolute right-3 top-3 text-gray-400 hover:text-gray-600 dark:hover:text-white">
                ✕
            </a>

            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">
                Edit Data Teacher
            </h2>

            <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid gap-4 sm:grid-cols-2">

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Nama Lengkap
                        </label>
                        <input type="text" name="name" value="{{ $teacher->name }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-900 dark:text-gray-200"
                            required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Email
                        </label>
                        <input type="email" name="email" value="{{ $teacher->email }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-900 dark:text-gray-200"
                            required>
                    </div>

                    <!-- Phone -->
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Telepon
                        </label>
                        <input type="text" name="phone" value="{{ $teacher->phone }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-900 dark:text-gray-200">
                    </div>

                </div>

                <!-- Tombol -->
                <div class="flex justify-end gap-3 mt-6">

                    <a href="{{ route('admin.teacher.index') }}"
                       class="px-4 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-lg transition">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-admin.layout>
