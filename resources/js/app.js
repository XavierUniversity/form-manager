require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
// Custom Components
import ThemeSwitcher from "@/Components/ThemeSwitcher";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Form Manager @ Xavier U.';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mixin({ components : { ThemeSwitcher } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
