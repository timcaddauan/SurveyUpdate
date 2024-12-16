<!DOCTYPE html>
<html lang="en" dir="ltr" x-data="{ direction: 'ltr' }" x-bind:dir="direction">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Site Tiltle -->
    <title>CVMC - Register</title>
    <!-- cvmc Icon -->
    <link rel="shortcut icon" href="assets/images/cvmclogo.png">

    <!-- Icon Css -->
    <link rel="stylesheet" href="assets/css/remixicon.css" />

    <!-- Style Css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="assets/css/flowbite.min.css" rel="stylesheet" />
</head>

<body x-data="main" class="relative overflow-x-hidden text-sm antialiased font-normal text-black font-cerebri dark:text-white vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '',$store.app.mode]">


    <!-- Start Layout -->
    <div class="bg-[#f9fbfd] dark:bg-dark text-black min-h-screen relative z-10">

        <!-- Start Background Images -->
        <div class="bg-[url('../images/bg-main.png')] bg-black dark:bg-purple min-h-[220px] sm:min-h-[50vh] bg-bottom w-full -z-10 absolute"></div>
        <!-- End Background Images -->

        <!-- Start Header -->
        <header>
            <nav class="px-4 lg:px-7 py-4 max-w-[1440px] mx-auto">

            </nav>
        </header>
        <!-- End Header -->

        <!-- Start Main Content -->
        <div class="min-h-[calc(100vh-134px)] py-4 px-4 sm:px-12 flex justify-center items-center max-w-[1440px] mx-auto">
            <div class="max-w-[550px] flex-none w-full bg-white border border-black/10 p-6 sm:p-10 lg:px-10 lg:py-14 rounded-2xl dark:bg-darklight dark:border-darkborder">
                <h1 class="mb-2 text-2xl font-semibold text-center dark:text-white">Sign Up</h1>
                <p class="text-center text-muted mb-7 dark:text-darkmuted">Enter your email and password to sign up!</p>


                <form class="space-y-4" action="/register" method="post">
                    <!-- First Name -->
                    <div class="relative">
                        <input type="text" value="" name="first_name" id="first_name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="first_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">First Name</label>
                    </div>

                    <!-- Last Name -->
                    <div class="relative">
                        <input type="text" value="" name="last_name" id="last_name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="last_name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">Last Name</label>
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <input type="text" value="" name="email" id="email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">Email</label>
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <input type="password" value="" name="password" id="password" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">Password</label>
                    </div>

                    <!-- Confirm Password -->
                    <div class="relative">
                        <input type="password" value="" name="password_confirm" id="password_confirm" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="password_confirm" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">Confirm Password</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-span-1 sm:col-span-2">
                        <button type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Create an account
                        </button>
                    </div>

                    <!-- Validation Errors -->
                    <?php if (isset($validation)): ?>
                        <div class="flex items-center gap-2 p-3 border-l-4 border-danger bg-danger/10 text-danger" x-show="showElement" x-data="{ showElement: true }">
                            <span> <?= $validation->listErrors() ?></span>
                            <button type="button" x-on:click="showElement = false" class="transition-all duration-300 rotate-0 ltr:ml-auto rtl:mr-auto hover:opacity-80 hover:rotate-180"></button>
                        </div>
                    <?php endif; ?>
                </form>

                <p class="mt-5 text-center text-muted dark:text-darkmuted">Already a member? <a href="/login" class="text-blue-600 dark:text-blue-500 hover:underline">Sign In</a></p>
            </div>

        </div>
        <!-- End Main Content -->

        <!-- Start Footer -->
        <footer class="py-5 text-center text-black max-w-[1440px] mx-auto">
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



</body>

<script src="<?= base_url('assets/js/flowbite.min.js') ?>"></script>

</html>