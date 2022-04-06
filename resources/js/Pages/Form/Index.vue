<template>
    <Head title="Forms" />
    <BreezeAuthenticatedLayout>
        <template #header>
            My Forms
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <Link :href="route('forms.create')" class="bg-navy color-white rounded hover:bg-lightBlue hover:color-white py-1 px-2 mb-2 text-white">
                                New Form
                            </Link>
                        </div>
                        <div class="overflow-auto lg:overflow:visible">
                        <table class="table-auto w-screen md:w-full">
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
                                <tr v-for="form in forms.data" class="border-b border-gray-200" v-bind:key="form.id">
                                    <td class="py-2 px-2">{{ form.id }}</td>
                                    <td class="py-2 px-2">{{ form.name }}</td>
                                    <td class="py-2 px-2"><FormatDate :date="form.created_at" /></td>
                                    <td class="py-2 px-2">{{ form.user_id}}</td>
                                    <td class="p-2 text-center">
                                        <Link class="p-2 mr-2 border-2 inline-block rounded hover:bg-gray-200" :href="route('forms.edit', form.id)">
                                            <PencilIcon class="h-5 w-5 text-navy" />
                                            <span class="sr-only">Edit Form: {{ form.name }}</span>
                                        </Link>
                                        <Link class="p-2 mr-2 border-2 inline-block rounded hover:bg-gray-200" :href="route('forms.show', form.id)">
                                            <EyeIcon class="h-5 w-5 text-lightBlue" />
                                            <span class="sr-only">View Form Details: {{ form.name }}</span>
                                        </Link>
                                        <DeleteForm :form="form" class="p-2 border-2 inline-block rounded hover:bg-red-900 hover:border-red-900 text-red-500 hover:text-white">
                                            <TrashIcon class="h-5 w-5" />
                                            <span class="sr-only">Delete Form: {{ form.name }}</span>
                                        </DeleteForm>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
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
        forms: Object,
    },
}
</script>

<style lang="scss" scoped>
</style>
