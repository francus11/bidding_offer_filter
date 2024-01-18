const registerForm = document.querySelector('#register-form');
const loginForm = document.querySelector('#login-form');
const registerSwapButton = loginForm.querySelector('#register-swap-button');
const loginSwapButton = registerForm.querySelector('#login-swap-button');

function swapToRegister() {
    loginForm.classList.remove('visible-form');
    loginForm.classList.add('invisible-form');
    registerForm.classList.remove('invisible-form');
    registerForm.classList.add('visible-form');
}

function swapToLogin() {
    registerForm.classList.remove('visible-form');
    registerForm.classList.add('invisible-form');
    loginForm.classList.remove('invisible-form');
    loginForm.classList.add('visible-form');
}

registerSwapButton.addEventListener('click', swapToRegister);
loginSwapButton.addEventListener('click', swapToLogin);
