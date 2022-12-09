<header class="flex items-center h-20 px-6 sm:px-10 bg-gray-800">
    <div class="mr-8 cursor-pointer" @click="menu = !menu">

        {{-- <button type="button" @click="show_mobile_menu = !show_mobile_menu"
        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
        aria-controls="mobile-menu" aria-expanded="false">
        <span class="sr-only">Open main menu</span>

          <div class="p-2 space-y-1 bg-gray-800 rounded shadow">
            <span class="block w-6 h-1 bg-gray-100 animate-pulse"></span>
            <span class="block w-6 h-1 bg-gray-100 animate-pulse"></span>
            <span class="block w-6 h-1 bg-gray-100 animate-pulse"></span>
          </div>
          <button>

              <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="show_mobile_menu" style="display: none">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <x-backend.navbar.navs :isMobile="true"></x-backend.navbar.navs>
        </div>
    </div> --}}
    </div>

    <div class="flex flex-shrink-0 items-center ml-auto">
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <!-- Auth User -->
            <div class="ml-3 relative" x-data="{ profile_dropdown: false }" @click="profile_dropdown= !profile_dropdown">
                <!-- Profile Picture-->
                <div>
                    <button type="button"
                        class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full" src="{{ asset('img/user.png') }}" alt="">
                    </button>
                </div>

                <!-- Profile dropdown -->
                <div x-show="profile_dropdown" style="display: none"
                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                    tabindex="-1">
                    <!-- Active: "bg-gray-100", Not Active: "" -->
                    <a href="{{ route('user-profile') }}" class="block px-4 py-2 text-sm text-gray-700"
                        role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                    <a href="{{ route('backend.user.password.edit') }}"
                        class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="user-menu-item-0">Change Password</a>
                    <a href="{{ route('backend.config.index') }}"
                        class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="user-menu-item-1">Settings</a>
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                        role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </div>
            </div><!-- End of Auth User-->
        </div>
        <div class="border-l pl-3 ml-3 space-x-1">
            <button
                class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
                <span class="sr-only">Log out</span>
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </button>
        </div>
    </div>
</header
