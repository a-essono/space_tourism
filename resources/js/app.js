import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// === Ton code menu hamburger ===

document.addEventListener('DOMContentLoaded', () => {
    const btnHamburger = document.querySelector('#svgbtn');
    const hamburgerDiv = document.querySelector('.hamburger');

    if (!btnHamburger || !hamburgerDiv) return;

    btnHamburger.addEventListener("click", (e) => {
        // console.log(e.target);

        const newDiv = document.createElement('div');
        newDiv.className = `
            fixed top-0 right-0 
            w-[70vw] h-screen 
            bg-white/5 backdrop-blur-[12.5px] 
            z-50 p-6 
            text-[var(--white-25)] 
            flex flex-col 
            items-start 
        `;

        newDiv.innerHTML = `
            <button class="text-2xl hover:text-black self-end" id="xbtn">X</button>
            <ul class="flex flex-col gap-6 text-left text-lg pr-1 mt-28 pl-20"> 
                <li class="mb-3"><a href="http://space_tourism.test/public/travels/index">00 ACCUEIL</a></li>
                <li class="mb-3"><a href="http://space_tourism.test/public/travels/planet">01 DESTINATION</a></li>
                <li class="mb-3"><a href="http://space_tourism.test/public/travels/crew">02 EQUIPAGE</a></li>
                <li class="mb-3"><a href="http://space_tourism.test/public/travels/tech">03 TECHNOLOGIE</a></li>
            </ul>  
        `;

        hamburgerDiv.insertAdjacentElement('afterend', newDiv);

        const btnX = document.querySelector('#xbtn');
        btnX.addEventListener("click", () => newDiv.remove());
    });
});
