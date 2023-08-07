@extends('dashboard.layout.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="">Add {{ $cpt->name }}</h6>
                        <a href="{{ route('customPostType.show', $cpt_id) }}" role="button" type="button"
                            class="focus:outline-none top-5 right-2 absolute text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">List</a>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto mt-10 pl-10">


                            <form action="{{ route('store.store',$slug) }}" method="POST">
                                @csrf
                                <input type="hidden" name="cpt_id" value="{{ $cpt_id }}">
                                @foreach ($entity as $item)
                                
                                <div class="mb-6">
                                        <label for="{{$item->slug}}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$item->name}}</label>
                                        <input type="{{$item->type}}" name="values[{{$item->id}}]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>
                                @endforeach

                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                <a href="{{ url()->previous() }}"><button type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button></a>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card 2 -->
    @endsection
