<template>
    <Head :title="'Viewing: ' + form.name" />
    <BreezeAuthenticatedLayout>
        <template #header>
            Viewing: {{ form.name }}
        </template>
        <template #nav>
            <div class="flex">

                <!--v-if="canedit"-->
                <Link :href="route('forms.edit', form.id)" class="underline text-sm text-gray-600 hover:text-gray-900 mx-1 px-2 my-1">
                    Edit
                </Link>
                <!--v-if="candelete"-->
                <DeleteForm :form="form" class="underline text-sm text-gray-600 hover:text-gray-900 mx-1 px-2 my-1">
                    Delete
                </DeleteForm>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-lg">Form Details</h2>
                        <p><strong>Form Name:</strong> {{ form.name }}</p>
                        <p><strong>Form Details:</strong> {{ form.description }}</p>
                        <p><strong>Created:</strong> <FormatDate :date="form.created_at"/></p>
                        <p><strong>Last Updated:</strong> <FormatDate :date="form.updated_at" /></p>
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
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        FormatDate,
        DeleteForm,
        Head,
        Link,
    },
    props: {
        form: Object,
    },
    methods: {
    },
}
</script>
