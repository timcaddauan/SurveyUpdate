<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php if(session()->getFlashdata('success')) :?>
<div class="flex items-center gap-2 p-3 text-white rounded bg-success" x-show="showElement" x-data="{ showElement: true }">
<?= session()->getFlashdata('success') ?>
<button type="button" x-on:click="showElement = false" class="transition-all duration-300 rotate-0 ltr:ml-auto rtl:mr-auto hover:opacity-80 hover:rotate-180">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
        <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
    </svg>
</button>
</div>
<?php endif; ?>


<div class='container'>
<div class="flex flex-col gap-4 min-h-[calc(100vh-212px)]">
                        <div class="grid grid-cols-1 gap-4">
                            <div class="p-5 bg-white border rounded border-black/10 dark:bg-darklight dark:border-darkborder">
                                <h2 class="mb-4 text-base font-semibold text-black capitalize dark:text-white/80">Users Table</h2>
                                <div class="space-y-4 overflow-auto" x-data="dataTable()" x-init="
                                initData()
                                $watch('searchInput', value => {
                                search(value)
                                })">
                                    <div class="flex items-center justify-between gap-3">
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <p>Show</p>
                                            <select class="form-select !w-20" x-model="view" @change="changeView()">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                        <div>
                                            <input x-model="searchInput" type="text" class="form-input" placeholder="Search...">
                                        </div>
                                    </div>
                                    <div class="overflow-auto">
                                        <table class="min-w-[640px] w-full">
                                            <thead>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Username</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('Username', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'Username' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('Username', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'Username' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p class="">Firstname</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('firstname', 'asc')" fill="none" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'firstname' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('firstname', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'firstname' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Lastname</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('lastname', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'lastname' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('lastname', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'lastname' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Password</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('password', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'password' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('password', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'password' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Email</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('email', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'email' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('email', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'email' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Profession</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('profession', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'profession' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('profession', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'profession' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Location</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('location', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'location' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('location', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'location' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Website</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('website', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'website' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('website', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'website' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Phone</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('phone', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'phone' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('phone', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'phone' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Roletype</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('roletype', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'roletype' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('roletype', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'roletype' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th width="10%">
                                                    <div class="flex items-center justify-between gap-2">
                                                        <p>Action</p>
                                                        <div class="flex flex-col">
                                                            <svg @click="sort('action', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'action' && sorted.rule === 'asc'}">
                                                                <path d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                            <svg @click="sort('action', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="w-3 h-3 cursor-pointer fill-current text-muted" x-bind:class="{'!text-black': sorted.field === 'action' && sorted.rule === 'desc'}">
                                                                <path d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </th>
                                               
                                            </thead>
                                            <tbody>
                                                                                             
                                               
                                                <?php foreach ($users as $user) : ?>   
                                                    <tr >
                                                    <td>
                                                            <?= $user['username'] ; ?>
                                                        </td>
                                                        <td>
                                                            <?= $user['first_name'] ; ?>
                                                        </td>
                                                        <td>
                                                           <?= $user['last_name'] ; ?>
                                                        </td>
                                                        <td>
                                                           <?= $user['password'] ; ?>
                                                        </td>
                                                        <td>
                                                           <?= $user['email'] ; ?>
                                                        </td>
                                                        <td>
                                                            <?= $user['profession'] ; ?>
                                                        </td>
                                                        <td>
                                                            <?= $user['location'] ; ?>
                                                        </td>
                                                        <td>
                                                            <?= $user['website'] ; ?>
                                                        </td>
                                                        <td>
                                                            <?= $user['phone'] ; ?>
                                                        </td>
                                                        <td>
                                                            <?= $user['roletype'] ; ?>
                                                        </td>
                                                        <td>
                                                        
                                                        
                                                        <button class="text-danger ltr:ml-2 rtl:mr-2" x-on:click="showElement = false">
                                                        <a href="/pages/delete/<?= $user['id'] ; ?>" class="btn btn-sm btn-warning">
                                                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="inline-block w-5 h-5">
                                                            <path fill="currentColor" d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path>
                                                            </svg> 
                                                            </a> 
                                                        </button>
                                                        
                                                    </td>
                                                    </tr>
                                                    <?php endforeach; ?>                                                                                                 
                                              
                                                  
                                                <tr>                                                
                                                    <td colspan="5" class="py-3 text-center text-black">No matching records found.</td>                                                
                                                </tr>
                                                
                                          
                                            </tbody>
                                        </table>
                                    </div>
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
                            </div>
                        </div>
                    </div>
</div>



<?= $this->endSection() ?>
