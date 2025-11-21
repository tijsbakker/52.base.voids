<html>
    <head>
        <title>{{ app('currentSite')->name }}</title>
        <link rel="preload" href="/fonts/helvetica-now-display/index.css" as="style" />
        <link rel="stylesheet" href="/fonts/helvetica-now-display/index.css" />
        <link rel="preload" href="/fonts/helvetica-now-text/index.css" as="style" />
        <link rel="stylesheet" href="/fonts/helvetica-now-text/index.css" />
        @vite('resources/assets/css/app.css')
        @livewireStyles
    </head>
    <body class="flex flex-col min-h-screen bg-zinc-800 text-white" x-data="app">
        <aside 
            class="relative h-screen w-screen" 
            x-data="{
                active: 0,
                previous: 0,
                toggle(id) {
                    this.previous = this.active;
                    this.active = this.active === id ? 0 : id;
                    this.navigate = this.active ? false : true;
                }
            }"
        >
            <a 
                href="/"
                class="absolute z-20 top-0 left-0 w-[50vw] h-screen bg-sky-800"
                style="--initial-z: 20"
                x-on:click="toggle(1)"
            >
                <div class="flex items-center justify-center h-full">
                    <h1 class="text-4xl font-bold">Hello World 1</h1>
                </div>
            </a>
            <a 
                href="/"
                class="absolute z-19 top-0 left-0 w-[50vw] h-screen bg-sky-700 scale-95 translate-x-2/12 transition-transform duration-500"
                style="--initial-z: 19"
                x-bind:class="{ 
                    'animate-card-to-right': active === 1,
                    'animate-card-to-right-reverse': active !== 1 && previous === 1
                }"
                x-on:click="toggle(1)"
            >
                <img src="https://www.hanswilschut.com/wp-content/uploads/2001/01/negative.jpg" class="w-full h-full object-cover" />
            </a>
            <a 
                href="/hello-world-2"
                class="absolute z-18 top-0 left-0 w-[50vw] h-screen bg-teal-600 scale-90 translate-x-4/12 transition-transform duration-500" 
                style="--initial-z: 18; --translate-x: 120%"
                x-bind:class="{ 
                    'animate-card-to-left': active === 2,
                    'animate-card-to-left-reverse': active !== 2 && previous === 2
                }"
                x-on:click="toggle(2)"
            >
                <div class="flex items-center justify-center h-full">
                    <h1 class="text-4xl font-bold">Hello World 2</h1>
                </div>
            </a>
            <a 
                href="/hello-world-2"
                class="absolute z-17 top-0 left-0 w-[50vw] h-screen bg-teal-500 scale-85 translate-x-6/12 transition-transform duration-500"
                style="--initial-z: 17; --translate-x: 120%"
                x-bind:class="{ 
                    'animate-card-to-right': active === 2,
                    'animate-card-to-right-reverse': active !== 2 && previous === 2
                }"
                x-on:click="toggle(2)"
            >
                <img src="https://www.hanswilschut.com/wp-content/uploads/2001/01/negative.jpg" class="w-full h-full object-cover" />
            </a>
            <a 
                href="/hello-world-3"
                class="absolute z-16 top-0 left-0 w-[50vw] h-screen bg-rose-400 scale-80 translate-x-8/12 transition-transform duration-500"
                style="--initial-z: 16; --translate-x: 150%"
                x-bind:class="{ 
                    'animate-card-to-left': active === 3,
                    'animate-card-to-left-reverse': active !== 3 && previous === 3
                }"
                x-on:click="toggle(3)"
            >
                <div class="flex items-center justify-center h-full">
                    <h1 class="text-4xl font-bold">Hello World 3</h1>
                </div>
            </a>
            <a 
                href="/hello-world-3"
                class="absolute z-15 top-0 left-0 w-[50vw] h-screen bg-rose-300 scale-75 translate-x-10/12 transition-transform duration-500"
                style="--initial-z: 15; --translate-x: 150%"
                x-bind:class="{ 
                    'animate-card-to-right': active === 3,
                    'animate-card-to-right-reverse': active !== 3 && previous === 3
                }"
                x-on:click="toggle(3)"
            >
                <img src="https://www.hanswilschut.com/wp-content/uploads/2001/01/negative.jpg" class="w-full h-full object-cover" />
            </a>
            <a 
                href="/hello-world-4"
                class="absolute z-14 top-0 left-0 w-[50vw] h-screen bg-amber-200 scale-70 translate-x-12/12 transition-transform duration-500"
                style="--initial-z: 14; --translate-x: 180%"
                x-bind:class="{ 
                    'animate-card-to-left': active === 4,
                    'animate-card-to-left-reverse': active !== 4 && previous === 4
                }"
                x-on:click="toggle(4)"
            >
                <div class="flex items-center justify-center h-full">
                    <h1 class="text-4xl font-bold">Hello World 4</h1>
                </div>
            </a>
            <a 
                href="/hello-world-4"
                class="absolute z-13 top-0 left-0 w-[50vw] h-screen bg-amber-100 scale-65 translate-x-14/12 transition-transform duration-500"
                style="--initial-z: 13; --translate-x: 180%"
                x-bind:class="{ 
                    'animate-card-to-right': active === 4,
                    'animate-card-to-right-reverse': active !== 4 && previous === 4
                }"
                x-on:click="toggle(4)"
            >
                <img src="https://www.hanswilschut.com/wp-content/uploads/2001/01/negative.jpg" class="w-full h-full object-cover" />
            </a>  
        </aside>
        <main 
            class="grow grid transition-opacity duration-500" 
            x-bind:class="[ navigate && 'opacity-0 md:opacity-100' ]"
            x-show="!navigate"
            x-cloak
        >
            <div id="swup" class="relative row-start-1 col-start-1 transition-fade">
                {{ $slot }}
            </div>
        </main>
        @livewireScripts
        @vite('resources/assets/js/app.js')
    </body>
</html>