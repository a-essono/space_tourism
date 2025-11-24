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

// === Double submit  ===
document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll("form").forEach(form => {

        form.addEventListener("submit", function (e) {

            // Si ce formulaire a déjà été soumis → stop
            if (this.dataset.submitted === "true") {
                e.preventDefault();
                return false;
            }

            // Marque comme soumis
            this.dataset.submitted = "true";

            // Désactivation seulement des boutons submit ou input[type=submit]
            const btns = this.querySelectorAll("button[type=submit], input[type=submit]");
            btns.forEach(btn => {
                btn.disabled = true;
                btn.classList.add("opacity-50", "cursor-not-allowed");
                if (!btn.dataset.originalText) {
                    btn.dataset.originalText = btn.innerText;
                }
                btn.innerText = "Envoi...";
            });
        });

    });

});

