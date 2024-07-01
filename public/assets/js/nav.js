(function () {

    let navShown = false;
 
    document.getElementById('nav-right-hamburger').addEventListener('click', () => {

        navShown = !navShown;

        if ( navShown ) {
            gsap.set ('#responsive-menu-container', { display : 'block' });
            gsap.to ('#responsive-menu', { left  : '25%', duration : 0.3, ease : 'power3.out'  });
        }else {
            gsap.to ('#responsive-menu', { left : '100%', duration : 0.3, ease : 'power3.out', onComplete : () => {
                gsap.set ('#responsive-menu-container', { display : 'none' });
            } });
        }
        // console.log(navShown);
    })

    window.addEventListener('resize', () => {

        // console.log (navShown, window.innerWidth);

        showNav ( window.innerWidth <= 640 && navShown );
    });

    const showNav = ( show = true ) => {
        gsap.set ('#responsive-menu-container', { display : show ? 'block' : 'none' });
    };

    const initNav = () => {

        const d = 0.5;

        const links = document.querySelectorAll(".my-link");

        links.forEach(link => {
            link.addEventListener("click", (event) => {
                event.preventDefault();
                const targetId = link.getAttribute("href");
                gsap.to(window, {duration: d, scrollTo: { y: targetId, offsetY: 60 }});
            });
        });

        const navBrand = document.querySelector(".nav-brand");
        navBrand.addEventListener("click", (e) => {
            e.preventDefault();
            gsap.to(window, {duration: d, scrollTo: {y: 0}});
        });

        showNav (navShown);

        
    }

    initNav();
    // document.addEventListener('DOMContentLoaded', initNav );


})();