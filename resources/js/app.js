import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { ZiggyVue } from './ZiggyVue'

const response = await fetch('/api/routes')
const Ziggy = await response.json()

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel'

import { modal } from "momentum-modal"

function getResolve() {
    return (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
}

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: getResolve(),
    async setup({el, app, props, plugin}) {
        return createApp({render: () => h(app, props)})
            .use(modal, {
                resolve: getResolve(),
            })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el)
    },
})
    .then(r => {})

 InertiaProgress.init({ color: '#4B5563' })
