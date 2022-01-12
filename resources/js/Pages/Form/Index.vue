<template>
    <Head title="Forms" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2>Forms</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="table-auto">
                            <thead>
                                <tr class="border-b border-t bg-gray-100 border-gray-200">
                                    <th class="py-2 px-2">Form ID</th>
                                    <th class="py-2 px-2">Name</th>
                                    <th class="py-2 px-2">Created On</th>
                                    <th class="py-2 px-2">Created By</th>
                                    <th class="py-2 px-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="form in forms.data" class="border-b border-gray-200" v-bind="form.id">
                                    <td class="py-2 px-2">{{ form.id }}</td>
                                    <td class="py-2 px-2">{{ form.name }}</td>
                                    <td class="py-2 px-2">{{ formatDate(form.created_at) }}</td>
                                    <td class="py-2 px-2">{{ form.user_id}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex flex-row justify-between pt-3">
                            <div class="basis-1/2">
                            <Link v-if="forms.prev_page_url !== null" :href="forms.prev_page_url" class="underline text-sm text-gray-600 hover:text-gray-900">
                                Previous Page
                            </Link>
                            </div>
                            <div class="basis-1/2">
                            <Link v-if="forms.next_page_url !== null" :href="forms.next_page_url" class="underline text-sm text-gray-600 hover:text-gray-900">
                                Next Page
                            </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
    },
    props: {
        forms: Object,
    },
    methods: {
        formatDate(dateString) {
            const date = new Date(dateString);
            return new Intl.DateTimeFormat('default', { month: 'numeric', day: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit'}).format(date);
        }
    },
}
</script>

<style lang="scss" scoped>
    table{
        width: 100%;

        thead{
            text-align: left;
        }
    }
</style>
