
(function () {

    gsap.registerPlugin(ScrollTrigger);

    let _timer,

        _spinDirection = 0,

        _spinPaused = false,

        _projectsInited = false;


    // about functions..
    const initAbout = () => {

        const cta = document.getElementById('main-cta');

        cta.addEventListener('click', () => {
            gsap.to(window, {duration: 0.5, scrollTo: { y:'#projects',  offsetY: 60}});

        });

        gsap.to ('.profile-img', { scale:1.2, transformOrigin : '50% 50%', yPercent : '-=30', xPercent : i => {
            switch (i) {
                case 0: return 100;
                    break;
                case 1: return 0;
                    break;
                case 2: return -100;
                    break;
            };
        }, rotation : (i) => {
            return -(i * 20 + 380) ;
        }, 
        stagger : {
            each : 0.2,
            start : 'end',
            yoyo : true,
            repeat : -1,
            repeatDelay : 5,
        },
        duration :1,
        ease : 'power3.out',

        });

        gsap.to ('.about-arrow', { yPercent : '+=20', yoyo:true, repeat : -1, duration : 1, ease : 'elastic.in(1, 0.8)', yoyoEase: 'elastic.out(1, 0.8)' });

    }

    // skills functions..
    const animateBars = ( reset = false ) => {


        const skillBars = gsap.utils.toArray('.skills-container');

        skillBars.forEach ( (el, i) => {

            let bars = el.querySelector ('.skills-bar');

            let perc = el.querySelector ('.skills-perc');

            if ( !reset ) {

                gsap.to (bars, { width : () => {
                    return bars.dataset.perc +'%';
                }, duration : 1, ease : 'power4.inOut', delay : i * 0.09 });

                gsap.set (perc, { visibility : 'visible', delay : i * 0.09 });

                gsap.to (perc, { width : () => {
                    return perc.dataset.perc +'%';
                }, duration : 1, ease : 'power4.inOut', delay : i * 0.09, onUpdate : () => {  

                    const toPerc = Math.ceil(perc.offsetWidth / el.offsetWidth * 100);

                    perc.querySelector('span').innerText = toPerc +'%';
                }});

            }else {

                
                gsap.to (bars, { width : '3%', duration : 0.8, ease : 'power4.out' });

                gsap.to (perc, { width : '3%', duration : 0.8, ease : 'power4.out', onUpdate : () => {  

                    const toPerc = Math.ceil(perc.offsetWidth / el.offsetWidth * 100);

                    perc.querySelector('span').innerText = toPerc +'%';

                }, onComplete : () => {

                    gsap.set (perc, { visibility : 'hidden' });

                }});

            }


            // gsap.from (perc, { xPercent : -100, duration : 0.5, ease : 'power3.out', delay : i * 0.05 });

        });

       
    };

    // project gallery functions..
    const setAutoSpin = ( spin = true,  dir = 0 ) => {

        clearInterval (_timer);

        if ( spin ) {

            _timer = setInterval ( () => {
    
                positionCards (true, dir !== 0);
    
            }, 1500 );

        }

    }

    const positionCards = ( spin = false, reverse = false ) => {

        const pCards = document.querySelectorAll(".project-card");

        const hRad = (pCards.length*10) + 100, vRad = 70;

        pCards.forEach( ( pCard, o ) => {

            if ( spin ) {

                if ( !reverse ) {
                    o = Number(pCard.dataset.index) - 1 >= 0 ? Number(pCard.dataset.index) - 1 : pCards.length - 1;
                }else {
                    o = Number(pCard.dataset.index) + 1 <= (pCards.length - 1)? Number(pCard.dataset.index) + 1 : 0;
                }

            }   

            pCard.dataset.index = o;

            const l = 180 - 360 / pCards.length * o;

            let a = Math.floor(0 + Math.sin(Math.PI / 180 * l) * hRad),
                c = Math.floor(-40 - Math.cos(Math.PI / 180 * l) * vRad);

            const d = l < 0 ? l + 1 : l,
                    s = Math.abs(l) / 180 * .3 + .7;

            gsap.to(pCard, { x: a, y: c, scale: s, zIndex: Math.abs(Math.ceil(d)), duration: .5, transformOrigin:'50% 50%', ease: "linear" });

        });

    };

    const initProjects = () => {

        document.querySelectorAll('.project-card').forEach( (el, i) => {
            el.addEventListener('click', () => openModal (el.dataset));
        });

        document.querySelectorAll('.modal-close').forEach (el => el.addEventListener('click', closeModal ));
        
        document.querySelectorAll('.controls button').forEach( (btn,i) => {

            btn.addEventListener('click', (e) => {
                switch (i) {
                    case 0:

                        _spinDirection = 0;

                        positionCards (true, _spinDirection);

                        if ( !_spinPaused ) setAutoSpin (true, _spinDirection);

                        break;
                    case 1:

                        _spinDirection = 1;

                        positionCards (true, _spinDirection);

                        if ( !_spinPaused ) setAutoSpin (true, _spinDirection);

                        break;
                    case 2:

                        _spinPaused = !_spinPaused;

                        if ( !_spinPaused ) {

                            positionCards (true, _spinDirection);

                            setAutoSpin (true, _spinDirection);
                        }else {
                            setAutoSpin (false);
                        }


                        btn.querySelector('span').innerText = _spinPaused ? 'play_arrow' : 'pause';

                        break;
                    default:
                }
            });
        });

    }


    // work experience functions..

    const showCards = ( el ) => {

        const line = el.querySelector('.w-hline');
        const card = el.querySelector('.content');
        const circ = el.querySelector('.w-circ')

        const tl = gsap.timeline ();

        tl
            .add ('key1')

            .set (circ, { display : 'block'}, 'key1')

            .fromTo (circ, {scale:0.6}, {scale:1, duration: 1, transformOrigin: '50% 50%', ease: "elastic.out(1.2, 0.5)" }, "key1")

            .set (line, { display : 'block'}, 'key1+=0.3')

            .fromTo (line, { scaleX : 0 }, { scaleX : 1, duration:0.3, ease: "power4.out", transformOrigin : '0 50%' }, 'key1+=0.3')

            .fromTo (card, { scale : 0 }, { scale: 1, duration: 0.8, ease: "elastic.out(1, 0.8)" }, 'key1+=0.3')


    }

    const hideCards = ( el ) => {

        const line = el.querySelector('.w-hline');

        const card = el.querySelector('.content');

        const circ = el.querySelector('.w-circ');


        const tl = gsap.timeline ();

        tl
            .add ('key1')

            .fromTo (card, { scale : 1 }, { scale: 0, duration:0.5, ease: "elastic.in(1, 0.8)" }, 'key1')

            .fromTo (line, { scaleX : 1 }, { scaleX : 0, duration:0.3, ease: "power4.out", transformOrigin : '0%50%' }, 'key1+=0.3')

            .set (line, { display : 'none'}, 'key1+=0.6')

            .fromTo (circ, {scale:1}, {scale: 0.6, duration: 0.8, transformOrigin: '50% 50%', ease: "elastic.in(1.2, 0.5)" }, "key1")

            .set (circ, { display : 'none'}, 'key1+=0.8')

           

            

    };
    
    const initScrollTriggers = () => {

        ScrollTrigger.create({
            trigger: "#skills",
            start: "top+=20 center",
            end: "center 63px",
            // markers : true,
            onEnter: () => animateBars(),
            onLeaveBack: () => animateBars(true),
        });

        const containers = gsap.utils.toArray('.work-card-container');

        containers.forEach( ( container, i ) => {

            ScrollTrigger.create({
                trigger: container,
                start: "top center",
                end: "top 63px",
                // markers : true,
                onEnter: ( self ) => showCards(self.trigger),
                onLeaveBack: ( self ) => hideCards(self.trigger)
            });
        });

        ScrollTrigger.create({
            trigger: "#projects",
            start: "center bottom",
            end: "center top",
            // markers : true,
            onEnter: () => {

                if ( !_projectsInited ) {

                    positionCards ();

                    setAutoSpin ( true, _spinDirection );

                    _projectsInited = true;
    
                }else {

                    if ( !_spinPaused ) {
                        positionCards (true, _spinDirection);

                        setAutoSpin ( true, _spinDirection );
                    }

                }
            },
            onLeave: () => {
                if ( !_spinPaused ) setAutoSpin ( false );
            },
            onEnterBack: () => {
                if ( !_spinPaused ) {
                    positionCards (true, _spinDirection);

                    setAutoSpin ( true, _spinDirection );
                }
            },
            onLeaveBack: () => {
                if ( !_spinPaused ) setAutoSpin ( false );
            }
        });

      

        // var tl = gsap.timeline({
        //     paused : true,
        //     defaults : {
        //         ease : 'power1.out'
        //     },
        //     delay : 0.5,
        // });

        // tl
        //     .addLabel ('open')
        //     .to ( '#skills', { top : "-=200", duration : 0.3 }, 'open')
        //     .to ( '#experience', { top : "+=200", duration : 0.3 }, 'open')
        //     .from ( '#cv-content', { xPercent : "-200", duration : 0.8 }, 'open')
        //     .from ( '#cv-img', { xPercent : "200", duration : 0.8 }, 'open');

        // ScrollTrigger.create ({
        //     trigger : '#cv',
        //     start : 'top center',
        //     end : 'top 60px',
        //     // markers : true,
        //     onEnter: () => tl.play(),
        //     onLeave: () => tl.reverse(),
        //     onEnterBack: () => tl.play(),
        //     onLeaveBack: () => tl.reverse()

        // })
    }



    const openModal = (data) => {


        setAutoSpin ( false ); 

        const modal = document.getElementById('modal-'+data.type);

        modal.style.display = 'block';


        const url = data.url.includes('https://') ? data.url : 'assets/projects/' + data.url;

        const container = modal.querySelector('.iframe-container');


        gsap.fromTo ( container, { scale : 0 }, { scale : 1, duration : 0.8, ease : 'elastic.out(1, 0.9)', onComplete : () => {

            modal.querySelector('iframe').src = url;

        }});




    }

    const closeModal = (e) => {

        const modal = e.target.parentNode;


        const iframe = modal.querySelector('iframe')

        const container = modal.querySelector('.iframe-container');


        gsap.fromTo ( container, { scale : 1 }, { scale : 0, duration : 0.8, ease : 'elastic.in(1, 0.9)', onComplete : () => {

            modal.style.display = 'none';
            
            if ( iframe ) iframe.src = "";

            if (!_spinPaused) setAutoSpin (true, _spinDirection);
    

        }});
    }
    
    const initEmailForm = () => {

        document.getElementById('contactForm').addEventListener('submit', function(event) {

            event.preventDefault(); // Prevent the default form submission

            const form = event.target;
            const formData = new FormData(form);

            const submitButton = document.getElementById('email-submit');
            submitButton.disabled = true;
            submitButton.innerText = 'Sending...';

            const responseMessage = document.getElementById('responseMessage');

            fetch(form.action, {
                method: form.method,
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                
                if (data.success) {

                    form.reset();

                    showResponseMsg ( 'Message sent successfully!' );

                } else {

                    showResponseMsg ( 'An error occurred. Please try again.', true, false );
                }


            })
            .catch(error => {
                console.error('Error:', error);
                showResponseMsg ( 'An error occurred. Please try again.', true, false );
            })
            .finally(() => {
                // Re-enable the submit button
                submitButton.disabled = false;
                submitButton.innerText = 'SUBMIT';
            });
        });


        document.querySelector('#responseMessage .close-btn').addEventListener ('click', () => {
            showResponseMsg ( '', false );
        } );


    }

    const showResponseMsg = ( msg, show = true,  success = true ) => {
        
        const main = document.getElementById('responseMessage');

        if ( msg !== '') {
            main.querySelector('.msg').textContent = msg;
        }

        if ( show ) {
            main.style.display = 'block';
            gsap.fromTo (main, { scale : 0 }, { scale : 1, duration : 0.6, ease : 'power4.out' });
        }else {
            gsap.to (main, { scale : 0, duration : 0.5, ease : 'power4.in', onComplete : () => {
                main.style.display = 'none';
            }});
        }

        main.classList.add( success ? 'bg-green-500' : 'bg-red-500');
        
        
    }

  
    const initPage = () => {

        // Initialize..

        initAbout ();

        initScrollTriggers();

        initProjects ();

        initEmailForm ();

    }
    //...
    document.addEventListener('DOMContentLoaded', () => {

        console.log('DOM loaded');  

        gsap.to ( '.loading-progress', { left : 0, duration : 1, ease : 'power4.out', onComplete : () => {
            gsap.to ( '#loading-screen', { yPercent : -100, duration : 0.5, ease : 'power4.out', onComplete : () => { 
                gsap.set ('#loading-screen', { display : 'none' });
                initPage ();
            }});

        } });

    });
    
    window.addEventListener('resize', function(event) {

        // calculateContainerHeight ();

        // console.log('Window resized to: ' + window.innerWidth + 'x' + window.innerHeight);

        // document.querySelector('#experience').style.top = ( window.innerHeight - 64 ) + 'px';

        // document.querySelector('#cv').style.top = ( window.innerHeight - 264 ) + 'px';


    });
   

    


})();