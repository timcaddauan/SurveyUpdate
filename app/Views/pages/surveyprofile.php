<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Validation Message -->
<?php if (isset($validation)): ?>
    <div class="flex items-center gap-2 p-3 border-l-4 border-red-500 bg-red-100 text-red-500" x-data="{ showElement: true }" x-show="showElement" aria-live="assertive" aria-atomic="true">
        <span> <?= $validation->listErrors() ?></span>
        <button type="button" x-on:click="showElement = false" class="transition-all duration-300 rotate-0 ltr:ml-auto rtl:mr-auto hover:opacity-80 hover:rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                <path fill="currentColor" d="M4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19ZM13 9V16H11V9H6L12 3L18 9H13Z"></path>
            </svg>
        </button>
    </div>
<?php endif; ?>

<!-- Success Message -->
<?php if (session()->get('success')): ?>
    <div class="flex items-center gap-2 p-3 border-l-4 border-green-500 bg-green-100 text-green-500" x-data="{ showElement: true }" x-show="showElement" aria-live="polite" aria-atomic="true">
        <span> <?= session()->get('success') ?></span>
        <button type="button" x-on:click="showElement = false" class="transition-all duration-300 rotate-0 ltr:ml-auto rtl:mr-auto hover:opacity-80 hover:rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                <path fill="currentColor" d="M4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19ZM13 9V16H11V9H6L12 3L18 9H13Z"></path>
            </svg>
        </button>
    </div>
<?php endif; ?>

<!-- Survey Result Section -->
<div class="flex flex-wrap gap-4">
    <a href="/pdf/<?= $respondents['id'] ?>" target="_blank" class="btn flex items-center gap-1.5 bg-success rounded-md text-gray-600 border border-gray-200 bg-white dark:bg-darkborder dark:text-white dark:border-darkborder transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85] hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 mx-auto">
            <path d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z" fill="currentColor"></path>
        </svg>
        Print PDF
    </a>
</div>

<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-lg dark:bg-darklight dark:border-darkborder">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6 text-center">Survey Result</h2>


    <!-- Respondent Details Section -->
    <div class=" p-5 rounded-lg shadow-sm mb-6 dark:bg-darklight">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Respondent Details</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Name</label>
                <input type="text" class="form-input rounded-lg border-gray-300 cursor-not-allowed" value="<?= $respondents['respondent_name']; ?>" disabled>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Gender</label>
                <input type="text" class="form-input rounded-lg border-gray-300 cursor-not-allowed" value="<?= $respondents['gender']; ?>" disabled>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Age</label>
                <input type="text" class="form-input rounded-lg border-gray-300 cursor-not-allowed" value="<?= $respondents['age']; ?>" disabled>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Region</label>
                <input type="text" class="form-input rounded-lg border-gray-300 cursor-not-allowed" value="<?= $respondents['region']; ?>" disabled>
            </div>

        </div>
    </div>

    <!-- Survey Questions Table Section -->
    <div class="overflow-hidden rounded-lg shadow-lg">
        <table class="min-w-full bg-white table-auto dark:bg-darklight">
            <thead>
                <tr>
                    <th class="py-3 px-4 text-left font-medium text-sm">Number</th>
                    <th class="py-3 px-4 text-left font-medium text-sm">Question</th>
                    <th class="py-3 px-4 text-left font-medium text-sm">Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($respondentquestions as $questions): ?>
                    <tr class="border-b border-gray-300 ">
                        <td class="py-2 px-4 text-sm"><?= esc($questions['question_id']) ?></td>
                        <td class="py-2 px-4 text-sm"><?= esc($questions['question']) ?></td>
                        <td class="py-2 px-4 text-sm"><?= esc($questions['response_value']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-lg dark:bg-darklight dark:border-darkborder">
    <div class="flex flex-col">
        <label class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Feedback</label>
        <input type="textarea" class="form-input text-center rounded-lg border-gray-300 cursor-not-allowed justify-center" value="<?= $respondents['service_feedback']; ?>" disabled>
    </div>
</div>

<!-- Alpine.js for interactivity -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

<?= $this->endSection() ?>