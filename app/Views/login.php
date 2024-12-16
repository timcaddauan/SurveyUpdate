<!DOCTYPE html>
<html lang="en" dir="ltr" x-data="{ direction: 'ltr' }" x-bind:dir="direction">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Tailwind CSS Admin & Dashboard Template" />
    <meta name="author" content="SRBThemes" />

    <!-- Site Tiltle -->
    <title>CVMC - Login</title>

    <!-- cvmc Icon -->
    <link rel="shortcut icon" href="assets/images/cvmclogo.png" >
    

    <!-- Icon Css -->
    <link rel="stylesheet" href="assets/css/remixicon.css" />

    <!-- Style Css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="assets/css/flowbite.min.css" rel="stylesheet" />
</head>

<body x-data="main" class="relative overflow-x-hidden text-sm antialiased font-normal text-black font-cerebri dark:text-white vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '',$store.app.mode]">


    <!-- Start Layout -->
    <div class="bg-white dark:bg-dark text-black min-h-screen relative z-10">

        <!-- Start Background Images -->
        <div class="bg-[url('../images/bg-main.png')] bg-black dark:bg-purple min-h-[220px] sm:min-h-[50vh] bg-bottom w-full -z-10 absolute"></div>
        <!-- End Background Images -->

        <!-- Start Header -->
        <header>
            <nav class="px-4 lg:px-7 py-4 max-w-[1440px] mx-auto">
                <div class="flex flex-wrap items-center justify-between">
                    <a href="index" class="flex items-center">
                        <img src="assets/images/cvmclogo.png" class="mx-auto dark-logo h-7 dark:hidden" alt="logo">
                        <img src="assets/images/cvmclogo.png" class="hidden mx-auto light-logo h-7 dark:block" alt="logo">
                    </a>
                    <div class="flex items-center lg:order-2">
                    </div>
                </div>
            </nav>
        </header>
        <!-- End Header -->

        <!-- Start Main Content -->
        <div class="min-h-[calc(100vh-134px)] py-4 px-4 sm:px-12 flex justify-center items-center max-w-[1440px] mx-auto">
            <div class="max-w-[400px] flex-none w-full bg-white border border-black/10 p-6 sm:p-10 lg:px-10 lg:py-14 rounded-2xl loginform dark:bg-darklight dark:border-darkborder">
                <?php if (session()->get('success')): ?>

                    <div class="flex items-center gap-2 p-3 border-l-4 border-success bg-danger/10 text-success" x-show="showElement" x-data="{ showElement: true }">
                        <span> <?= session()->get('success') ?></span>
                        <button type="button" x-on:click="showElement = false" class="transition-all duration-300 rotate-0 ltr:ml-auto rtl:mr-auto hover:opacity-80 hover:rotate-180">

                        </button>
                    </div>
                <?php endif; ?>


                <h1 class="mb-2 text-2xl font-semibold text-center dark:text-white">Sign In</h1>
                <p class="text-center text-muted mb-7 dark:text-white text-2xl">Enter your email and password to sign in!</p>


                <form class="space-y-4" action="/login" method="post">
                    <div class="relative">
                        <input type="text" value="" name="email" id="email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                    </div>
                    <div class="relative">
                        <input type="password" value="" name="password" id="password" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Password</label>
                    </div>
                    <!-- Center the button with full width -->
                    <div class="flex justify-center w-full">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Sign In
                        </button>
                    </div>
                    <?php if (isset($validation)): ?>
                        <div class="flex items-center gap-2 p-3 border-l-4 border-danger bg-danger/10 text-danger" x-show="showElement" x-data="{ showElement: true }">
                            <span> <?= $validation->listErrors() ?></span>
                            <button type="button" x-on:click="showElement = false" class="transition-all duration-300 rotate-0 ltr:ml-auto rtl:mr-auto hover:opacity-80 hover:rotate-180">
                            </button>
                        </div>
                    <?php endif; ?>
                </form>

                <p id="floating_helper_text" class="mt-5 text-center text-muted dark:text-darkmuted">Don't have an account? <a href="<?= base_url('/register') ?>" class="text-blue-600 dark:text-blue-500 hover:underline">Create an Account</a></p>
            </div>
        </div>
        <!-- End Main Content -->

        <!-- Start Footer -->
        <footer class="py-5 text-center text-black dark:text-white/80 max-w-[1440px] mx-auto">
            <div>
                &copy;
                <script>
                    var year = new Date();
                    document.write(year.getFullYear());
                </script>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
    <!-- End Layout -->


    <!-- All javascirpt -->
    <!-- Alpine js -->
    <script src="<?= base_url('assets/js/alpine-collaspe.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/alpine-persist.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/alpine.min.js') ?>" defer></script>

    <!-- Custom js -->
    <script src="assets/js/custom.js"></script>

    <script src="<?= base_url('assets/js/flowbite.min.js') ?>"></script>
</body>

</html>