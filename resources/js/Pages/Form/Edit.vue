<template>
    <Head :title="'Editing Form: ' + form.name" />
    <BreezeAuthenticatedLayout>
        <template #header>
            Editing Form: {{ form.name }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                            {{ status }}
                        </div>

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
                                        Update Form Details
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
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link,
        useForm,
    },
    setup(props) {
        const details = useForm({
            name: props.form.name,
            description: props.form.description,
        });

        return { details };
    },
    props: {
        form: Object,
        status: String,
    },
    methods: {
        submit() {
            console.log(this.details);
            this.details.put(this.route('forms.update', this.form.id));
        },
    },
}
</script>
