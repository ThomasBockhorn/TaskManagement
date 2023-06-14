<template>
    <AuthenticatedLayout>
        <Head title="Dashboard" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-8 workbench"
                @drop="dropTask($event, 1)"
                @dragover.prevent
                @dragenter.prevent
            >
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5"
                    v-for="task in tasksOne"
                    :key="task.id"
                    draggable="true"
                    @dragstart="dragTask($event, task)"
                >
                    <div class="flex">
                        <div class="p-6 text-gray-900 flex-1">
                            {{ task.task_name }}
                        </div>
                        <div>
                            <button
                                class="m-5 bg-red-500 rounded p-2 text-white"
                                @click="deleteTask(task.id)"
                            >
                                Delete
                            </button>
                            <button
                                class="m-5 bg-green-500 rounded p-2 text-white"
                                @click="editTask(task.id)"
                            >
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-8 workbench"
                @drop="dropTask($event, 2)"
                @dragover.prevent
                @dragenter.prevent
            >
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5"
                    v-for="task in tasksTwo"
                    :key="task.id"
                    draggable="true"
                    @dragstart="dragTask($event, task)"
                >
                    <div class="flex">
                        <div class="p-6 text-gray-900 flex-1">
                            {{ task.task_name }}
                        </div>
                        <div>
                            <button
                                class="m-5 bg-red-500 rounded p-2 text-white"
                                @click="deleteTask(task.id)"
                            >
                                Delete
                            </button>
                            <button
                                class="m-5 bg-green-500 rounded p-2 text-white"
                                @click="editTask(task.id)"
                            >
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <TaskForm
                    :task="task"
                    :editFunction="editFunction"
                    @editFunction="tasks"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import TaskForm from "@/Components/TaskForm/TaskForm.vue";

export default {
    components: {
        AuthenticatedLayout,
        Head,
        TaskForm,
    },
    data() {
        return {
            task: {
                task_name: "",
                priority: 1,
            },
            editFunction: true,
        };
    },
    props: ["tasks"],
    watch: {
        tasks(event) {
            this.editFunction = event;
        },
    },
    computed: {
        tasksOne() {
            return this.tasks.filter((task) => task.priority === 1);
        },
        tasksTwo() {
            return this.tasks.filter((task) => task.priority === 2);
        },
    },
    methods: {
        dragTask(event, task) {
            event.dataTransfer.dropEffect = "move";
            event.dataTransfer.effectAllowed = "move";
            event.dataTransfer.setData("taskID", task.priority);
        },
        dropTask(event, priority) {
            const taskID = event.dataTransfer.getData("taskID");
            const task = this.tasks.find((task) => task.priority == taskID);
            this.$inertia.put(`/tasks/${task.id}`, {
                task_name: task.task_name,
                priority: priority,
            });
            task.priority = priority;
        },
        deleteTask(id) {
            this.$inertia.delete(`/tasks/${id}`);
        },
        editTask(id) {
            this.task = this.tasks.find((task) => task.id == id);
            this.editFunction = false;
        },
    },
};
</script>

<style scoped>
.workbench {
    background-color: #eee;
    margin-bottom: 10px;
    padding: 20px;
}
</style>
