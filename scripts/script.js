let isModalOpen = false;

document.getElementById('user-menu-button').addEventListener('click', function () {
    const dropdown = document.getElementById('user-dropdown');
    
    if (isModalOpen) {
        dropdown.classList.add('hidden');
        isModalOpen = false;
    } else {
        dropdown.classList.remove('hidden'); 
        isModalOpen = true;
    }
});