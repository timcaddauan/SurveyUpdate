<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-20 text-center">
        <h1 class="text-4xl font-bold">Thank You for Your Feedback!</h1>
        <p class="text-lg mt-4">Your responses have been recorded.</p>
        <p class="mt-2">We appreciate your time and effort in completing our survey.</p>
        <a href="<?= site_url('/QuestionPage') ?>" class="mt-4 block text-center px-4 py-2 bg-blue-500 text-white rounded">Take Another Survey</a>
    </div>

 
    <script>
        const openModalButton = document.getElementById('openModal');
        const closeModalButton = document.getElementById('closeModal');
        const modal = document.getElementById('modal');
        const modalContent = modal.querySelector('.modal-content');

        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('opacity-0', 'scale-95');
                modalContent.classList.add('opacity-100', 'scale-100');
            }, 10); // Delay for the transition
        });

        closeModalButton.addEventListener('click', () => {
            modalContent.classList.remove('opacity-100', 'scale-100');
            modalContent.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // Match the transition duration
        });
    </script>

</body>
</html>
