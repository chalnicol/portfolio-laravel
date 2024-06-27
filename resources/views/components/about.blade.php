


<div class="bg-white md:px-0 w-full min-h-[calc(100vh-4rem)] flex justify-center items-center">
    
    <div>
        <div class="flex items-center justify-center gap-2 my-8">
            @foreach($data['profile']['pictures'] as $key => $picture )
                 <div class="profile-img h-24 w-24 lg:h-32 lg:w-32 border-8 border-gray-200 rounded-md overflow-hidden shadow-xl rotate-[{{$key*20+20}}deg]">
                     <img class="w-full h-full" src="{{ asset('assets/images/' . $picture ) }}" alt="" style="z-index:0">
                 </div>
             @endforeach
         </div>
         <div class="w-11/12 max-w-2xl mx-auto">
             <div class="text-center font-bold text-2xl lg:text-4xl xl:text-5xl">
                Hi, I am {{ $data['profile']['firstName'] }}
                 {{-- {{ $data['profile']['name'] }}, {{ $data['profile']['details']['age'] }} --}}
             </div>
             <hr class="my-3">
             <p class="indent-8 text-justify text-md">
                 {{ $data['profile']['profileDescription'] }}
             </p>
         </div>

         <div class="my-6">
            <button id="main-cta" class="text-lg md:text-xl py-3 px-6 font-bold rounded-s-full rounded-e-full bg-gray-800 text-white flex items-center mx-auto">
                <span>VIEW MY WORK</span><span class="about-arrow ml-2 font-semibold material-symbols-outlined md:text-[1.5rem]">arrow_circle_down </span>
            </button>
         </div>
    </div>
</div>

