document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        const scrollingText = document.querySelector('.scrolling-text');
        const container = document.querySelector('.scrolling-container');
        const containerWidth = container.offsetWidth;
        const textWidth = scrollingText.scrollWidth;
        let position = containerWidth;

        // Initialize text position
        scrollingText.style.transform = `translateX(${position}px)`;

        function scrollText() {
            position -= 1; // Adjust speed here
            if (position < -textWidth) {
                position = containerWidth;
            }
            scrollingText.style.transform = `translateX(${position}px)`;
        }

        // Set an interval to start scrolling immediately
        setInterval(scrollText, 10); // Adjust scrolling speed here
    }, 0); // Start immediately, or adjust the delay
});
