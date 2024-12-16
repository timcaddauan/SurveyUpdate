<!DOCTYPE html>
<html lang="en" dir="ltr" x-data="{ direction: 'ltr' }" x-bind:dir="direction">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Tailwind CSS Admin & Dashboard Template" />
    <meta name="author" content="SRBThemes" />

    <!-- Site Tiltle -->
    <title>Sliced - Tailwind CSS Admin & Dashboard Template</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Style Css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body x-data="main" class="relative overflow-x-hidden text-sm antialiased font-normal text-black font-cerebri dark:text-white vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '',$store.app.mode]">




    <div class="flex flex-col gap-4 min-h-[calc(100vh-212px)]">
        <div class="grid grid-cols-1 gap-4">
            <div class="p-5 bg-white border rounded border-black/10 dark:bg-darklight dark:border-darkborder">
                <h2>Survey Responses</h2>
                <div class="overflow-auto">
                <table class="min-w-[640px] w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Satisfaction</th>
                                <th>Time Spent</th>
                                <th>Process Followed</th>
                                <th>Steps Ease</th>
                                <th>Info Access</th>
                                <th>Payment Value</th>
                                <th>No Favoritism</th>
                                <th>Staff Helpfulness</th>
                                <th>Needed Info</th>

                                <th>Department</th>
                                <th>Full Name of Respondent</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($responses) && is_array($responses)): ?>
                                <?php foreach ($responses as $index => $response): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= esc($response['satisfaction']) ?></td>
                                        <td><?= esc($response['time_spent']) ?></td>
                                        <td><?= esc($response['process_followed']) ?></td>
                                        <td><?= esc($response['steps_ease']) ?></td>
                                        <td><?= esc($response['info_access']) ?></td>
                                        <td><?= esc($response['payment_value']) ?></td>
                                        <td><?= esc($response['no_favoritism']) ?></td>
                                        <td><?= esc($response['staff_helpfulness']) ?></td>
                                        <td><?= esc($response['needed_info']) ?></td>

                                        <td><?= esc($response['department']) ?></td>
                                        <td><?= esc($response['FullnameofRespondent']) ?></td>
                                        <td><?= esc($response['created_at']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="14" class="text-center">No survey responses found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- All javascirpt -->
    <!-- Alpine js -->
    <script src="assets/js/alpine-collaspe.min.js"></script>
    <script src="assets/js/alpine-persist.min.js"></script>
    <script src="assets/js/alpine.min.js" defer></script>

    <!-- Custom js -->
    <script src="assets/js/custom.js"></script>

      <!-- Datatables Js -->
      <script src="assets/js/datatable.js"></script>
    <script src="assets/js/data-search.js"></script>

</body>

</html>