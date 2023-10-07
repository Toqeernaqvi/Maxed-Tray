let userBtn = document.querySelector('.user-tab')
const url = document.URL.includes('users.php')

if(url) {
    userBtn.classList.add('highlighted');
}