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

    <!-- User Photo Section -->
    <div class="w-full max-w-2xl p-10 bg-white border border-gray-300 rounded-lg shadow-md">
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-6">Survey Results</h1>

        <!-- Introduction/Basic Information -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-2">Survey Details</h2>

            <div class="text-lg font-normal text-gray-500 dark:text-gray-400">
                <?php if (!empty($notifications)): ?>
                    <?php foreach ($notifications as $notification): ?>
                        <p><strong>Name:</strong></p>                                    
                        <label name="respondent_name"><?= esc($notification['respondent_name']) ?></label>
                        
                        <p><strong>Age:</strong> <?= esc($notification['age']) ?></p>
                        <p><strong>Region:</strong> <?= esc($notification['region']) ?></p>
                       
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No notifications available for this respondent.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Survey Questions and Responses -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Survey Questions</h2>

            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-2"></h3>
                <p class="text-lg text-gray-500"></p>
            </div>

        </div>

        <!-- Summary of Responses -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Summary</h2>
            <p class="text-lg font-normal text-gray-500 dark:text-gray-400">
                Based on your responses, here’s a summary of your satisfaction with the service received:
            </p>

            <ul class="list-disc pl-5">
                <li class="mb-2">
                    <strong>Question :</strong><br>
                </li>
            </ul>
        </div>

        <!-- Additional Notes or Final Message -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Thank You</h2>
            <p class="text-lg font-normal text-gray-500 dark:text-gray-400">
                Your feedback is valuable to us. If you have additional comments or suggestions, feel free to contact us. We appreciate your time!
            </p>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
