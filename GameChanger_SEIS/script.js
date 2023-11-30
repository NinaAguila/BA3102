


let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');
let mainContent = document.querySelector('.main-content');

// Function to load content from a PHP file
function loadContent(url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            mainContent.innerHTML = data;
        });
}

btn.onclick = function(){
    sidebar.classList.toggle('active');
};

// Attach click event listeners to the sidebar links
const sidebarLinks = document.querySelectorAll('.sidebar a');
sidebarLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        loadContent(link.getAttribute('href'));
    });
});





function handleOtherSelection(selectId, inputId) {
    var selectElement = document.getElementById(selectId);
    var inputElement = document.getElementById(inputId);

    inputElement.style.display = selectElement.value === "Other" ? "block" : "none";
}


