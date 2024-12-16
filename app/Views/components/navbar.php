<!-- Start Sidebar -->
<nav class="sidebar fixed z-[9999] flex-none w-[240px] ltr:border-r rtl:border-l dark:bg-darkborder border-black/10 transition-all duration-300 overflow-hidden">
                    <div class="h-full bg-white dark:bg-darklight">
                        <div class="p-4">
                            <a href="index" class="w-full main-logo">

                                <img src="assets/images/cvmclogo.png" class="mx-auto dark-logo h-7 logo dark:hidden" alt="logo" />
                                <img src="assets/images/cvmclogo.png" class="hidden mx-auto light-logo h-7 logo dark:block" alt="logo" />
                                <img src="assets/images/cvmclogo.png" class="hidden mx-auto logo-icon h-7" alt="">

                            </a>
                        </div>
                        
                        <div class="h-[calc(100vh-60px)]  overflow-y-auto overflow-x-hidden px-5 pb-4 space-y-16 detached-menu">
                            <ul class="relative flex flex-col gap-1 " x-data="{ activeMenu: 'dashboard' }">
                                <h2 class="my-2 text-sm text-black/50 dark:text-white/30"><span>Menu</span></h2>
                                <li class="menu nav-item">
                                    <a href="javaScript:;" class="items-center justify-between text-black nav-link group active" :class="{'active' : activeMenu === 'dashboard'}" @click="activeMenu === 'dashboard' ? activeMenu = null : activeMenu = 'dashboard'">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                                <path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM15.8329 7.33748C16.0697 7.17128 16.3916 7.19926 16.5962 7.40381C16.8002 7.60784 16.8267 7.92955 16.6587 8.16418C14.479 11.2095 13.2796 12.8417 13.0607 13.0607C12.4749 13.6464 11.5251 13.6464 10.9393 13.0607C10.3536 12.4749 10.3536 11.5251 10.9393 10.9393C11.3126 10.5661 12.9438 9.36549 15.8329 7.33748ZM17.5 11C18.0523 11 18.5 11.4477 18.5 12C18.5 12.5523 18.0523 13 17.5 13C16.9477 13 16.5 12.5523 16.5 12C16.5 11.4477 16.9477 11 17.5 11ZM6.5 11C7.05228 11 7.5 11.4477 7.5 12C7.5 12.5523 7.05228 13 6.5 13C5.94772 13 5.5 12.5523 5.5 12C5.5 11.4477 5.94772 11 6.5 11ZM8.81802 7.40381C9.20854 7.79433 9.20854 8.4275 8.81802 8.81802C8.4275 9.20854 7.79433 9.20854 7.40381 8.81802C7.01328 8.4275 7.01328 7.79433 7.40381 7.40381C7.79433 7.01328 8.4275 7.01328 8.81802 7.40381ZM12 5.5C12.5523 5.5 13 5.94772 13 6.5C13 7.05228 12.5523 7.5 12 7.5C11.4477 7.5 11 7.05228 11 6.5C11 5.94772 11.4477 5.5 12 5.5Z" fill="currentColor"></path>
                                            </svg>
                                            <span class="ltr:pl-1.5 rtl:pr-1.5">Dashboard</span>
                                        </div>
                                        <div class="flex items-center justify-center w-4 h-4 dropdown-icon" :class="{'!rotate-180' : activeMenu === 'dashboard'}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul x-cloak x-show="activeMenu === 'dashboard'" x-collapse class="flex flex-col gap-1 text-black sub-menu dark:text-white/60">
                                        <li><a href="" class="active">Main</a></li>
                                    </ul>
                                </li>
                                <h2 class="my-2 text-sm text-black/50 dark:text-white/30"><span>Users & Pages</span></h2>
                                <li class="menu nav-item">
                                    <a href="javaScript:;" class="items-center justify-between text-black nav-link group dark:text-white/80" :class="{'active' : activeMenu === 'client'}" @click="activeMenu === 'client' ? activeMenu = null : activeMenu = 'client'">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                                <path d="M5 8V20H19V8H5ZM5 6H19V4H5V6ZM20 22H4C3.44772 22 3 21.5523 3 21V3C3 2.44772 3.44772 2 4 2H20C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22ZM7 10H11V14H7V10ZM7 16H17V18H7V16ZM13 11H17V13H13V11Z" fill="currentColor"></path>
                                            </svg>
                                            <span class="ltr:pl-1.5 rtl:pr-1.5">Survey Control</span>
                                        </div>
                                        <div class="flex items-center justify-center w-4 h-4 dropdown-icon" :class="{'!rotate-180' : activeMenu === 'client'}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul x-cloak x-show="activeMenu === 'client'" x-collapse class="flex flex-col gap-1 text-black sub-menu dark:text-white/60">
                                        <!-- <li><a href="/SurveyLog">Survey Log table</a></li>              -->
                                    </ul>
                                    <ul x-cloak x-show="activeMenu === 'client'" x-collapse class="flex flex-col gap-1 text-black sub-menu dark:text-white/60">
                                        <li><a href="/QuestionPage" target="_blank">Take a Survey</a></li>
                                    </ul>
                                    <ul x-cloak x-show="activeMenu === 'client'" x-collapse class="flex flex-col gap-1 text-black sub-menu dark:text-white/60">
                                        <li><a href="/all-notifications">All Notifications</a></li>
                                    </ul>
                                </li>
                                <!-- <li class="menu nav-item">
                                <a href="javaScript:;" class="items-center justify-between text-black nav-link group dark:text-white/80" :class="{'active' : activeMenu === 'pages'}" @click="activeMenu === 'pages' ? activeMenu = null : activeMenu = 'pages'">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M5 8V20H19V8H5ZM5 6H19V4H5V6ZM20 22H4C3.44772 22 3 21.5523 3 21V3C3 2.44772 3.44772 2 4 2H20C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22ZM7 10H11V14H7V10ZM7 16H17V18H7V16ZM13 11H17V13H13V11Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="ltr:pl-1.5 rtl:pr-1.5">Users</span>
                                    </div>
                                    <div class="flex items-center justify-center w-4 h-4 dropdown-icon" :class="{'!rotate-180' : activeMenu === 'pages'}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                            <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </a>
                                <ul x-cloak x-show="activeMenu === 'pages'" x-collapse class="flex flex-col gap-1 text-black sub-menu dark:text-white/60">
                                    <li><a href="UserProfile/2">Settings</a></li>
                                    <li><a href="/pages/createUser">Create User</a></li>
                                    <li><a href="/pages/usertable">Table User</a></li>
                                </ul>
                                </li> -->
                                <li class="menu nav-item">
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End sidebar -->