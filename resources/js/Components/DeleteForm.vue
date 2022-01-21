<template>
    <Link @click="destroy(form)" :class="class">
        <slot />
    </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { TrashIcon } from "@heroicons/vue/solid";
export default {
    components: {
        Link,
        TrashIcon,
    },
    props: {
        form: {
            type: Object,
            required: true,
        },
        class:  {
            type: String,
            required: false
        },
    },
    methods: {
        destroy(form) {
            if ( confirm(`Confirmation: Delete the form ${form.name}`) )
                this.$inertia.delete(route("forms.destroy", form.id));
        }
    }
}

</script>
