

<nav class="bg-gray-900 h-16 w-full border-b-2 border-gray-300 text-white shadow-md sticky top-0 z-100 ">

    <div class="max-w-7xl px-5 h-full mx-auto relative flex justify-between items-center">
        <div id="nav-left" class="flex items-center gap-4">
            <div id="nav-brand">
                <a href="/">
                    <div class="flex items-center">
                        <img class="h-9 mr-2" src="{{ asset('assets/images/mylogocn.png') }}" alt="">
                        <span class="text-lg font-bold">Portfolio Website</span>
                    </div>
                </a>
            </div>
        </div>

        <div id="nav-right" class="flex items-center gap-4">

            <!-- adf -->
            <div id="nav-right-links" class="hidden md:block">
                <div class="flex items-center gap-6">
                    <div><a href="#" class="hover:text-red-400">Project Gallery</a></div>
                    <div><a href="#" class="hover:text-red-400">Work Experience</a></div>
                    <div><a href="#" class="hover:text-red-400">Skills</a></div>
                </div>
            </div>

            <!-- hamburger -->
            <div id="nav-right-hamburger" class="md:hidden">
                <span class="material-symbols-outlined leading-normal">
                    menu
                </span>
            </div>

            <div class="hidden absolute w-3/4 h-[calc(100vh-4rem)] top-16 start-1/4 z-100 bg-gray-500" id="responsive-menu">
                
                <a href="/">
                    <div class="p-3 border-b">
                        Project Gallery
                    </div>
                </a>
                <a href="/">
                    <div class="p-3 border-b">
                        Work Experience
                    </div>
                </a>
                <a href="/">
                    <div class="p-3 border-b">
                        Skills
                    </div>
                </a>
            </div>

        </div>
    </div>

</nav>

