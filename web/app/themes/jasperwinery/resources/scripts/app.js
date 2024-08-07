import domReady from '@roots/sage/client/dom-ready'
import anime from 'animejs/lib/anime.es.js'

import Alpine from 'alpinejs'
import anchor from '@alpinejs/anchor'

Alpine.plugin(anchor)
Alpine.start()

/**
 * Application entrypoint
 */
domReady(async () => {
    var textWrapper = document.querySelector('.letters')

    if (textWrapper) {
        textWrapper.innerHTML = textWrapper.textContent.replace(
            /\S/g,
            "<span class='letter'>$&</span>"
        )

        anime.timeline({ loop: false }).add({
            targets: '.ml1 .letter',
            scale: [0.3, 1],
            opacity: [0, 1],
            translateZ: 0,
            easing: 'easeOutExpo',
            duration: 1000,
            delay: (el, i) => 40 * (i + 1),
        })
    }
})

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error)
