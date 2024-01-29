const registerForm = document.querySelector('#register-form');
const loginForm = document.querySelector('#login-form');
const registerSwapButton = loginForm.querySelector('#register-swap-button');
const loginSwapButton = registerForm.querySelector('#login-swap-button');

function swapToRegister() {
    loginForm.classList.remove('visible');
    loginForm.classList.add('invisible');
    registerForm.classList.remove('invisible');
    registerForm.classList.add('visible');
}

function swapToLogin() {
    registerForm.classList.remove('visible');
    registerForm.classList.add('invisible');
    loginForm.classList.remove('invisible');
    loginForm.classList.add('visible');
}

registerSwapButton.addEventListener('click', swapToRegister);
loginSwapButton.addEventListener('click', swapToLogin);
