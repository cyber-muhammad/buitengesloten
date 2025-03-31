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

    // Contact Form 7 validation handling
    document.addEventListener('wpcf7invalid', function(event) {
        // Get all invalid fields
        const invalidFields = event.detail.apiResponse.invalid_fields;
        
        // Clear any previous validation styles
        const allInputs = document.querySelectorAll('.wpcf7-form input, .wpcf7-form textarea, .wpcf7-form select');
        allInputs.forEach(input => {
            input.style.borderColor = '#e5e5e5';
            input.style.boxShadow = 'none';
        });
        
        // Apply red border to invalid fields
        for (const fieldId in invalidFields) {
            const field = document.querySelector(`[name="${fieldId}"]`);
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
    });

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
            
            // Check terms and conditions checkbox
            const termsCheckbox = document.getElementById('terms');
            if (termsCheckbox && !termsCheckbox.checked) {
                hasError = true;
                
                // Add a red border to the terms checkbox container
                const termsContainer = termsCheckbox.closest('.check');
                if (termsContainer) {
                    termsContainer.style.boxShadow = '0 0 0 1px #dc3545';
                    termsContainer.style.padding = '5px';
                    termsContainer.style.borderRadius = '4px';
                    
                    // Reset styling when checked
                    termsCheckbox.addEventListener('change', function() {
                        if (this.checked) {
                            termsContainer.style.boxShadow = 'none';
                            termsContainer.style.padding = '0';
                        }
                    });
                }
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