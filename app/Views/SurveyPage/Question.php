<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Site Tiltle -->
    <title>CVMC - Client Satisfaction Measurement Form</title>

    <!-- DatePicker -->
    <link href="assets/css/flowbite.min.css" rel="stylesheet" />

      <!-- Style Css -->
      <link rel="stylesheet" href="assets/css/style.css">

      <style>
        /* Background Image Styling */
        body {
            position: relative;
            overflow: hidden;
            background-image: url('assets/images/cvmc12.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            transition: background-position 15s; /* Smooth transition */
        }

        /* Darken the Background with an Overlay */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Darken effect */
            z-index: -1; /* Ensures the overlay stays behind the content */
        }

        /* Ensure form container is not affected by the background */
        .form-container {
            position: relative;
            z-index: 10;
        }
    </style>
</head>

<body class="flex justify-center items-center h-screen bg-gray-100">

    <form action="/QuestionPage" method="post" class="w-full max-w-2xl p-10 bg-white border border-gray-300 rounded-lg shadow-md">
        <div id="survey-container" class="flex flex-col h-[500px] justify-between">
            <!-- Dynamic Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 mb-4">
                <div id="progress-bar" class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 0%;"> 0%</div>
            </div>

            <!-- Slide 1: Introduction -->
            <div class="slide hidden">
                <div class="flex flex-col mt-3">
                    <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Client Satisfaction Measurement Form</h1>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Sinusubaybayan ng Client Satisfaction Measurement (CSM) ang karanasan ng customer ng mga opisina ng gobyerno. Ang iyong feedback sa iyong kamakailang natapos na transaksyon ay makakatulong sa opisinang ito na makapagbigay ng mas mahusay na serbisyo. Ang personal na impormasyong ibinahagi ay pananatilihing kumpidensyal at palagi kang may opsyon na huwag sagutin ang survey na ito.</p>
                </div>
            </div>

            <!-- Slide 2: Client Type Selection -->
            <div class="slide hidden">
                <div class="flex flex-col mt-3">
                    <h2 class="text-2xl font-semibold mb-2">Uri ng kliyente:</h2>
                    <div class="options flex flex-col">
                        <label class="flex items-center mb-2">
                            <input type="radio" name="client_type" value="Citizen" required class="mr-2"> Citizen
                        </label>
                        <label class="flex items-center mb-2">
                            <input type="radio" name="client_type" value="Business" required class="mr-2"> Business
                        </label>
                        <label class="flex items-center mb-2">
                            <input type="radio" name="client_type" value="Government" required class="mr-2"> Government (Employee or another agency)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Age, Region, and Gender -->
            <div class="slide hidden">
                <div class="mb-6 flex items-center space-x-4">
                   
                    
                    <form class="max-w-xs mx-auto">
                        <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edad:</label>
                        <div class="relative flex items-center max-w-[8rem]">
                            <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                </svg>
                            </button>
                            <input type="text" id="quantity-input" name="age" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="18" value="18" required />
                            <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                            </button>
                        </div>         
                                  
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rehiyon ng Naninirahan:</label>
                        <select id="region" name="region" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a region</option>
                            <option value="1">Region 1</option>
                            <option value="2">Region 2</option>
                            <option value="3">Region 3</option>
                            <option value="4">Region 4</option>
                        </select>
                    </form>


                </div>
                <div class="mb-6 flex items-center space-x-4">
                    
                    <div class="mb-6 flex items-center space-x-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kasarian:</label>
                        <label class="flex items-center text-gray-700">
                            <input type="radio" name="gender" value="Male" class="mr-2"> Male
                        </label>
                        <label class="flex items-center text-gray-700">
                            <input type="radio" name="gender" value="Female" class="mr-2"> Female
                        </label>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="message" class="block mb-2 font-semibold text-gray-700 dark:text-white">Feedback...</label>
                    <textarea id="message" rows="4" name="service_feedback" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                </div>
            </div>

            <!-- Slide 4: Respondent Name and Department -->
            <div class="slide hidden">
                <div class="flex flex-col mt-3">
                    <h3 class="text-lg font-semibold mb-2">Type your Full Name (optional)</h3>
                    <input type="text" class="border border-gray-300 rounded p-2 mb-4" placeholder="Optional" value="Optional" name="respondent_name">
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Department Visited</h3>
                        <select class="border border-gray-300 rounded p-2" name="department_id" required>
                            <option value="">Select Option</option>
                            <?php if (!empty($depts)): ?>
                                <?php foreach ($depts as $dept): ?>
                                    <option value="<?= esc($dept['department_id']) ?>"><?= esc($dept['department']) ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">No departments available</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Dynamic Slide for Questions -->
            <?php foreach ($questions as $index => $question): ?>
                <div class="slide <?= $index === 0 ? 'block' : 'hidden' ?>">
                    <div class="flex flex-col mt-3">
                        <h2 class="text-2xl font-semibold mb-2">Question <?= $index + 1 ?></h2>
                        <p class="text-xl mb-4"><?= esc($question['question']) ?></p>
                        <input type="hidden" name="qs[<?= esc($question['id']) ?>][id]" value="<?= esc($question['id']) ?>">
                        <div class="options flex flex-col">
                            <label class="flex items-center mb-2">
                                <input type="radio" name="qs[<?= esc($question['id']) ?>][response]" value="Strongly Agree" required class="mr-2"> Strongly Agree
                            </label>
                            <label class="flex items-center mb-2">
                                <input type="radio" name="qs[<?= esc($question['id']) ?>][response]" value="Agree" required class="mr-2"> Agree
                            </label>
                            <label class="flex items-center mb-2">
                                <input type="radio" name="qs[<?= esc($question['id']) ?>][response]" value="Neither Agree nor Disagree" required class="mr-2"> Neither Agree nor Disagree
                            </label>
                            <label class="flex items-center mb-2">
                                <input type="radio" name="qs[<?= esc($question['id']) ?>][response]" value="Disagree" required class="mr-2"> Disagree
                            </label>
                            <label class="flex items-center mb-2">
                                <input type="radio" name="qs[<?= esc($question['id']) ?>][response]" value="Strongly Disagree" required class="mr-2"> Strongly Disagree
                            </label>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Navigation Buttons -->
            <div class="flex justify-between mt-4">
                <button id="prev-button" type="button" onclick="prevSlide()" class="text-black px-4 py-2 rounded">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
                    </svg>
                </button>
                <button id="next-button" type="button" onclick="nextSlide()" class="text-black px-4 py-2 rounded">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                    </svg>
                </button>
                <button type="submit" class="btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]" id="submit-button">Submit</button>
            </div>
        </div>
    </form>

    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded shadow-lg">
            <p id="modal-message"></p>
            <button onclick="closeModal()" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">Close</button>
        </div>
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const submitButton = document.getElementById('submit-button');
        const prevButton = document.getElementById('prev-button');
        const nextButton = document.getElementById('next-button');
        const progressBar = document.getElementById('progress-bar');

        // Function to update progress bar
        function updateProgressBar() {
            const totalSlides = slides.length;
            const progress = (currentSlide / (totalSlides - 1)) * 100;
            progressBar.style.width = `${progress}%`;
            progressBar.textContent = `${Math.round(progress)}%`;
        }

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('hidden', i !== index);
                slide.classList.toggle('block', i === index);
            });
            submitButton.style.display = index === slides.length - 1 ? 'inline' : 'none';
            prevButton.style.display = index === 0 ? 'none' : 'inline';
            nextButton.style.display = index === slides.length - 1 ? 'none' : 'inline';
            updateProgressBar(); // Update the progress bar whenever the slide changes
        }

        function prevSlide() {
            if (currentSlide > 0) {
                currentSlide--;
                showSlide(currentSlide);
            }
        }

        function nextSlide() {
            const currentSlideElement = slides[currentSlide];
            const selectedRadio = currentSlideElement.querySelector('input[type="radio"]:checked');
            const selectedDepartment = document.querySelector('select[name="department_id"]');

            if (currentSlide === 3 && !selectedDepartment.value) {
                showModal('Please select a department before proceeding.');
                return;
            }

            if (currentSlide > 3 && !selectedRadio) {
                showModal('Please select an answer before proceeding to the next question.');
                return;
            }

            if (currentSlide === 1 && !selectedRadio) {
                showModal('Please select an answer before proceeding to the next slide.');
                return;
            }

            if (currentSlide < slides.length - 1) {
                currentSlide++;
                showSlide(currentSlide);
            }
        }

        showSlide(currentSlide);

        function showModal(message) {
            const modal = document.getElementById('modal');
            const modalMessage = document.getElementById('modal-message');
            modalMessage.textContent = message;
            modal.classList.remove('hidden');

            setTimeout(() => {
                closeModal();
            }, 3000);
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
        }
    </script>

    <!-- Datepicker -->
    <script src="assets/js/flowbite.min.js"></script>

    <script>
        // Add mousemove event listener to move background
        document.addEventListener('mousemove', function(event) {
            const mouseX = event.clientX;
            const mouseY = event.clientY;
            const windowWidth = window.innerWidth;
            const windowHeight = window.innerHeight;

            // Calculate the background position based on mouse position
            const moveX = (mouseX / windowWidth) * 100;
            const moveY = (mouseY / windowHeight) * 100;

            // Apply the calculated background position
            document.body.style.backgroundPosition = `${moveX}% ${moveY}%`;
        });
    </script>

</body>

</html>