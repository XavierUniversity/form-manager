<template>
    <form
        class="mb-2 border rounded p-2"
        @submit.prevent="submitField"
    >
        <input type="hidden" name="id" v-model="form.id" />
        <input type="hidden" name="form_id" v-model="formId" required />
        <!-- Use the vue index on the loop, increment by 1 -->
        <!-- need to figure out reindexing of items later -->
        <input type="hidden" name="order" v-model="form.order" />
        <p v-if="form.id"><strong>Field ID:</strong> {{ form.id }}</p>
        <div class="flex mt-2">
            <BreezeLabel for="form_field_id" value="Field Type" class="flex-initial w-32" />
            <select name="form_field_id" id="form_field_id" v-model="form.form_field_id" required>
                <option value="">---</option>
                <option
                    v-for="formField in formFields"
                    :key="formField.id"
                    :value="formField.id"
                >
                    {{ formField.name }}
                </option>
            </select>
        </div>
        <div class="flex mt-2">
            <BreezeLabel for="name" value="Field Name" class="flex-initial w-32" />
            <input class="flex-initial block" id="name" type="text" name="name" v-model="form.name" required />
        </div>
        <div class="flex mt-2">
            <BreezeLabel for="required" value="Required?" class="flex-initial w-32" />
            <select name="required" id="required" class="flex-initial w-128 block" v-model="form.required">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <div class="flex mt-2">
            <BreezeLabel for="caption" value="Caption" class="flex-initial w-32" />
            <input type="text" id="caption" name="caption" v-model="form.caption" />
        </div>
        <div v-if="form.form_field_id >= 5 && form.form_field_id <= 7">
            <div class="flex mt-2">
                <BreezeLabel for="split_results" value="Split Results?" class="flex-initial w-32" />
                <select name="split_results" id="split_results" class="flex-initial w-128 block" v-model="form.split_results">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <fieldset class="mt-2 flex">
                <legend class="mb-2">Selectable Values</legend>
                <BreezeLabel for="options" value="Option Values" class="flex-initial w-32" />
                <div>
                    <input type="text" id="options" name="options" v-model="form.options" />
                    <p class="gray-600 text-sm mt-1">Please enter a comma separated list of values.</p>
                </div>
            </fieldset>
        </div>
        <div class="flex mt-2" v-else>
            <BreezeLabel for="max_length" value="Max Length" class="flex-initial w-32" />
            <input type="text" name="max_length" id="max_length" v-model="form.max_length" />
        </div>
        <div class="flex space-around">
            <BreezeButton class="mt-3 mr-3">
                <SaveIcon class="h-5 w-5" />
                    <span class="sr-only">Save field: {{ form.name }}</span>
            </BreezeButton>
            <DeleteField :field="form" class="mt-3 px-4 py-2 border-2 inline-block rounded hover:bg-red-900 hover:border-red-900 text-red-500 hover:text-white">
                <TrashIcon class="h-5 w-5" />
                <span class="sr-only">Delete field: {{ form.name }}</span>
            </DeleteField>
        </div>
    </form>
</template>

<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeCheckbox from '@/Components/Checkbox.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import DeleteField from '@/Components/DeleteField.vue';
import { SaveIcon, TrashIcon } from '@heroicons/vue/solid';
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        DeleteField,
        useForm,
        SaveIcon,
        TrashIcon,
    },
    setup(props) {
        const form = useForm({
            id: ( props.formDetails.id ? props.formDetails.id : null),
            form_id:  props.formId,
            form_field_id: props.formDetails.form_field_id,
            order: props.formDetails.order,
            name: props.formDetails.name,
            required: props.formDetails.required,
            caption: props.formDetails.caption,
            split_results: props.formDetails.split_results,
            options: props.formDetails.options,
            max_length: props.formDetails.max_length,
        });
        return { form };
    },
    props: {
        formId: Number,
        formFields: Object,
        formDetails: Object,
    },
    methods: {
        submitField() {
            this.form.put(this.route('form_fields.update', this.form.id),
            {
                preserveScroll: true,
                onError: (errors) => { console.log(errors) },
                onProgress: (progress) => {console.log(progress) },
                onSuccess: (success) => { console.log(success) },
                onStart: (visit) => {console.log(visit)}
            });
        }
    }
}
</script>
