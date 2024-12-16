<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php if (isset($validation)): ?>
    <div class="flex items-center gap-2 p-3 border-l-4 border-red-500 bg-red-100 text-red-500" x-show="showElement" x-data="{ showElement: true }">
        <span> <?= $validation->listErrors() ?></span>
        <button type="button" x-on:click="showElement = false" class="transition-all duration-300 rotate-0 ltr:ml-auto rtl:mr-auto hover:opacity-80 hover:rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                <path fill="currentColor" d="M4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19ZM13 9V16H11V9H6L12 3L18 9H13Z"></path>
            </svg>
        </button>
    </div>
<?php endif; ?>


<?php if (session()->get('success')): ?>

    <div class="flex items-center gap-2 p-3 border-l-4 border-success bg-danger/10 text-success" x-show="showElement" x-data="{ showElement: true }">
        <span> <?= session()->get('success') ?></span>
        <button type="button" x-on:click="showElement = false" class="transition-all duration-300 rotate-0 ltr:ml-auto rtl:mr-auto hover:opacity-80 hover:rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                <path fill="currentColor" d="M4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19ZM13 9V16H11V9H6L12 3L18 9H13Z"></path>
            </svg>
        </button>
    </div>
<?php endif; ?>



<div>
    <nav class="w-full">
        <ul class="space-y-2 detached-breadcrumb">
            <li class="text-xl font-semibold text-black dark:text-white">Account Settings</li>
        </ul>
    </nav>
</div>



<!-- Start Content -->
<!-- Start All Card -->

<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    <div class="p-5 bg-white border rounded border-black/10 dark:bg-darklight dark:border-darkborder">
        <h2 class="mb-4 text-base font-semibold text-black capitalize dark:text-white/80">Profile Details</h2>
        <form action="<?= site_url('settings') ?>" method="post">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="space-y-2">
                    <label class="text-sm font-medium dark:text-white">First Name</label>
                    <input type="text" placeholder="First Name" value="<?= set_value('first_name', $user['first_name']) ?>" name="first_name" required class="form-input rounded-lg border-gray-300">
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium dark:text-white">Last Name</label>
                    <input type="text" placeholder="Last Name" value="<?= set_value('last_name', $user['last_name']) ?>" name="last_name" required class="form-input rounded-lg border-gray-300">
                </div>
                <div class="space-y-2 md:col-span-2">
                    <label class="text-sm font-medium dark:text-white">Username</label>
                    <input type="text" placeholder="Username" value="<?= set_value('username', $user['username']) ?>" name="username" required class="form-input rounded-lg border-gray-300">
                </div>
                <div class="space-y-2 md:col-span-2">
                    <label class="text-sm font-medium dark:text-white">Your Email</label>
                    <input type="email" id="email" readonly value="<?= $user['email'] ?>" class="form-input rounded-lg border-gray-300">
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium dark:text-white">Current Password</label>
                    <input type="password" name="password" id="password" value="" class="form-input rounded-lg border-gray-300">
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium dark:text-white">Confirm Password</label>
                    <input type="password" name="password_confirm" id="password_confirm" value="" class="form-input rounded-lg border-gray-300">
                </div>
                <div class="flex flex-wrap gap-3 mt-4">
                    <button type="submit" class="btn sm:col-span-2 w-full py-3.5 text-base bg-purple-600 border border-purple-600 rounded-md text-white transition-all duration-300 hover:bg-purple-700 hover:border-purple-700">
                        Update
                    </button>
                </div>
            </div>
        </form>
        
    </div>

    <!-- User Photo Section -->
    <!-- <form action="settings" method="POST" enctype="multipart/form-data">
    <div class="p-5 bg-white border rounded border-black/10 dark:bg-darklight dark:border-darkborder">
        <h2 class="mb-4 text-base font-semibold text-black capitalize dark:text-white">Your Photo</h2>
        
        <div class="grid grid-cols-1 gap-4">
            <div class="flex items-center gap-4">
                <img src="" class="w-16 h-16 rounded-full" alt="User Photo">
                <div>
                    <h5 class="text-lg font-bold dark:text-white"> # esc($user['first_name'] . ' ' . $user['last_name']) ?> </h5>
                    <p class="text-sm text-muted mt-0.5 dark:text-darkmuted"> # esc($user['profession']) ?></p>
                </div>
            </div>

            <div id="FileUpload" class="relative block w-full p-4 border-2 border-dashed rounded appearance-none cursor-pointer border-primary bg-light/20 dark:bg-white/5 dark:border-darkborder">
                <input type="file" name="profile_image" accept="image/*" class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer">
                <div class="flex flex-col items-center justify-center space-y-3 dark:text-darkmuted">
                    <span class="flex items-center justify-center rounded-full h-14 w-14 bg-light/50 dark:bg-white/10 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="inline-block w-5 h-5">
                            <path fill="currentColor" d="M4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19ZM13 9V16H11V9H6L12 3L18 9H13Z"></path>
                        </svg>
                    </span>
                    <p><span class="text-purple-600">Click to upload</span> or drag and drop</p>
                    <p>SVG, PNG, JPG, or GIF</p>
                    <p>(max, 100 X 100px)</p>
                </div>
            </div>
        </div>
        <button type="submit" class="mt-4 p-2 bg-blue-500 text-white rounded">Upload Photo</button>
    </div>
</form> -->




</div>





<?= $this->endSection() ?>