const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

let events = JSON.parse(localStorage.getItem('events')) || [];

function renderCalendar(month, year) {
    const daysContainer = document.getElementById("days");
    daysContainer.innerHTML = "";
    const monthNameContainer = document.getElementById("month-name");
    monthNameContainer.innerText = `${monthNames[month]} ${year}`;

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    for (let i = 0; i < firstDay; i++) {
        const emptyDiv = document.createElement("div");
        daysContainer.appendChild(emptyDiv);
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const dayDiv = document.createElement("div");
        dayDiv.innerText = day;
        const currentDate = new Date(year, month, day);
        const event = events.find(e => new Date(e.date).toDateString() === currentDate.toDateString());
        if (event) {
            dayDiv.classList.add('event');
            dayDiv.title = event.name;
        }
        daysContainer.appendChild(dayDiv);
    }
}

function prevMonth() {
    currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
    currentYear = currentMonth === 11 ? currentYear - 1 : currentYear;
    renderCalendar(currentMonth, currentYear);
}

function nextMonth() {
    currentMonth = currentMonth === 11 ? 0 : currentMonth + 1;
    currentYear = currentMonth === 0 ? currentYear + 1 : currentYear;
    renderCalendar(currentMonth, currentYear);
}

document.getElementById('event-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const eventDate = document.getElementById('event-date').value;
    const eventName = document.getElementById('event-name').value;
    if (eventDate && eventName) {
        events.push({ date: eventDate, name: eventName });
        localStorage.setItem('events', JSON.stringify(events));
        renderCalendar(currentMonth, currentYear);
    }
});

document.addEventListener("DOMContentLoaded", () => {
    renderCalendar(currentMonth, currentYear);
});
