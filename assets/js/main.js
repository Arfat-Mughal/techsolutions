document.addEventListener('DOMContentLoaded', function() {
    // Form handling
    const contactForm = document.getElementById('contactForm');
    const formMessage = document.getElementById('formMessage');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            if (!validateForm()) {
                return;
            }
            
            // Show loading state
            const submitButton = contactForm.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="flex items-center justify-center"><svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Processing...</span>';
            
            // Prepare form data
            const formData = new FormData(contactForm);
            
            // Submit via AJAX
            fetch('submit_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage('Thank you for your message! We will get back to you soon.', 'success');
                    contactForm.reset();
                } else {
                    if (data.errors) {
                        displayFormErrors(data.errors);
                    } else {
                        showMessage(data.message || 'An error occurred. Please try again.', 'error');
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showMessage('An error occurred. Please try again.', 'error');
            })
            .finally(() => {
                // Restore button state
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            });
        });
    }
    
    // Form validation
    function validateForm() {
        let isValid = true;
        const errors = {};
        
        // Clear previous errors
        clearErrors();
        
        // Name validation
        const name = document.getElementById('name');
        if (!name.value.trim()) {
            errors.name = 'Name is required';
            isValid = false;
        }
        
        // Email validation
        const email = document.getElementById('email');
        if (!email.value.trim()) {
            errors.email = 'Email is required';
            isValid = false;
        } else if (!isValidEmail(email.value)) {
            errors.email = 'Please enter a valid email address';
            isValid = false;
        }
        
        // Subject validation
        const subject = document.getElementById('subject');
        if (!subject.value) {
            errors.subject = 'Please select a subject';
            isValid = false;
        }
        
        // Message validation
        const message = document.getElementById('message');
        if (!message.value.trim()) {
            errors.message = 'Message is required';
            isValid = false;
        } else if (message.value.length > 1000) {
            errors.message = 'Message must be less than 1000 characters';
            isValid = false;
        }
        
        // Consent validation
        const consent = document.getElementById('consent');
        if (!consent.checked) {
            errors.consent = 'You must consent to our privacy policy';
            isValid = false;
        }
        
        // Display errors if any
        if (!isValid) {
            displayFormErrors(errors);
        }
        
        return isValid;
    }
    
    // Email validation helper
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Display form errors
    function displayFormErrors(errors) {
        for (const field in errors) {
            const input = document.getElementById(field);
            const errorElement = document.createElement('p');
            errorElement.className = 'mt-1 text-sm text-red-600';
            errorElement.textContent = errors[field];
            
            if (input) {
                input.classList.add('border-red-500');
                input.parentNode.appendChild(errorElement);
            } else if (field === 'consent') {
                const consentContainer = document.getElementById('consent').closest('.flex');
                consentContainer.appendChild(errorElement);
            }
        }
        
        showMessage('Please correct the errors in the form.', 'error');
    }
    
    // Clear form errors
    function clearErrors() {
        // Remove error styles
        const errorInputs = document.querySelectorAll('.border-red-500');
        errorInputs.forEach(input => input.classList.remove('border-red-500'));
        
        // Remove error messages
        const errorMessages = document.querySelectorAll('.text-red-600');
        errorMessages.forEach(msg => msg.remove());
    }
    
    // Show message
    function showMessage(message, type) {
        formMessage.textContent = message;
        formMessage.className = 'py-3 px-4 rounded-md';
        
        if (type === 'success') {
            formMessage.classList.add('bg-green-100', 'text-green-700');
        } else {
            formMessage.classList.add('bg-red-100', 'text-red-700');
        }
        
        formMessage.classList.remove('hidden');
        
        // Scroll to message
        formMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
        // Auto hide after 5 seconds
        setTimeout(() => {
            formMessage.classList.add('hidden');
        }, 5000);
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Mobile menu toggle (if needed in future)
    // const mobileMenuButton = document.querySelector('.md\\:hidden');
    // const navMenu = document.querySelector('nav');
    // if (mobileMenuButton && navMenu) {
    //     mobileMenuButton.addEventListener('click', function() {
    //         navMenu.classList.toggle('hidden');
    //     });
    // }
});