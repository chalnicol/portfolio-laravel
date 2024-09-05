

<div id="cv" class="w-full h-[400px] bg-gray-800 text-white absolute top-[calc(100vh-200px-4rem)] z-[2] select-none border-t border-gray-500">
    <div class="w-full h-full flex items-center justify-center">

        <div class="h-2/3 w-[90%] max-w-[450px] flex items-center justify-center ">
            <div class="h-[130px] w-[130px] border-r overflow-hidden">
                <img src="{{ asset('assets/images/ok.png')}}" alt="ok" id="cv-img" class="w-full h-full object-contain">
            </div>
            <div class="grow overflow-hidden px-3">
                <div id="cv-content" class="w-full text-center px-3 border py-3 rounded-lg">
                    <h1 class="text-xl font-bold">Download CV Here</h1>
                    
                    <a href="{{ asset('cv.pdf') }}" download="Chandra_Chandran_CV.pdf">
                        <div class="py-2 px-4 mt-3 bg-white rounded text-sm cursor-pointer text-black shadow-lg hover:bg-gray-200">Curricullum_Vitae.pdf 10KB</div>
                    </a>
                </div>
            </div>
            
        </div>
        
    </div>
</div>