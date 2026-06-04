document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.woocommerce-MyAccount-navigation a');
    const contentWrapper = document.querySelector('.woocommerce'); // The parent containing both nav and content
    let contentContainer = document.querySelector('.woocommerce-MyAccount-content');

    if (!navLinks.length || !contentContainer || !contentWrapper) return;

    // Define the animation CSS dynamically if not present
    const style = document.createElement('style');
    style.innerHTML = `
        .my-account-slider-container {
            position: relative;
            overflow: hidden;
            min-height: 400px;
        }
        .my-account-slide-content {
            width: 100%;
            transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.4s ease;
        }
        .slide-out-left {
            transform: translateX(-100%);
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
        }
        .slide-out-right {
            transform: translateX(100%);
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
        }
        .slide-in-from-right {
            transform: translateX(100%);
            opacity: 0;
        }
        .slide-in-from-left {
            transform: translateX(-100%);
            opacity: 0;
        }
        .slide-active {
            transform: translateX(0);
            opacity: 1;
            position: relative;
        }
        /* Mobile specific adjustments to ensure smooth sliding */
        @media (max-width: 768px) {
            .woocommerce-MyAccount-navigation {
                margin-bottom: 20px;
            }
        }
    `;
    document.head.appendChild(style);

    // Make the parent wrapper relative for absolute positioning of outgoing slides
    contentWrapper.classList.add('my-account-slider-container');
    contentContainer.classList.add('my-account-slide-content', 'slide-active');

    let isAnimating = false;

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const url = this.href;
            
            // Allow logout and external links to work normally
            if (url.includes('customer-logout') || url.includes('wp-login.php') || !url.includes(window.location.hostname)) {
                return;
            }

            e.preventDefault();

            if (isAnimating || this.parentElement.classList.contains('is-active')) return;
            isAnimating = true;

            // Determine direction based on DOM index
            const navItems = Array.from(document.querySelectorAll('.woocommerce-MyAccount-navigation li'));
            const currentIndex = navItems.findIndex(li => li.classList.contains('is-active'));
            const targetIndex = navItems.findIndex(li => li.contains(this));

            const slideOutClass = targetIndex > currentIndex ? 'slide-out-left' : 'slide-out-right';
            const slideInStartClass = targetIndex > currentIndex ? 'slide-in-from-right' : 'slide-in-from-left';

            // Update active state in nav
            document.querySelectorAll('.woocommerce-MyAccount-navigation li').forEach(li => li.classList.remove('is-active'));
            if(targetIndex >= 0) navItems[targetIndex].classList.add('is-active');

            // Update URL
            window.history.pushState({path: url}, '', url);

            // Fetch new content
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newContentRaw = doc.querySelector('.woocommerce-MyAccount-content');

                    if (!newContentRaw) {
                        window.location.href = url; // Fallback
                        return;
                    }

                    // Create new container
                    const newContentContainer = document.createElement('div');
                    newContentContainer.className = 'woocommerce-MyAccount-content my-account-slide-content ' + slideInStartClass;
                    newContentContainer.innerHTML = newContentRaw.innerHTML;

                    // Insert next to current content
                    contentContainer.parentNode.insertBefore(newContentContainer, contentContainer.nextSibling);

                    // Force reflow
                    void newContentContainer.offsetWidth;

                    // Animate out current
                    contentContainer.classList.remove('slide-active');
                    contentContainer.classList.add(slideOutClass);
                    
                    // Animate in new
                    newContentContainer.classList.remove(slideInStartClass);
                    newContentContainer.classList.add('slide-active');

                    // Cleanup after animation
                    setTimeout(() => {
                        if (contentContainer && contentContainer.parentNode) {
                            contentContainer.parentNode.removeChild(contentContainer);
                        }
                        contentContainer = newContentContainer;
                        isAnimating = false;
                    }, 400); // match CSS transition time
                })
                .catch(err => {
                    console.error('Failed to load page: ', err);
                    window.location.href = url; // Fallback
                });
        });
    });

    // Handle back/forward browser buttons
    window.addEventListener('popstate', function() {
        window.location.reload(); // Simple fallback for browser back button
    });
});
