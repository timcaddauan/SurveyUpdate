           <!-- All javascirpt -->
            <!-- Alpine js -->
            <script src="<?= base_url('assets/js/alpine-collaspe.min.js') ?>"></script>
            <script src="<?= base_url('assets/js/alpine-persist.min.js') ?>"></script>
            <script src="<?= base_url('assets/js/alpine.min.js') ?>" defer></script>


            <!-- Custom js -->
            <script src="<?= base_url('assets/js/custom.js') ?>"></script>

            <!-- Datatable -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

            <!-- Datepicker -->
            <script src="<?= base_url('assets/js/flowbite.min.js') ?>"></script>
            <!-- Datatable -->
            <script>
                $(document).ready(function() {
                    $('#example2').DataTable({
                        "responsive": true,
                        "lengthChange": false,
                        "pageLength": 10,
                        "language": {
                            "emptyTable": "No data available in table"
                        }
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#example3').DataTable({
                        "responsive": true,
                        "lengthChange": false,
                        "pageLength": 10,
                        "language": {
                            "emptyTable": "No data available in table"
                        }
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#example4').DataTable({
                        "responsive": true,
                        "lengthChange": false,
                        "pageLength": 5,
                        "language": {
                            "emptyTable": "No data available in table"
                        }
                    });
                });
            </script>
            <!-- End Datatable -->



            <!-- notification script -->
            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('dropdown', () => ({
                        open: false, // For dropdown visibility
                        count: 0, // Notification count
                        notifications: [], // Array to store notifications
                        openModal: false, // Controls modal visibility
                        selectedNotification: null, // Stores selected notification for modal view

                        // Toggle dropdown visibility
                        toggle() {
                            this.open = !this.open;
                        },

                        // Fetch notifications from server
                        async fetchNotifications() {
                            try {
                                const response = await fetch('/get-notifications');
                                if (response.ok) {
                                    const data = await response.json();
                                    this.notifications = data; // Set notifications
                                    this.count = data.length; // Set notification count
                                } else {
                                    console.error('Failed to fetch notifications');
                                }
                            } catch (error) {
                                console.error('Error fetching notifications:', error);
                            }
                        },

                        // Fetch all notifications for the modal
                        async fetchAllNotifications() {
                            try {
                                const response = await fetch('/get-all-notifications');
                                if (response.ok) {
                                    const data = await response.json();
                                    this.notifications = data; // Set notifications
                                } else {
                                    console.error('Failed to fetch all notifications');
                                }
                            } catch (error) {
                                console.error('Error fetching all notifications:', error);
                            }
                        },

                        // Delete a notification (count set to 1)
                        async deleteNotification(notificationId) {
                            try {
                                const response = await fetch(`/mark-as-read/${notificationId}`, {
                                    method: 'POST',
                                });
                                // You can implement any server-side logic if needed for "delete"
                                // For now, we'll simply set the count to 1
                                this.count = 1;

                                // Remove the notification from the list
                                this.notifications = this.notifications.filter(
                                    (notification) => notification.id !== notificationId
                                );
                                this.count = this.notifications.length; // Update the count
                                console.log(`Notification ${notificationId} deleted`);
                            } catch (error) {
                                console.error('Error deleting notification:', error);
                            }
                        },

                        // Handle click on notification to open modal and remove it from the list
                        openNotificationModal(notification) {
                            // Set the selected notification to display in the modal
                            this.selectedNotification = notification;
                            // Show the modal
                            this.openModal = true;
                        },

                        // Close the modal
                        closeModal() {
                            this.openModal = false;
                            this.selectedNotification = null; // Clear selected notification
                        },

                        // Calculate the time ago from the notification's created_at timestamp
                        timeAgo(createdAt) {
                            const now = new Date();
                            const then = new Date(createdAt);
                            const diffInSeconds = Math.floor((now - then) / 1000);

                            if (diffInSeconds < 60) {
                                return `${diffInSeconds}s ago`; // Less than a minute
                            }

                            const diffInMinutes = Math.floor(diffInSeconds / 60);
                            if (diffInMinutes < 60) {
                                return `${diffInMinutes}m ago`; // Less than an hour
                            }

                            const diffInHours = Math.floor(diffInMinutes / 60);
                            if (diffInHours < 24) {
                                return `${diffInHours}h ago`; // Less than a day
                            }

                            const diffInDays = Math.floor(diffInHours / 24);
                            if (diffInDays < 30) {
                                return `${diffInDays}d ago`; // Less than a month
                            }

                            const diffInMonths = Math.floor(diffInDays / 30);
                            if (diffInMonths < 12) {
                                return `${diffInMonths}mo ago`; // Less than a year
                            }

                            const diffInYears = Math.floor(diffInMonths / 12);
                            return `${diffInYears}y ago`; // More than a year
                        },

                        // Initialize method to load notifications
                        init() {
                            this.fetchNotifications(); // Call to load notifications on page load
                        }
                    }));
                });
            </script>
