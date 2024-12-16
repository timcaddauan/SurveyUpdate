<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<?php if (empty($results)): ?>
    <p>No survey results found.</p>
<?php else: ?>
    <div x-cloak class="h-[calc(100vh-60px)] relative overflow-y-auto overflow-x-hidden p-4 space-y-4 detached-content">
        <?php if (session()->get('isLoggedIn')) : ?>
            <!-- Start All Card -->

            <div class="p-5 bg-white border rounded border-black/10 dark:bg-darklight dark:border-darkborder">
                <div class="overflow-auto">
                    <h2 class="mb-4 text-base font-semibold text-black dark:text-white/80 text-center">Survey Log</h2>
                    <div class="flex items-center justify-between gap-3">
                        <form method="get" action="<?= current_url() ?>" class="flex items-center">
                            <label for="limit" class="mr-2 dark:text-white">Show :</label>
                            <select class="form-select !w-20" name="limit" id="limit" onchange="this.form.submit()">
                                <option value="10" <?= (isset($limit) && $limit == 10) ? 'selected' : '' ?>>10</option>
                                <option value="15" <?= (isset($limit) && $limit == 15) ? 'selected' : '' ?>>15</option>
                                <option value="20" <?= (isset($limit) && $limit == 20) ? 'selected' : '' ?>>20</option>
                                <option value="all" <?= (isset($limit) && $limit == 'all') ? 'selected' : '' ?>>All</option>
                            </select>
                        </form>

                        <form method="get" action="<?= current_url() ?>" class="flex">
                            <input class="ltr:rounded-r-none rtl:rounded-l-none ltr:border-r-0 rtl:border-l-0 form-input" placeholder="Search..." name="searchInput" type="text" value="<?= esc($searchInput) ?>" />
                            <button class="btn bg-purple border border-purple ltr:rounded-l-none rtl:rounded-r-none ltr:rounded-r rtl:rounded-l text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]">
                                Search
                            </button>
                        </form>
                    </div>
                    <div class="flex flex-col gap-4 min-h-[calc(100vh-212px)]">
                        <div class="grid grid-cols-1 gap-4">
                            <div class="p-5 bg-white border rounded border-black/10 dark:bg-darklight dark:border-darkborder">
                                <h2 class="mb-4 text-base font-semibold text-black capitalize dark:text-white/80">Weekly Survey Responses</h2>
                                <div class="overflow-auto">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="ltr:text-left rtl:text-right">
                                                <th>#</th>
                                                <th>Q#1</th>
                                                <th>Q#2</th>
                                                <th>Q#3</th>
                                                <th>Q#4</th>
                                                <th>Q#5</th>
                                                <th>Q#6</th>
                                                <th>Q#7</th>
                                                <th>Q#8</th>
                                                <th>Q#9</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Submitted At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($results as $index => $result): ?>
                                                <tr class="text-muted small-row">
                                                    <td><?= $index + 1 ?></td>
                                                    <td><?= esc($result['satisfaction']) ?></td>
                                                    <td><?= esc($result['time_spent']) ?></td>
                                                    <td><?= esc($result['process_followed']) ?></td>
                                                    <td><?= esc($result['steps_ease']) ?></td>
                                                    <td><?= esc($result['info_access']) ?></td>
                                                    <td><?= esc($result['payment_value']) ?></td>
                                                    <td><?= esc($result['no_favoritism']) ?></td>
                                                    <td><?= esc($result['staff_helpfulness']) ?></td>
                                                    <td><?= esc($result['needed_info']) ?></td>
                                                    <td><?= esc($result['FullnameofRespondent']) ?></td>
                                                    <td><?= esc($result['department']) ?></td>
                                                    <td><?= esc($result['created_at']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text dark:text-white/80"><strong><?= count($results) ?> Total Number of Surveys</strong></div>
                    <ul class="inline-flex items-center gap-1">
                        <li><button type="button" @click.prevent="changePage(1)" class="flex justify-center px-3.5 py-2 rounded transition text-muted hover:text-purple border border-black/10 hover:border-purple dark:border-darkborder dark:text-darkmuted dark:hover:border-purple dark:hover:text-purple">First</button></li>
                        <li><button type="button" @click="changePage(currentPage - 1)" class="flex justify-center px-3.5 py-2 rounded transition text-muted hover:text-purple border border-black/10 hover:border-purple dark:border-darkborder dark:text-darkmuted dark:hover:border-purple dark:hover:text-purple">Prev</button></li>
                        <template x-for="item in pages">
                            <li><button @click="changePage(item)" type="button" class="flex justify-center px-3.5 py-2 rounded transition text-muted hover:text-purple border border-black/10 hover:border-purple dark:border-darkborder dark:text-darkmuted dark:hover:border-purple dark:hover:text-purple" x-bind:class="{ 'text-purple border-purple dark:text-purple dark:border-purple': currentPage === item }"><span x-text="item"></span></button></li>
                        </template>
                        <li><button @click="changePage(currentPage + 1)" type="button" class="flex justify-center px-3.5 py-2 rounded transition text-muted hover:text-purple border border-black/10 hover:border-purple dark:border-darkborder dark:text-darkmuted dark:hover:border-purple dark:hover:text-purple">Next</button></li>
                        <li><button @click.prevent="changePage(pagination.lastPage)" type="button" class="flex justify-center px-3.5 py-2 rounded transition text-muted hover:text-purple border border-black/10 hover:border-purple dark:border-darkborder dark:text-darkmuted dark:hover:border-purple dark:hover:text-purple">Last</button></li>
                    </ul>

                </div>
                <!-- End All Card -->
            </div>
        <?php else: ?>

        <?php endif; ?>
    </div>
    </div>
    </div>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>