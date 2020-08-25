<template>
    <va-button
        name="Primary"
        theme="primary"
        size="btn-lg"
        :isFlat="true"
    ></va-button>
</template>

<script>
    import VAButton from 'vue2-admin-lte/src/components/VAButton.vue'
    export default {
        name: 'Button',
        components: {
            'va-button': VAButton
        }
    }
</script>
