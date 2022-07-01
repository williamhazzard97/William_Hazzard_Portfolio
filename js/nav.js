const navSlide = () => {
    const dropdownMenu = document.querySelector('.dropdownMenu');
    const nav = document.querySelector('.navLinks');
    const navLinks = document.querySelectorAll('.navLinks li');

    dropdownMenu.addEventListener('click', () => {
        nav.classList.toggle('nav-active');

        navLinks.forEach((link) => {
            if (link.style.animation) {
                link.style.animation = '';
            }
            else {
                link.style.animation = 'navLinkFade 1.5s ease forwards';
            }
        });

        dropdownMenu.classList.toggle('toggle');
    });
}

navSlide();