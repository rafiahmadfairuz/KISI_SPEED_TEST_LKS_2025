const ratingContainer = document.getElementById('rating');
const ratingOverlay = document.getElementById('rating-overlay');

ratingContainer.addEventListener('mousemove', (e) => {
    const rect = ratingContainer.getBoundingClientRect();
    
    let rating = Math.round((e.clientX / rect.width) * 10) / 2;
    let fillWidth = (rating / 5) * 100; 

    ratingOverlay.style.width = fillWidth + '%';
});

ratingContainer.addEventListener('mouseleave', () => {
    ratingOverlay.style.width = '0'; 
});
