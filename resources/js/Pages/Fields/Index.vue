<template>
    <Head title="Form Fields" />
    <BreezeAuthenticatedLayout>
        <template #header>
            Form Fields
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>Below you will find a listing of all of the available field types and their uses inside of Form Manager.</p>
                        <div class="mt-4" v-for="field in form_fields" :key="field.id">
                            <h2 class="text-xl font-bold text-navy">{{ field.name}}</h2>
                            <p>{{ field.description }}.</p>
                            <p><strong>Element and Type:</strong> <code class="border text-sm px-2 py-1 rounded text-navy border-navy">&lt;{{ field.element }}<span v-if="field.type"> type=&apos;{{ field.type }}&apos;</span>&gt;</code></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import FormatDate from "@/Components/FormatDate.vue";
import DeleteForm from "@/Components/DeleteForm.vue";
import { EyeIcon, PencilIcon, TrashIcon } from "@heroicons/vue/outline";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        FormatDate,
        EyeIcon,
        PencilIcon,
        TrashIcon,
        DeleteForm,
        Head,
        Link,
    },
    props: {
        form_fields: Object,
    },
}
</script>

<style lang="scss" scoped>
</style>
