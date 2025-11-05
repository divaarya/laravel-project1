<x-admin.layout title="Add Student">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Add Student</h1>
        <form id="addStudentForm" method="POST" action="{{ route('student.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Student Name" required>
    <input type="text" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <button type="submit">Save</button>
</form>


    </div>
</x-admin.layout>
