<!DOCTYPE html>
<html lang="en" dir="ltr" x-data="{ direction: 'ltr' }" x-bind:dir="direction">

<head>
    <?= view('components/styles'); ?>
</head>

<body x-data="main" class="relative overflow-x-hidden text-sm antialiased font-normal text-black font-cerebri dark:text-white vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '',$store.app.mode]">
    <?php if (session()->get('isLoggedIn')) : ?>



        <!-- Start Layout -->
            <div class="bg-[#f9fbfd] dark:bg-dark text-black">
            <!-- Start detached bg -->
            <div class="bg-[url('../images/bg-main.png')] bg-black min-h-[220px] sm:min-h-[250px] bg-bottom fixed hidden w-full -z-50 detached-img"></div>
            <!-- End detached bg -->

            <!-- Start Menu Sidebar Olverlay -->
            <div x-cloak class="fixed inset-0 bg-black/60 dark:bg-dark/90 z-[999] lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>
            <!-- End Menu Sidebar Olverlay -->

            <!-- Start Main Content -->
            <div class="flex mx-auto main-container">

                <?= view('components/navbar'); ?>
                <!-- Start Content Area -->
                <div class="flex-1 main-content">

                    <?= view('components/topbar'); ?>
                    <!-- Start Content -->
                    <div class="h-[calc(100vh-60px)]  relative overflow-y-auto overflow-x-hidden p-4 space-y-4 detached-content">
                        <!-- Start Breadcrumb -->

                        <!-- End Breadcrumb -->

                        <!-- Start All Card -->

                        <?= $this->renderSection('content') ?>

                        <!-- End All Card -->

                        <!-- Start Footer -->
                        <footer class="py-2 text-center text-black dark:text-darkmuted ltr:md:text-left rtl:md:text-right">
                            &copy;
                            <script>
                                var year = new Date();
                                document.write(year.getFullYear());
                            </script>
                            CVMC


                            </span>
                        </footer>
                        <!-- End Footer -->

                    </div>
                    <!-- End Content -->

                </div>
            </div>
    <?php endif; ?>
        <!-- End Layout -->


        <?= view('components/scripts'); ?>













</body>

</html>