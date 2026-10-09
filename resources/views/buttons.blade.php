@extends('partials.layout')
@section('content')
    <div class="container mx-auto p-6 space-y-8">
        <div>
            <h2 class="text-xl font-bold mb-3">Näide 1: Lihtne nupp</h2>
            <button class="border-2 text-white bg-blue-400 px-3 py-1">Hello</button>
        </div>

        <div>
            <h2 class="text-xl font-bold mb-3">Näide 2: Button Group</h2>
            <div class="inline-flex">
                <button
                    class="rounded-s-sm border border-gray-200 px-3 py-2 font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white focus:outline-none disabled:pointer-events-auto disabled:opacity-50">
                    View
                </button>

                <button
                    class="-ms-px border border-gray-200 px-3 py-2 font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white focus:outline-none disabled:pointer-events-auto disabled:opacity-50">
                    Edit
                </button>

                <button
                    class="-ms-px rounded-e-sm border border-gray-200 px-3 py-2 font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white focus:outline-none disabled:pointer-events-auto disabled:opacity-50">
                    Delete
                </button>
            </div>
        </div>

        <div>
            <h2 class="text-xl font-bold mb-3">Ülesanne: Bootstrapi btn-primary (ainult Tailwindi klassidega)</h2>
            {{-- Bootstrapi btn-primary järele tehtud ainult Tailwindi klassidega koos hover, active ja focus olekuga --}}
            <button
                type="button"
                class="inline-block rounded-md border border-blue-600 bg-blue-600 px-4 py-2 text-center text-base font-normal text-white shadow-sm transition duration-150 ease-in-out hover:border-blue-700 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 active:border-blue-800 active:bg-blue-800 disabled:pointer-events-none disabled:opacity-65">
                Click me! (Tailwind btn-primary)
            </button>
        </div>

        <div>
            <h2 class="text-xl font-bold mb-3">Võrdlus: DaisyUI btn-primary</h2>
            <button class="btn btn-primary">Click me! (DaisyUI)</button>
        </div>
    </div>
@endsection
