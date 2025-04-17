document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const burgerMenu = document.getElementById('burger-menu');
    const overlay = document.getElementById('overlay');
    const closeMenu = document.getElementById('close-menu');
    const menuList = overlay.querySelector('.menu-nav');
    const contactButtons = overlay.querySelector('.overlay-contact-buttons');
    
    // Make sure the elements exist
    if (burgerMenu && overlay && closeMenu && menuList) {
        // Open menu with animation
        burgerMenu.addEventListener('click', function() {
            // First make it visible but with initial animation state
            overlay.style.visibility = 'visible';
            
            // Trigger the slide-in animation
            setTimeout(function() {
                overlay.classList.add('active');
                
                // Animate menu items after overlay slides in
                setTimeout(function() {
                    menuList.classList.add('active');
                    
                    // Animate contact buttons after menu items
                    if (contactButtons) {
                        setTimeout(function() {
                            contactButtons.classList.add('active');
                        }, 100);
                    }
                }, 200);
            }, 10); // Small delay to ensure the transition works
        });
        
        // Close menu with animation
        closeMenu.addEventListener('click', function() {
            // First animate contact buttons out if they exist
            if (contactButtons) {
                contactButtons.classList.remove('active');
            }
            
            // Then animate menu items out
            setTimeout(function() {
                menuList.classList.remove('active');
                
                // Then animate overlay out
                setTimeout(function() {
                    overlay.classList.remove('active');
                    
                    // Hide overlay after animation completes
                    setTimeout(function() {
                        overlay.style.visibility = 'hidden';
                    }, 300); // Match transition duration
                }, 150);
            }, 100);
        });
    }
});


function toggleProvinceContent(provinceId) {
    const content = document.getElementById('content-' + provinceId);
    const toggle = document.getElementById('toggle-' + provinceId);
    
    if (content.style.maxHeight) {
        content.style.maxHeight = null;
        toggle.classList.remove('active');
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
        toggle.classList.add('active');
    }
}