<template>
    <AuthenticatedLayout>
        <div>
            <slot name="header" />
        </div>

    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
export default {
    components: {
        AuthenticatedLayout,
        
    }
}
</script>