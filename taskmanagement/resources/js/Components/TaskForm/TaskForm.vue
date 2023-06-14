<template>
    <div class="mt-10">
        <h1 class="text-2xl font-medium text-gray-900 mb-6">Add Task</h1>
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label
                    for="taskName"
                    class="block mb-2 text-sm font-medium text-gray-900"
                    >Task Name</label
                >
                <input
                    type="text"
                    id="taskName"
                    v-model="form.task_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Task Name"
                    required
                />
            </div>
            <div class="mb-6">
                <label
                    for="Priority"
                    class="block mb-2 text-sm font-medium text-gray-900"
                    >Priority</label
                >
                <select
                    id="Priority"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    v-model="form.priority"
                >
                    <option value="1">Important</option>
                    <option value="2">Not Important</option>
                </select>
            </div>
            <button
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
            >
                Submit
            </button>
        </form>
    </div>
</template>

<script>
import { Link, useForm } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    setup() {
        const form = useForm({
            task_name: "",
            priority: "",
        });

        const submit = () => {
            form.post(route("tasks.store"));
            form.reset();
        };

        return {
            form,
            submit,
        };
    },
};
</script>
