<x-admin.layout title="Edit Student">

    <div class="flex justify-center items-center min-h-screen bg-black/40 backdrop-blur-sm p-6">

        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-xl w-full max-w-2xl relative">

            <!-- Tombol Close -->
            <a href="{{ route('admin.student.index') }}"
               class="absolute right-3 top-3 text-gray-400 hover:text-gray-600 dark:hover:text-white">
                ✕
            </a>

            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">
                Edit Data Student
            </h2>

            <form action="{{ route('admin.student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid gap-4 sm:grid-cols-2">

                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Nama Lengkap
                        </label>
                        <input type="text" name="name" value="{{ $student->name }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:outline-none
                                   text-gray-900 dark:text-gray-200" required>
                    </div>

                    <!-- Classroom -->
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Classroom
                        </label>
                        <select name="classroom_id"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:outline-none
                                   text-gray-900 dark:text-gray-200">
                            <option value="">Pilih Kelas</option>

                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}" 
                                    @selected($student->classroom_id == $classroom->id)>
                                    {{ $classroom->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Email
                        </label>
                        <input type="email" name="email" value="{{ $student->email }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:outline-none
                                   text-gray-900 dark:text-gray-200">
                    </div>


                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Alamat
                        </label>
                        <textarea name="address" rows="3"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:outline-none
                                   text-gray-900 dark:text-gray-200">{{ $student->address }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-600 dark:text-gray-300">
                            Tanggal Lahir
                        </label>
                        <input type="date" name="birthday" value="{{ $student->birthday }}"
                            class="w-full bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 
                                   rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:outline-none
                                   text-gray-900 dark:text-gray-200">

                </div>


                <div class="flex justify-end gap-3 mt-6">

                    <a href="{{ route('admin.student.index') }}"
                       class="px-4 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-lg transition">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-admin.layout>
