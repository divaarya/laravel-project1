<div>
    <nav class="bg-gray-800/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                             alt="Your Company" class="size-8" />
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">

                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                Home
                            </x-nav-link>

                            <x-nav-link :href="route('admin.student.index')" :active="request()->routeIs('admin.student.*')">
                                Student
                            </x-nav-link>

                            <x-nav-link href="/beranda" :active="request()->is('beranda')">
                                Beranda
                            </x-nav-link>

                            <x-nav-link href="/profil" :active="request()->is('profil')">
                                Profil
                            </x-nav-link>

                            <x-nav-link href="/kontak" :active="request()->is('kontak')">
                                Kontak
                            </x-nav-link>

                            <x-nav-link :href="route('admin.guardian.index')" :active="request()->routeIs('admin.guardian.*')">
                                Guardian
                            </x-nav-link>

                            <x-nav-link :href="route('admin.classroom.index')" :active="request()->routeIs('admin.classroom.*')">
                                Classroom
                            </x-nav-link>

                            <x-nav-link :href="route('admin.teacher.index')" :active="request()->routeIs('admin.teacher.*')">
                                Teacher
                            </x-nav-link>

                            <x-nav-link :href="route('admin.subject.index')" :active="request()->routeIs('admin.subject.*')">
                                Subject
                            </x-nav-link>

                        </div>
                    </div>
                </div>

                <!-- NOTIF + PROFILE -->
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">

                        <button type="button"
                                class="relative rounded-full p-1 text-gray-400 hover:text-white">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                 class="size-6">
                                <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 
                                         18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 
                                         6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 
                                         0a24.255 24.255 0 0 1-5.714 
                                         0m5.714 0a3 3 0 1 1-5.714 0"
                                      stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>

                        <el-dropdown class="relative ml-3">
                            <button class="relative flex max-w-xs items-center rounded-full">
                                <img class="size-8 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e"
                                     alt="">
                            </button>

                            <el-menu anchor="bottom end"
                                     class="w-48 bg-gray-800 py-1 rounded-md">

                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
                                    Your profile
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
                                    Settings
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
                                    Sign out
                                </a>

                            </el-menu>
                        </el-dropdown>
                    </div>
                </div>

                <!-- Mobile Button -->
                <div class="-mr-2 flex md:hidden">
                    <button type="button" command="--toggle" commandfor="mobile-menu"
                            class="rounded-md p-2 text-gray-400 hover:text-white">
                        <svg class="size-6 in-aria-expanded:hidden" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <el-disclosure id="mobile-menu" hidden class="md:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">

                <x-nav-link-mobile :href="route('admin.student.index')" :active="request()->routeIs('admin.student.*')">
                    Student
                </x-nav-link-mobile>

                <x-nav-link-mobile href="/home" :active="request()->is('home')">
                    Home
                </x-nav-link-mobile>

                <x-nav-link-mobile href="/beranda" :active="request()->is('beranda')">
                    Beranda
                </x-nav-link-mobile>

                <x-nav-link-mobile href="/profil" :active="request()->is('profil')">
                    Profil
                </x-nav-link-mobile>

                <x-nav-link-mobile href="/kontak" :active="request()->is('kontak')">
                    Kontak
                </x-nav-link-mobile>

                <x-nav-link-mobile :href="route('admin.guardian.index')" :active="request()->routeIs('admin.guardian.*')">
                    Guardian
                </x-nav-link-mobile>

                <x-nav-link-mobile :href="route('admin.classroom.index')" :active="request()->routeIs('admin.classroom.*')">
                    Classroom
                </x-nav-link-mobile>

                <x-nav-link-mobile :href="route('admin.teacher.index')" :active="request()->routeIs('admin.teacher.*')">
                    Teacher
                </x-nav-link-mobile>

                <x-nav-link-mobile :href="route('admin.subject.index')" :active="request()->routeIs('admin.subject.*')">
                    Subject
                </x-nav-link-mobile>

            </div>
        </el-disclosure>
    </nav>
</div>
