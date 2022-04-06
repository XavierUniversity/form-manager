<template>
    <Head title="Create Form" />
    <BreezeAuthenticatedLayout>
        <template #header>
            Create Form
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <fieldset>
                                <legend>Form Details</legend>
                                <div>
                                    <BreezeLabel for="name" value="Name" />
                                    <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="details.name" required autofocus />
                                </div>

                                <div class="mt-4">
                                    <BreezeLabel for="description" value="Description" />
                                    <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="details.description" required />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <BreezeButton class="ml-4" :class="{ 'opacity-25': details.processing }" :disabled="details.processing">
                                        Save Form
                                    </BreezeButton>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeButton from "@/Components/Button.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
export default{
    components: {
        BreezeAuthenticatedLayout,
        BreezeInput,
        BreezeLabel,
        BreezeButton,
        Head,
        useForm,
    },
    setup() {
        const details = useForm({
            name: null,
            description: null,
        });

        return { details };
    },
    methods: {
        submit() {
            this.details.post(route("forms.store"));
        }
    },
};
</script>
