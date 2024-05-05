document.addEventListener('DOMContentLoaded', function() {
    var loginBtn = document.getElementById('loginBtn');
    var registerBtn = document.getElementById('registerBtn');
    var overlay = document.getElementById('overlay');
    var ttBtn = document.getElementById('ttBtn');
    if(loginBtn)
        loginBtn.addEventListener('click', function() {
            openLoginModal();
        });
    if(registerBtn)
        registerBtn.addEventListener('click', function() {
            openRegisterModal();
        });

    overlay.addEventListener('click', function() {
        closeModals();
    });
    if(ttBtn)
        ttBtn.addEventListener('click', function() {
            openTtModal();
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

function openTtModal() {
    document.getElementById('ttModal').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeTtModal() {
    document.getElementById('ttModal').style.display = 'none';
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
    closeTtModal();
}

