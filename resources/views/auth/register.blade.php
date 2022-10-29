<x-guest-layout>

    <section class="pb-24">
        <div class="pt-24 pb-36 bg-blueGray-100 text-center rounded-b-10xl">
            <div class="container px-4 mx-auto">
                <span
                    class="inline-block py-3 px-7 mb-8 text-lg font-medium font-heading leading-5 text-indigo-500 border border-indigo-500 rounded-6xl">Create
                    account</span>

            </div>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="container px-4 mx-auto">
                <div class="-mt-52 max-w-4xl mx-auto py-10 px-8 bg-white rounded-4xl shadow-xl">


                    <div class="mt-10 py-16 px-6 border-2 border-gray-50 rounded-4xl">

                        <div class="max-w-md mx-auto">


                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="bg-indigo-900 py-2 lg:px-4 my-2 rounded-lg">
                                <div class="p-2 bg-indigo-800  text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                                    role="alert">
                                    <span
                                        class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
                                    <span class="font-semibold mr-2 text-left flex-auto">{{ $error }}</span>

                                </div>
                            </div>
                            @endforeach
                            @endif

                            @if ( Session::has('otpError'))
                            <div class="bg-indigo-900 py-2 lg:px-4 my-2 rounded-lg">
                                <div class="p-2 bg-indigo-800  text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                                    role="alert">
                                    <span
                                        class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
                                    <span
                                        class="font-semibold mr-2 text-left flex-auto">{{ session()->get('otpError') }}</span>

                                </div>
                            </div>
                            @endif

                            <div>
                                <x-input-label for="phone" :value="__('phone')" />

                                <input name="phone"
                                    class="w-full mb-3 py-3 px-12 text-sm border-2 border-gray-300 rounded-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    type="tel" placeholder="Your Phone Number">

                            </div>

                            <div>

                                <x-input-label for="nid" :value="__('nid')" />

                                <input name="nid"
                                    class="w-full mb-3 py-3 px-12 text-sm border-2 border-gray-300 rounded-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    type="text" placeholder="Your NID ">

                            </div>

                            <div>
                                <x-input-label for="name" :value="__('name')" />

                                <input name="name"
                                    class="w-full mb-3 py-3 px-12 text-sm border-2 border-gray-300 rounded-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    type="text" placeholder="name">

                            </div>

                            <div>
                                <x-input-label for="district" :value="__('district')" />

                                <input name="district"
                                    class="w-full mb-3 py-3 px-12 text-sm border-2 border-gray-300 rounded-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    type="text" placeholder="District">


                            </div>

                            <div>

                                <x-input-label for="reff" :value="__('refference')" />

                                <input name="reff"
                                    class="w-full mb-3 py-3 px-12 text-sm border-2 border-gray-300 rounded-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    type="text" placeholder="Refference">


                            </div>


                            <div>

                                <x-input-label for="password" :value="__('password')" />

                                <input name="password"
                                    class="w-full mb-3 py-3 px-12 text-sm border-2 border-gray-300 rounded-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    type="password" placeholder="Password">

                            </div>
                            <div>
                                <x-input-label for="password_confirmation" :value="__('password confirmation')" />

                                <input name="password_confirmation"
                                    class="w-full mb-3 py-3 px-12 text-sm border-2 border-gray-300 rounded-xl focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    type="password" placeholder="password_confirmation">

                            </div>
                            <div class="flex items-center justify-center mt-4">
                                <a href={{ url('login') }} class="underline text-sm text-gray-600 hover:text-gray-900">
                                    {{ __('Login ?') }}
                                </a>

                                <x-primary-button class="ml-3">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </section>

</x-guest-layout>
