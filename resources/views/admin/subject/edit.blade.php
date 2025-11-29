<x-admin.layout title="Edit Subject">

    <div class="flex justify-center items-center min-h-screen bg-black/40 backdrop-blur-sm p-6">

        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-xl w-full max-w-2xl relative">

            <!-- Tombol Close -->
            <a href="{{ route('admin.subject.index') }}"
               class="absolute right-3 top-3 text-gray-400 hover:text-gray-600 dark:hover:text-white">
                ✕
            </a>

            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">
                Edit Data Subject
            </h2>

            <form action="{{ route('admin.subject.update', $subject->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid gap-4 sm:grid-cols-2">

                    <!-- Nama Subject -->
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Nama Subject
                        </label>
                        <input type="text" name="name" value="{{ $subject->name }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                                   text-gray-900 dark:text-gray-200"
                            required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Deskripsi
                        </label>
                        <input type="text" name="description" value="{{ $subject->description }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                                   text-gray-900 dark:text-gray-200">
                    </div>

                    <!-- Nama Guru -->
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Nama Guru
                        </label>
                        <input type="text" name="teacher_name" value="{{ $subject->teacher_name }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                                   text-gray-900 dark:text-gray-200">
                    </div>

                    <!-- Telepon -->
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Telepon
                        </label>
                        <input type="text" name="phone" value="{{ $subject->phone }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                                   text-gray-900 dark:text-gray-200">
                    </div>

                    <!-- Alamat -->
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Alamat
                        </label>
                        <input type="text" name="address" value="{{ $subject->address }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none
                                   text-gray-900 dark:text-gray-200">
                    </div>

                </div>

                <!-- Tombol -->
                <div class="flex justify-end gap-3 mt-6">

                    <a href="{{ route('admin.subject.index') }}"
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
