
<div id="experience" class="bg-gray-200 md:px-0 px-3 pb-[100px] w-full min-h-[calc(100vh-4rem)]">




    <div class="w-11/12 max-w-3xl flex flex-col items-center justify-center mx-auto">

        <h1 class="lg:text-4xl pb-6 mt-12 text-center font-bold">Work Experience</h1>

        @foreach($data['profile']['workExperience'] as $key => $recentWork)

            <div class="flex w-full work-card-container">

                <div class="min-w-6 md:min-w-14 relative">

                    @if ($key == 0 )
                        <div class="w-vline absolute h-1/2 w-1 bg-black start-1 top-1/2 translate-x-[-50%] "></div>

                    @elseif ($key == count($data['profile']['workExperience'])-1 )

                        <div class="w-vline absolute h-1/2 w-1 bg-black start-1 translate-x-[-50%] "></div>

                    @else
                        <div class="w-vline absolute h-full w-1 bg-black start-1 translate-x-[-50%] "></div>
                    @endif

                    <div class="w-hline hidden absolute w-full h-1 bg-black start-1 top-1/2 origin-center translate-y-[-50%]"></div>

                    <div class="w-circ absolute w-4 h-4 bg-black start-1 origin-center rounded-full top-1/2 translate-x-[-50%] translate-y-[-50%]"></div>
                </div>
                <div class="grow py-2 z-20">
                    <div class="w-card scale-0 bg-white border border-black rounded-lg overflow-hidden shadow-lg">
                        
                        <div class=" bg-gray-800 text-sm text-white p-3">
                            {{ $recentWork['start'] . ' - ' . $recentWork['end']}}
                        </div> 

                        <div class="px-3 md:px-5 pb-8 pt-2">
                            <div class="font-bold text-xl md:text-2xl">
                                {{ $recentWork['position'] }}
                            </div>
                            @if ( $recentWork['company'] !== '')
                                <div class="text-sm text-gray-600">
                                    Company : <span class="font-semibold">{{ $recentWork['company']}}</span>
                                </div> 
                            @endif
                            <div class="mt-2 ml-6">
                                <ul class="list-disc">
                                    @foreach($recentWork['jobDescription'] as $jd)
                                        <li class="text-gray-700">{{ $jd }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>


</div>