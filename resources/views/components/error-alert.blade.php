@if ($errors->any())
    <div class="max-w-7xl mx-auto sm:px-6 pt-8 lg:px-8">
        <div class="bg-white dark:bg-red-800/30 border-red-800 border overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h4>{{ $errors->first() }}</h4>
            </div>
        </div>
    </div>
@endif
    

