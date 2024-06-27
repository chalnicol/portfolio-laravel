

<div id="projects" class="bg-gray-200 pb-[50px] w-full min-h-[calc(100vh-4rem)] flex justify-center items-center">

    <div class="w-full max-w-3xl mx-auto">
        
        <h1 class="h1 text-4xl py-6 text-center font-bold">Project Gallery</h1>


        {{-- <div class="w-full grid md:grid-cols-2 lg:grid-cols-4 gap-3 justify-center items-center"> --}}

        <div class="w-full h-[540px] overflow-hidden flex items-center justify-center relative">
            <div class="w-[750px] h-full flex justify-center items-center absolute start-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%]">

                @foreach ($data['profile']['recentWorks'] as $key => $recentWork)

                    
                        <div data-index="{{ $key }}" class="project-card p-3 absolute bg-white h-auto w-[240px] aspect-[0.7] shadow-lg rounded-lg overflow-hidden border border-gray-400 hover:bg-gray-100">

                            <a href="{{ $recentWork['url'] }}" target="_blank">
                                <div class="w-full h-auto aspect-square border border-gray-400 overflow-hidden">
                                    <img class="w-full h-full object-cover" src="{{ asset('assets/images/recentwork/'. $recentWork['image'] ) }}" alt="{{ $recentWork['title'] }}">
                                </div>
                                <div class="grow overflow-hidden py-1">

                                    <div class="font-bold text-lg">{{ $recentWork['title'] }}</div>

                                    <div class="text-sm">
                                        {{ $recentWork['description'] }}
                                    </div>
                                </div>
                            </a>

                        </div>
                    

                @endforeach

                <div class="controls w-[35%] h-8 absolute bottom-2 z-[999] grid grid-cols-3 justify-around gap-2">

                    <button class="bg-gray-800 h-full text-white hover:bg-gray-600 rounded flex items-center justify-center">
                        <span class="material-symbols-outlined  font-bold">
                            chevron_left
                            </span>
                    </button>

                    <button class="bg-gray-800 h-full text-white hover:bg-gray-600 rounded flex items-center justify-center">
                        <span class="material-symbols-outlined  font-bold">
                            chevron_right
                            </span>
                    </button>

                    <button class="bg-gray-800 h-full text-white hover:bg-gray-600 rounded flex items-center justify-center">
                        <span class="material-symbols-outlined">
                            pause
                            </span>
                    </button>

                 

                </div>
            </div>
        </div>
    </div>

</div>
