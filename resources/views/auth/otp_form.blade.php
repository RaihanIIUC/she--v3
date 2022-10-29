<x-guest-layout>

    <section class="pb-24">
        <div class="pt-24 pb-36 bg-blueGray-100 text-center rounded-b-10xl">
            <div class="container px-4 mx-auto">
                <span
                    class="inline-block py-3 px-7 mb-8 text-lg font-medium font-heading leading-5 text-indigo-500 border border-indigo-500 rounded-6xl">
                    OTP</span>

            </div>


        </div>



        <form method="POST" action="{{ route('otp') }}">
            @csrf
            <div class="container px-4 mx-auto">
                <div class="-mt-52 max-w-4xl mx-auto py-10 px-8 bg-white rounded-4xl shadow-xl">


                    <div class="mt-10 py-16 px-6 border-2 border-gray-50 rounded-4xl">

                        <div class="max-w-md mx-auto">
                            @if (session()->has('error'))
                            <div class="bg-indigo-900 py-2 lg:px-4 my-2 rounded-lg">
                                <div class="p-2 bg-indigo-800  text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                                    role="alert">
                                    <span
                                        class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
                                    <span
                                        class="font-semibold mr-2 text-left flex-auto">{{ session()->get('error') }}</span>

                                </div>
                            </div>
                            @endif

                            <input name="otp"
                                class="w-full mb-6 py-3 px-12 text-sm border-2 border-gray-300 rounded-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" placeholder="otp">

                            <div class="flex items-center justify-center mt-4">

                                <x-primary-button class="ml-3">
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </section>

</x-guest-layout>
