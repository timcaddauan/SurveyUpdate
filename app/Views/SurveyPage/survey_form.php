<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="description" content="Premium Tailwind CSS Admin & Dashboard Template" />


    <!-- Site Tiltle -->
    <title>Sliced - Tailwind CSS Admin & Dashboard Template</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="assets/images/cvmclogo.png">

    <!-- Style Css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-size: 2rem;
        }

        .container {
            border: 2px solid #007bff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: none;
            /* Hide all slides initially */
        }

        .active {
            display: block;
            /* Show the active slide */
        }

        .container:hover {
            transform: scale(1.02);
        }

        h1 {
            margin-bottom: 2rem;
        }

        label {
            font-weight: bold;
        }

        .form-check {
            margin: 1rem 0;
        }

        .navigation {
            margin-top: 2rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
            /* Adjust the spacing as needed */
        }

        .h5 {
            font-size: 2.25rem;
            /* Size for the label */
            margin-bottom: 0.5rem;
            /* Space between label and options */
        }

        .d-flex {
            display: flex;
        }

        .flex-column {
            flex-direction: column;
        }
    </style>
</head>

<body x-data="main" class="relative overflow-x-hidden text-sm antialiased font-normal text-black font-cerebri dark:text-white vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '',$store.app.mode]">

<form action="<?= site_url('survey/submit') ?>" method="post">
<div class="container p-5 my-5 active" id="slide1">           
<div class="mb-4">            
    <div class="flex items-center justify-between px-5 py-3 bg-white border-b border-black/10 dark:bg-darklight dark:border-darkborder">
        <h5 class="text-lg font-semibold dark:text-white">Good Day!</h5>
        <!-- Close button -->
    </div>
    <div class="p-5 space-y-4">
        <div class="p-5 bg-white border rounded border-black/10 dark:bg-darklight dark:border-darkborder">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="space-y-2 md:col-span-2">
                    <h2 class="mb-4 text-base font-semibold text-black capitalize dark:text-white/80">Type your Full Name (optional)</h2>
                    <input type="text" class="form-input" placeholder="Full Name" value="(Optional)" name="FullnameofRespondent">
                </div>
                <div class="space-y-2 md:col-span-2">
                    <h2 class="mb-4 text-base font-semibold text-black capitalize dark:text-white/80">Department Visited</h2>
                    <select class="form-select" name="department_id" required>
                        <option value="">Select Option</option>
                        <?php foreach ($departments as $dept): ?>
                            <option value="<?= esc($dept['department_id']) ?>"><?= esc($dept['department']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div> 
</div>

            <div class="navigation">              
                <button class="btn btn-primary" onclick="nextSlide(2)">Next</button>
            </div>
        </div>
        <div class="container p-5 my-5 active" id="slide2">
            <h1>Customer Satisfaction Survey</h1>
            <div class="mb-4">
                <label class="h5">1. Ako ay kuntento sa serbisyo na natanggap?</label>
                <div class="d-flex flex-column mt-3">
                    <div class="form-check">
                        <input type="radio" name="satisfaction" value="Strongly_Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="satisfaction" value="Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="satisfaction" value="Neither_agree_nor_dissatisfied" class="form-radio text-success" required>
                        <label class="form-check-label">Neither agree nor dissatisfied</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="satisfaction" value="Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="satisfaction" value="Strongly_Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Disagree</label>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <button class="btn btn-secondary" onclick="prevSlide(1)">Previous</button>
                <button class="btn btn-primary" onclick="nextSlide(3)">Next</button>
            </div>
        </div>

        <div class="container p-5 my-5" id="slide3">
            <h1>Customer Satisfaction Survey</h1>
            <div class="mb-4">
                <label class="h5">2. Gumugol ako ng makatwirang dami ng oras para sa aking transaction.</label>
                <div class="d-flex flex-column mt-3">
                    <div class="form-check">
                        <input type="radio" name="time_spent" value="Strongly_Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="time_spent" value="Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="time_spent" value="Neither_agree_nor_dissatisfied" class="form-radio text-success" required>
                        <label class="form-check-label">Neither agree nor dissatisfied</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="time_spent" value="Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="time_spent" value="Strongly_Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Disagree</label>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <button class="btn btn-secondary" onclick="prevSlide(2)">Previous</button>
                <button class="btn btn-primary" onclick="nextSlide(4)">Next</button>
            </div>
        </div>

        <div class="container p-5 my-5" id="slide4">
            <h1>Customer Satisfaction Survey</h1>
            <div class="mb-4">
                <label class="h5">3. Ang mga hakbang (kabilang ang pagbabayad) na kailangan kong gawin para sa aking transaction ay madali at simple.</label>
                <div class="d-flex flex-column mt-3">
                    <div class="form-check">
                        <input type="radio" name="process_followed" value="Strongly_Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="process_followed" value="Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="process_followed" value="Neither_agree_nor_dissatisfied" class="form-radio text-success" required>
                        <label class="form-check-label">Neither agree nor dissatisfied</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="process_followed" value="Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="process_followed" value="Strongly_Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Disagree</label>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <button class="btn btn-secondary" onclick="prevSlide(3)">Previous</button>
                <button class="btn btn-primary" onclick="nextSlide(5)">Next</button>
            </div>
        </div>

        <div class="container p-5 my-5" id="slide5">
            <h1>Customer Satisfaction Survey</h1>
            <div class="mb-4">
                <label class="h5">4. Madali akong nakahanap ng impormasyon tungkol sa aking transaksyon mula sa ospital at website.</label>
                <div class="d-flex flex-column mt-3">
                    <div class="form-check">
                        <input type="radio" name="steps_ease" value="Strongly_Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="steps_ease" value="Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="steps_ease" value="Neither_agree_nor_dissatisfied" class="form-radio text-success" required>
                        <label class="form-check-label">Neither agree nor dissatisfied</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="steps_ease" value="Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="steps_ease" value="Strongly_Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Disagree</label>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <button class="btn btn-secondary" onclick="prevSlide(4)">Previous</button>
                <button class="btn btn-primary" onclick="nextSlide(6)">Next</button>
            </div>
        </div>

        <div class="container p-5 my-5" id="slide6">
            <h1>Customer Satisfaction Survey</h1>
            <div class="mb-4">
                <label class="h5">5. Nagbayad ako ng makatwirang halaga ng mga bayarin.</label>
                <div class="d-flex flex-column mt-3">
                    <div class="form-check">
                        <input type="radio" name="info_access" value="Strongly_Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="info_access" value="Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="info_access" value="Neither_agree_nor_disagree nor dissatisfied" class="form-radio text-success" required>
                        <label class="form-check-label">Neither agree nor dissatisfied</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="info_access" value="Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="info_access" value="Strongly_Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Disagree</label>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <button class="btn btn-secondary" onclick="prevSlide(5)">Previous</button>
                <button class="btn btn-primary" onclick="nextSlide(7)">Next</button>
            </div>
        </div>

        <div class="container p-5 my-5" id="slide7">
            <h1>Customer Satisfaction Survey</h1>
            <div class="mb-4">
                <label class="h5">6. Walang naging palakasan sa ospital na ito.</label>
                <div class="d-flex flex-column mt-3">
                    <div class="form-check">
                        <input type="radio" name="payment_value" value="Strongly_Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="payment_value" value="Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="payment_value" value="Neither_agree_nor_dissatisfied" class="form-radio text-success" required>
                        <label class="form-check-label">Neither agree nor dissatisfied</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="payment_value" value="Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="payment_value" value="Strongly_Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Disagree</label>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <button class="btn btn-secondary" onclick="prevSlide(6)">Previous</button>
                <button class="btn btn-primary" onclick="nextSlide(8)">Next</button>
            </div>
        </div>

        <div class="container p-5 my-5" id="slide8">
            <h1>Customer Satisfaction Survey</h1>
            <div class="mb-4">
                <label class="h5">7. Magaling at matulungin ang mga tauhan sa ospital na ito.</label>
                <div class="d-flex flex-column mt-3">
                    <div class="form-check">
                        <input type="radio" name="no_favoritism" value="Strongly_Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="no_favoritism" value="Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="no_favoritism" value="Neither_agree_nor_dissatisfied" class="form-radio text-success" required>
                        <label class="form-check-label">Neither agree nor dissatisfied</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="no_favoritism" value="Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="no_favoritism" value="Strongly_Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Disagree</label>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <button class="btn btn-secondary" onclick="prevSlide(7)">Previous</button>
                <button class="btn btn-primary" onclick="nextSlide(9)">Next</button>
            </div>
        </div>

        <div class="container p-5 my-5" id="slide9">
            <h1>Customer Satisfaction Survey</h1>
            <div class="mb-4">
                <label class="h5">8. Nakuha ko ang kailangan ko. O kung natanggihan ay naipaliwanag ng maayos.</label>
                <div class="d-flex flex-column mt-3">
                    <div class="form-check">
                        <input type="radio" name="staff_helpfulness" value="Strongly_Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="staff_helpfulness" value="Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="staff_helpfulness" value="Neither_agree_nor_dissatisfied" class="form-radio text-success" required>
                        <label class="form-check-label">Neither agree nor dissatisfied</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="staff_helpfulness" value="Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="staff_helpfulness" value="Strongly_Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Disagree</label>
                    </div>
                </div>
            </div>

            <div class="navigation">
                <button class="btn btn-secondary" onclick="prevSlide(8)">Previous</button>
                <button class="btn btn-primary" onclick="nextSlide(10)">Next</button>
            </div>
        </div>
        <div class="container p-5 my-5" id="slide10">
            <h1>Customer Satisfaction Survey</h1>
            <div class="mb-4">
                <label class="h5">9. Nakuha ko ang kailangan ko. O kung natanggihan ay naipaliwanag ng maayos.</label>
                <div class="d-flex flex-column mt-3">
                    <div class="form-check">
                        <input type="radio" name="needed_info" value="Strongly_Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="needed_info" value="Agree" class="form-radio text-success" required>
                        <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="needed_info" value="Neither_agree_nor_dissatisfied" class="form-radio text-success" required>
                        <label class="form-check-label">Neither agree nor dissatisfied</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="needed_info" value="Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="needed_info" value="Strongly_Disagree" class="form-radio text-success" required>
                        <label class="form-check-label">Strongly Disagree</label>
                    </div>
                </div>
            </div>

            <div class="navigation">
                <button class="btn btn-secondary" onclick="prevSlide(9)">Previous</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </form>
                     

  <script>
    let currentSlide = 1;
    const totalSlides = 10; // Update this to the actual number of slides

    function showSlide(slideIndex) {
        const slides = document.querySelectorAll('.container');
        slides.forEach((slide, index) => {
            slide.classList.remove('active');
            if (index + 1 === slideIndex) {
                slide.classList.add('active');
            }
        });
    }

    function nextSlide(slideIndex) {
        const currentSlideElement = document.getElementById(`slide${currentSlide}`);

        // Check for required radio buttons, text inputs, textareas, and select elements
        const requiredInputs = currentSlideElement.querySelectorAll('input[required], textarea[required], select[required]');
        let isValid = true; // Start assuming the inputs are valid

        // Validate if all required inputs are filled
        requiredInputs.forEach(input => {
            if (input.type === 'radio') {
                // Check if at least one radio button in the group is checked
                const radioGroup = currentSlideElement.querySelectorAll(`input[name="${input.name}"]`);
                const isAnyChecked = Array.from(radioGroup).some(radio => radio.checked);
                if (!isAnyChecked) {
                    isValid = false;
                }
            } else if (input.tagName === 'SELECT') {
                // Check if the select input has a valid value
                if (input.value.trim() === '') {
                    isValid = false;
                }
            } else if (input.type === 'text' || input.tagName === 'TEXTAREA') {
                // Check if the text input or textarea is filled
                if (input.value.trim() === '') {
                    isValid = false;
                }
            }
        });

        // Show alert if not valid
        if (!isValid) {
            alert('Please fill in all required fields before proceeding.');
            return; // Prevent going to the next slide
        }

        // If validations pass, proceed to the next slide
        if (slideIndex <= totalSlides) {
            currentSlide = slideIndex;
            showSlide(currentSlide);
        }
    }

    function prevSlide(slideIndex) {
        if (slideIndex >= 1) {
            currentSlide = slideIndex;
            showSlide(currentSlide);
        }
    }

    // Show the first slide on page load
    showSlide(currentSlide);
</script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUV4yFQHaDk8JdTNh0IqLZ1F0XIVu4W8/p9eXcGdFQjEw" crossorigin="anonymous"></script>

    <!-- All javascirpt -->
    <!-- Alpine js -->
    <script src="assets/js/alpine-collaspe.min.js"></script>
    <script src="assets/js/alpine-persist.min.js"></script>
    <script src="assets/js/alpine.min.js" defer></script>

    <!-- Custom js -->
    
</body>

</html>