document.addEventListener('DOMContentLoaded', function() {
    var loginBtn = document.getElementById('loginBtn');
    var registerBtn = document.getElementById('registerBtn');
    var overlay = document.getElementById('overlay');

    loginBtn.addEventListener('click', function() {
        openLoginModal();
    });

    registerBtn.addEventListener('click', function() {
        openRegisterModal();
    });

    overlay.addEventListener('click', function() {
        closeModals();
    });
});

function openLoginModal() {
    document.getElementById('loginModal').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeLoginModal() {
    document.getElementById('loginModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function openRegisterModal() {
    document.getElementById('registerModal').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeRegisterModal() {
    document.getElementById('registerModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function closeModals() {
    closeLoginModal();
    closeRegisterModal();
}
