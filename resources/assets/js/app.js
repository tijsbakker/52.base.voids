import Swup from 'swup'
import SwupLivewirePlugin from '@swup/livewire-plugin'
import SwupParallelPlugin from '@swup/parallel-plugin'
import SwupPreloadPlugin from '@swup/preload-plugin'
import intersect from '@alpinejs/intersect'

Alpine.plugin(intersect)

document.addEventListener('alpine:init', () => {
    Alpine.data('app', () => ({
        navigate: true,
        swup: null,
        init() { 
            this.swup = new Swup({
                plugins: [
                    new SwupLivewirePlugin(),
                    new SwupParallelPlugin(),
                    new SwupPreloadPlugin()
                ]
			})
        }
    }))
})
