function showLogin() {
    document.getElementById('loginForm').classList.remove('hidden');
    document.getElementById('signupForm').classList.add('hidden');
    document.getElementById('loginTab').classList.add('border-[#16a34a]', 'text-[#16a34a]');
    document.getElementById('signupTab').classList.remove('border-[#16a34a]', 'text-[#16a34a]');
    document.getElementById('signupTab').classList.add('border-transparent');
}

function showSignup() {
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('signupForm').classList.remove('hidden');
    document.getElementById('signupTab').classList.add('border-[#16a34a]', 'text-[#16a34a]');
    document.getElementById('loginTab').classList.remove('border-[#16a34a]', 'text-[#16a34a]');
    document.getElementById('loginTab').classList.add('border-transparent');
}

function toggleModal(mode = '') {
    const modal = document.getElementById('modal');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const modalTitle = document.getElementById('modalTitle');

    if (mode === 'login') {
        modal.classList.remove('hidden');
        loginForm.classList.remove('hidden');
        signupForm.classList.add('hidden');
        modalTitle.textContent = 'Login';
    } else if (mode === 'signup') {
        modal.classList.remove('hidden');
        loginForm.classList.add('hidden');
        signupForm.classList.remove('hidden');
        modalTitle.textContent = 'Sign Up';
    } else {
        modal.classList.add('hidden');
    }
}



