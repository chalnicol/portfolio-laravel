

<nav class="bg-gray-900 h-16 w-full border-b-2 border-gray-300 text-white shadow-md sticky top-0 z-[50]">

    <div class="px-5 h-full mx-auto relative flex justify-between items-center">
        <div id="nav-left" class="flex items-center gap-4">
            <div id="nav-brand">
                <a href="/" class="nav-brand">
                    <div class="flex items-center">
                        <img class="h-9 mr-2" src="{{ asset('assets/images/mylogocn.png') }}" alt="">
                        <span class="text-lg font-bold">Portfolio Website</span>
                    </div>
                </a>
            </div>
        </div>

        <div id="nav-right" class="md:flex items-center gap-4">

            <!-- adf -->
            <div id="nav-right-links" class="hidden md:block">
                <div class="flex items-center gap-6">
                    <div><a href="#projects" class="my-link hover:text-gray-300">Project Gallery</a></div>
                    <div><a href="#skills" class="my-link hover:text-gray-300">Skills</a></div>
                    <div><a href="#experience" class="my-link hover:text-gray-300">Work Experience</a></div>
                </div>
            </div>

            <!-- hamburger -->
            <div id="nav-right-hamburger" class="md:hidden" >
                <span class="material-symbols-outlined leading-normal">
                    menu
                </span>
            </div>

        </div>

        <div id="responsive-menu-container" class="md:hidden absolute w-full h-[calc(100vh-4rem)] top-16 start-0 z-100 overflow-hidden" style="background-color: #0a0a0a99" >

                <div id="responsive-menu" class="w-3/4 h-full bg-gray-500 absolute start-full">
                    <a href="#projects" class="my-link">
                        <div class="p-3 border-b">
                            Project Gallery
                        </div>
                    </a>
                    <a href="#skills" class="my-link">
                        <div class="p-3 border-b">
                            Skills
                        </div>
                    </a>
                    <a href="#experience" class="my-link">
                        <div class="p-3 border-b">
                            Work Experience
                        </div>
                    </a>
                    
                </div>
            
        </div>

    </div>

</nav>

