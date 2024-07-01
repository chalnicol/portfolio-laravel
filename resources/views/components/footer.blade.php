

<div id="contacts" class="bg-gray-900">

    <div class="max-w-7xl mx-auto lg:flex px-5 pt-12 pb-20 gap-12" >

        <div class="w-full lg:w-1/2 text-white mb-12 lg:mb-0">
            <h1 class="text-2xl font-bold mb-2">Contacts</h1>
            <hr class="border-white border-b">

            <div class="flex items-center gap-4 my-3 text-gray-300">
                <span class="material-symbols-outlined">
                    mail
                </span>
                <span>{{ $data['profile']['details']['email'] }}</span>
            </div>

            <div class="flex items-center gap-4 my-3 text-gray-300">
                <span class="material-symbols-outlined">
                    globe
                </span>
                <span>{{ $data['profile']['details']['website'] }}</span>

            </div>
            <div class="flex items-center gap-4 my-3 text-gray-300">
                <span class="material-symbols-outlined">
                    smartphone
                </span>
                <span>{{ $data['profile']['details']['phone'] }}</span>

            </div>
            <div class="flex items-center gap-4 my-3 text-gray-300">
                <span class="material-symbols-outlined">
                    home
                </span>
                <span>{{ $data['profile']['details']['address'] }}</span>

            </div>

            <h1 class="text-2xl font-bold mb-2 mt-12">Socials</h1>
            <hr class="border-white border-b">
            <div class="flex gap-4 mt-4 px-0">

                @foreach($data['profile']['details']['socials'] as $key => $social )
                <div class="h-8 w-8 overflow-hidden shadow-lg z-auto">
                    <a href="{{ $social['url'] }}" target="_blank">
                        <img class="w-full h-full" src="{{ asset('assets/images/socials/'. $social['thumbnail'] ) }}" alt="{{  $social['name']}}">
                    </a>
                </div>
                @endforeach
            </div>

        </div>

        <div class="w-full lg:w-1/2 text-white">
            <h1 class="text-2xl font-bold mb-2">Leave A Message</h1>
            <hr class="border-white border-b">

            <form id="contactForm" action="{{ route('send.message') }}" method="POST">

               @csrf
                <div class="my-2">
                    {{-- <label for="name">Name</label><br> --}}
                    <input type="text" name="name" id="name" class="w-full h-10 rounded my-1 px-3 text-black" placeholder="Enter your name" required>
                </div>
                <div class="my-2">
                    {{-- <label for="email">Email</label><br> --}}
                    <input type="text" name="email" id="email" class="w-full h-10 rounded my-1 px-3 text-black" placeholder="Enter your e-mail" required>
                </div>
                <div class="my-2">
                    {{-- <label for="message">Message</label><br> --}}
                    <textarea name="message" id="message" class="w-full h-32 rounded my-1 p-3 text-black" placeholder="Enter message here" required></textarea>
                </div>
                <button id="email-submit" type="submit" class="w-full bg-gray-500 py-3 rounded-md text-xl font-bold hover:bg-gray-400">SUBMIT</button>
            </form>

            <div id="responseMessage" class="text-xs mt-3"></div>
           
        </div>

    </div>

    <div class="text-center text-white text-xs py-2 bg-gray-800">
        @ 2024 Chalnicol. Built using Laravel and Tailwind
    </div>
</div>