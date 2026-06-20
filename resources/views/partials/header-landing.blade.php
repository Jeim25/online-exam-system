<header class="bg-[#880000] text-white shadow-md sticky top-0 z-50">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
                <img src="{{ asset('PUPLogo.png') }}" alt="PUP Logo" class="w-10 h-10 object-cover rounded-full mr-3">
                <a href="{{ url('/') }}" class="hidden sm:block text-sm md:text-lg font-bold text-white hover:text-[#FFD700] transition-colors whitespace-normal md:whitespace-nowrap mr-2 md:mr-0">
                    PUP Online Examination System
                </a>
            </div>
            <div class="flex items-center space-x-3 md:space-x-4">
                <a href="{{ route('login') }}" class="text-sm md:text-base text-white font-medium hover:text-[#FFD700] transition-colors">
                    Log in
                </a>
                <a href="{{ route('register') }}" class="bg-[#FFD700] text-[#880000] px-3 py-1.5 md:px-4 md:py-2 rounded-md font-bold hover:bg-[#facc15] transition-colors text-sm md:text-base">
                    Sign Up
                </a>
            </div>
        </div>
    </div>
</header>