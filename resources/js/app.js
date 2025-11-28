import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// === Ton code menu hamburger ===

document.addEventListener('DOMContentLoaded', () => {
    const btnHamburger = document.querySelector('#svgbtn');
    const hamburgerDiv = document.querySelector('.hamburger');

    if (!btnHamburger || !hamburgerDiv) return;

    // Fonction pour créer le menu
    const createMenu = (menuItems) => {
        const newDiv = document.createElement('div');
        newDiv.className = `
            fixed top-0 right-0 
            w-[70vw] h-screen 
            bg-white/5 backdrop-blur-[12.5px] 
            z-50 p-6 
            text-[var(--white-25)]
            text-(length:--titre4-mobile)
            leading-[19px]
            whitespace-nowrap
            flex flex-col 
            items-start   
        `;

        const listItems = menuItems.map((item, index) => `
            <li class="mb-5">
                <a href="${item.url}">
                    <span class="inline opacity-25 lg:hidden font-bold">0${index}</span> ${item.label}
                </a>
            </li>
        `).join('');

        newDiv.innerHTML = `
            <button class="text-2xl hover:text-black self-end" id="xbtn">X</button>
            <ul class="flex flex-col gap-6 text-left text-lg pr-1 mt-25 ml-10">
                ${listItems}
            </ul>
        `;

        hamburgerDiv.insertAdjacentElement('afterend', newDiv);

        document.querySelector('#xbtn').addEventListener("click", () => newDiv.remove());
    };

    // Listener sur le bouton hamburger
    btnHamburger.addEventListener("click", async () => {
        
        const locale = document.documentElement.lang;
        console.log(locale);
        try {
            
            const res = await fetch(`/${locale}/menu`);
            if (!res.ok) throw new Error('Erreur réseau');
            const menuItems = await res.json();
            createMenu(menuItems);
        } catch (error) {
            console.error("Impossible de récupérer le menu :", error);
        }
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

