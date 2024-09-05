
<div id="skills" class="bg-white md:px-0 px-3 pb-[50px] w-full min-h-[calc(100vh-4rem)] flex justify-center items-center">

    <div class="w-11/12 max-w-4xl mx-auto pointer-none">

        <h1 class="text-4xl py-6 text-center font-bold">Skills</h1>

        <div class="w-full grid md:grid-cols-2 gap-x-10 gap-y-2 mt-2 pointer-none">

            @foreach ($data['profile']['skills'] as $skill)
                <div class="flex items-center">

                    <div class="min-w-[40%] md:min-w-[33%] font-bold text-md md:text-lg">{{ $skill['name'] }}</div>

                    <div class="skills-container grow bg-gray-300 border border-gray-300 relative h-6 2xl:h-7 overflow-hidden">

                        <div class="skills-bar absolute h-full bg-gray-800 w-[3%] border-r-4 border-red-800" data-perc="{{ $skill['level']}}"></div>

                        <div class="skills-perc absolute h-full flex justify-end items-center pr-3 w-[3%] invisible" data-perc="{{ $skill['level']}}">
                            <span class="text-xs text-white font-bold">10%</span> 
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>