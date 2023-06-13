<template>
    <div class="bg-gray-900">
        <Head title="Welcome" />
        <div
            class="py-8 px-4 mx-auto max-w-screen-xl max-h-screen-xl text-center lg:py-16"
        >
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl"
            >
                Welcome to Task Management
            </h1>
            <p
                class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48"
            >
                Task Management will allow you to manage your tasks.
            </p>
            <div
                class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4"
            >
                <Link
                    :href="route('login')"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300"
                >
                    Login
                </Link>
                <Link
                    :href="route('register')"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-black focus:ring-4 focus:ring-gray-100"
                >
                    Register
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
import { Link, Head } from "@inertiajs/vue3";

export default {
    components: {
        Link,
        Head,
    },
};
</script>
