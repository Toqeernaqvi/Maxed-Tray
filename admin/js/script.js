const usersBtn = document.querySelector('.user-tab')
const url = document.URL

if(url === 'http://localhost/Maxed-Tray/admin/users.php') {
    usersBtn.classList.add('highlighted');
}

  