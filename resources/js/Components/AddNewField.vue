<template>
    <button @click="create" :class="class">
        <slot />
    </button>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3"
export default {
    components: {
        useForm,
    },
    setup(props) {
      const newField = useForm({
          form_id: props.formId,
          form_field_id: 1,
      })
      return { newField }
    },
    props: {
        formId: {
            type: Number,
            required: true,
        },
        class:  {
            type: String,
            required: false
        },
    },
    methods: {
        create() {
            this.newField.post(this.route('form_fields.store'),
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
