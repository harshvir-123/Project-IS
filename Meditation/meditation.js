document.addEventListener('DOMContentLoaded', function() {
    fetchSessions();
    updateProgressDashboard();
    
    document.querySelectorAll('nav a').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            fetchSessions(this.dataset.category);
        });
    });
});
 
function fetchSessions(category = null) {
    let url = 'meditation.php';
    if (category) {
        url += `?category=${category}`;
    }
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const sessionsList = document.getElementById('sessions-list');
            sessionsList.innerHTML = '';
            data.forEach(session => {
                const sessionElement = createSessionElement(session);
                sessionsList.appendChild(sessionElement);
            });
        })
        .catch(error => console.error('Error:', error));
}
 
function createSessionElement(session) {
    const sessionElement = document.createElement('div');
    sessionElement.className = 'session-item';
    sessionElement.innerHTML = `
        <h3>${session.title}</h3>
        <p>${session.description}</p>
        <p>Duration: ${session.duration} minutes</p>
        <audio controls>
            <source src="${session.audio_file}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <button onclick="completeSession(${session.id})">Complete</button>
        <button onclick="toggleFavorite(${session.id})">Favorite</button>
    `;
    return sessionElement;
}
 
function completeSession(sessionId) {
    // In a real app, you'd send this to the server
    let completed = JSON.parse(localStorage.getItem('completedSessions')) || [];
    if (!completed.includes(sessionId)) {
        completed.push(sessionId);
        localStorage.setItem('completedSessions', JSON.stringify(completed));
        updateProgressDashboard();
    }
}
 
function toggleFavorite(sessionId) {
    // In a real app, you'd send this to the server
    let favorites = JSON.parse(localStorage.getItem('favoriteSessions')) || [];
    const index = favorites.indexOf(sessionId);
    if (index > -1) {
        favorites.splice(index, 1);
    } else {
        favorites.push(sessionId);
    }
    localStorage.setItem('favoriteSessions', JSON.stringify(favorites));
    updateProgressDashboard();
}
 
function updateProgressDashboard() {
    const completed = JSON.parse(localStorage.getItem('completedSessions')) || [];
    const favorites = JSON.parse(localStorage.getItem('favoriteSessions')) || [];
    
    const progressStats = document.getElementById('progress-stats');
    progressStats.innerHTML = `
        <p>Sessions Completed: ${completed.length}</p>
        <p>Favorite Sessions: ${favorites.length}</p>
    `;
}
