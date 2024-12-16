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
            <li class="text-xl font-semibold text-black dark:text-white">All Notifications</li>
        </ul>
    </nav>
</div>



<!-- Start Content -->
<!-- Start All Card -->


<?php if (empty($notifications)): ?>
    <p class="text-xl text-gray-600">No notifications available.</p>
<?php else: ?>
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg dark:bg-darklight dark:border-darkborder border-black/10">
        <table id="notificationsTable" class="display min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left text-white">#</th> <!-- This column is for row count -->
                    <th class="px-4 py-2 text-left text-white">Message</th>
                    <th class="px-4 py-2 text-left text-white">Timestamp</th>
                    <th class="px-4 py-2 text-left text-white">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?> <!-- Start counting from 1 -->
                <?php foreach ($notifications as $notification): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <!-- Display row count -->
                        <td class="px-4 py-2"><?php echo esc($counter++); ?></td> <!-- Display count -->
                        <td class="px-4 py-2"><?php echo esc($notification['message']); ?></td>
                        <td class="px-4 py-2"><?php echo esc($notification['created_at']); ?></td>
                        <td class="px-4 py-2">
                            <?php if ($notification['is_read']): ?>
                                <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-sm">Read</span>
                            <?php else: ?>
                                <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-sm">Unread</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
</div>

<script>
    // Initialize DataTables for the notification table
    $(document).ready(function() {
        $('#notificationsTable').DataTable({
            // Optionally, customize DataTables settings here
            paging: true, // Enable pagination
            searching: true, // Enable searching
            ordering: true, // Enable sorting
            order: [
                [2, 'desc']
            ] // Order by 'Timestamp' column (index 2) by default, descending
        });
    });
</script>






<?= $this->endSection() ?>