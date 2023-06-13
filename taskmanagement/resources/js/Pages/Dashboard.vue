<template>
    <AuthenticatedLayout>
        <Head title="Dashboard" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 workbench">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5"
                    v-for="task in tasks"
                    :key="task.id"
                >
                    <div class="p-6 text-gray-900">{{ task.task_name }}</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

export default {
    components: {
        AuthenticatedLayout,
        Head,
    },
    data() {
        return {
            tasks: [
                {
                    id: 0,
                    task_name: "Task 1",
                    priority: 1,
                },
                {
                    id: 1,
                    task_name: "Task 2",
                    priority: 2,
                },
                {
                    id: 2,
                    task_name: "Task 3",
                    priority: 3,
                },
            ],
        };
    },
    methods: {},
};
</script>

<style scoped>
.workbench {
    background-color: #eee;
    margin-bottom: 10px;
    padding: 10px;
}
</style>
