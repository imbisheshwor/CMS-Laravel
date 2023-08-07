@extends('dashboard.layout.app')

@section('content')

<div class="w-full px-6 py-6 mx-auto">
    <!-- table 1 -->

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="">Add Custom Post Type</h6>
                    <a href="{{ route('customPostType.index') }}" role="button" type="butt" on
                        class="focus:outline-none top-5 right-2 absolute text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">List</a>
                </div>
                {{-- <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto  pl-10 mt-96">

                        <form action="{{ route('customPostType.store') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Custom Post
                                    Type Name</label>
                                <input type="text" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="" required>
                            </div>
                            <div class="mb-6">
                                <label for="slug"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">slug</label>
                                <input type="text" id="password" name="slug"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            <a href="{{ url()->previous() }}"><button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button></a>
                        </form>


                    </div>
                </div> --}}

                <div class="min-h-screen flex mt-20 justify-center">
                    <div class="max-w-md w-1/2  p-6 bg-white rounded-lg shadow-lg">

                        <h1 class="text-xl font-semibold text-center text-gray-500 mt-8 mb-6">Custom Post Type</h1>
                        <form action="{{ route('customPostType.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="nombre" class="block mb-2 text-sm text-gray-600">Name</label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="apellido" class="block mb-2 text-sm text-gray-600">Slug</label>
                                <input type="text" id="slug" name="slug"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    required>
                            </div>


                            <button type="submit"
                                class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection