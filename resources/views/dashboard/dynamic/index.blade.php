@extends('dashboard.layout.app')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div
                        class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent relative">
                        <h6>Data of {{ $cpt->name }}</h6>

                        <a href="{{ route('store.create', $cpt->slug) }}" role="button" type="button"
                            class="focus:outline-none top-5 right-2 absolute text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</a>

                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            S.N</th>
                                        @foreach ($entity as $item)
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $item->name }}</th>
                                        @endforeach

                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b  whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400 ">{{ $loop->iteration }}</span>
                                            </td>

                                            @foreach ($item as $i)
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2 py-1">


                                                        <div class="flex flex-col justify-center">
                                                            <h6 class="mb-0 text-sm leading-normal">{{ $i->value }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endforeach

                                            <td
                                                class="p-2 text-sm leading-normal text-left align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <a
                                                    href="{{ route('store.edit', ['custom_post_type_slug' => $cpt->slug, 'key' => $key]) }}"><span
                                                        class="bg-gradient-to-tl from-blue-600 to-gray-400 cursor-pointer px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">edit</span></a>


                                                        <button onclick="confirm('Are you Sure want to delete?')" class="bg-gradient-to-tl from-red-600 to-orange-700 cursor-pointer px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                            <a href="{{ route('store.delete', ['custom_post_type_slug' => $cpt->slug, 'key' => $key]) }}"><span>Delete</span></a></button>



                                            </td>


                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card 2 -->
    @endsection
