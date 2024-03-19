'use strict';

const modal = document.querySelector('.modal');
const overlay = document.querySelector('.overlay');
const btnCloseModal = document.querySelector('.close-modal');
const btnOpenModal = document.querySelector('.show-modal');

const updatePwdModal = document.querySelector('.update-pwd-modal');
const btnOpenPwdModal = document.querySelector('.show-Update-pwd-modal')

const closeModal = () => {
    modal.classList.add('hidden');
    updatePwdModal.classList.add('hidden')
    overlay.classList.add('hidden');
}

const openModal = () => {
    modal.classList.remove('hidden');
    overlay.classList.remove('hidden');
}

btnOpenModal.addEventListener('click', openModal);

btnCloseModal.addEventListener('click', closeModal);

overlay.addEventListener('click', closeModal);

btnOpenPwdModal.addEventListener('click', openPwdModal);

const openPwdModal = () => {
    updatePwdModal.classList.remove('hidden');
    overlay.classList.remove('hidden');
}

// document.addEventListener('keydown', (e)=>{
//     if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
//         closeModal();
//     }
// })