<!-- resources/views/components/admin/sidebar.blade.php -->
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gray-800 border-r border-gray-700 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-800 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            <li>
                <a href="/admin/dashboard"
                    class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-chart-pie mr-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/admin/student"
                    class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-user-graduate mr-3"></i>
                    <span>Students</span>
                </a>
            </li>

            <li>
                <a href="/admin/teacher"
                    class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-chalkboard-teacher mr-3"></i>
                    <span>Teachers</span>
                </a>
            </li>

            <li>
                <a href="/admin/classroom"
                    class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-school mr-3"></i>
                    <span>Classrooms</span>
                </a>
            </li>

            <li>
                <a href="/admin/subject"
                    class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-book mr-3"></i>
                    <span>Subjects</span>
                </a>
            </li>

            <li>
                <a href="/admin/guardian"
                    class="flex items-center p-2 text-gray-300 rounded-lg hover:bg-gray-700">
                    <i class="fa-solid fa-users mr-3"></i>
                    <span>Guardians</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
