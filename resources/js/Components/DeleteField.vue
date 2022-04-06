<template>
    <Link @click="destroy(field)" :class="class">
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
        field: {
            type: Object,
            required: true,
        },
        class:  {
            type: String,
            required: false
        },
    },
    methods: {
        destroy(field) {
            if ( confirm(`Confirmation: Delete the field ${field.name}`) )
                this.$inertia.delete(route("form_fields.destroy", field.id));
        }
    }
}
</script>
