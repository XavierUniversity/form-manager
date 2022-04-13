<template>
    <Head :title="'Editing Form: ' + formDetails.name" />
    <BreezeAuthenticatedLayout>
        <template #header>
            Editing Form: {{ formDetails.name }}
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
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

                <div class="my-4">
                    <h2>Add a field:</h2>
                    <!-- Pass in a :form_id, default to a "1" on the form_field_id, everything else is null or default -->
                    <AddNewField :formId="formDetails.id" class="mt-3 px-4 py-2 border-2 border-navy inline-block rounded hover:bg-lightBlue hover:border-lightBlue text-navy hover:text-white">
                        Add Field
                    </AddNewField>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div v-for="fields in formDetails.form_field_forms" :key="fields.id">
                            <FormField
                                :formId="formDetails.id"
                                :formDetails="fields"
                                :formFields="formFields"
                            />
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    <h2>Add a field:</h2>
                    <!-- Pass in a :form_id, default to a "1" on the form_field_id, everything else is null or default -->
                    <AddNewField :formId="formDetails.id" class="mt-3 px-4 py-2 border-2 border-navy inline-block rounded hover:bg-lightBlue hover:border-lightBlue text-navy hover:text-white">
                        Add Field
                    </AddNewField>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue"
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import FormField from '@/Components/FormField'
import AddNewField from '@/Components/AddNewField'
import { Head, Link, useForm } from "@inertiajs/inertia-vue3"
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
        FormField,
        AddNewField,
    },
    setup(props) {
        const details = useForm({
            name: props.formDetails.name,
            description: props.formDetails.description,
        });
        return { details };
    },
    props: {
        formDetails: Object,
        status: String,
        formFields: Object,
    },
    methods: {
        submit() {
            this.details.put(this.route('forms.update', this.formDetails.id));
        },
        startDrag ( evt, item ) {
            evt.dataTransfer.dropEffect = 'move';
            evt.dataTransfer.effectAllowed = 'move';
            evt.dataTransfer.setData("field", item.id);
        },
        onDrop (evt, list) {
            const field = evt.dataTransfer.getData("field");
            this.formFields.push({ field: field });
            console.log(this.formFields);
        },
    },
    computed: {},
}
</script>

<style scoped lang="scss">
    .drop-zone {
        padding: 10px;
    }
</style>
