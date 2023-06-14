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
                v-if="editFunction"
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
            >
                Submit
            </button>
            <button
                v-else
                @click="editTask"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
            >
                Edit
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
    props: ["task", "editFunction"],
    watch: {
        task() {
            this.form.task_name = this.task.task_name;
            this.form.priority = this.task.priority;
        },
    },
    setup(props) {
        const form = useForm({
            task_name: props.task.task_name,
            priority: props.task.priority,
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
    methods: {
        editTask() {
            this.form.put(route("tasks.update", this.task.id));
            this.form.reset();
            this.$emit("editFunction", true);
        },
    },
};
</script>
