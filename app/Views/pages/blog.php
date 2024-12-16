<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="flex items-center gap-2 p-3 text-white rounded bg-success" x-show="showElement" x-data="{ showElement: true }">
        <?= session()->getFlashdata('success') ?>
        <button type="button" x-on:click="showElement = false" class="transition-all duration-300 rotate-0 ltr:ml-auto rtl:mr-auto hover:opacity-80 hover:rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
            </svg>
        </button>
    </div>
<?php endif; ?>

<?php
$uri = service('uri');
?>

<?php if (session()->get('isLoggedIn')) : ?>
    <!-- Start Breadcrumb -->
    <div>

        <!-- <nav class="w-full">
        <ul class="space-y-2 detached-breadcrumb">
            <li class="text-lg font-semibold text-black dark:text-white">Dashboard</li>
        </ul>
    </nav> -->
    </div>
    <!-- End Breadcrumb -->

    <!-- Start All Card -->
    <div class="flex flex-col gap-4 min-h-[calc(100vh-212px)]">

        <div class="grid grid-cols-1 gap-4 md:grid-cols-1">

            <!-- Response Monitoring -->
            <div class="p-5 bg-white shadow-md shadow-black/50 border rounded border-black/10 dark:bg-darklight dark:border-darkborder" x-cloak>
            <div><span class="bg-white shadow-md shadow-black/50 border text-black dark:bg-darklight dark:border-darkborder dark:text-white text-[10px] px-2 py-1 text-xl rounded-lg "><span class="h-1.5 w-1.5 relative -top-px rounded-full bg-gray-500 inline-block ltr:mr-1 rtl:ml-1 "></span> Response Monitoring</span></div>

                <div x-cloak x-data="{ activeDefTab: 'all', timeFilter: 'all' }">
                    <!-- Display Selected Date Range -->
                    <div class="text-sm mb-4 text-gray-600 dark:text-gray-400 mt-4">
                        <span class="font-semibold">Selected Date Range: </span>
                        <!-- Display the start and end dates dynamically -->
                        <?= esc($startDate) ?> to <?= esc($endDate) ?>
                    </div>
                    <!-- Datepicker Form -->
                    <form class="space-y-4" action="<?= base_url('/') ?>" method="get">
                        <!-- Datepicker for Start and End Date -->
                        <div id="date-range-picker" x-show="timeFilter !== 'daily'" date-rangepicker class="flex items-center">
                            <div class="space-y-2">
                                <input id="datepicker-range-start" name="start" type="text"
                                    class="form-input rounded-lg border-gray-300"
                                    placeholder="<?= esc($startDate) ?>">
                            </div>

                            <span class="mx-4 text-gray-500">to</span>

                            <div class="space-y-2">
                                <input id="datepicker-range-end" name="end" type="text"
                                    class="form-input rounded-lg border-gray-300"
                                    placeholder="<?= esc($endDate) ?>">
                            </div>

                            <div class="space-y-2 ms-8">
                                <input type="hidden" name="timeFilter" :value="timeFilter">
                                <!-- Submit Button -->
                                <form class="space-y-4">
                                    <button type="submit" x-show="timeFilter !== 'daily'" class="btn flex items-center gap-1.5 bg-success  rounded-md text-gray-600 border border-gray-200 bg-white dark:bg-darklight dark:border-darkborder transition-all duration-300 hover:bg-info/[0.85] hover:border-success/[0.85] hover:text-white shadow-md shadow-black/50" x-transition>Apply Filter</button>
                                </form>
                            </div>
                        </div>
                    </form>


                    <!-- Tab Content -->
                    <div class="tab-content mt-3">
                        <div x-cloak x-show="timeFilter === 'all'">
                            <table  id="example" class="min-w-[640px] w-full">
                                <thead>
                                    <tr class="ltr:text-left rtl:text-right">
                                        <th >Department</th>
                                        <th class="items-center justify-center text-success">Strongly Agree</th>
                                        <th class="items-center justify-center text-info">Agree</th>
                                        <th class="items-center justify-center">Neither</th>
                                        <th class="items-center justify-center text-warning">Disagree</th>
                                        <th class="items-center justify-center text-danger">Strongly Disagree</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($department as $countdept): ?>
                                        <tr class="text-muted">
                                            <td><?= esc($countdept['department']) ?></td>
                                            <td><?= esc($countdept['strongly_agree_count']) ?></td>
                                            <td><?= esc($countdept['agree_count']) ?></td>
                                            <td><?= esc($countdept['neither_agree_nor_disagree']) ?></td>
                                            <td><?= esc($countdept['disagree_count']) ?></td>
                                            <td><?= esc($countdept['strongly_disagree_count']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Response Monitoring -->

            <!-- Show percentage per Question-->
            <div class="p-5 bg-white rounded dark:bg-darklight shadow-md shadow-black/50" x-cloak>
                <!-- ComboBox for selecting question ID -->
                <div class="mb-4 ">
                <div><span class="bg-white shadow-md shadow-black/50 border text-black dark:bg-darklight dark:border-darkborder dark:text-white text-[10px] px-2 py-1 text-xl rounded-lg "><span class="h-1.5 w-1.5 relative -top-px rounded-full bg-gray-500 inline-block ltr:mr-1 rtl:ml-1"></span> Show Percentage per Question</span></div>
                    <select class="btn flex items-center gap-1.5 bg-success mt-4 shadow-md shadow-black/50 rounded-md dark:bg-darklight dark:border-darkborder text-gray-600 border border-gray-200 bg-white transition-all duration-300 hover:bg-info/[0.85] hover:border-success/[0.85] hover:text-white" @click="dropdown = !dropdown" @keydown.escape="dropdown = false" id="questionSelect">
                        <option class="dark:text-white " value="1">Question 1</option>
                        <option class="dark:text-white" value="2">Question 2</option>
                        <option class="dark:text-white" value="3">Question 3</option>
                        <option class="dark:text-white" value="4">Question 4</option>
                        <option class="dark:text-white" value="5">Question 5</option>
                        <option class="dark:text-white" value="6">Question 6</option>
                        <option class="dark:text-white" value="7">Question 7</option>
                        <option class="dark:text-white" value="8">Question 8</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>

                <h2 id="selectedQuestion" class="mb-4 text-base font-semibold text-md text-black capitalize dark:text-white/80">SQD0 to SQD8: Question #: 1</h2>
                <div class="overflow-auto question-table" id="table1">
                    <table style="width:100%; table-layout: fixed;; table-layout: fixed;">
                        <thead>
                            <tr class="ltr:text-left rtl:text-right">
                                <th style="width:14.2857%;">Department</th>
                                <th style="width:14.2857%;">Respondents</th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;">Strongly Agree</th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;">Agree</th>
                                <th class="items-center justify-center" style="width:14.2857%;">Neither</th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;">Disagree</th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;">Strongly Disagree</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perQuestion1 as $countdept): ?>
                                <tr class="text-muted small-row ">
                                    <td style="width:14.2857%;"><?= esc($countdept['department']) ?></td>
                                    <td style="width:14.2857%;"><?= esc($countdept['total_responses']) ?></td>
                                    <td style="width:14.2857%;">
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-success bg-color" style="width: <?= number_format($countdept['strongly_agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:14.2857%;">
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-info" style="width: <?= number_format($countdept['agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:14.2857%;">
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 bg-black rounded-full" style="width: <?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:14.2857%;">
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-warning" style="width: <?= number_format($countdept['disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:14.2857%;">
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-danger" style="width: <?= number_format($countdept['strongly_disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="dark:text-white" style="width:14.2857%;"></th>
                                <th class="dark:text-white" style="width:14.2857%;"></th>
                                <th class="dark:text-white" style="width:14.2857%;"></th>
                                <th class="dark:text-white" style="width:14.2857%;"></th>
                                <th class="dark:text-white" style="width:14.2857%;"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>



                <!-- Table for Question #2 -->
                <div class="overflow-auto question-table" id="table2">
                    <table style="width:100%; table-layout: fixed;">
                        <thead>
                            <tr class="ltr:text-left rtl:text-right">
                                <th>Department</th>
                                <th>Respondents</th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;">Strongly Agree</th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;">Agree</th>
                                <th class="items-center justify-center " style="width:14.2857%;">Neither</th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;">Disagree</th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;">Strongly Disagree</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perQuestion2 as $countdept): ?>
                                <tr class="text-muted small-row">
                                    <td><?= esc($countdept['department']) ?></td>
                                    <td><?= esc($countdept['total_responses']) ?></td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-success" style="width: <?= number_format($countdept['strongly_agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-info" style="width: <?= number_format($countdept['agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 bg-black rounded-full" style="width: <?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-warning" style="width: <?= number_format($countdept['disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-danger" style="width: <?= number_format($countdept['strongly_disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table for Question #3 -->
                <div class="overflow-auto question-table" id="table3">
                    <table style="width:100%; table-layout: fixed;; table-layout: fixed;">
                        <thead>
                            <tr class="ltr:text-left rtl:text-right">
                                <th>Department</th>
                                <th>Respondents</th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;">Strongly Agree</th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;">Agree</th>
                                <th class="items-center justify-center " style="width:14.2857%;">Neither</th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;">Disagree</th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;">Strongly Disagree</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perQuestion3 as $countdept): ?>
                                <tr class="text-muted small-row">
                                    <td><?= esc($countdept['department']) ?></td>
                                    <td><?= esc($countdept['total_responses']) ?></td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-success" style="width: <?= number_format($countdept['strongly_agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-4/12 h-4 rounded-full bg-info" style="width: <?= number_format($countdept['agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-6/12 h-4 bg-black rounded-full" style="width: <?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-8/12 h-4 rounded-full bg-warning" style="width: <?= number_format($countdept['disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-7/12 h-4 rounded-full bg-danger" style="width: <?= number_format($countdept['strongly_disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table for Question #4 -->
                <div class="overflow-auto question-table" id="table4">
                    <table style="width:100%; table-layout: fixed;">
                        <thead>
                            <tr class="ltr:text-left rtl:text-right">
                                <th>Department</th>
                                <th>Respondents</th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;">Strongly Agree</th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;">Agree</th>
                                <th class="items-center justify-center " style="width:14.2857%;">Neither</th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;">Disagree</th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;">Strongly Disagree</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perQuestion4 as $countdept): ?>
                                <tr class="text-muted small-row">
                                    <td><?= esc($countdept['department']) ?></td>
                                    <td><?= esc($countdept['total_responses']) ?></td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-success" style="width: <?= number_format($countdept['strongly_agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-4/12 h-4 rounded-full bg-info" style="width: <?= number_format($countdept['agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-6/12 h-4 bg-black rounded-full" style="width: <?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-8/12 h-4 rounded-full bg-warning" style="width: <?= number_format($countdept['disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-7/12 h-4 rounded-full bg-danger" style="width: <?= number_format($countdept['strongly_disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table for Question #5 -->
                <div class="overflow-auto question-table" id="table5">
                    <table style="width:100%; table-layout: fixed;">
                        <thead>
                            <tr class="ltr:text-left rtl:text-right">
                                <th>Department</th>
                                <th>Respondents</th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;">Strongly Agree</th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;">Agree</th>
                                <th class="items-center justify-center " style="width:14.2857%;">Neither</th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;">Disagree</th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;">Strongly Disagree</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perQuestion5 as $countdept): ?>
                                <tr class="text-muted small-row">
                                    <td><?= esc($countdept['department']) ?></td>
                                    <td><?= esc($countdept['total_responses']) ?></td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-success" style="width: <?= number_format($countdept['strongly_agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-4/12 h-4 rounded-full bg-info" style="width: <?= number_format($countdept['agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-6/12 h-4 bg-black rounded-full" style="width: <?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-8/12 h-4 rounded-full bg-warning" style="width: <?= number_format($countdept['disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-7/12 h-4 rounded-full bg-danger" style="width: <?= number_format($countdept['strongly_disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table for Question #6 -->
                <div class="overflow-auto question-table" id="table6">
                    <table style="width:100%; table-layout: fixed;">
                        <thead>
                            <tr class="ltr:text-left rtl:text-right">
                                <th>Department</th>
                                <th>Respondents</th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;">Strongly Agree</th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;">Agree</th>
                                <th class="items-center justify-center " style="width:14.2857%;">Neither</th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;">Disagree</th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;">Strongly Disagree</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perQuestion6 as $countdept): ?>
                                <tr class="text-muted small-row">
                                    <td><?= esc($countdept['department']) ?></td>
                                    <td><?= esc($countdept['total_responses']) ?></td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-success" style="width: <?= number_format($countdept['strongly_agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-4/12 h-4 rounded-full bg-info" style="width: <?= number_format($countdept['agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-6/12 h-4 bg-black rounded-full" style="width: <?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-8/12 h-4 rounded-full bg-warning" style="width: <?= number_format($countdept['disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-7/12 h-4 rounded-full bg-danger" style="width: <?= number_format($countdept['strongly_disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table for Question #7 -->
                <div class="overflow-auto question-table" id="table7">
                    <table style="width:100%; table-layout: fixed;">
                        <thead>
                            <tr class="ltr:text-left rtl:text-right">
                                <th>Department</th>
                                <th>Respondents</th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;">Strongly Agree</th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;">Agree</th>
                                <th class="items-center justify-center " style="width:14.2857%;">Neither</th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;">Disagree</th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;">Strongly Disagree</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perQuestion7 as $countdept): ?>
                                <tr class="text-muted small-row">
                                    <td><?= esc($countdept['department']) ?></td>
                                    <td><?= esc($countdept['total_responses']) ?></td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-success" style="width: <?= number_format($countdept['strongly_agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-4/12 h-4 rounded-full bg-info" style="width: <?= number_format($countdept['agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-6/12 h-4 bg-black rounded-full" style="width: <?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-8/12 h-4 rounded-full bg-warning" style="width: <?= number_format($countdept['disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-7/12 h-4 rounded-full bg-danger" style="width: <?= number_format($countdept['strongly_disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table for Question #8 -->
                <div class="overflow-auto question-table" id="table8">
                    <table style="width:100%; table-layout: fixed;">
                        <thead>
                            <tr class="ltr:text-left rtl:text-right">
                                <th>Department</th>
                                <th>Respondents</th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;">Strongly Agree</th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;">Agree</th>
                                <th class="items-center justify-center " style="width:14.2857%;">Neither</th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;">Disagree</th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;">Strongly Disagree</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perQuestion8 as $countdept): ?>
                                <tr class="text-muted small-row">
                                    <td><?= esc($countdept['department']) ?></td>
                                    <td><?= esc($countdept['total_responses']) ?></td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-5/12 h-4 rounded-full bg-success" style="width: <?= number_format($countdept['strongly_agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-4/12 h-4 rounded-full bg-info" style="width: <?= number_format($countdept['agree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['agree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-6/12 h-4 bg-black rounded-full" style="width: <?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['neither_agree_nor_disagree'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-8/12 h-4 rounded-full bg-warning" style="width: <?= number_format($countdept['disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-full h-4 rounded-full bg-black/10 dark:bg-white/10">
                                            <div class="w-7/12 h-4 rounded-full bg-danger" style="width: <?= number_format($countdept['strongly_disagree_count'], 2) ?>%;">
                                                <p class="text-[11px] text-Dark dark:text-white align-middle"><?= number_format($countdept['strongly_disagree_count'], 2) ?>%</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="items-center justify-center text-success" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-info" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-warning" style="width:14.2857%;"></th>
                                <th class="items-center justify-center text-danger" style="width:14.2857%;"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <script>
                    const questionSelect = document.getElementById('questionSelect');
                    const selectedQuestion = document.getElementById('selectedQuestion');
                    const tables = document.querySelectorAll('.question-table');

                    // Function to show the selected table
                    function showTable(selectedValue) {
                        tables.forEach((table, index) => {
                            table.classList.toggle('hidden', index + 1 !== parseInt(selectedValue));
                        });
                    }

                    questionSelect.addEventListener('change', function() {
                        selectedQuestion.textContent = `Question #: ${this.value}`;
                        showTable(this.value);
                    });

                    // Show the first table by default
                    showTable(questionSelect.value);
                </script>

                <style>
                    .hidden {
                        display: none;
                    }
                </style>
            </div>
            <!-- End percentage per Question-->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Response by Question -->
                <div class="p-5 bg-white shadow-md shadow-black/50 border rounded dark:bg-darklight dark:border-darkborder border-black/10" x-cloak>
                <div><span class="bg-white shadow-md shadow-black/50 border text-black dark:bg-darklight dark:border-darkborder dark:text-white text-[10px] px-2 py-1 text-xl rounded-lg "><span class="h-1.5 w-1.5 relative -top-px rounded-full bg-gray-500 inline-block ltr:mr-1 rtl:ml-1"></span> Question Response Count</span></div>
                    <div class="flex items-center justify-between gap-4 mb-4 mt-4">
                        <div class="overflow-auto">
                            <table id="example4" style="width:100%">
                                <thead>
                                    <tr class="ltr:text-left rtl:text-right">
                                        <th>Question Number</th>
                                        <th>Response</th>
                                        <th class="text-success text-center">Total Responses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($respondent as $res): ?>
                                        <tr class="text-muted small-row hover:bg-gray-100 dark:hover:bg-darkhover">
                                            <td>Question #: <?= esc($res['question_id']) ?></td>
                                            <td><?= esc($res['response_value']) ?></td>
                                            <td class="text-center"><?= esc($res['response_count']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Response by Question -->

                <!-- Top 8 Recent Respondents -->
                <div class="p-5 bg-white shadow-md shadow-black/50 border rounded dark:bg-darklight dark:border-darkborder border-black/10" x-cloak>
                <div><span class="bg-white shadow-md shadow-black/50 border text-black dark:bg-darklight dark:border-darkborder dark:text-white text-[10px] px-2 py-1 text-xl rounded-lg "><span class="h-1.5 w-1.5 relative -top-px rounded-full bg-gray-500 inline-block ltr:mr-1 rtl:ml-1"></span> Recent Respondents</span></div>
                    <div class="flex items-center justify-between gap-4 mb-4 mt-4">
                        <div class="overflow-auto">
                            <table class="min-w-full w-full table-auto">
                                <thead>
                                    <tr>
                                        <th class="text-left p-2">Respondent</th>
                                        <th class="text-left p-2">Department</th>
                                        <th class="text-left p-2">Date Responded</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (array_slice($RecentRespondent, 0, 5) as $row): ?>
                                        <tr>
                                            <td class="p-2">
                                                <div class="flex items-center">
                                                    <img src="assets/images/avatar-1.png" class="flex-none object-cover w-12 h-12 rounded-full" style="margin-right:10px;" alt="avatar">
                                                    <strong><?= esc($row['respondent_name']) ?></strong>
                                                </div>
                                            </td>
                                            <td class="p-2"><strong><?= esc($row['department']) ?></strong></td>
                                            <td class="p-2"><strong><?= date('F j, Y, g:i a', strtotime($row['created_at'] . ' +8 hours')) ?></strong></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Top 8 Recent Respondents -->
            </div>
        <?php else: ?>

        <?php endif; ?>

        </div>
    </div>
    <!-- End All Card -->







    <?= $this->endSection() ?>