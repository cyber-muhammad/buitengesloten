// Contact Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to contact boxes
    const contactBoxes = document.querySelectorAll('.single-contact-box');
    
    contactBoxes.forEach(box => {
        box.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.15)';
        });
        
        box.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
        });
    });

    // Hide wpcf7-response-output message
    const responseOutput = document.querySelector('.wpcf7-response-output');
    if (responseOutput) {
        responseOutput.style.display = 'none';
    }

    // Contact Form 7 validation and submit button control
    const cf7Form = document.querySelector('.wpcf7-form');
    if (cf7Form) {
        // Find the submit button
        const submitButton = cf7Form.querySelector('.wpcf7-submit');
        if (submitButton) {
            // Initially disable the submit button
            submitButton.disabled = true;
            submitButton.classList.add('disabled');
            
            // Find all required fields
            const requiredFields = cf7Form.querySelectorAll('[aria-required="true"], [required]');
            const emailField = cf7Form.querySelector('[type="email"]');
            
            // Check if form already has failed status on page load
            if (cf7Form.dataset.status === 'failed' || cf7Form.dataset.status === 'spam' || cf7Form.dataset.status === 'aborted') {
                handleFailedForm();
            }
            
            // Function to handle a failed form submission
            function handleFailedForm() {
                // Get error message from response output or use a default
                const responseOutput = document.querySelector('.wpcf7-response-output');
                let errorText = 'Er is een fout opgetreden bij het verzenden van het formulier. Probeer het later opnieuw.';
                if (responseOutput && responseOutput.textContent.trim()) {
                    errorText = responseOutput.textContent.trim();
                }
                
                // Hide the default response output
                if (responseOutput) {
                    responseOutput.style.display = 'none';
                }
                
                // Create custom error message if it doesn't exist
                let errorMessage = document.querySelector('.form-error-message');
                if (!errorMessage) {
                    errorMessage = document.createElement('div');
                    errorMessage.className = 'form-error-message';
                    errorMessage.innerHTML = `
                        <div class="error-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                        </div>
                        <h4>Oeps! Er ging iets mis</h4>
                        <p>${errorText}</p>
                    `;
                    
                    // Insert at the top of the form
                    cf7Form.insertBefore(errorMessage, cf7Form.firstChild);
                    
                    // Make sure submit button is enabled
                    if (submitButton) {
                        submitButton.disabled = false;
                        submitButton.classList.remove('disabled');
                    }
                    
                    // Animate error message
                    errorMessage.style.animation = 'none';
                    void errorMessage.offsetWidth; // Trigger reflow to restart animation
                    errorMessage.style.animation = 'shakeX 0.8s ease';
                    
                    // Scroll to error message
                    setTimeout(() => {
                        errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
            }
            
            // Set up a MutationObserver to watch for data-status changes
            const formObserver = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'data-status') {
                        const newStatus = cf7Form.dataset.status;
                        if (newStatus === 'failed' || newStatus === 'spam' || newStatus === 'aborted') {
                            handleFailedForm();
                        }
                    }
                });
            });
            
            // Start observing the form for data-status changes
            formObserver.observe(cf7Form, { attributes: true });
            
            // Function to check if all required fields are valid
            function validateForm() {
                let isValid = true;
                
                // Check all required fields have values
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                    }
                });
                
                // Validate email format if email field exists and has a value
                if (emailField && emailField.value.trim() && !validateEmail(emailField.value.trim())) {
                    isValid = false;
                }
                
                // Enable/disable submit button based on validation
                if (isValid) {
                    submitButton.disabled = false;
                    submitButton.classList.remove('disabled');
                } else {
                    submitButton.disabled = true;
                    submitButton.classList.add('disabled');
                }
            }
            
            // Add input event listeners to all form fields
            cf7Form.querySelectorAll('input, textarea, select').forEach(field => {
                field.addEventListener('input', validateForm);
                field.addEventListener('change', validateForm);
            });
            
            // Style invalid fields when form submission fails
            document.addEventListener('wpcf7invalid', function(event) {
                if (event.detail.contactFormId === cf7Form.querySelector('input[name="_wpcf7"]').value) {
                    // Get all invalid fields
                    const invalidFields = event.detail.apiResponse.invalid_fields;
                    
                    // Clear any previous validation styles
                    const allInputs = cf7Form.querySelectorAll('input, textarea, select');
                    allInputs.forEach(input => {
                        input.style.borderColor = '#e5e5e5';
                        input.style.boxShadow = 'none';
                    });
                    
                    // Apply red border to invalid fields
                    for (const fieldId in invalidFields) {
                        const field = cf7Form.querySelector(`[name="${fieldId}"]`);
                        if (field) {
                            field.style.borderColor = '#dc3545';
                            field.style.boxShadow = '0 0 0 1px #dc3545';
                            
                            // Reset border color when user starts typing or changes the field
                            field.addEventListener('input', function() {
                                this.style.borderColor = '#e5e5e5';
                                this.style.boxShadow = 'none';
                            }, { once: true });
                        }
                    }
                    
                    // Hide the response output
                    const responseOutput = document.querySelector('.wpcf7-response-output');
                    if (responseOutput) {
                        responseOutput.style.display = 'none';
                    }
                    
                    // Show error message at the top of the form
                    let errorMessage = document.querySelector('.form-error-message');
                    if (!errorMessage) {
                        errorMessage = document.createElement('div');
                        errorMessage.className = 'form-error-message';
                        errorMessage.innerHTML = `
                            <div class="error-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                            </div>
                            <p>Controleer de velden die met rood zijn gemarkeerd en probeer het opnieuw.</p>
                        `;
                        cf7Form.prepend(errorMessage);
                    }
                    
                    // Animate error message
                    errorMessage.style.animation = 'none';
                    void errorMessage.offsetWidth; // Trigger reflow to restart animation
                    errorMessage.style.animation = 'shakeX 0.8s ease';
                    
                    // Scroll to error message
                    errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
            
            // Handle failed submission (server error, spam, etc.)
            document.addEventListener('wpcf7spam wpcf7mailfailed wpcf7submitfailed', function(event) {
                if (event.detail.contactFormId === cf7Form.querySelector('input[name="_wpcf7"]').value) {
                    // Create error message
                    let errorMessage = document.querySelector('.form-error-message');
                    if (!errorMessage) {
                        errorMessage = document.createElement('div');
                        errorMessage.className = 'form-error-message';
                        cf7Form.prepend(errorMessage);
                    }
                    
                    // Set appropriate message based on error type
                    let errorText = 'Er is een fout opgetreden bij het verzenden van het formulier. Probeer het later opnieuw.';
                    let errorTitle = 'Oeps! Er ging iets mis';
                    
                    if (event.type === 'wpcf7spam') {
                        errorText = 'Uw bericht is gemarkeerd als spam. Controleer uw inzending en probeer het opnieuw.';
                        errorTitle = 'Spam gedetecteerd';
                    }
                    
                    errorMessage.innerHTML = `
                        <div class="error-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                        </div>
                        <h4>${errorTitle}</h4>
                        <p>${errorText}</p>
                    `;
                    
                    // Animate and scroll to error
                    errorMessage.style.animation = 'none';
                    void errorMessage.offsetWidth; // Trigger reflow to restart animation
                    errorMessage.style.animation = 'shakeX 0.8s ease';
                    errorMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    
                    // Hide the response output
                    const responseOutput = document.querySelector('.wpcf7-response-output');
                    if (responseOutput) {
                        responseOutput.style.display = 'none';
                    }
                }
            });
            
            // Remove error message when user starts filling out the form again
            cf7Form.addEventListener('input', function() {
                const errorMessage = document.querySelector('.form-error-message');
                if (errorMessage) {
                    errorMessage.style.animation = 'fadeOut 0.3s ease forwards';
                    setTimeout(() => {
                        if (errorMessage.parentNode) {
                            errorMessage.parentNode.removeChild(errorMessage);
                        }
                    }, 300);
                }
            }, { once: true });
            
            // Handle successful form submission
            document.addEventListener('wpcf7mailsent', function(event) {
                if (event.detail.contactFormId === cf7Form.querySelector('input[name="_wpcf7"]').value) {
                    // Get the form container
                    const formContainer = cf7Form.closest('.contact-form');
                    
                    // Create success message container
                    const successContainer = document.createElement('div');
                    successContainer.className = 'form-success-message';
                    successContainer.innerHTML = `
                        <div class="success-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <h3>Bedankt voor uw bericht!</h3>
                        <p>We hebben uw aanvraag ontvangen en nemen zo spoedig mogelijk contact met u op.</p>
                    `;
                    
                    // First fade out the form
                    formContainer.style.transition = 'opacity 0.5s ease';
                    formContainer.style.opacity = '0';
                    
                    // After the fade-out animation completes, replace with success message
                    setTimeout(() => {
                        // Clear the form container but keep it for dimensions
                        while (formContainer.firstChild) {
                            formContainer.removeChild(formContainer.firstChild);
                        }
                        
                        // Add the success message
                        formContainer.appendChild(successContainer);
                        
                        // Fade in the success message
                        formContainer.style.opacity = '0';
                        setTimeout(() => {
                            formContainer.style.opacity = '1';
                        }, 50); // Small delay to ensure the opacity transition works
                        
                    }, 500); // Wait for fade-out to complete
                    
                    // Reset form state (but not visible to user)
                    cf7Form.reset();
                    validateForm(); // Re-validate to disable submit button
                    
                    // Hide the response output
                    const responseOutput = document.querySelector('.wpcf7-response-output');
                    if (responseOutput) {
                        responseOutput.style.display = 'none';
                    }
                }
            });
        }
    }

    // Static form validation (for when CF7 is not available)
    const staticForm = document.querySelector('.contact-form form:not(.wpcf7-form)');
    if (staticForm) {
        staticForm.addEventListener('submit', function(e) {
            let hasError = false;
            
            // Check required fields
            const requiredFields = this.querySelectorAll('input[required], textarea[required]');
            requiredFields.forEach(field => {
                // Reset styling
                field.style.borderColor = '#e5e5e5';
                field.style.boxShadow = 'none';
                
                if (!field.value.trim()) {
                    field.style.borderColor = '#dc3545';
                    field.style.boxShadow = '0 0 0 1px #dc3545';
                    hasError = true;
                    
                    // Reset border color when user starts typing
                    field.addEventListener('input', function() {
                        this.style.borderColor = '#e5e5e5';
                        this.style.boxShadow = 'none';
                    }, { once: true });
                }
            });
            
            // Validate email format if it's an email field
            const emailField = this.querySelector('input[type="email"]');
            if (emailField && emailField.value.trim() && !validateEmail(emailField.value)) {
                emailField.style.borderColor = '#dc3545';
                emailField.style.boxShadow = '0 0 0 1px #dc3545';
                hasError = true;
            }
            
            if (hasError) {
                e.preventDefault();
            }
        });
    }
    
    // Helper function to validate email format
    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
});