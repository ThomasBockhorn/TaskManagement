<template>
    <div class="mt-10">
        <h1 class="text-2xl font-medium text-gray-900 mb-6">Add Task</h1>
        <form>
            <div class="mb-6">
                <label
                    for="taskName"
                    class="block mb-2 text-sm font-medium text-gray-900"
                    >Task Name</label
                >
                <input
                    type="text"
                    id="taskName"
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
                >
                    <option>Important</option>
                    <option>Not Important</option>
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
export default {};
</script>
