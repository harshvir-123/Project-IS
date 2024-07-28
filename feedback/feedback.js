document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('submit-feedback');
    form.addEventListener('submit', submitFeedback);
});
 
function submitFeedback(e) {
    e.preventDefault();
 
    const feedbackType = document.getElementById('feedback-type').value;
    const rating = document.querySelector('input[name="rating"]:checked').value;
    const feedbackText = document.getElementById('feedback-text').value;
 
    const feedbackData = {
        type: feedbackType,
        rating: rating,
        text: feedbackText
    };
 
    fetch('submit_feedback.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(feedbackData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('feedback-form').style.display = 'none';
            document.getElementById('feedback-confirmation').style.display = 'block';
        } else {
            alert('There was an error submitting your feedback. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('There was an error submitting your feedback. Please try again.');
    });
}
