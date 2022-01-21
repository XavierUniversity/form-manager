<template>
    {{ formatDate(date) }}
</template>

<script>
export default {
    props: {
        date: {
            type: String,
            default: false,
            required: true
        },
    },
    methods: {
        formatDate(dateString) {
            const date = new Date(dateString);
            return new Intl.DateTimeFormat('default', { month: 'numeric', day: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit'}).format(date);
        }
    },
}
</script>
